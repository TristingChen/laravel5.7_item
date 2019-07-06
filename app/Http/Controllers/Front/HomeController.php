<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * 平台前台首页
     */
    public function index()
    {
        // 轮播图
        // $list = DB::table('carousels')->select(['id', 'img', 'link', 'type', 'description', 'remark1', 'remark2'])->where('type', '=', 1)->skip(0)->take(3)->get();

        // 首页布局前三张为热门商品orderby sort
        // $hotimg = DB::table('goods')->select(['id', 'brand_id', 'img', 'description'])->where('status', '=', 1)->where('type', '=', 2)->orderBy('sort')->skip(0)->take(3)->get();
        return view('front.index', [
            // 'list' => $list,
            // 'hotimg' => $hotimg
        ]);
    }
}