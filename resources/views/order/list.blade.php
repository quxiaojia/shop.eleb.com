@extends('layouts.default')
@section('contents')
    <table  class="table table-hover">
        <tr>
            <th>ID</th>
            <th>订单编号</th>
            <th>状态</th>
            <th>创建时间</th>
            <th>更新时间</th>
            <th style="width: 200px">操作</th>
        </tr>
        @foreach($orders as $order)
        <tr>
            <td>{{$order->id}}</td>
            <td>{{$order->sn}}</td>
            <td>{{$order->status}}</td>


          {{--  创建一个快捷指向storage/app/public/face(位置在public/storage)     php artisan storage:link--}}
         {{--   <td style="width: 100px">@if($food->goods_img)<img class="img-circle" style="width: 80px;height: 80px;border-radius: 90px" src="{{($food->goods_img)}}"/>@endif
                @if(!$food->goods_img)<img class="img-circle" style="width: 80px;height: 80px;border-radius: 90px" src="/img/7.jpg"/>@endif
            </td>--}}
            <td>{{$order->created_at}}</td>
            <td>{{$order->updated_at}}</td>
            <td>

            {{--    <a href="{{route('order.create')}}" class="btn btn-warning">新增</a>--}}
             {{--   <a href="{{route('order.edit',[$order])}}" class="btn btn-warning">修改</a>--}}
           {{--     <form method="post" action="{{ route('order.destroy',[$order]) }} " style="display: inline">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class="btn btn-warning">删除</button>
                </form>--}}
            </td>
        </tr>
            @endforeach
    </table>
    <center>{{ $orders->links() }}</center>

@stop