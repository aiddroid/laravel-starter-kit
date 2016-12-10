@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Hi,{{ Auth::user()->name }}
                </div>

                <div class="panel-body">
                    You are logged in! Go go <a href="{{ route('backend.article.index') }}">dashboard &raquo;</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
