@extends('layouts.backend')

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Edit ArticleCategory</h3>

            <div class="box-tools pull-right">
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            {!! Form::model($articleCategory, ['route' => ['backend.articleCategory.update', $articleCategory->id], 'class' => 'form-vertical', 'role' => 'form', 'method' => 'post']) !!}

            <div class="form-group">
                {!! Form::label('label', 'label', ['class' => 'control-label']) !!}
                {!! Form::text('label', null, ['class' => 'form-control']) !!}
            </div><!--form control-->

            <div class="form-group">
                {!! Form::label('slug', 'slug', ['class' => 'control-label']) !!}
                {!! Form::text('slug', null, ['class' => 'form-control']) !!}
            </div><!--form control-->

            <div class="form-group">
                {!! Form::label('order', 'order', ['class' => 'control-label']) !!}
                {!! Form::text('order', null, ['class' => 'form-control']) !!}
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
                <button type="submit" class="btn btn-success">update</button>
                <a href="{{ route('backend.article.index') }}" class="btn btn-danger">cancel</a>
            </div>

            {!! Form::close() !!}

        </div><!-- /.box-body -->
    </div><!--box-->
@stop