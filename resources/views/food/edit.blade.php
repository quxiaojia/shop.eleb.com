@extends('layouts.default')
@section('contents')

    <div class="page-header">
        <h1 style="margin-left: 30%;font-size: 50px"><small>修改菜品</small></h1>
    </div>
    @include('layouts._errors')
    <form method="post" action="{{route('food.update',[$food])}}" enctype="multipart/form-data" style="margin-left: 30%">
        <div style="margin-bottom: 20px">
            <div class="input-group ">
                <span class="input-group-addon" id="basic-addon2" style="width: 100px;">菜品名:</span>
                <input type="text" name="goods_name" class="form-control" value="{{$food->goods_name}}"  placeholder="请输入菜品名" aria-describedby="sizing-addon2" style="width: 200%;background-color:  #FFFFCC">
            </div>
        </div>

        <div style="margin-bottom: 20px">
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1" style="width: 100px;">价格: </span>
                <input type="text" name="goods_price" class="form-control"  value="{{$food->goods_price}}" placeholder="请输入菜品价格"   aria-describedby="sizing-addon1" style="width: 200%;background-color:  #FFFFCC">
            </div>
        </div>

        <div style="margin-bottom: 20px">
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1" style="width: 100px;">提示信息: </span>
                <input type="text" name="tips" class="form-control"  value="{{$food->tips}}" placeholder="请输入提示"   aria-describedby="sizing-addon1" style="width: 200%;background-color:  #FFFFCC">
            </div>
        </div>

        <div style="margin-bottom: 20px">
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1" style="width: 100px;">状态: </span>
                <select class="form-control"style="width: 395px;" name="status">
                    <option value="1" @if($food->status == 1) selected = "selected"@endif>上架</option>
                    <option value="0" @if($food->status == 0) selected = "selected"@endif>下架</option>
                </select>
            </div>
        </div>
        <div style="margin-bottom: 20px">
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1" style="width: 100px;">菜品分类: </span>
                <select class="form-control"style="width: 395px;" name="category_id">
              @foreach($foods_class as $food_class)
                        <option value="{{$food_class->id}}"@if($food_class->id == $food->category) selected = "selected"@endif>{{$food_class->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div style="margin-bottom: 20px">
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1" style="width: 100px;">描述: </span>
                <textarea class="form-control" rows="8" style="width: 395px;" name="description">{{$food->description}}</textarea>
            </div>
        </div>

        <div style="margin-bottom: 20px" >
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1" style="width: 100px;">菜品图片: </span>
                <input type="file" id="file" name="goods_img"  style="display: none"  onchange="preview(this)"><br/>
                <div style="width: 395px; height: 200px;background-color:#FFFFCC;padding: 0" class="input-group-addon" onclick="test()">
                    @if($food->goods_img) <img id="face" src="{{$food->goods_img}}" alt="上传头像预览"style="width: 395px; height: 200px;background-color:#FFFFCC;" />@endif
                    @if(!$food->goods_img) <img id="face" src="/img/3.jpg" alt="上传头像预览"style="width: 395px; height: 200px;background-color:#FFFFCC;" />@endif
                   </div>
            </div>
        </div>


        <div class="input-group">
            <div class="btn-group btn-group-lg">
                {{csrf_field()}}
                {{method_field('PUT')}}
                <button type="submit" class="btn btn-default" style="background-color:#FFFFCC">
                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                    提交
                </button>
            </div>
        </div>
    </form>
    <script>
        function test(){
            var $file = document.getElementById('file');
            $file.click();
        }

        function preview(obj) {
            // 获取input上传的图片数据;
            var file = obj.files[0];
            // 得到bolb对象路径，可当成普通的文件路径一样使用，赋值给src;
            url = window.URL.createObjectURL(file);
            //预览
            var face = document.getElementById('face');
            face.src = url;
        }
    </script>
@stop