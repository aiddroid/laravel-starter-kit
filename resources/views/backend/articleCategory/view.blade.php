@extends('layouts.backend')

@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Create ArticleCategory</h3>

            <div class="box-tools">
                <a href="{{route('backend.articleCategory.edit', ['id' => $articleCategory->id])}}" class="btn btn-success">edit</a>
                @if ($articleCategory->deleted_at)
                    <a href="{{route('backend.articleCategory.restore', ['id' => $articleCategory->id])}}" class="btn btn-warning">restore</a>
                @else
                    <a href="{{route('backend.articleCategory.destroy', ['id' => $articleCategory->id])}}" class="btn btn-danger">delete</a>
                @endif
            </div>
            <br>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <tbody>
                    <tr>
                        <td>id</td><td>{!! $articleCategory->id !!}</td>
                    </tr>
                    <tr>
                        <td>label</td><td>{!! $articleCategory->label !!}</td>
                    </tr>
                    <tr>
                        <td>slug</td><td>{!! $articleCategory->slug !!}</td>
                    </tr>
                    <tr>
                        <td>order</td><td>{!! $articleCategory->order !!}</td>
                    </tr>
                    <tr>
                        <th class="visible-lg">created_at</td><td>{!! $articleCategory->created_at !!}</td>
                    </tr>
                    <tr>
                        <th class="visible-lg">updated_at</td><td>{!! $articleCategory->updated_at !!}</td>
                    </tr>
                    <tr>
                        <th class="visible-lg">deleted_at</td><td>{!! $articleCategory->deleted_at !!}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div><!--box-->
@stop