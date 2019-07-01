<?php
/**
 * Created by PhpStorm.
 * User: chenjialing
 * Date: 2019/6/11
 * Time: 20:11
 */
namespace App\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Service\ActionLogsService;
class AgentMembersService
{
    protected static $col_info = [
        'id'=>0,
        'pid'=>0,
        'name'=>'',
        'password'=>'',
        'email'=>'',
        'tel'=>'',
        'city_id'=>0,
        'state_id'=>0,
        'agent_role_id'=>0,
        'detail_address'=>'detail_address',
        'checked'=>0,
        'country'=>'America',
    ];
    public static  function getAllLists($searchKeyword,$checked,$limit = 10){
        $dataLists = DB::table('xc_agent_members as t1') ->leftJoin('xc_us_cities as t2','t1.city_id','=','t2.ID')
            ->leftJoin('xc_us_states as t3','t2.ID_STATE','=','t3.ID')
            ->leftJoin('xc_agent_roles as t4','t1.agent_role_id','=','t4.id')
            ->select(DB::raw('t1.*,t4.agent_name,concat_ws("/",t2.CITY,t3.STATE_NAME) as city_info'))
            ->where('t1.deleted','=',0)
            ->where(function($sql) use ($searchKeyword){
                if($searchKeyword){
                    $sql->where('t1.name','like','%'.$searchKeyword.'%');
                    $sql->orWhere('t1.email','like','%'.$searchKeyword.'%');
                    $sql->orWhere('t1.tel','like','%'.$searchKeyword.'%');
                }
            })
            ->where(function($sql) use ($checked){
                if($checked != -1){
                    $sql->where('t1.checked',$checked);
                }
            })
            ->orderBy('t1.created_at', 'desc')
            ->paginate($limit);

        return $dataLists;
    }
    public static  function getAllagents(){
        $dataLists = DB::table('xc_agent_members as t1') ->leftJoin('xc_us_cities as t2','t1.city_id','=','t2.ID')
            ->leftJoin('xc_us_states as t3','t2.ID_STATE','=','t3.ID')
            ->leftJoin('xc_agent_roles as t4','t1.agent_role_id','=','t4.id')
            ->select(DB::raw('t1.*,t4.agent_name,concat_ws("/",t2.CITY,t3.STATE_NAME) as city_info'))
            ->where('t1.deleted','=',0)
            ->orderBy('t1.created_at', 'desc')
            ->get();
        $data = [];
        if($dataLists){
            foreach($dataLists as $key => $value){
                $data[$key]['id'] = $value->id;
                $data[$key]['userinfo'] =$value->name.'-'.$value->city_info.'-'.$value->tel;
            }
        }
        unset($dataLists);
        return $data;
    }

    //查找美国的州
    public static function getUsStates(){
        $dataLists = DB::table('xc_us_states')->select(['ID','STATE_NAME'])->get();
        return $dataLists;
    }
    //根据州查市
    public static function getUsCities($state){
        $cityLists = DB::table('xc_us_cities')->select(['ID','CITY'])->where('ID_STATE','=',$state)->get();
        return $cityLists;
    }

    //查找用户信息
    public static function getAgentMember($agent_member_id = 0){
        if($agent_member_id){
            //编辑用户的查找
            $dataInfo = DB::table('xc_agent_members as t1')->leftJoin('xc_us_cities as t2','t1.city_id','=','t2.ID')->select(['t1.*','t2.ID_STATE as state_id'])->where('t1.id','=',$agent_member_id)->first();
        }else{
            //添加用户信息的查找
            $dataInfo = (object)self::$col_info;
        }
        return $dataInfo;
    }
    //获取代理角色
    public static function getAgentMemberRoles(){
        $roles = DB::table('xc_agent_roles')->select('*')->where('deleted','=',0)->get();
        return $roles;
    }
    //进行编辑内容的保存
    public static function save($id,$param){
        if($id){
            //编辑
            $param['updated_at'] = time();
            $result = DB::table('xc_agent_members')->where('id','=',$id)->update($param);
            //日志插入
//            ActionLogsService::insertLog(Auth()->user()->username,'edit','编辑',$id, $param, self::getAgentMember($id));

        }else{
            //保存
            $param['updated_at'] = time();
            $param['created_at'] = time();
            $result = DB::table('xc_agent_members')->insertGetId($param);
//            ActionLogsService::insertLog(Auth()->user()->username,'insert','添加',$result);

            //日志插入
        }
        return $result;
    }
    //进行审核与删除的操作
    public static function update($id,$param,$kind = 'edit'){
        $result = DB::table('xc_agent_members')->whereIn('id',$id)->update($param);
        if($kind = 'edit'){
            $kind_name = '编辑';
        }elseif($kind == 'checked'){
            $kind_name = '审核';
        }elseif($kind = 'remove'){
            $kind_name = '删除';
        }else{
            $kind_name = '';
        }
//        ActionLogsService::insertLog(Auth()->user()->username,$kind,$kind_name,$id, $param, self::getAgentMember($id));
        return $result;
    }

    public static function checkpidRight($role_id,$pid){
        $role_child = DB::table('xc_agent_roles')->where('id','=',$pid)->value('role_child');
        if(!in_array($role_id,explode(',',$role_child))){
            return false;
        };
        return true;
    }

    public static function getAllChildren($id= 0){
        $dataLists = DB::table('xc_agent_members as t1')
            ->leftJoin('xc_agent_roles as t2','t1.agent_role_id','=','t2.id')
            ->select(DB::raw('t1.id,concat_ws("--",t1.name,t2.agent_name) as title,t1.pid'))
            ->where('t1.deleted','=',0)
            ->orderBy('t1.created_at', 'desc')
            ->get()->toArray();
        /*
        *2.获取某个会员的无限下级方法
        *$members是所有会员数据表,$mid是用户的id
        */
        function GetTeamMember($members, $mid) {
            $Teams=array();//最终结果
            $mids=array($mid);//第一次执行时候的用户id
            do {
                $othermids=array();
                $state=false;
                foreach ($mids as $valueone) {
                    foreach ($members as $key => $valuetwo) {
                        if($valuetwo->pid==$valueone){
                            $Teams[$valuetwo->id]= (array)$valuetwo;//找到我的下级立即添加到最终结果中
                            $othermids[]=$valuetwo->id;//将我的下级id保存起来用来下轮循环他的下级
                            array_splice($members,$key,1);//从所有会员中删除他
                            $state=true;
                        }
                    }
                }
                $mids=$othermids;//foreach中找到的我的下级集合,用来下次循环
            } while ($state==true);

            return $Teams;
        }
        $child_all = GetTeamMember($dataLists,$id);
        if($child_all){
            foreach($child_all as $key => $value){
                $child_all[$key]['spread'] = true;
            }
        }
        function generateTree($items){
            $tree = array();
            foreach($items as $item){
                if(isset($items[$item['pid']])){
                   $items[$item['pid']]['children'][] = &$items[$item['id']];
                }else{
                    $tree[] = &$items[$item['id']];
            }
        }
            return $tree;
        }
        $child_tree = generateTree($child_all);
        return $child_tree;
    }
}