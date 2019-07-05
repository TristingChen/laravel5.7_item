<?php
/**
 * Created by PhpStorm.
 * User: chenjialing
 * Date: 2019/7/5
 * Time: 17:03
 */
namespace app\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Service\ResourceManageService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Library\Y;
use Illuminate\Http\Request;

class ResourceManageController extends Controller{
    public function index(){
        return view('admin.resourcemanage.index');
    }

    //表单数据传递
    public function index_json(Request $request){
        $searchKeyword = trim(urldecode($request->input('keywords', '')));
        $checked = intval($request->input('checked', -1));
        $limit   = intval($request->post('limit', 10));
        $dataLists = ResourceManageService::getAllLists($searchKeyword,$checked,$limit);
        return Y::table($dataLists->items(), $dataLists->total());
    }
    public function add(){
        return view('admin.resourcemanage.edit');
    }
    public function edit(){

    }
    public function save(Request $request){
        $validator = Validator::make($request->all(), [
            'title'    => 'required|max:50', //标题
            'content'=>'required|max:255', //标题

        ]);
        if ($validator->fails()) {
            return Y::error($validator->errors());
        }
        $param['title'] = trim($request->input('title'),'');
        $param['content'] = trim($request->input('content'),'');
        $param['fileids'] = trim($request->input('fileids'),'');
        $insertId = DB::table('xc_resource_manage')->insertGetId($param);
        if($insertId){
            return Y::success('保存成功');
        }else{
            return Y::error('保存失败');
        }

    }
    public function remove(Request $request){
        $agent_member_ids = (string)$request->input('id','');
        $agent_member_ids = explode(',',$agent_member_ids);
        $param['deleted'] = 1;
        $result = ResourceManageService::update($agent_member_ids,$param,'remove');
        if($result){
            echo json_encode(['code'=>1,'data'=>[],'msg'=>'操作成功'] );exit;
        }else{
            echo json_encode(['code'=>0,'data'=>[],'msg'=>'操作失败'] );exit;
        }
    }
    //审核操作
    public function check(Request $request){
        $agent_member_id =  (array)($request->input('id',[]));
        $param['checked'] = intval($request->input('checked',0));
        if(!$param['checked']){
            echo json_encode(['code'=>0,'data'=>[],'msg'=>'审核操作参数错误'] );exit;
        }
        $result = ResourceManageService::update($agent_member_id,$param,'checked');
        if($result){
            echo json_encode(['code'=>1,'data'=>[],'msg'=>'操作成功'] );exit;
        }else{
            echo json_encode(['code'=>0,'data'=>[],'msg'=>'操作失败'] );exit;
        }
    }
    public function upload(Request $request, $type)
    {
        $validator = Validator::make($request->all(), [
            'recourcemanage_cover'    => 'mimes:jpeg,bmp,png,gif|max:2048', //大图
            'recourcemanage_vedio'    => 'mimes:mp4,avi|max:40960',
            'recourcemanage_audio'    => 'mimes:mp3|size:4096',
            'recourcemanage_document' => 'mimes:doc,docx,xls,xlsx,txt|max:2048', //文档
            'recourcemanage_attach'   => 'mimes:jpeg,bmp,png,gif|max:4096', //附件
        ]);
        if ($validator->fails()) {
            return Y::error($validator->errors());
        }

        if (!$request->hasFile($type)) {
            return Y::error('上传的文件不能为空');
        }
        $file = $request->{$type};
        $path = $file->store($type . '/' . date('Ymd'));

        $path = 'uploads/' . $path;
        //进行附件表的插入
        $param['originalName'] = $file->getClientOriginalName();
        $param['realPath'] = $file -> getRealPath();
        //扩展名
        $param['ext'] = $file->getClientOriginalExtension();
        //MimeType
        $param['type']  = $file->getClientMimeType();
        //临时绝对路径
        $param['fileName']  = $path;
        $param['size'] = $file->getClientSize();
        $insertId = DB::table('xc_resource_files')->insertGetId($param);
        return Y::success('上传成功', [
            'path' => $path,
            'url'  => asset($path),
            'file_id' => $insertId
        ]);
    }
}