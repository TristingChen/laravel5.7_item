@extends('admin.layout')
<style>
    .layui-table-cell{
        height: inherit !important;
        word-break: break-all !important;
        white-space: normal !important;
    }
</style>
@section('content')

    <div class="layui-row">
            <form  class="layui-form">
                <div class="layui-form-item">
                    <div class="layui-inline">
                            <label class="layui-form-label">审核状态</label>
                        <div class="layui-input-inline">
                            <select name="checked" id="checked"  >
                                <option value="-1"  selected='selected'  >请选择</option>
                                <option value="0"  selected='selected' >未审核</option>
                                <option value="1"  selected='selected'  >审核通过</option>
                                <option value="2" selected='selected'  >审核不通过</option>
                            </select>
                        </div>
                    </div>
                    <div class="layui-inline">
                        <input type="text" name="keywords" id="keywords" style=""  class="layui-input" value=""  placeholder="请输入搜索关键字">
                    </div>
                    <div class="layui-inline">
                        <button class="layui-btn layui-btn-normal" onclick="return false;" data-type="reload" id="selectbyCondition" >搜索</button>
                    </div>
                </div>
        </form>
    </div>
    <table class="layui-table  text-center" lay-filter="demo" id="demo" lay-size="lg"></table>
    <script type="text/html" id="toolbarDemo">
        <div class="layui-btn-container">
            <a class="layui-btn layui-btn-normal layui-btn-sm" href="{{route('agentmembers-add')}}"><i class="layui-icon">&#xe61f;</i> 添加代理</a>
            {{--<button class="layui-btn layui-btn-normal layui-btn-sm ajax-form" data-url="{{route('agentmembers-add')}}" title="添加代理"><i class="layui-icon">&#xe61f;</i> 添加代理</button>--}}
            <button class="layui-btn layui-btn-sm" id="allChecked" lay-event="allChecked"><i class="layui-icon">&#xe640;</i>批量删除</button>
        </div>
    </script>
    @endsection
    <div class="layui-form-item" id="checked_modal" style="display: none;">
        <div class="layui-inline">
            <div class="layui-input-inline">
                <label class="radio inline">
                    <input name="checked" class="checked-radio" type="radio"  value="1"  />通过
                </label>
                <label class="radio inline">
                    <input name="checked" class="checked-radio" type="radio" value="2" />不通过
                </label>
            </div>
        </div>
    </div>
@section('script')
    <script>
        layui.use('table', function(){
            var table = layui.table;
            table.render({
                elem: '.layui-table'
                ,url:'{{route("agentmembers-index-json")}}'
                ,cellMinWidth: 80 //全局定义常规单元格的最小宽度，layui 2.2.1 新增
                ,toolbar: '#toolbarDemo'
                ,cols: [[
                    {type:'checkbox'}
                    ,{field:'id', width:80, title: 'ID', sort: true}
                    ,{field:'name', width:80, title: '用户名'}
                    ,{field:'email', width:80, title: '邮箱', sort: true}
                    ,{field:'tel', width:80, title: '电话'}
                    ,{field:'agent_name', title: '角色'} //minWidth：局部定义当前单元格的最小宽度，layui 2.2.1 新增
                    ,{field:'country', title: '国家', sort: true}
                    ,{field:'city_info', title: '城市'}
                    ,{field:'detail_address', title: '地址'}
                    ,{field:'created_at', title: '注册时间'}
                    ,{field:'checked', title: '审核状态',templet: '#sexTpl'}
                    ,{field:'wealth', title:'操作',width:137, toolbar: '#barEdit'}
                ]]
                ,page: true
            });
            //根据条件查询表格数据重新加载
            var $ = layui.$, active = {
                reload: function(){
                    //获取审核状态
                    //执行重载
                    table.reload('demo', {
                        page: {
                            curr: 1 //重新从第 1 页开始
                        }
                        //根据条件查询
                        ,where: {
                            checked:$('#checked option:selected').val(),
                            keywords:$('#keywords').val()
                        }
                    });
                }
            };
            //搜索
            $('#selectbyCondition').on('click',function(){
                        var type = $(this).data('type');
                        active[type] ? active[type].call(this) : '';
            });


            //监听头部工具条事件
            $("#allChecked").click(function () {
                var checkStatus = table.checkStatus('demo')
                        ,data = checkStatus.data;
                var datastr = "";
                for(var i = 0; i < data.length;i++){
                    datastr += data[i].id + ",";
                }
                //进行选中用户批量的审核
            })
            table.on('tool(demo)', function(obj){
                var data = obj.data;
                //删除
                var _id = data.id;
                if(obj.event === 'remove'){
                    var removeUrl = "{{ route('agentmembers-remove') }}";
                    layer.confirm('您是确认要删除该会员？', {
                        btn: ['确认', '取消']
                    }, function() {
                        $.ajax({
                            type: "GET",
                            url: removeUrl,
                            data: { 'id': _id},
                            dataType: "json",
                            success: function (response) {
                                layer.msg(response.msg);
                                if(response.code == 1){
                                    window.reload();

                                }
                            },
                            error: function () {
                                layer.msg('网络错误');
                            }
                        });
                    });
                }else if(obj.event == 'edit'){
                    window.location = "{{route('agentmembers-edit')}}?id="+_id;
                }else if(obj.event == 'checked'){
                    layer.prompt({
                        formType: 2
                        ,title: '修改 ID 为 ['+ data.id +'] 的用户签名'
                        ,content:$('#checked_modal')
                    }, function(value, index){
                        layer.close(index);

                        //这里一般是发送修改的Ajax请求

                        //同步更新表格和缓存对应的值
                        obj.update({
                            sign: value
                        });
                    });
                }else if(obj.event == 'children_relation'){
                    window.location = "{{route('agentmembers-children-relation')}}?id="+_id;
                }
            });
        });



    </script>
    <script type="text/html" id="barEdit">
        <a class="layui-btn layui-btn-xs layui-btn-normal  ajax-form" lay-event="children_relation">下级</a>
        <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
        <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="remove">删除</a>
        <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="checked">审核</a>
    </script>

    <script type="text/html" id="sexTpl">

        @verbatim

        {{#  if(d.checked == '0'){ }}
        <span style="color: grey;font-weight: bolder;">未审核</span>
        {{#  } else if(d.checked == '1'){ }}
        <span style="color: #1e9fff;font-weight: bolder;">审核通过</span>
        {{#  } else{ }}

        <span style="color: #c1e2b3;font-weight: bolder;">审核不通过</span>
        {{#  } }}
        @endverbatim
    </script>
@endsection