@extends('layouts.default')
@section('contents')

            <div class="page-header">
                <h1 style="margin-left: 30%;font-size: 50px"><small>修改菜品分类</small></h1>
            </div>
            @include('layouts._errors')
            <form method="post" action="{{route('food_classification.update',[$food_classification])}}" enctype="multipart/form-data" style="margin-left: 30%">

                <div style="margin-bottom: 20px">
                    <div class="input-group ">
                        <span class="input-group-addon" id="basic-addon2" style="width: 100px;">菜品分类名:</span>
                        <input type="text" name="name" class="form-control" value="{{$food_classification->name}}"  placeholder="请输入菜品分类名" aria-describedby="sizing-addon2" style="width: 200%;background-color:  #FFFFCC">
                    </div>
                </div>

                <div style="margin-bottom: 20px">
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1" style="width: 100px;">默认分类: </span>
                        <select class="form-control"style="width: 395px;" name="is_selected">
                                <option value="1" @if($food_classification->is_selected == 1) selected = "selected"@endif>是</option>
                                <option value="0" @if($food_classification->is_selected == 0) selected = "selected"@endif>否</option>
                        </select>
                    </div>
                </div>



                <div style="margin-bottom: 20px">
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1" style="width: 100px;">描述: </span>
                        <textarea class="form-control" rows="8" style="width: 395px;" name="description">{{$food_classification->description}}</textarea>
                    </div>
                </div>

                <div class="input-group">
                    <div class="btn-group btn-group-lg">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <button type="submit" class="btn btn-default" style="background-color:#FFFFCC">
                            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                            修改
                        </button>
                    </div>
                </div>
            </form>
@stop