@extends('front.include.basic')
@section('css')
<style>
	
@charset "utf-8";

/* CSS Document */


/*css预设*/

* {
	margin: 0;
	padding: 0;
}


/*将所有HTML元素的默认边距清0*/

html,
body {
	font-size: 12px;
	font-family: "微软雅黑", "arial";
	color: #262626;
	background: #FFF;
}


/*对HTML元素中的字体、颜色、背景色进行初始设置*/

ul li,
ol li {
	list-style: none;
}


/*将列表标签的默认样式清除*/

a {
	text-decoration: none;
	outline: none;
	color: #262626;
	blr: expression(this.onFocus=this.blur());
}


/*将超链接的下划线去掉以及在ie6中点击出现的虚线框去掉*/

img {
	border: none;
}


/*图片的默认边框去掉 */

table {
	border-collapse: collapse;
	border-spacing: 0;
}

caption,
th,
td {
	font-weight: normal;
	text-align: left;
}

input,
textarea,
select,
button {
	font-size: 100%;
	font-family: inherit;
	margin: 0;
	padding: 0;
	border: none;
	outline: none;
}

label,
button {
	cursor: pointer
}

textarea {
	white-space: pre;
	resize: none;
	border: 1px solid #ececec;
}

article,
aside,
figcaption,
figure,
footer,
header,
hgroup,
nav,
section,
summary {
	display: block;
}


/*清楚浮动*/

.clearfix:after {
	content: "";
	display: block;
	clear: both;
	height: 0;
	line-height: 0;
	visibility: hidden;
}

.clearfix {
	zoom: 1;
}


/*解决ie6的兼容性问题*/

.fl {
	float: left;
}

.fr {
	float: right;
}

.mt {
	margin-top: 80px;
}

.wrapper {
	width: 1160px;
	margin: 0 auto;
}


/*********************head********************/

.head {
	margin-top: 30px;
	min-width: 1160px;
	position: relative;
	border-bottom: 1px solid #e0e0e0;
}

.head h1 img {
	width: 80%;
	display: block;
}

.head div p {
	margin-top: 20px;
}

.head div p a {
	color: #262626;
	padding: 0 10px;
	font-size: 14px;
}

.head div p a:nth-child(1) {
	border-right: 1px solid #dbdbdb;
}

.head div form {
	width: 160px;
	height: 30px;
	line-height: 30px;
	margin: 0 10px;
	margin-top: 13px;
	border-bottom: 1px solid #262626;
}

.head div form input:nth-child(1) {
	background: none;
	text-indent: 8px;
}

.head div form input:nth-child(2) {
	float: right;
	width: 13%;
	padding-bottom: 10px;
	background: url(../img/ss.png) no-repeat right 5px;
	cursor: pointer;
}

.head div.btn {
	margin-top: 20px;
	position: relative;
}

.head div.btn a {
	float: left;
	margin: 0 10px;
}

.head ul {
	float: left;
	margin-left: 18%;
	line-height: 50px;
}

.head ul li {
	float: left;
	padding: 0 20px;
}

.head ul li>a {
	color: #262626;
	font-size: 14px;
	display: inline-block;
	position: relative;
}

.head ul li a:before {
	content: "";
	background: #A10000;
	position: absolute;
	bottom: -3px;
	z-index: -1;
	transform: scaleX(0);
	transition: all .5s ease;
	-webkit-transition: all .5s ease;
}

.head ul li:nth-child(1) a:before {
	left: -12px;
}

.head ul li>a:hover {
	color: #A10000;
}

.head ul li>a:hover:before {
	width: 56px;
	height: 2px;
	transform: scaleX(1);
	transition-timing-function: cubic-bezier(0.52, 1.64, 0.37, 0.66);
	-webkit-transition-timing-function: cubic-bezier(0.52, 1.64, 0.37, 0.66);
	;
	z-index: 9999;
}

.head div.sList {
	position: absolute;
	top: 113px;
	left: 0;
	z-index: 3;
	background: #fff;
	width: 100%;
	display: none;
}

.head div.sList div {
	text-align: center;
	padding: 20px 0;
	display: flex;
}

.head div.sList div a {
	flex: 1 1 20%;
	border-right: 1px solid #dbdbdb;
}

.head div.sList div a:last-child {
	border-right: none;
}

.head div.sList div dl dt img {
	width: 70%;
}

