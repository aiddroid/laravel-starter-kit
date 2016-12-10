@extends('layouts.backend')

@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Users</h3>

            <div class="box-tools">
                {{--<a href="#" class="btn btn-success">create</a>--}}
            </div>
            <br>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>email</th>
                        <th class="visible-lg">created_at</th>
                        <th class="visible-lg">updated_at</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{!! $user->id !!}</td>
                            <td>{!! $user->name !!}</td>
                            <td>{!! $user->email !!}</td>
                            <td class="visible-lg">{!! $user->created_at !!}</td>
                            <td class="visible-lg">{!! $user->updated_at !!}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="pull-left">
                {{ $users->currentPage() }} of {{ $users->lastPage() }} pages from {!! $users->total() !!} items
            </div>

            <div class="pull-right">
                {!! $users->render() !!}
            </div>

            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->
@stop