@extends('layouts.backend')

@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">ArticleCategories</h3>

            <div class="box-tools">
                <a href="{{route('backend.articleCategory.create')}}" class="btn btn-success">create</a>
            </div>
            <br>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>label</th>
                        <th>slug</th>
                        <th>order</th>
                        <th class="visible-lg">created_at</th>
                        <th class="visible-lg">updated_at</th>
                        <th class="visible-lg">deleted_at</th>
                        <th>actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($articleCategories as $articleCategory)
                        <tr>
                            <td>{!! $articleCategory->id !!}</td>
                            <td>{!! $articleCategory->label !!}</td>
                            <td>{!! $articleCategory->slug !!}</td>
                            <td>{!! $articleCategory->order !!}</td>
                            <td class="visible-lg">{!! $articleCategory->created_at !!}</td>
                            <td class="visible-lg">{!! $articleCategory->updated_at !!}</td>
                            <td class="visible-lg">{!! $articleCategory->deleted_at !!}</td>
                            <td>
                                <a href="{{route('backend.articleCategory.view',['id' => $articleCategory->id])}}" class="btn btn-default btn-xs" title="view"><i class="fa fa-eye"></i></a>
                                <a href="{{route('backend.articleCategory.edit',['id' => $articleCategory->id])}}" class="btn btn-success btn-xs" title="edit"><i class="fa fa-edit"></i></a>
                                @if ($articleCategory->deleted_at)
                                    <a href="{{route('backend.articleCategory.restore',['id' => $articleCategory->id])}}" class="btn btn-warning btn-xs" title="restore"><i class="fa fa-recycle"></i></a>
                                @else
                                    <a href="{{route('backend.articleCategory.destroy',['id' => $articleCategory->id])}}" class="btn btn-danger btn-xs" title="delete"><i class="fa fa-trash"></i></a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="pull-left">
                {{ $articleCategories->currentPage() }} of {{ $articleCategories->lastPage() }} pages from {!! $articleCategories->total() !!} items
            </div>

            <div class="pull-right">
                {!! $articleCategories->render() !!}
            </div>

            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->
@stop