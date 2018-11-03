@extends('layouts.default')
@section('contents')
    <table  class="table table-hover">
        <tr>
            <th>id</th>
            <th>菜品分类</th>
            <th>菜品编号</th>
            <th>创建日期</th>
            <th>更新日期</th>
            <th>操作</th>
        </tr>
        @foreach($foods_class as $food_class)
        <tr>
            <td>{{$food_class->id}}</td>
            <td>{{$food_class->name}}</td>
            <td>{{$food_class->type_accumulation}}</td>
            <td>{{$food_class->created_at}}</td>
            <td>{{$food_class->updated_at}}</td>

           <td>

                <a href="{{route('food_classification.create')}}" class="btn btn-warning">新增</a>
                <a href="{{route('food_classification.edit',[$food_class])}}" class="btn btn-warning">修改</a>
                <form method="post" action="{{ route('food_classification.destroy',[$food_class]) }} " style="display: inline">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class="btn btn-warning">删除</button>
                </form>
            </td>
        </tr>
            @endforeach
    </table>
    <center>{{ $foods_class->links() }}</center>

@stop