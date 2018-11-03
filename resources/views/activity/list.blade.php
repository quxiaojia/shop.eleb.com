@extends('layouts.default')
@section('contents')
    <table  class="table table-hover">
        <tr>
            <th><center>活动名称</center></th>
            <th style="width: 200px">查看详情</th>
        </tr>
        @foreach($datas as $data)
        <tr>
            <td><center>{{$data->title}}</center></td>
            <td>
                <a href="{{route('activity.show',[$data])}}" class="btn btn-warning">详情</a>
            </td>
        </tr>
            @endforeach
    </table>
    <center>{{ $datas->links()}}</center>

@stop