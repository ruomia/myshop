@extends('home.layouts.home')


@section('contentJs')
<script type="text/javascript" src="/js/plugins/birthday/birthday.js"></script>
<script type="text/javascript" src="/js/plugins/citypicker/distpicker.data.js"></script>
<script type="text/javascript" src="/js/plugins/citypicker/distpicker.js"></script>
<script type="text/javascript" src="/js/plugins/upload/uploadPreview.js"></script>
<script type="text/javascript" src="/js/pages/main.js"></script>
<script>
            $(function() {               
                $.ms_DatePicker({
                    YearSelector: "#select_year2",
                    MonthSelector: "#select_month2",
                    DaySelector: "#select_day2"
                });
            });
		</script>
@endsection

   
                   
				@section('content')
                <!--右侧主内容-->
                <div class="yui3-u-5-6">
                    <div class="body userInfo">
                        <ul class="sui-nav nav-tabs nav-large nav-primary ">
                            <li class="active"><a href="#one" data-toggle="tab">基本资料</a></li>
                            <li><a href="#two" data-toggle="tab">头像照片</a></li>
                        </ul>
                        <div class="tab-content ">
                            <div id="one" class="tab-pane active">
                                <form id="form-msg" class="sui-form form-horizontal">
                                    <div class="control-group">
                                        <label for="inputName" class="control-label">昵称：</label>
                                        <div class="controls">
                                            <input type="text" id="inputName" name="nicheng" placeholder="昵称" value="{{$data->nicheng}}">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="inputGender" class="control-label">性别：</label>
                                        <div class="controls">
                                            <!-- <label data-toggle="radio" class="radio-pretty inline"> -->
                                            <input type="radio" name="gender" value="1" @if($data->gender===1) checked @endif><span>男</span>
                                        </label>
                                            <!-- <label data-toggle="radio" class="radio-pretty inline"> -->
                                            <input type="radio" name="gender" value="2" @if($data->gender===2) checked @endif><span>女</span>
                                        </label>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="inputPassword" class="control-label">生日：</label>
                                        <div class="controls">
                                            <select id="select_year2" rel="{{isset($data->birthday) ? substr($data->birthday,0,4) : 1990 }}"></select>年
                                            <select id="select_month2" rel="{{isset($data->birthday) ? substr($data->birthday,5,2) : 4 }}"></select>月
                                            <select id="select_day2" rel="{{isset($data->birthday) ? substr($data->birthday,8,2) : 3 }}"></select>日
                                        </div>
                                    </div>


                                    <div class="control-group">
                                        <label for="inputPassword" class="control-label">所在地：</label>
                                        <div class="controls">
                                            <div data-toggle="distpicker">
                                                <div class="form-group area">
                                                    <select class="form-control" id="province1" name="province" data-province="{{isset($data->province)? $data->province : '北京市' }}"></select>
                                                </div>
                                                <div class="form-group area"> 
                                                    <select class="form-control" id="city1" name="city" data-city="{{isset($data->city) ? $data->city : '北京市市辖区' }}"></select>
                                                </div>
                                                <div class="form-group area">
                                                    <select class="form-control" id="district1"  name="district" data-district="{{isset($data->district) ? $data->district : '东城区' }}"></select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="inputJob" class="control-label">职业：</label>
                                        <div class="controls"><span class="sui-dropdown dropdown-bordered select"><span class="dropdown-inner"><a role="button" data-toggle="dropdown" href="#" class="dropdown-toggle">
                                                <input name="job" type="hidden" data-rules="required"><i class="caret"></i><span>请选择</span></a>
                                            <ul id="menu4" role="menu" aria-labelledby="drop4" class="sui-dropdown-menu">
                                                <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:void(0);" value="bj">程序员</a></li>
                                                <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:void(0);" value="sb">产品经理</a></li>
                                                <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:void(0);" value="sb">UI设计师</a></li>
                                            </ul>
                                            </span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="sanwei" class="control-label"></label>
                                        <div class="controls">
                                            <button type="submit" class="sui-btn btn-primary">立即注册</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div id="two" class="tab-pane">

                                <div class="new-photo">
                                    <p>当前头像：</p>
                                    <div class="upload">
                                        <img id="imgShow_WU_FILE_0" width="100" height="100" src="/img/_/photo_icon.png" alt="">
                                        <input type="file" id="up_img_WU_FILE_0" />
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
				</div>
				@endsection
  