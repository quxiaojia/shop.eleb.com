@extends('layouts.default')
@section('contents')

            <div class="page-header">
                <h1 style="margin-left: 30%;font-size: 50px"><small>活动详情</small></h1>
            </div>
            @include('layouts._errors')

                <div style="margin-bottom: 20px">
                    <div class="input-group ">
                        <span class="input-group-addon" id="basic-addon2" style="width: 100px;">活动名称:</span>
                        <input type="text" name="title" class="form-control" value="{{$data->title}}"  placeholder="请输入您要添加的活动名称" aria-describedby="sizing-addon2" style="width: 200%;background-color:  #FFFFCC">
                    </div>
                </div>


                <div style="margin-bottom: 20px">
                    <div class="input-group" style="width: 407px">

                        <span class="input-group-addon" id="basic-addon1" style="width: 100px;">活动详情: </span>
                        <div style="background-color: whitesmoke">
                            {!! $data->content !!}
                        </div>


                </div>


                <p>开始时间:{{$data->start_time}}</p>

                <p>结束时间:{{$data->end_time}}</p>



@stop