@extends('admin.layout')
@section('content')
<div class="layui-card-body">

    <form class="layui-form layui-form-pane">
        <div class="layui-row">
            <div class="layui-col-xs8 layui-col-xs-offset2">
                <div class="layui-form-item">
                    <label class="layui-form-label">标题<span style="color: red;font-size: 20px;">*</span></label>
                    <div class="layui-input-block">
                        <input type="text" lay-verify="required" name="title" autocomplete="off" class="layui-input">
                    </div>
                </div>
            </div>
        </div>

        <div class="layui-row">
            <div class="layui-col-xs8 layui-col-xs-offset2">
                <div class="layui-form-item">
                    <label class="layui-form-label">描述</label>
                    <div class="layui-input-block">
                        <input type="text" name="content" autocomplete="off" class="layui-input">
                    </div>
                </div>
            </div>
        </div>

        <div class="layui-row">
            <div class="layui-col-xs8 layui-col-xs-offset2">
                <div class="layui-form-item">
                    <blockquote class="layui-elem-quote layui-quote-nm" style="margin-top: 10px;">
                        <div id="uploadImg" class="layui-upload">
                            <button type="button" class="layui-btn" id="upload">
                                <i class="layui-icon">&#xe67c;</i>上传图片<span style="color: red;font-size: 20px;">*</span>
                            </button>
                            <div class="layui-upload-list">
                                <table class="layui-table" style="text-align: center;">
                                    <thead>
                                    <tr>
                                        <th style="text-align: center;">图片预览</th>
                                        <th style="text-align: center;">大小</th>
                                        <th style="text-align: center;">状态</th>
                                        <th style="text-align: center;">操作</th>
                                    </tr>
                                    </thead>
                                    <tbody id="imgList"></tbody>
                                </table>
                            </div>
                            <button type="button" class="layui-btn" id="startUpload">开始上传</button>
                            <div style="color: #c2c2c2;margin:10px 0;">温馨提示: 每次最多上传六张图片, 单张图片的大小不超过5MB, 长宽比例推荐1.5:1,
                                推荐上传图片长675px,宽450px
                            </div>
                        </div>
                        <input type="hidden" name="img_file" id="imgInput"  lay-verify="required" value="">
                    </blockquote>

                </div>
            </div>
        </div>
        <div class="layui-row">
            <div class="layui-col-xs8 layui-col-xs-offset2">
                <div class="layui-form-item">
                    <blockquote class="layui-elem-quote layui-quote-nm" style="margin-top: 10px;">
                        <div id="uploadImg" class="layui-upload">
                            <button type="button" class="layui-btn" id="upload_document">
                                <i class="layui-icon">&#xe67c;</i>上传文档<span style="color: red;font-size: 20px;">*</span>
                            </button>
                            <div class="layui-upload-list">
                                <table class="layui-table" style="text-align: center;">
                                    <thead>
                                    <tr>
                                        <th style="text-align: center;">文件名</th>
                                        <th style="text-align: center;">大小</th>
                                        <th style="text-align: center;">状态</th>
                                        <th style="text-align: center;">操作</th>
                                    </tr>
                                    </thead>
                                    <tbody id="document_list"></tbody>
                                </table>
                            </div>
                            <button type="button" class="layui-btn" id="startUpload_document">开始上传</button>
                            <div style="color: #c2c2c2;margin:10px 0;">温馨提示: 每次最多上传6份文档(doc,docx,xls,xlsx,txt)
                            </div>
                        </div>
                    </blockquote>
                </div>
            </div>
        </div>
        <div class="layui-row">
            <div class="layui-col-xs8 layui-col-xs-offset2">
                <div class="layui-form-item">
                    <blockquote class="layui-elem-quote layui-quote-nm" style="margin-top: 10px;">
                        <div id="uploadImg" class="layui-upload">
                            <button type="button" class="layui-btn" id="upload_vedio">
                                <i class="layui-icon">&#xe67c;</i>上传视频<span style="color: red;font-size: 20px;">*</span>
                            </button>
                            <div class="layui-upload-list">
                                <table class="layui-table" style="text-align: center;">
                                    <thead>
                                    <tr>
                                        <th style="text-align: center;">文件名</th>
                                        <th style="text-align: center;">大小</th>
                                        <th style="text-align: center;">状态</th>
                                        <th style="text-align: center;">操作</th>
                                    </tr>
                                    </thead>
                                    <tbody id="vedio_list"></tbody>
                                </table>
                            </div>
                            <button type="button" class="layui-btn" id="startUpload_vedio">开始上传</button>
                            <div style="color: #c2c2c2;margin:10px 0;">温馨提示: 每次最多上传2部视频(mp4,avi)
                            </div>
                        </div>
                    </blockquote>
                </div>
            </div>
        </div>
        <div class="layui-row">
            <div class="layui-col-xs8 layui-col-xs-offset2" style="margin-top: 30px;">

                <div class="layui-form-item">
                    <button class="layui-btn layui-btn-fluid" lay-submit="" lay-filter="addObject">确认保存</button>
                </div>
            </div>
        </div>
    </form>

