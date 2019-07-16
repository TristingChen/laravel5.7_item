@extends('admin.layout')
<style>
    .layui-table-cell{
        height: inherit !important;
        word-break: break-all !important;
        white-space: normal !important;
    }
</style>
@section('content')
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
                ,url:'{{route("agentmembers-role-list-json")}}'
                ,cellMinWidth: 80 //全局定义常规单元格的最小宽度，layui 2.2.1 新增
                ,toolbar: '#toolbarDemo'
                ,cols: [[
                    {type:'checkbox'}
                    ,{field:'id', width:80, title: 'ID', sort: true}
                    ,{field:'agent_name', width:80, title: '代理角色'}
                    ,{field:'discount', width:80, title: '折扣率'}
                    ,{field:'role_child', width:80, title: '后代角色'}
                    ,{field:'wealth', title:'操作', toolbar: '#barEdit'}
                ]]
                ,page: true
            });

            //监听头部工具条事件
            $("#allChecked").click(function () {
                var checkStatus = table.checkStatus('demo')
                        ,data = checkStatus.data;
                var datastr = "";
                for(var i = 0; i < data.length;i++){
                    datastr += data[i].id + ",";
                }
                datastr = datastr.substring(0,datastr.length-1)
                if(datastr.length <=0){
                    layer.msg('请先选择栏目')
                    return false;
                }
                var removeUrl = "{{ route('agentmembers-remove') }}";
                layer.confirm('您是确认要删除该栏目吗？', {
                    btn: ['确认', '取消']
                }, function() {
                    $.ajax({
                        type: "GET",
                        url: removeUrl,
                        data: { 'id': datastr},
                        dataType: "json",
                        success: function (response) {
                            layer.msg(response.msg);
                            if(response.code == 1){
                                window.location.reload();

                            }
                        },
                        error: function () {
                            layer.msg('网络错误');
                        }
                    });
                });
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
                    layer.open({
                        type: 1
                        ,title: ['审核']
                        ,btn: ['确定', '取消']
                        ,shadeClose: true
                        ,shade: 0
                        ,maxmin: true
                        ,content:$("#checked_modal")
                        ,success:function(layero,index){
                            console.log(layero)
                        }
                        ,yes:function(layero,index){
                            var _checked = $('input[name="checked"]:checked').val();
                            $.ajax({
                                type: "GET",
                                url: "{{route('agentmembers-checked')}}",
                                data: { 'id': _id,'checked':_checked},
                                dataType: "json",
                                success: function (response) {
                                    layer.msg(response.msg);
                                    if(response.code == 1){
                                        layer.alert('操作完成',{icon:1,title:'提示'},function(i){
                                            layer.close(i);
                                            layer.close(layero);//关闭弹出层
                                        })
                                        table.reload('demo',{//重载表格
                                            page:{
                                                curr:1
                                            }
                                        })


                                    }
                                },
                                error: function () {
                                    layer.msg('网络错误');
                                }
                            });

                        }
                    });
                }else if(obj.event == 'children_relation'){
                    window.location = "{{route('agentmembers-children-relation')}}?id="+_id;
                }
            });
        });



    </script>
    <script type="text/html" id="barEdit">
        <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
        <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="remove">删除</a>
    </script>
@endsection