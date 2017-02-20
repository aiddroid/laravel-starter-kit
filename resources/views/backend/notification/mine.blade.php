@extends('layouts.backend')

@section('content')
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Notifications</h3>

            <div class="box-tools">
                <a href="{{route('backend.notification.markall')}}" class="btn btn-success">mark all as read</a>
            </div>
            <br>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>type</th>
                        <th>data</th>
                        <th class="visible-lg">created_at</th>
                        <th class="visible-lg">read_at</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($notifications as $notification)
                        <tr>
                            <td>{!! $notification->id !!}</td>
                            <td>{!! $notification->type !!}</td>
                            <td>{!! json_encode($notification->data, JSON_UNESCAPED_UNICODE) !!}</td>
                            <td class="visible-lg">{!! $notification->created_at !!}</td>
                            <td class="visible-lg">{!! $notification->read_at !!}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="pull-left">
                {{ $notifications->currentPage() }} of {{ $notifications->lastPage() }} pages from {!! $notifications->total() !!} items
            </div>

            <div class="pull-right">
                {!! $notifications->render() !!}
            </div>

            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->
@stop