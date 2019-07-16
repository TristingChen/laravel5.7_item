<?php
/**
 * Created by PhpStorm.
 * User: Veen
 * Date: 2019/1/15
 * Time: 11:16
 */
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service\AgentMembersService;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Contracts\Providers\Auth;
use App\Library\Y;


class AgentMembersController extends Controller
{
    private $add_right = false;
    private $edit_right = false;
    private $remove_right = false;
    private $check_right = false;
    function __construct(Request $request,Auth $auth)
    {
        //判断有无add与edit与remove、checked的权限

    }

    public function index(Request $request){
        $searchKeyword = trim(urldecode($request->input('keywords', '')));
        $checked = intval($request->input('checked', -1));
        $dataLists = AgentMembersService::getAllLists($searchKeyword,$checked);
        return view('admin.agentmembers.index');
    }
    //表单数据传递
    public function index_json(Request $request){
        $searchKeyword = trim(urldecode($request->input('keywords', '')));
        $checked = intval($request->input('checked', -1));
        $limit   = intval($request->post('limit', 10));
        $dataLists = AgentMembersService::getAllLists($searchKeyword,$checked,$limit);
        return Y::table($dataLists->items(), $dataLists->total());
    }

    public function add(){
        $dataInfo =AgentMembersService::getAgentMember();
        $statesInfo = AgentMembersService::getUsStates();
        $cities = AgentMembersService::getUsCities($dataInfo->state_id);
        $getAllagents = AgentMembersService::getAllagents();
        return view('admin.agentmembers.edit',[
            'dataInfo'=>$dataInfo,
            'statesInfo'=>$statesInfo,
            'cityInfo'=>$cities,
            'getAllagents'=>$getAllagents,
            'allRoles'=>AgentMembersService::getAgentMemberRoles()
        ]);
    }

    public function edit(Request $request){
        $agent_member_id = intval($request->input('id', 0));
        $dataInfo =AgentMembersService::getAgentMember($agent_member_id);
        $statesInfo = AgentMembersService::getUsStates();
        $cities = AgentMembersService::getUsCities($dataInfo->state_id);
        $getAllagents = AgentMembersService::getAllagents();
        return view('admin.agentmembers.edit',[
            'dataInfo'=>$dataInfo,
            'statesInfo'=>$statesInfo,
            'cityInfo'=>$cities,
            'getAllagents'=>$getAllagents,
            'allRoles'=>AgentMembersService::getAgentMemberRoles()

        ]);
    }
    public function save(Request $request){
        //数据接收与验证
        $agent_member_id = intval($request->input('agent_member_id',0));
        $validator = Validator::make($request->all(),[
            'agent_role_id'=>'required|regex:/^[1-9]\d*$/',
            'name'=>'required|max:255',
            'password'=>'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
            'tel'=>'required|regex:/^1[3456789][0-9]{9}$/',
            'email'=>'email',
            'country'=>'required|alpha',
            'detail_address'=>'required|max:255'
        ]);
        $messages = $validator->errors();
        $param['country'] = trim($request->input('country'),'');
        if($param['country'] != 'America'){
            //other_country必填
            if(!$request->input('other_country')){
                echo json_encode(['code'=>0,'data'=>[],'msg'=>'其他国家必填'] );exit;
            }
            $param['country'] = trim($request->input('other_country'),'');
        }else{
            if(!intval($request->input('state',0)) || !intval($request->input('city',0))){
                echo json_encode(['code'=>0,'data'=>[],'msg'=>'州与市必填'] );exit;
            }
        }

        if($validator->fails()){
            echo json_encode(['code'=>0,'data'=>[],'msg'=>$messages->first()] );exit;
        }

        $param['agent_role_id'] = intval($request->input('agent_role_id'),0);
        $param['pid'] = intval($request->input('pid'),0);

        //判断有无代理归属 如有则进行判断是否角色与州满足条件
        if($param['pid']){
            $checkPid = AgentMembersService::checkpidRight($param['agent_role_id'], $param['pid']);
            if(!$checkPid){
                echo json_encode(['code'=>0,'data'=>[],'msg'=>'请检查代理归属的代理关系是否正确'] );exit;
            }
        }

        $param['name'] = trim($request->input('name'),0);
        $param['password'] = md5(md5(trim($request->input('password'),0)));
        $param['tel'] = trim($request->input('tel'),0);
        $param['email'] = trim($request->input('email'),0);
        $param['country'] = trim($request->input('country'),0);
        $param['city_id'] = trim($request->input('city'),0);
        $param['detail_address'] = trim($request->input('detail_address'),0);
        $result = AgentMembersService::save($agent_member_id,$param);
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
        $result = AgentMembersService::update($agent_member_id,$param,'checked');
        if($result){
            echo json_encode(['code'=>1,'data'=>[],'msg'=>'操作成功'] );exit;
        }else{
            echo json_encode(['code'=>0,'data'=>[],'msg'=>'操作失败'] );exit;
        }
    }
    //删除操作
    public function remove(Request $request){
        $agent_member_ids = (string)$request->input('id','');
        $agent_member_ids = explode(',',$agent_member_ids);
        $param['deleted'] = 1;
        $result = AgentMembersService::update($agent_member_ids,$param,'remove');
        if($result){
            echo json_encode(['code'=>1,'data'=>[],'msg'=>'操作成功'] );exit;
        }else{
            echo json_encode(['code'=>0,'data'=>[],'msg'=>'操作失败'] );exit;
        }
    }

    //获取州城市的信息
    public function getCityList(Request $request){
        $state_id = intval($request->input('state_id',0));
        $cityList = AgentMembersService::getUsCities($state_id);
        return response()->json($cityList);
    }
    //下级代理关系
    public function children_relation(Request $request){
        $id =  intval($request->input('id',0));
        if(!$id){
            die('参数传递错误');
        }
        $the_agent = AgentMembersService::getAgentMember($id);
        return view('admin.agentmembers.children_relation',[
            'id'=>$id,
            'the_agent'=>$the_agent
        ]);
    }

    public function children_relation_json(Request $request){
        //查找全部的子代
        $id =  intval($request->input('id',0));
        if(!$id){
            die('参数传递错误');
        }
        $child_tree =AgentMembersService::getAllChildren($id);
        echo json_encode($child_tree);
    }
    //
    public function role_list(){
        return view('admin.agentmembers.role_list');
    }

    public function role_list_json(Request $request){
        $dataLists = AgentMembersService::getAllRoleLists();
        return Y::table($dataLists);
    }
    public function role_list_add(){

    }
    public function role_list_edit(){

    }
    public function role_list_save(){

    }
}
