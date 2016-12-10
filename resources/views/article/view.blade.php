@extends('layouts.app')

@section('after-styles')
    {!! Html::style('https://imperavi.com/assets/css/redactor.css') !!}
    <style>.article-content img{max-width: 100%;padding:10px;}</style>
@stop

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-10 col-md-offset-1">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-book"></i>
                        {!! $article->category?$article->category->title_label:'' !!}
                        <a href="/article/view/{{ $article->id }}"> {{ $article->title }} </a>
                    </div>

                    <div class="panel-body">
                        <div style="padding-bottom: 5px;">
                            Post by <a href="{{ route('article.index', ['user_id' => $article->user_id]) }}">{{ $article->author->name }}</a> in <a href="{{ route('article.index', ['category_id' => $article->category_id]) }}">{{ $article->category->label }}</a> at {{ $article->created_at }} | {{ 345 }} views
                        </div>
                        <div>
                        <div>
                            @if ($article->icon_image)
                            <div>
                                <a href="#" style="float: right;">
                                    <img style="width:100px;height:100px;" src="{{ asset('uploads/icons/'.$article->icon_image) }}" alt="icon">
                                </a>
                            </div>
                            @endif
                            <blockquote>{{$article->excerpt}}</blockquote>
                        </div>
                            <hr>
                        <div class="article-content">{!! $article->content !!}</div>
                        <div class="pull-right">{{ $article->created_at->diffForHumans() }}</div>
                    </div>
                </div><!-- panel -->

            </div><!-- col-md-10 -->

        </div><!--row-->
    </div>
@endsection