<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ShopController extends Controller
{

    /**
     * 产品页
     */
    public function index()
    {
        return view('front.shop.index');
    }

    public function detail() {
        return view('front.shop.detail');
    }
}