.head div.sList div dl dd {
	font-size: 14px;
}

.head div.sList2 {
	display: none;
	position: absolute;
	top: 113px;
	left: 0;
	z-index: 3;
	background: #fff;
	width: 100%;
}

.head div.sList2 div {
	width: 46%;
	margin: 0 auto;
}

.head div.sList2 a {
	float: left;
	margin-right: 40px;
}


/*定位样式*/

.ding {
	margin-top: 0;
	position: fixed;
	top: 0;
	left: 0;
	width: 100%;
	height: 40px;
	padding: 20px 0;
	background: #fff;
	z-index: 100;
}

.ding h1 {
	position: absolute;
	left: 10%;
	top: 20%;
}

.ding h1 img {
	width: 65%;
}


/*.ding #top1{
	display: none;
}*/

.ding #top1 p,
.ding #top1 div {
	display: none;
}

.ding ul li a:before {
	bottom: -25px;
}

.ding div.sList,
.ding div.sList2 {
	top: 81px;
}

.ding ul {
	float: left;
	margin-left: 18%;
	line-height: 0;
}

.ding div form {
	width: 185px;
	height: 30px;
	line-height: 30px;
	margin: 0 10px;
	margin-top: 5px;
	border-bottom: 1px solid #262626;
}

.ding div.sList2 a {
	float: left;
	margin-right: 40px;
	line-height: 38px;
}

.ding div.sList div dl dd {
	line-height: 35px;
}


/*头部二维码*/

.head div.btn p {
	display: none;
}

.head div.btn p a {
	width: 74px;
	height: 74px;
	position: absolute;
	top: 30px;
	background: #fff;
	right: 10px;
	padding: 2px;
	z-index: 10;
	border: 1px solid #A10000;
}

.head div.btn p a img {
	width: 100%;
}

.head div.btn p a:before {
	position: absolute;
	top: -5px;
	left: 50%;
	width: 0;
	height: 0;
	margin-left: -5px;
	vertical-align: middle;
	content: " ";
	border-right: 5px solid transparent;
	border-bottom: 5px solid #A10000;
	border-left: 5px solid transparent;
}


/*********************address********************/

.address {
	height: 40px;
	line-height: 40px;
	border-bottom: 1px solid #DBDBDB;
}

.address a,
.address span {
	float: left;
	color: #777;
}

.address span {
	margin: 0 20px;
}

.address a.on {
	color: #262626;
}


/*********************footer********************/

.footer {
	min-width: 1160px;
}

.footer .top {
	padding: 30px 0;
	border-top: 1px solid #DBDBDB;
	border-bottom: 1px solid #DBDBDB;
}

.footer .top .wrapper {
	display: flex;
}

.footer .top .wrapper div {
	flex: 1 1 25%;
	border-right: 1px solid #dbdbdb;
}

.footer .top .wrapper div:last-child {
	border-right: none;
}

.footer .top .wrapper div a img {
	display: block;
}

.footer .top .wrapper div a {
	margin-left: 25%;
}

.footer .top .wrapper div span {
	margin-top: 15px;
	margin-left: 10px;
	display: block;
	font-size: 16px;
}

.footer p.dibu {
	background: #000;
	padding: 30px 0;
	text-align: center;
	color: #fff;
}


/*********************gotop********************/

body {
	position: relative;
}

.gotop {
	position: fixed;
	right: 20px;
	top: 400px;
	z-index: 20;
}

.gotop a {
	display: block;
	width: 48px;
	height: 48px;
	line-height: 38px;
	background: #f4f4f4;
	margin-bottom: 10px;
	border: 1px solid #d6d6d6;
	cursor: pointer;
}

.gotop dl dt {
	margin: 0 auto;
	width: 20px;
	padding-top: 10px;
}

.gotop dl.goCart {
	position: relative;
}

.gotop dl.goCart span {
	position: absolute;
	top: -9px;
	right: -8px;
	width: 16px;
	height: 16px;
	border-radius: 8px;
	background: #c10000;
	color: #fff;
	text-align: center;
	line-height: 16px;
}

.gotop dl dd {
	display: none;
	background: #a10000;
	height: 41px;
	width: 41px;
	color: #fff;
	padding: 8px 0 0 10px;
	line-height: 15px;
}

.gotop p {
	border: 1px solid #A10000;
	padding: 10px;
	position: absolute;
	background: #f4f4f4;
	top: 66px;
	left: -130px;
	display: none;
}

