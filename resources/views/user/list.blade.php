@extends('layouts.default')
@section('contents')
    <table  class="table table-hover">
        <tr>
            <th>id</th>
            <th>用户名</th>
            <th>头像</th>
            <th>创建日期</th>
            <th>更新日期</th>
            <th>操作</th>
        </tr>
        @foreach($admins as $admin)
        <tr>
            <td>{{$admin->id}}</td>
            <td>{{$admin->username}}</td>
          {{--  创建一个快捷指向storage/app/public/face(位置在public/storage)     php artisan storage:link--}}
            <td style="width: 100px">@if($admin->img)<img class="img-circle" style="width: 80px;height: 80px;border-radius: 90px" src="{{\Illuminate\Support\Facades\Storage::url($admin->img)}}"/>@endif</td>
            <td>{{$admin->created_at}}</td>
            <td>{{$admin->updated_at}}</td>
            <td>

                <a href="{{route('admins.create')}}" class="btn btn-warning">新增</a>
                <a href="{{route('admins.edit',[$admin])}}" class="btn btn-warning">修改</a>
                <form method="post" action="{{ route('admins.destroy',[$admin]) }} " style="display: inline">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class="btn btn-warning">删除</button>
                </form>
            </td>
        </tr>
            @endforeach
    </table>
    <center>{{ $admins->links() }}</center>

@stop