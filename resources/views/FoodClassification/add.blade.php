@extends('layouts.default')
@section('contents')

            <div class="page-header">
                <h1 style="margin-left: 30%;font-size: 50px"><small>添加菜品分类</small></h1>
            </div>
            @include('layouts._errors')
            <form method="post" action="{{route('food_classification.store')}}" enctype="multipart/form-data" style="margin-left: 30%">

                <div style="margin-bottom: 20px">
                    <div class="input-group ">
                        <span class="input-group-addon" id="basic-addon2" style="width: 100px;">菜品分类名:</span>
                        <input type="text" name="name" class="form-control"  placeholder="请输入菜品分类名" aria-describedby="sizing-addon2" style="width: 200%;background-color:  #FFFFCC">
                    </div>
                </div>

                <div style="margin-bottom: 20px">
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1" style="width: 100px;">默认分类: </span>
                        <select class="form-control"style="width: 395px;" name="is_selected">

                                <option value="0">否</option>
                                <option value="1">是</option>


                        </select>
                    </div>
                </div>



                <div style="margin-bottom: 20px">
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1" style="width: 100px;">描述: </span>
                        <textarea class="form-control" rows="8" style="width: 395px;" name="description"></textarea>
                    </div>
                </div>

                <div class="input-group">
                    <div class="btn-group btn-group-lg">
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-default" style="background-color:#FFFFCC">
                            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                            添加
                        </button>
                    </div>
                </div>
            </form>
@stop