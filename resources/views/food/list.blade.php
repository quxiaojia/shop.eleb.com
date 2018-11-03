@extends('layouts.default')
@section('contents')
    <form class="form-inline"action="{{route('food.index')}}"  method="get" >
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1" style="width: 60px;">菜品分类: </span>
                <select class="form-control"style="width: 250px;" name="category_id">
                    <option value="0">全部</option>
                    @foreach($foods_class as $food_class)
                        <option value="{{$food_class->id}}">{{$food_class->name}}</option>
                    @endforeach
                </select>
            </div>
        <div class="form-group">

            <label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1" style="width: 60px;">菜品: </span>
                <input type="text" class="form-control" id="exampleInputAmount" name="menu" placeholder="菜品搜索" style="width: 300px">
            </div>
        </div>

        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1" style="width: 60px;">菜品分类: </span>
            <select class="form-control"style="width: 250px;" name="price">
                <option value="1">全部</option>
                    <option value="2">小于20</option>
                    <option value="3">20~50</option>
                    <option value="4">50~100</option>
                    <option value="5">大于100</option>
            </select>
        </div>
        {{csrf_field()}}
        <button type="submit" class="btn btn-primary" style="width: 80px;background-color: #2b669a">搜索</button>
    </form>
    <table  class="table table-hover">
        <tr>
            <th>id</th>
            <th>菜品名</th>
            <th>评分</th>
            <th>所属商家</th>
            <th>所属分类</th>
            <th>价格</th>
            <th>月销量</th>
            <th>评分数量</th>
            <th>满意度数量</th>
            <th>满意度评分</th>
            <th>商品图片</th>
            <th>创建时间</th>
            <th>更新时间</th>
            <th style="width: 200px">操作</th>
        </tr>
        @foreach($foods as $food)
        <tr>
            <td>{{$food->id}}</td>
            <td>{{$food->goods_name}}</td>
            <td>{{$food->rating}}</td>
            <td>{{$food->shops->shop_name}}</td>
            <td>{{$food->foods_class->name}}</td>
            <td>{{$food->goods_price}}</td>
            <td>{{$food->month_sales}}</td>
            <td>{{$food->rating_count}}</td>
            <td>{{$food->satisfy_count}}</td>
            <td>{{$food->satisfy_rate}}</td>
          {{--  创建一个快捷指向storage/app/public/face(位置在public/storage)     php artisan storage:link--}}
            <td style="width: 100px">@if($food->goods_img)<img class="img-circle" style="width: 80px;height: 80px;border-radius: 90px" src="{{($food->goods_img)}}"/>@endif
                @if(!$food->goods_img)<img class="img-circle" style="width: 80px;height: 80px;border-radius: 90px" src="/img/7.jpg"/>@endif
            </td>
            <td>{{$food->created_at}}</td>
            <td>{{$food->updated_at}}</td>
            <td>

                <a href="{{route('food.create')}}" class="btn btn-warning">新增</a>
                <a href="{{route('food.edit',[$food])}}" class="btn btn-warning">修改</a>
                <form method="post" action="{{ route('food.destroy',[$food]) }} " style="display: inline">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class="btn btn-warning">删除</button>
                </form>
            </td>
        </tr>
            @endforeach
    </table>
    <center>{{ $foods->links() }}</center>

@stop