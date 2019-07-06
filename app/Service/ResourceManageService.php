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
class ResourceManageService
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
        $dataLists = DB::table('xc_resource_manage')->select('*')
            ->where('deleted','=',0)
            ->where(function($sql) use ($searchKeyword){
                if($searchKeyword){
                    $sql->where('title','like','%'.$searchKeyword.'%');
                    $sql->orWhere('content','like','%'.$searchKeyword.'%');
                }
            })
            ->where(function($sql) use ($checked){
                if($checked != -1){
                    $sql->where('checked',$checked);
                }
            })
            ->orderBy('created_at', 'desc')
            ->paginate($limit);

        return $dataLists;
    }



    //进行审核与删除的操作
    public static function update($id,$param,$kind = 'edit'){
        $result = DB::table('xc_resource_manage')->whereIn('id',$id)->update($param);
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