</div>
@endsection
@section('script')
    <script>
        layui.use(['table', 'form', 'element', 'upload'], function () {
            var table = layui.table;
            var form = layui.form;
            var element = layui.element;
            var $ = layui.jquery;
            var upload = layui.upload;
            //多文件列表示例
            var demoListView = $('#imgList');
            //多文档上传
            var document_list = $('#document_list');
            var vedio_list = $('#vedio_list');
            var totalArray = new Array();
            //多图上传
            var uploadInst = upload.render({
                elem: '#upload' //绑定元素
                , url: "{{route('resourcemanage-upload',['type'=>'recourcemanage_cover'])}}" //上传接口
                , accept: 'images'  // 允许上传的文件类型
                // , acceptMime: 'image/jpg,image/png'   // (只支持jpg和png格式，多个用逗号隔开),
                , size: 5120        // 最大允许上传的文件大小  单位 KB
                , auto: false //选择文件后不自动上传
                , bindAction: '#startUpload' //指向一个按钮触发上传
                , multiple: true   // 开启多文件上传
                , number: 6    //  同时上传文件的最大个数
                ,field:'recourcemanage_cover'
                , choose: function (obj) {
                    var files = this.files = obj.pushFile(); //将每次选择的文件追加到文件队列
                    var arr = Object.keys(files);
                    totalArray = totalArray.concat(arr);
                    // 检查上传文件的个数
                    if (totalArray.length <= 6) {
                        //读取本地文件
                        obj.preview(function (index, file, result) {
                            var tr = $(['<tr id="upload-' + index + '">'
                                , '<td><img src="' + result + '" alt="' + file.name + '" class="layui-upload-img" style="height: 66px;width:100px;"></td>'
                                , '<td>' + (file.size / 1014).toFixed(1) + 'kb</td>'
                                , '<td>等待上传</td>'
                                , '<td>'
                                , '<button class="layui-btn demo-reload layui-hide">重传</button>'
                                , '<button class="layui-btn layui-btn-danger demo-delete">删除</button>'
                                , '</td>'
                                , '</tr>'].join(''));

                            //单个重传
                            tr.find('.demo-reload').on('click', function () {
                                obj.upload(index, file);
                            });

                            //删除
                            tr.find('.demo-delete').on('click', function () {
                                delete files[index]; //删除对应的文件
                                tr.remove();
                                uploadListIns.config.elem.next()[0].value = ''; //清空 input file 值，以免删除后出现同名文件不可选
                            });

                            demoListView.append(tr);
                        });
                    } else {
                        // 超出上传最大文件
                        layer.msg("上传文件最大不超过6个")
                    }

                }
                , done: function (res, index, upload) {
                    console.log(res.code)
                    if (res.code == 0) { //上传成功
                        // 上传成功后将图片路径拼接到input中，多个路径用","分割
                        var inputVal = document.getElementById("imgInput").value;
                        var valData = "";
                        console.log(res.data)
                        if (inputVal) {
                            valData = inputVal + "," + res.data.file_id;
                        } else {
                            valData = res.data.file_id;
                        }
                        document.getElementById("imgInput").value = valData;
                        console.log($('#imgInput').val())
                        var tr = demoListView.find('tr#upload-' + index)
                                , tds = tr.children();
                        tds.eq(2).html('<span style="color: #5FB878;">上传成功</span>');
                        tds.eq(3).html(''); //清空操作
                        return delete this.files[index]; //删除文件队列已经上传成功的文件

                    }else {
                        layer.msg(res.msg)
                    }
                    this.error(index, upload);
                }
                , error: function (index, upload) {
                    var tr = demoListView.find('tr#upload-' + index)
                            , tds = tr.children();
                    tds.eq(2).html('<span style="color: #FF5722;">上传失败</span>');
                    tds.eq(3).find('.demo-reload').removeClass('layui-hide'); //显示重传
                }
            });
            //多文档上传
            var uploadDocument = upload.render({
                elem: '#upload_document' //绑定元素
                , url: "{{route('resourcemanage-upload',['type'=>'recourcemanage_document'])}}" //上传接口
                , accept: 'file'
                , exts: 'doc|docx|xls|xlsx|txt'  // 允许上传的文件类型
                // , acceptMime: 'image/jpg,image/png'   // (只支持jpg和png格式，多个用逗号隔开),
                , size: 5120        // 最大允许上传的文件大小  单位 KB
                , auto: false //选择文件后不自动上传
                , bindAction: '#startUpload_document' //指向一个按钮触发上传
                , multiple: true   // 开启多文件上传
                , number: 6    //  同时上传文件的最大个数
                ,field:'recourcemanage_document'
                , choose: function (obj) {
                    console.log(obj)
                    var files = this.files = obj.pushFile(); //将每次选择的文件追加到文件队列
                    var arr = Object.keys(files);
                    totalArray = totalArray.concat(arr);
                    // 检查上传文件的个数
                    if (totalArray.length <= 6) {
                        //读取本地文件
                        obj.preview(function (index, file, result) {
                            var tr = $(['<tr id="upload-' + index + '">'
                                , '<td> '+file.name +'</td>'
                                , '<td>' + (file.size / 1014).toFixed(1) + 'kb</td>'
                                , '<td>等待上传</td>'
                                , '<td>'
                                , '<button class="layui-btn demo-reload layui-hide">重传</button>'
                                , '<button class="layui-btn layui-btn-danger demo-delete">删除</button>'
                                , '</td>'
                                , '</tr>'].join(''));

                            //单个重传
                            tr.find('.demo-reload').on('click', function () {
                                obj.upload(index, file);
                            });

                            //删除
                            tr.find('.demo-delete').on('click', function () {
                                delete files[index]; //删除对应的文件
                                tr.remove();
                                uploadListIns.config.elem.next()[0].value = ''; //清空 input file 值，以免删除后出现同名文件不可选
                            });

                            document_list.append(tr);
                        });
                    } else {
                        // 超出上传最大文件
                        layer.msg("上传文件最大不超过6个")
                    }

                }
                , done: function (res, index, upload) {
                    console.log(res)
                    if (res.code == 0) { //上传成功
                        // 上传成功后将图片路径拼接到input中，多个路径用","分割
                        var inputVal = document.getElementById("imgInput").value;
                        var valData = "";
                        console.log(res.data)
                        if (inputVal) {
                            valData = inputVal + "," + res.data.file_id;
                        } else {
                            valData = res.data.file_id;
                        }
                        document.getElementById("imgInput").value = valData;
                        console.log($('#imgInput').val())
                        var tr = document_list.find('tr#upload-' + index)
                                , tds = tr.children();
                        tds.eq(2).html('<span style="color: #5FB878;">上传成功</span>');
                        tds.eq(3).html(''); //清空操作
                        return delete this.files[index]; //删除文件队列已经上传成功的文件

                    }else {
                        layer.msg(res.msg)
                    }
                    this.error(index, upload);
                }
                , error: function (index, upload) {
                    var tr = document_list.find('tr#upload-' + index)
                            , tds = tr.children();
                    tds.eq(2).html('<span style="color: #FF5722;">上传失败</span>');
                    tds.eq(3).find('.demo-reload').removeClass('layui-hide'); //显示重传
                }
            });
            //多视频上传
            var uploadVedio = upload.render({
                elem: '#upload_vedio' //绑定元素
                , url: "{{route('resourcemanage-upload',['type'=>'recourcemanage_vedio'])}}" //上传接口
                , accept: 'video'
                // , acceptMime: 'image/jpg,image/png'   // (只支持jpg和png格式，多个用逗号隔开),
                , size: 5120        // 最大允许上传的文件大小  单位 KB
                , auto: false //选择文件后不自动上传
                , bindAction: '#startUpload_vedio' //指向一个按钮触发上传
                , multiple: true   // 开启多文件上传
                , number: 2    //  同时上传文件的最大个数
                ,field:'recourcemanage_vedio'
                , choose: function (obj) {
                    var files = this.files = obj.pushFile(); //将每次选择的文件追加到文件队列
                    var arr = Object.keys(files);
                    totalArray = totalArray.concat(arr);
                    // 检查上传文件的个数
                    if (totalArray.length <= 6) {
                        //读取本地文件
                        obj.preview(function (index, file, result) {
                            var tr = $(['<tr id="upload-' + index + '">'
                                , '<td> '+file.name +'</td>'
                                , '<td>' + (file.size / 1014).toFixed(1) + 'kb</td>'
                                , '<td>等待上传</td>'
                                , '<td>'
                                , '<button class="layui-btn demo-reload layui-hide">重传</button>'
                                , '<button class="layui-btn layui-btn-danger demo-delete">删除</button>'
                                , '</td>'
                                , '</tr>'].join(''));

                            //单个重传
                            tr.find('.demo-reload').on('click', function () {
                                obj.upload(index, file);
                            });

                            //删除
                            tr.find('.demo-delete').on('click', function () {
                                delete files[index]; //删除对应的文件
                                tr.remove();
                                uploadListIns.config.elem.next()[0].value = ''; //清空 input file 值，以免删除后出现同名文件不可选
                            });

                            vedio_list.append(tr);
                        });
                    } else {
                        // 超出上传最大文件
                        layer.msg("上传文件最大不超过6个")
                    }

                }
                , done: function (res, index, upload) {
                    console.log(res)
                    if (res.code == 0) { //上传成功
                        // 上传成功后将图片路径拼接到input中，多个路径用","分割
                        var inputVal = document.getElementById("imgInput").value;
                        var valData = "";
                        console.log(res.data)
                        if (inputVal) {
                            valData = inputVal + "," + res.data.file_id;
                        } else {
                            valData = res.data.file_id;
                        }
                        document.getElementById("imgInput").value = valData;
                        console.log($('#imgInput').val())
                        var tr = vedio_list.find('tr#upload-' + index)
                                , tds = tr.children();
                        tds.eq(2).html('<span style="color: #5FB878;">上传成功</span>');
                        tds.eq(3).html(''); //清空操作
                        return delete this.files[index]; //删除文件队列已经上传成功的文件

                    }else {
                        layer.msg(res.msg)
                    }
                    this.error(index, upload);
                }
                , error: function (index, upload) {
                    var tr = vedio_list.find('tr#upload-' + index)
                            , tds = tr.children();
                    tds.eq(2).html('<span style="color: #FF5722;">上传失败</span>');
                    tds.eq(3).find('.demo-reload').removeClass('layui-hide'); //显示重传
                }
            });
            form.on("submit(addObject)", function (data) {
                $.ajax({
                    url: "{{route('resourcemanage-save')}}",
                    type: "post",
                    data: data.field,
                    dataType: "json",
                    success: function (response) {
                        if (response["code"] == 0) {
                            layer.msg(response.msg, {
                                icon: 1,
                                time: 2500 // 默认三秒
                            }, function () { // 关闭回调，关闭层刷新页面
                                window.location.href = "{{ route('resourcemanage') }}";
                            });
                        } else {
                            layer.msg(response["msg"], {
                                icon: 1,
                                time: 1500 // 1.5秒，默认三秒
                            });
                        }
                        return false;
                    },
                    error: function (response) {
                        layer.msg(response["msg"], {
                            icon: 1,
                            time: 1500 // 1.5秒，默认三秒
                        });
                    }
                });
                return false; // 关闭表单提交
            });
        });
    </script>
@endsection
