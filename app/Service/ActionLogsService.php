<?php
/**
 * Created by PhpStorm.
 * User: chenjialing
 * Date: 2019/6/11
 * Time: 20:11
 */
namespace App\Service;
use App\Library\ArrayHelp;
use Illuminate\Support\Facades\DB;
class ActionLogsService{
    //创建日志
    public static function insertLog($user,$action_type,$comment,$table_id = 0,$new = [],$old = []){
        $current_actions = ArrayHelp::get_curent_action();
        $table_id = intval($table_id);
        $param['module_name'] = $current_actions['controller_name'];
        $param['action'] = $current_actions['action'];
        $param['actor'] = $user;
        $param['table_id'] = $table_id;
        $param['date'] = time();
        $param['comment'] = $comment;
        $param['action_type'] = $action_type;
        $insert_result = DB::table('xc_action')->insert($param);
        //进行history的插入
        if($action_type == 'edit'){
            self::createChanges($insert_result,$new,$old);
        }
        return $insert_result;
    }

    //插入history
    public static function createChanges($action,$new = [],$old = [])
    {
        $new = (object)$new;
        $old =(object)$old;
        $changes    = array();
        foreach($new as $key => $value)
        {
            if($value != stripslashes($old->$key))
            {
                $changes[] = array('field' => $key, 'old' => $old->$key, 'new' => $value);
            }
        }
        if(!empty($changes)){
             foreach($changes as $key => $value){
                 $changes[$key]['action'] = $action;
             }

             DB::table('xc_history')->insert($changes);
        }
        return true;
    }
    //获取日志列表
    public static function getActionLists(){
        $lists = DB::table('xc_action as t1')->leftJoin('xc_history as t2','t1.id','=','t2.action')
                ->select(['t1.*','t2.field','t2.old','t2.new'])->orderBy('t1.date')->get();
        return $lists;
    }

}