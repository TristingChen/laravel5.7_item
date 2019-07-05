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
            <a class="layui-btn layui-btn-normal layui-btn-sm" href="{{route('resourcemanage-add')}}"><i class="layui-icon">&#xe61f;</i> 添加资源</a>
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
                ,url:'{{route("resourcemanage-index-json")}}'
                ,cellMinWidth: 80 //全局定义常规单元格的最小宽度，layui 2.2.1 新增
                ,toolbar: '#toolbarDemo'
                ,cols: [[
                    {type:'checkbox'}
                    ,{field:'id', width:80, title: 'ID', sort: true}
                    ,{field:'title', width:80, title: '标题'}
                    ,{field:'content', width:260, title: '描述', sort: true}
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
                datastr = datastr.substring(0,datastr.length-1)
                if(datastr.length <=0){
                    layer.msg('请先选择栏目')
                    return false;
                }
                var removeUrl = "{{ route('resourcemanage-remove') }}";
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
                //进行选中用户批量的审核
            })
            table.on('tool(demo)', function(obj){
                var data = obj.data;
                //删除
                var _id = data.id;
                if(obj.event === 'remove'){
                    var removeUrl = "{{ route('resourcemanage-remove') }}";
                    layer.confirm('您是确认要删除该栏目吗？', {
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
                                    window.location.reload();

                                }
                            },
                            error: function () {
                                layer.msg('网络错误');
                            }
                        });
                    });
                }else if(obj.event == 'edit'){
                    window.location = "{{route('resourcemanage-edit')}}?id="+_id;
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
                                url: "{{route('resourcemanage-checked')}}",
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

                }
            });
        });



    </script>
    <script type="text/html" id="barEdit">
        {{--<a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>--}}
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