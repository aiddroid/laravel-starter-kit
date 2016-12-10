@extends('layouts.backend')

@section('after-styles')
    {!! Html::style('https://imperavi.com/assets/css/redactor.css') !!}
@stop

@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Create Article</h3>

            <div class="box-tools pull-right">
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            {!! Form::model($article, ['route' => 'backend.article.store', 'class' => 'form-vertical', 'role' => 'form', 'method' => 'post', 'files' => true]) !!}

            <div class="form-group">
                {!! Form::label('user_id', 'user_id', ['class' => 'control-label']) !!}
                {!! Form::text('user_id', null, ['class' => 'form-control']) !!}
            </div><!--form control-->

            <div class="form-group">
                {!! Form::label('category', 'category', ['class' => 'control-label']) !!}
                {!! Form::select('category_id', App\ArticleCategory::dropListItems(), null, ['class' => 'form-control']) !!}
            </div><!--form control-->

            <div class="form-group">
                {!! Form::label('title', 'title', ['class' => 'control-label']) !!}
                {!! Form::text('title', null, ['class' => 'form-control']) !!}
            </div><!--form control-->

            <div class="form-group">
                {!! Form::label('slug', 'slug', ['class' => 'control-label']) !!}
                {!! Form::text('slug', null, ['class' => 'form-control']) !!}
            </div><!--form control-->

            <div class="form-group">
                {!! Form::label('excerpt', 'excerpt', ['class' => 'control-label']) !!}
                {!! Form::textarea('excerpt', null, ['class' => 'form-control', 'rows' => 5]) !!}
            </div><!--form control-->

            <div class="form-group">
                {!! Form::label('icon_image', 'icon_image', ['class' => 'control-label']) !!}
                {!! Form::file('icon_image', null, ['class' => 'form-control']) !!}
            </div><!--form control-->

            <div class="form-group">
                {!! Form::label('content', 'content', ['class' => 'control-label']) !!}
                {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
            </div><!--form control-->

            <div class="form-group">
                <label class="control-label">status</label>
                <input type="checkbox" value="1" name="status" checked="checked" />
            </div><!--form control-->

            <div class="form-group">
                {!! Form::label('created_at', 'created_at', ['class' => 'control-label']) !!}
                {!! Form::text('created_at', null, ['class' => 'form-control']) !!}
            </div><!--form control-->

            <div class="form-group">
                {!! Form::label('updated_at', 'updated_at', ['class' => 'control-label']) !!}
                {!! Form::text('updated_at', null, ['class' => 'form-control']) !!}
            </div><!--form control-->

            <div class="form-group">
                <button type="submit" class="btn btn-success">create</button>
                <a href="{{ route('backend.article.index') }}" class="btn btn-danger">cancel</a>
            </div>

            {!! Form::close() !!}

        </div><!-- /.box-body -->
    </div><!--box-->
@stop

@section('after-scripts')
    {!! Html::script('https://imperavi.com/assets/js/redactor.js') !!}
    <script>
        $(function () {
            $('#content').redactor({
                imageUpload: '{{ route('backend.article.uploadImage') }}',
                imagePosition: true,
                imageResizable: true
            });
        });
    </script>
@stop