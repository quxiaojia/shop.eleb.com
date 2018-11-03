@extends('layouts.default')
@section('contents')
    <table  class="table table-hover">
        <tr>
            <th>活动名称</th>
            <th>活动详情</th>
            <th>活动开始时间</th>
            <th>活动结束时间</th>
            <th style="width: 200px">操作</th>
        </tr>
        <tr>
            <td>{{$data->title}}</td>
            <td>{!! $data->content !!}</td>
            <td>{{$data->start_time}}</td>
            <td>{{$data->end_time}}</td>

            <td>
                <a href="" class="btn btn-warning">新增</a>
            </td>
        </tr>
    </table>

@stop