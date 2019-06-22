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
            $dataInfo = DB::table('xc_agent_members as t1')->leftJoin('xc_us_cities as t2','t1.city_id','=','t2.ID')->select(['t1.*','t2.ID_STATE as state_id'])->first();
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

}