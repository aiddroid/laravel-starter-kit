@extends('layouts.backend')

@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Create Article</h3>

            <div class="box-tools">
                <a href="{{route('backend.article.edit', ['id' => $article->id])}}" class="btn btn-success">edit</a>
                @if ($article->deleted_at)
                    <a href="{{route('backend.article.restore', ['id' => $article->id])}}" class="btn btn-warning">restore</a>
                @else
                    <a href="{{route('backend.article.destroy', ['id' => $article->id])}}" class="btn btn-danger">delete</a>
                @endif
            </div>
            <br>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <tbody>
                    <tr>
                        <td>id</td><td>{!! $article->id !!}</td>
                    </tr>
                    <tr>
                        <td>user_id</td><td>{!! $article->user_id !!}</td>
                    </tr>
                    <tr>
                        <td>icon</td>
                        <td>{!! $article->icon_image ? Html::image(asset('uploads/icons/' . $article->icon_image), null, ['class' => 'col-md-2']) : '' !!}</td>
                    </tr>
                    <tr>
                        <td>user_id</td><td>{!! $article->category_id !!}</td>
                    </tr>
                    <tr>
                        <td>title</td><td>{!! $article->title !!}</td>
                    </tr>
                    <tr>
                        <td>slug</td><td>{!! $article->slug !!}</td>
                    </tr>
                    <tr>
                        <td>excerpt</td><td>{!! $article->excerpt !!}</td>
                    </tr>
                    <tr>
                        <td>content</td><td>{!! $article->content !!}</td>
                    </tr>
                    <tr>
                        <td>status</td><td>{!! $article->status !!}</td>
                    </tr>
                    <tr>
                        <th class="visible-lg">created_at</td><td>{!! $article->created_at !!}</td>
                    </tr>
                    <tr>
                        <th class="visible-lg">updated_at</td><td>{!! $article->updated_at !!}</td>
                    </tr>
                    <tr>
                        <th class="visible-lg">deleted_at</td><td>{!! $article->deleted_at !!}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div><!--box-->
@stop