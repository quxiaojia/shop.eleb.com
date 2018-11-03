@extends('layouts.default')
@section('contents')

    <div class="page-header">
        <h1 style="margin-left: 30%;font-size: 50px"><small>修改用户</small></h1>
    </div>
    @include('layouts._errors')
    <form method="post" action="{{route('admins.update',[$admin])}}" enctype="multipart/form-data" style="margin-left: 30%">
                <input type="HIDDEN" name="id" class="form-control"   value="{{ $admin->id }}" aria-describedby="sizing-addon2" style="width: 200%;background-color:  #FFFFCC">
        <div style="margin-bottom: 20px">
            <div class="input-group ">
                <span class="input-group-addon" id="basic-addon2"  style="width: 100px;">用户名:</span>
                <input type="text" name="username" class="form-control"  value="{{ $admin->username }}" aria-describedby="sizing-addon2" style="width: 200%;background-color:  #FFFFCC">
            </div>
        </div>

        <div style="margin-bottom: 20px">
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1" style="width: 100px;">密码: </span>
                <input type="text" name="password" class="form-control"  value="{{ $admin->password }}"   aria-describedby="sizing-addon1" style="width: 200%;background-color:  #FFFFCC">
            </div>
        </div>

        <div style="margin-bottom: 20px" >
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1" style="width: 100px;">头像: </span>
                <input type="file" id="file" name="img"  style="display: none"  onchange="preview(this)"><br/>
                <div style="width: 395px; height: 200px;background-color:#FFFFCC;padding: 0" class="input-group-addon" onclick="test()">
                    @if($admin->img) <img id="face" src="{{\Illuminate\Support\Facades\Storage::url($admin->img)}}" alt="上传头像预览"style="width: 395px; height: 200px;background-color:#FFFFCC;" />@endif
                </div>
            </div>
        </div>

        <div class="input-group">
            <div class="btn-group btn-group-lg">
                {{csrf_field()}}
                {{ method_field('PUT') }}
                <button type="submit" class="btn btn-default" style="background-color:#FFFFCC">
                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                    修改
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