.gotop p:before {
	position: absolute;
	top: 50%;
	right: -6px;
	width: 0;
	margin-top: -5px;
	height: 0;
	margin-left: -5px;
	vertical-align: middle;
	content: " ";
	border-bottom: 5px solid transparent;
	border-left: 5px solid #a10000;
	border-top: 5px solid transparent;
}
/*bott*/
.Bott{
	background: #f5f5f5;
}
.Bott .zuo{
	margin: 20px 20px 20px 0;
	width: 180px;
	background: #fff;
	text-align: center;
	 line-height: 40px; 
	border: 1px solid #e4e4e4;
}
.Bott .zuo h3{
	border-bottom: 1px solid #A10000;
	cursor: pointer;
	padding: 10px 0;
	font-weight: normal;
}
.Bott .zuo h3 a img{
	display: block;
	margin: 0 auto;
}
.Bott .zuo h3 p{
	width: 70%;
	margin: 0 auto;
}
.Bott .zuo h3 p span{
	border-bottom: 1px solid #fff;
}
.Bott .zuo h3 span:hover{
	color: #A10000;
	border-bottom: 1px solid #A10000;
}
.Bott .zuo div{
	background: #fcfcff;
}
.Bott .zuo  h4{
	cursor: pointer;
	width: 90%;
	color: #444;
	font-size: 14px;
}
.Bott .zuo ul li a{
	display: inline-block;
	color: #757575;
	width: 40%;
	text-align: left;
	font-size: 14px;
}
.Bott .zuo ul li.on a,.Bott .zuo ul li a:hover{
	color: #A10000;
}



.Bott .you{
	background: #fff;
	width: 840px;
	padding: 50px;
	margin: 20px 0;
	border: 1px solid #e4e4e4;
}
.Bott .you  h2{
	font-size: 22px;
	font-weight: normal;
	padding-bottom: 20px;
	border-bottom: 1px solid #E6E6E6;
	margin-bottom: 30px;
}

/*个人信息*/
.Bott .you .tx {
	padding-bottom:10px ;
	border-bottom: 1px solid #E6E6E6; 
}
.Bott .you .tx div a.fl{
	display: block;
	width: 90px;
	height: 90px;
	border-radius: 45px;
	border: 1px solid #e3e3e3;
	padding: 1px;
}
.Bott .you .tx div p{
	margin: 25px 0 0 15px;
}
.Bott .you .tx div p span{
	display: block;
	font-size: 16px;
	margin-bottom: 10px;
}
.Bott .you .tx div p a{
	display: block;
	color: #A10000;
}
.Bott .you .tx div.fr{
	margin: 40px 0 0 0;
	color: #757575;
}
.Bott .you .bott{
	padding: 20px 0;
	display: flex;
	flex-wrap: wrap;
}
.Bott .you .bott div{
	flex: 1 1 50%;
	margin: 20px 0;
}
.Bott .you .bott div p{
	font-size: 15px;
	color: #757575;
	margin: 35px 0 0 15px;
}
.Bott .you .bott div p strong{
	color: #A10000;
}
.Bott .you .bott div a{
	display: block;
	font-size: 12px;
	color: #757575;
	margin-top: 10px;
}








/*地址管理*/
.Bott .you .add{
	display: flex;
	justify-content: space-around;
}
.Bott .you .add div:nth-child(1){
	width: 268px;
	height: 178px;
	border: 1px solid #E0E0E0;
	text-align: center;
}
.Bott .you .add div:nth-child(1) a{
	width: 30px;
	display: block;
	margin: 60px auto 0;
}
.Bott .you .add div:nth-child(2){
	width: 244px;
	height: 158px;
	border: 1px solid #E0E0E0;
	padding: 20px 0 0 24px;
	color: #757575;
	line-height: 20px;
}
.Bott .you .add div p:nth-child(1){
	font-size: 18px;
	margin-bottom: 25px;
	color: #262626;
}
.Bott .you .add div:nth-child(2) a{
	color: #A10000;
	display: inline-block;
	margin-right: 10px;
}
.Bott .you .add div:nth-child(3){
	width: 268px;
	height: 178px;
}



/*添加地址*/
body{
	position: relative;
}
/*遮罩*/
.mask{
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	background: rgba(0,0,0,0.5);
	z-index: 20;
	display: none;
}
/*
 	提交订单页面的修改地址为居中
 */
