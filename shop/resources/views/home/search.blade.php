@extends('home.layouts.main')
@section('content')
	<!--list-content-->
	<div class="main">
		<div class="py-container">
			<!--bread-->
			<div class="bread">
				<ul class="fl sui-breadcrumb">
					<li>
						<a href="#">全部结果</a>
					</li>
					<li class="active">智能手机</li>
				</ul>
				<ul class="tags-choose">
					<li class="tag">全网通<i class="sui-icon icon-tb-close"></i></li>
					<li class="tag">63G<i class="sui-icon icon-tb-close"></i></li>
				</ul>
				<form class="fl sui-form form-dark">
					<div class="input-control control-right">
						<input type="text" />
						<i class="sui-icon icon-touch-magnifier"></i>
					</div>
				</form>
				<div class="clearfix"></div>
			</div>
			<!--selector-->
			<div class="clearfix selector">
				<div class="type-wrap">
					<div class="fl key">商品分类</div>
					<div class="fl value">
						<a href="#">手机</a> <a href="#">电视</a>
					</div>
					<div class="fl ext"></div>
				</div>
				<div class="type-wrap logo">
					<div class="fl key brand">品牌</div>
					<div class="value logos">
						<ul class="logo-list">
							<li><img src="/img/_/phone01.png" /></li>
							<li><img src="/img/_/phone02.png" /></li>
							<li><img src="/img/_/phone03.png" /></li>
							<li><img src="/img/_/phone04.png" /></li>
							<li><img src="/img/_/phone05.png" /></li>
							<li><img src="/img/_/phone06.png" /></li>
							<li><img src="/img/_/phone07.png" /></li>
							<li><img src="/img/_/phone08.png" /></li>
							<li><img src="/img/_/phone09.png" /></li>
							<li><img src="/img/_/phone10.png" /></li>
							<li><img src="/img/_/phone11.png" /></li>
							<li><img src="/img/_/phone12.png" /></li>
							<li><img src="/img/_/phone13.png" /></li>
							<li><img src="/img/_/phone14.png" /></li>
							<li><img src="/img/_/phone05.png" /></li>
							<li><img src="/img/_/phone06.png" /></li>
							<li><img src="/img/_/phone07.png" /></li>
							<li><img src="/img/_/phone02.png" /></li>
						</ul>
					</div>
					<div class="ext">
						<a href="javascript:void(0);" class="sui-btn">多选</a>
						<a href="javascript:void(0);">更多</a>
					</div>
				</div>
				@foreach($data->names as $v)
				<div class="type-wrap">
					<div class="fl key">{{$v->name}}</div>
					<div class="fl value">
						<ul class="type-list">
						@foreach($v->values as $vs)
							<li>
								<a>{{$vs->value}}</a>
							</li>
						@endforeach
						</ul>
					</div>
					<div class="fl ext"></div>
				</div>
				@endforeach
			
			</div>
			<!--details-->
			<div class="details">
				<div class="sui-navbar">
					<div class="navbar-inner filter">
						<ul class="sui-nav">
							<li class="active">
								<a href="#">综合</a>
							</li>
							<li>
								<a href="#">销量</a>
							</li>
							<li>
								<a href="#">新品</a>
							</li>
							<li>
								<a href="#">评价</a>
							</li>
							<li>
								<a href="#">价格</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="goods-list">
					<ul class="yui3-g">
					
						@foreach($goods as $v)
						@foreach($v->sku as $sku)
						<li class="yui3-u-1-5">
				
							<div class="list-wrap">
								<div class="p-img">
									<img src="{{asset('uploads/'.$v->logo)}}" />
								</div>
								<div class="price">
									<strong>
										<em>¥</em>
										<i>{{$sku->price}}</i>
									</strong>
								</div>
								<div class="attr">
								<a href="{{route('item',['id'=>$sku->id])}}" style="color:#333">	<em>{{$v->name}} {{$sku->name}}</em></a>
								</div>
								<div class="cu">
									<em></em>
								</div>
								<div class="commit">
									<i class="command">已有2000人评价</i>
								</div>
								<div class="operate">
									<a href="javascript:void(0);" class="sui-btn btn-bordered btn-danger">加入购物车</a>
									<a href="javascript:void(0);" class="sui-btn btn-bordered">对比</a>
									<a href="javascript:void(0);" class="sui-btn btn-bordered">关注</a>
								</div>
							</div>
						</li>
						@endforeach
						@endforeach
						
					</ul>
				</div>
				<div class="fr page">
					<div class="sui-pagination pagination-large">
						<ul>
							<li class="prev disabled">
								<a href="#">«上一页</a>
							</li>
							<li class="active">
								<a href="#">1</a>
							</li>
							<li>
								<a href="#">2</a>
							</li>
							<li>
								<a href="#">3</a>
							</li>
							<li>
								<a href="#">4</a>
							</li>
							<li>
								<a href="#">5</a>
							</li>
							<li class="dotted"><span>...</span></li>
							<li class="next">
								<a href="#">下一页»</a>
							</li>
						</ul>
						<div><span>共10页&nbsp;</span><span>
								到第
								<input type="text" class="page-num">
								页 <button class="page-confirm" onclick="alert(1)">确定</button></span></div>
					</div>
				</div>
			</div>
			<!--hotsale-->
			<div class="clearfix hot-sale">
				<h4 class="title">热卖商品</h4>
				<div class="hot-list">
					<ul class="yui3-g">
						<li class="yui3-u-1-4">
							<div class="list-wrap">
								<div class="p-img">
									<img src="img/like_01.png" />
								</div>
								<div class="attr">
									<em>Apple苹果iPhone 6s (A1699)</em>
								</div>
								<div class="price">
									<strong>
										<em>¥</em>
										<i>4088.00</i>
									</strong>
								</div>
								<div class="commit">
									<i class="command">已有700人评价</i>
								</div>
							</div>
						</li>
						<li class="yui3-u-1-4">
							<div class="list-wrap">
								<div class="p-img">
									<img src="img/like_03.png" />
								</div>
								<div class="attr">
									<em>金属A面，360°翻转，APP下单省300！</em>
								</div>
								<div class="price">
									<strong>
										<em>¥</em>
										<i>4088.00</i>
									</strong>
								</div>
								<div class="commit">
									<i class="command">已有700人评价</i>
								</div>
							</div>
						</li>
						<li class="yui3-u-1-4">
							<div class="list-wrap">
								<div class="p-img">
									<img src="img/like_04.png" />
								</div>
								<div class="attr">
									<em>256SSD商务大咖，完爆职场，APP下单立减200</em>
								</div>
								<div class="price">
									<strong>
										<em>¥</em>
										<i>4068.00</i>
									</strong>
								</div>
								<div class="commit">
									<i class="command">已有20人评价</i>
								</div>
							</div>
						</li>
						<li class="yui3-u-1-4">
							<div class="list-wrap">
								<div class="p-img">
									<img src="img/like_02.png" />
								</div>
								<div class="attr">
									<em>Apple苹果iPhone 6s (A1699)</em>
								</div>
								<div class="price">
									<strong>
										<em>¥</em>
										<i>4088.00</i>
									</strong>
								</div>
								<div class="commit">
									<i class="command">已有700人评价</i>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
@endsection