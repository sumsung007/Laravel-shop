@extends('layouts.app')
@push('MyFontStyle')
<link href="/plug/login/Css/gloab.css" rel="stylesheet">
<link href="/plug/login/Css/index.css" rel="stylesheet">
@endpush
@push('MyFontScripts')
    <script src="/plug/login/Scripts/register.js"></script>
@endpush

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="bgf4">
            <div class="login-box f-mt10">
                <div class="main bgf">
                    <div class="reg-box-pan display-inline">
                        <div class="step">
                            <ul>
                                <li class="col-xs-4 on">
                                    <span class="num"><em class="f-r5"></em><i>1</i></span>
                                    <span class="line_bg lbg-r"></span>
                                    <p class="lbg-txt">填写账户信息</p>
                                </li>
                                <li class="col-xs-4">
                                    <span class="num"><em class="f-r5"></em><i>2</i></span>
                                    <span class="line_bg lbg-l"></span>
                                    <span class="line_bg lbg-r"></span>
                                    <p class="lbg-txt">验证账户信息</p>
                                </li>
                                <li class="col-xs-4">
                                    <span class="num"><em class="f-r5"></em><i>3</i></span>
                                    <span class="line_bg lbg-l"></span>
                                    <p class="lbg-txt">注册成功</p>
                                </li>
                            </ul>
                        </div>
                        {{var_dump($errors)}}
                        <form id="part1form" method="POST" action="{{ route('register') }}">
                            {{csrf_field()}}
                        <div class="reg-box" id="verifyCheck" style="margin-top:20px;">
                            <div class="part1">
                                <div class="item col-xs-12">
                                    <span class="intelligent-label f-fl"><b class="ftx04">*</b>用户名：</span>
                                    <div class="f-fl item-ifo">
                                        <input type="text" name="name" value="{{old('name')}}" required
                                               maxlength="20"
                                               class="txt03 f-r3 required"
                                               tabindex="1"
                                               data-valid="isNonEmpty||between:2-8"
                                               data-error="用户名不能为空||用户名长度2-8位"
                                               id="adminNo" /><span class="ie8 icon-close close hide"></span>
                                        <label class="icon-sucessfill blank hide"></label>
                                        @if (!$errors->has('name'))
                                            <label class="focus"><span>请填写长度2-8位的用户名</span></label>
                                            <label class="focus valid"></label>
                                        @else
                                            <label class="focus"><span></span></label>
                                            <label class="focus valid">{{ $errors->first('name') }}</label>
                                        @endif



                                    </div>
                                </div>
                                <div class="item col-xs-12">
                                    <span class="intelligent-label f-fl"><b class="ftx04">*</b>手机号：</span>
                                    <div class="f-fl item-ifo">
                                        <input type="text" name="phone" value="{{old('phone')}}"
                                               class="txt03 f-r3 required" keycodes="tel" tabindex="2"
                                               data-valid="isNonEmpty||isPhone"
                                               data-error="手机号码不能为空||手机号码格式不正确" maxlength="11" id="phone" />
                                        <span class="ie8 icon-close close hide"></span>
                                        <label class="icon-sucessfill blank hide"></label>
                                        @if (!$errors->has('phone'))
                                            <label class="focus">请填写11位有效的手机号码</label>
                                            <label class="focus valid"></label>
                                        @else
                                            <label class="focus"><span></span></label>
                                            <label class="focus valid">{{ $errors->first('phone') }}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="item col-xs-12">
                                    <span class="intelligent-label f-fl"><b class="ftx04">*</b>密码：</span>
                                    <div class="f-fl item-ifo">
                                        <input type="password" name="password" value="{{old('password')}}"
                                               id="password" maxlength="20" class="txt03 f-r3 required" tabindex="3"
                                               style="ime-mode:disabled;" onpaste="return  false" autocomplete="off"
                                               data-valid="isNonEmpty||between:6-20"
                                               data-error="密码不能为空||密码长度6-20位" />
                                        <span class="ie8 icon-close close hide" style="right:55px"></span>
                                        <span class="showpwd" data-eye="password"></span>
                                        <label class="icon-sucessfill blank hide"></label>
                                        @if (!$errors->has('password'))
                                            <label class="focus">6-20位英文（区分大小写）、数字、字符的组合</label>
                                            <label class="focus valid"></label>
                                        @else
                                            <label class="focus"><span></span></label>
                                            <label class="focus valid">{{ $errors->first('password') }}</label>
                                        @endif
                                        <span class="clearfix"></span>
                                        <label class="strength">
                                            <span class="f-fl f-size12">安全程度：</span>
                                            <b><i>弱</i><i>中</i><i>强</i></b>
                                        </label>
                                    </div>
                                </div>
                                <div class="item col-xs-12">
                                    <span class="intelligent-label f-fl"><b class="ftx04">*</b>确认密码：</span>
                                    <div class="f-fl item-ifo">
                                        <input type="password" name="password_confirmation" value="{{old('password_confirmation')}}"
                                               maxlength="20" class="txt03 f-r3 required" tabindex="4"
                                               style="ime-mode:disabled;" onpaste="return  false" autocomplete="off"
                                               data-valid="isNonEmpty||between:6-16||isRepeat:password"
                                               data-error="密码不能为空||密码长度6-16位||两次密码输入不一致" id="rePassword" />
                                        <span class="ie8 icon-close close hide" style="right:55px"></span>
                                        <span class="showpwd" data-eye="rePassword"></span>
                                        <label class="icon-sucessfill blank hide"></label>
                                        <label class="focus">请再输入一遍上面的密码</label>
                                        <label class="focus valid"></label>
                                    </div>
                                </div>

                                <div class="item col-xs-12" style="height:auto">
                                    <span class="intelligent-label f-fl">&nbsp;</span>
                                    <p class="f-size14 required"  data-valid="isChecked" data-error="请先同意条款">
                                        <input type="checkbox" checked /><a href="javascript:showoutc();" class="f-ml5">我已阅读并同意条款</a>
                                    </p>
                                    <label class="focus valid"></label>
                                </div>
                                <div class="item col-xs-12">
                                    <span class="intelligent-label f-fl">&nbsp;</span>
                                    <div class="f-fl item-ifo">
                                        <button style="display: none" type="button" class="btn btn-blue f-r3"
                                                id="TencentCaptcha"
                                                data-appid="{{env('TX_CAPTCHA_APPID')}}"
                                                data-cbfn="captcha_callback"
                                        >验证</button>
                                        <a href="javascript:;" class="btn btn-blue f-r3" id="btn_part1">下一步</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="m-sPopBg" style="z-index:998;"></div>
            <div class="m-sPopCon regcon">
                <div class="m-sPopTitle"><strong>服务协议条款</strong><b id="sPopClose" class="m-sPopClose" onClick="closeClause()">×</b></div>
                <div class="apply_up_content">
    	<pre class="f-r0">
		<strong>同意以下服务条款，提交注册信息</strong>
            我这是黑店哦，而且卖的全都是水货哦<br />
            如果想了解详情，请搜索小程序水货商城哦<br />
            &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;(*￣︶￣)
        </pre>
                </div>
                <center><a class="btn btn-blue btn-lg f-size12 b-b0 b-l0 b-t0 b-r0 f-pl50 f-pr50 f-r3" href="javascript:closeClause();">已阅读并同意此条款</a></center>
            </div>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection
@push('MyFontScripts')
<script src="https://ssl.captcha.qq.com/TCaptcha.js"></script>
<script>
    window.captcha_callback = function(res){
        console.log(res)
        // res（未通过验证）= {ret: 1, ticket: null}
        // res（验证成功） = {ret: 0, ticket: "String", randstr: "String"}
        if(res.ret === 0){
            alert(res.ticket)   // 票据
        }
    }
    //第一页的确定按钮
    $("#btn_part1").click(function(){
        if(!verifyCheck._click()) return;
        $("#TencentCaptcha").click();
        //$("#part1form").submit();
    });
    function showoutc(){$(".m-sPopBg,.m-sPopCon").show();}
    function closeClause(){
    $(".m-sPopBg,.m-sPopCon").hide();
    }
</script>
@endpush
