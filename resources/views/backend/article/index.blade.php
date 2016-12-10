@extends('layouts.backend')

@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Articles</h3>

            <div class="box-tools">
                <a href="{{route('backend.article.create')}}" class="btn btn-success">create</a>
            </div>
            <br>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>category</th>
                        <th>user</th>
                        <th>icon</th>
                        <th>title</th>
                        <th>slug</th>
                        <th>status</th>
                        <th class="visible-lg">created_at</th>
                        <th class="visible-lg">updated_at</th>
                        <th>actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($articles as $article)
                        <tr>
                            <td>{!! $article->id !!}</td>
                            <td>{!! $article->category->label or 'uncategory' !!}</td>
                            <td>{!! $article->author->name or 'admin' !!}</td>
                            <td>
                                @if ($article->icon_image)
                                    {!! Html::image(asset('uploads/icons/'.$article->icon_image), null, ['class' => 'col-md-4 col-md-offset-4']) !!}
                                @endif
                            </td>
                            <td>{!! $article->title !!}</td>
                            <td>{!! $article->slug !!}</td>
                            <td>{!! $article->status !!}</td>
                            <td class="visible-lg">{!! $article->created_at !!}</td>
                            <td class="visible-lg">{!! $article->updated_at !!}</td>
                            <td>
                                <a href="{{route('backend.article.view',['id' => $article->id])}}" class="btn btn-default btn-xs" title="view"><i class="fa fa-eye"></i></a>
                                <a href="{{route('backend.article.edit',['id' => $article->id])}}" class="btn btn-success btn-xs" title="edit"><i class="fa fa-edit"></i></a>
                                @if ($article->deleted_at)
                                    <a href="{{route('backend.article.restore',['id' => $article->id])}}" class="btn btn-warning btn-xs" title="restore"><i class="fa fa-recycle"></i></a>
                                @else
                                    <a href="{{route('backend.article.destroy',['id' => $article->id])}}" class="btn btn-danger btn-xs" title="delete"><i class="fa fa-trash"></i></a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="pull-left">
                {{ $articles->currentPage() }} of {{ $articles->lastPage() }} pages from {!! $articles->total() !!} items
            </div>

            <div class="pull-right">
                {!! $articles->render() !!}
            </div>

            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->
@stop