.editAddre{
	position: fixed;
	top: 50%;
	left: 50%;
	margin-top: -180px;
	margin-left: -150px;
}
.adddz{
	width: 300px;
	position: absolute;
	top: 50%;
	left: 38%;
	margin-top: -180px;
	margin-left: -150px;
	z-index: 30;
	background: #fff;
	border: 1px solid #A10000;
	padding: 30px;
	display: none;
}
.readd{
	width: 300px;
	position: absolute;
	top: 50%;
	left: 60%;
	margin-top: -180px;
	margin-left: -150px;
	z-index: 30;
	background: #fff;
	border: 1px solid #A10000;
	padding: 30px;
	display: none;
}
.adddz form input,.readd form input{
	border: 1px solid #e0e0e0;
	display: block;
	margin-bottom: 15px;
	width: 100%;
	height: 40px;
	line-height: 40px;
	text-indent: 5px;
}
.adddz form input.on,.readd form input.on{
	border: 1px solid #A10000;
}
.adddz form div.city select,.readd form div.city select{
	width: 142px;
	height: 40px;
	line-height: 40px;
	border: 1px solid #E0E0E0;
	padding: 10px;
	margin-bottom:10px;
}
.adddz form div.city select:nth-child(odd),.readd form div.city select:nth-child(odd){
	margin-right: 10px;
}
.adddz form textarea,.readd form textarea{
	width: 100%;
	height: 50px;
	padding-top:10px;
	text-indent: 5px;
	margin-bottom: 15px;
}
.adddz form div.bc,.readd form div.bc{
	margin-top: 30px;
	display: flex;
	justify-content: space-around;
}
.adddz form div.bc input,.readd form div.bc input{
	display: inline-block;
	width: 120px;
	height: 36px;
	line-height: 36px;
	text-align: center;
	background: #fff;
	border: 1px solid #e6e6e6;
}
.adddz form div.bc input:nth-child(1),.readd form div.bc input:nth-child(1){
	background: #A10000;
	color: #FFFFFF;
}

.page-header .container:after{
	height: 0;
}


</style>
@endsection
@section('content')
		<!-- content -->
		<main id="content" class="light-color">
			
			<header class="page-header">
				<div class="container">
					<div class="row">
						<!-- <div class="col-md-6"> -->
							<ol class="breadcrumb text-left">
								<li><a href="/">Home</a></li>
								<li class="active">my account</li>
							</ol>
						<!-- </div> -->
					</div>
				</div>
			</header>	
		<div class="Bott">
			<div class="wrapper clearfix">
				<div class="zuo fl">
					<h3 style="font-size:1.17em">
						<a href="#"><img src="{{ asset('/front/images/tx.png') }}"/></a>
						<p class="clearfix"><span class="" style="">[{{Session::get('user.nickname')}}]</span></p>
					</h3>
					<div>
						<h4>我的交易</h4>
						<ul>
							<li><a href="#">我的购物车</a></li>
							<li><a href="#">我的订单</a></li>
						</ul>
						<h4>个人中心</h4>
						<ul>
							<li  class="on"><a href="#">我的中心</a></li>
							<li><a href="#">地址管理</a></li>
						</ul>
						<h4>账户管理</h4>
						<ul>
							<li><a href="#">个人信息</a></li>
							<li><a href="#">修改密码</a></li>
						</ul>
					</div>
				</div>
				<div class="you fl">
					<div class="tx clearfix">
						<div class="fl clearfix">
							<a href="#" class="fl"><img src="{{ asset('/front/images/tx.png') }}"/></a>
							<p class="fl"><span>{{Session::get('user.nickname')}}</span><a href="#">修改个人信息></a></p>
						</div>
					</div>
					<div class="bott">
						<div class="clearfix">
							<p class="fl"><span>待支付的订单：<strong>0</strong></span>
								<a href="#">查看待支付订单></a>
							</p>
						</div>
						<div class="clearfix">
							<p class="fl"><span>已购买订单：<strong>0</strong></span>
								<a href="#">查看待收货订单></a>
							</p>
						</div>
						<div class="clearfix">
							<p class="fl"><span>我的资源下载：<strong>0</strong></span>
								<a href="#">查看已下载的资源></a>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		</main>
@endsection
<!-- / content -->
@section('javascript')
<script type="text/javascript">
</script>
@endsection

