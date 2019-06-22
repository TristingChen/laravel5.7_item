@extends('admin.layout')
@section('content')
<div class="layui-card-body">
    <form class="layui-form" action="{{url('agentmembers-save') }}" style="width: 500px;" method="post">

        <div class="layui-form-item">
            <label class=" layui-form-label">代理角色：</label>
            <div class="layui-input-block">
                <select  name="agent_role_id" id="agent_role_id" lay-verify="required">
                    <option value="0" /> 请选择
                    @foreach($allRoles as $group)
                        <option value="{{ $group->id }}" @if($dataInfo->agent_role_id == $group->id) selected="selected" @endif />{{ $group->agent_name }}
                    @endforeach
                </select>
            </div>
        </div>

        <div class="layui-form-item">
            <label class=" layui-form-label">会员姓名</label>
            <div class="layui-input-block">
                <input class="layui-input" id="name" type="text" name="name" value="{{ $dataInfo->name }}" lay-verify="required"/>
                <span class="must-input-tip">*</span>
            </div>
        </div>
        <div class="layui-form-item">
            <label class=" layui-form-label" for="password">登录密码</label>
            <div class="layui-input-block">
                <input class="layui-input" id="password" name="password" type="password" value="{{ $dataInfo->password }}" lay-verify="required"/>
                @if($dataInfo->name == '')<span class="must-input-tip">*</span>@endif
            </div>
        </div>
        <div class="layui-form-item">
            <label class=" layui-form-label" for="password">验证登录密码</label>
            <div class="layui-input-block">
                <input class="layui-input" id="password_confirmation" name="password_confirmation" type="password" value="{{ $dataInfo->password }}" lay-verify="required"/>
                @if($dataInfo->name == '')<span class="must-input-tip">*</span>@endif
            </div>
        </div>
        <div class="layui-form-item">
            <label class=" layui-form-label" for="mobile">手机号码</label>
            <div class="layui-input-block">
                <input class="layui-input" id="tel" name="tel" type="text" value="{{ $dataInfo->tel }}" lay-verify="required|phone|number"/>
                <span class="must-input-tip">*</span>
            </div>
        </div>
        <div class="layui-form-item">
            <label class=" layui-form-label" for="realname">邮箱</label>
            <div class="layui-input-block">
                <input class="layui-input" id="email" name="email" type="text" value="{{ $dataInfo->email }}" lay-verify="required|email"/>
                <span class="must-input-tip">*</span>
            </div>
        </div>
        <div class="layui-form-item">
            <label class=" layui-form-label" for="realname">国家</label>
            <div class="layui-input-block">
                <label class="radio inline">
                    <input name="country" class="country-radio" type="radio" @if($dataInfo->country == 'America') checked @endif value="America" lay-filter="country" />美国
                </label>
                <label class="radio inline">
                    <input name="country" class="country-radio" type="radio" @if($dataInfo->country != 'America') checked @endif value="no_America" lay-filter="country"/>其他国家
                </label>
            </div>
        </div>
        <div class="layui-form-item" id="other-country" style=" @if($dataInfo->country == 'America') display: none" @endif>
            <label class=" layui-form-label" for="realname">其他国家</label>
            <div class="layui-input-block">
                <input class="layui-input" id="other_country" name="other_country" type="text" value="@if($dataInfo->id){{$dataInfo->country}}} @endif"/>
                <span class="must-input-tip">*</span>
            </div>
        </div>
        @if($dataInfo->country == 'America')
            <div class="layui-form-item" id="America-area">
                <div class="layui-inline">
                    <label class=" layui-form-label" for="area">选择地区</label>
                    <div class="layui-input-inline">
                        <select name="state" id="state" onChange="getCityList(this)" lay-filter="state" >
                            <option value="">请选择</option>
                            @foreach($statesInfo as $province)
                                <option value="{{ $province->ID }}" @if($dataInfo->state_id == $province->ID) selected @endif>{{ $province->STATE_NAME }}</option>
                            @endforeach
                        </select>&nbsp;&nbsp;&nbsp;&nbsp;
                        <select  name="city" id="city"  lay-filter="city">
                            @if($dataInfo->id)
                                <option value="">请选择</option>
                                @foreach($cityInfo as $key => $city)
                                    <option value="{{ $city->ID }}" @if($dataInfo->city_id == $city->ID) selected @endif>{{ $city->CITY }}</option>
                                @endforeach
                            @else
                                <option value="0">请先选择州</option>
                            @endif;
                        </select>&nbsp;&nbsp;&nbsp;&nbsp;
                    </div>

                </div>

            </div>
        @endif
        <div class="layui-form-item">
            <label class=" layui-form-label" for="realname">详细地址</label>
            <div class="layui-input-block">
                <input class="layui-input" id="detail_address" name="detail_address" type="text" value="{{ $dataInfo->detail_address }}" lay-verify="required"/>
                <span class="must-input-tip">*</span>
            </div>
        </div>
        <div class="form-actions">
            <button type="submit" class="layui-btn layui-btn-normal layui-btn-sm" lay-submit="" lay-filter="form">保 存</button>
            <button type="button" class="layui-btn layui-btn-normal layui-btn-sm" onclick="redirect('{{ url('agentmembers') }}')">取 消</button>
        </div>
        </fieldset>
    </form>
    </form>
</div>
@endsection
@section('script')
    <script>

        layui.use('form', function(){
                var form = layui.form;
                //监听国家选择
                form.on('radio(country)', function(data) {
                    var _this_val = data.value;
                    var other_country = $('#other-country');
                    var America_area = $('#America-area');
                    if(_this_val == 'America'){
                        America_area.show();
                        other_country.hide();
                    }else{
                        other_country.show();
                        America_area.hide();
                    }
                });
                //监听州与城市的必选
            form.on('select(state)', function(data) {
                var state_val = data.value;
                var geturl = "{{ route('agentmembers-getcitylist')}}";
                $.ajax({
                    type: "get",
                    url: geturl,
                    data: { state_id: state_val},
                    dataType: "json",
                    success: function (response) {
                        //进行option的增加
                        var option_str = '<option>请选择</option>'
                        if(response){
                            $.each(response,function(i,obj){
                                option_str += '<option value='+obj.ID+'>'+obj.CITY+'</option>';
                            })
                        }
                        $('#city').empty();
                        $('#city').append(option_str)
                        form.render('select')
                    },
                    error: function () {
                        layer.msg("网络请求失败");
                    }
                });
            });
                //监听提交
                form.on('submit(form)', function(data){
//                    top.layer.msg('数据提交中，请稍候',{icon: 16,time:false,shade:0.8});
                    $.ajax({
                        type: "post",
                        url: "{{route('agentmembers-save')}}",
                        data:data.field,
                        dataType:"json",
                        success:function(d){
                            console.log(d)
                            layer.msg(d.msg);
                        if(d.code==1){
                            window.location.href = "{{ route('agentmembers') }}";
                        }else{
                            return false;
                        }
                        }
                    });
                return false;//false表示不重新加载页面，true表示重新加载
                });
            });
    </script>
@endsection
