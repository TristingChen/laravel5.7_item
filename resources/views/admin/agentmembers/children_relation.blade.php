@extends('admin.layout')
@section('content')
	<div class="layui-card-body">
		<fieldset class="layui-elem-field layui-field-title" >
			<legend>{{$the_agent->name}}的子代分级</legend>
		</fieldset>

		<div id="test1" class="demo-tree-more" attr="{{$id}}"></div>
	</div>
@endsection
@section('script')
	<script>
		layui.use(['tree', 'util'], function(){
			var tree = layui.tree
					,layer = layui.layer
					,util = layui.util;
			//按钮事件
			var _id = $('#test1').attr('attr');
			var children_relation_json = "{{ route('agentmembers-children-relation-json') }}?id="+_id;
			var data;
			$.ajax({
				type: "GET",
				url: children_relation_json,
				dataType: "json",
				async:false,
				success: function (response) {
					data = response;
//                    console.log(data)
				},
				error: function () {
					layer.msg('网络错误');
				}
			});
			tree.render({
				elem: '#test1' //默认是点击节点可进行收缩
				,spread: true
				,data: data
			});

		});
	</script>
@endsection
