@extends('home.layouts.home')
@section('content')
                <!--右侧主内容-->
                <div class="yui3-u-5-6 order-pay">
                    <div class="body">
                        <div class="table-title">
                            <table class="sui-table  order-table">
                                <tr>
                                    <thead>
                                        <th width="35%">宝贝</th>
                                        <th width="5%">单价</th>
                                        <th width="5%">数量</th>
                                        <th width="8%">商品操作</th>
                                        <th width="10%">实付款</th>
                                        <th width="10%">交易状态</th>
                                        <th width="10%">交易操作</th>
                                    </thead>
                                </tr>
                            </table>
                        </div>
                        <div class="order-detail">
                            <div class="orders">
                                <div class="choose-order">
                                    <div class="sui-pagination pagination-large top-pages">
                                        <ul>
                                            <li class="prev disabled"><a href="#">上一页</a></li>

                                            <li class="next"><a href="#">下一页</a></li>
                                        </ul>
                                    </div>
                                </div>

								<!--order1-->
                                @foreach($data as $v)
                                <div class="choose-title">
                                    <label data-toggle="checkbox" class="checkbox-pretty ">
                                           <input type="checkbox" checked="checked"><span>{{$v->created_at}}　订单编号：{{$v->number}}  店铺：哇哈哈 <a>和我联系</a></span>
                                     </label>
									  <a class="sui-btn btn-info share-btn">分享</a>
                                </div>
                                <table class="sui-table table-bordered order-datatable">
                                    <tbody>
                                    @foreach($v->skus as $sku)
                                        <tr>
                                            <td width="35%">
                                                <div class="typographic"><img src="/img/goods.png" />
                                                    <a href="#" class="block-text">{{$sku->sku[0]}} {{$sku->sku[1]}}</a>
                                                    <span class="guige" title="{{$sku->sku[2]}}">{{str_limit($sku->sku[2],16,'...')}}</span>
                                                </div>
                                            </td>
                                            <td width="5%" class="center">
                                                <ul class="unstyled">
                                                    <li class="o-price">¥{{$sku->price + rand(1,999)}}</li>
                                                    <li>¥{{$sku->price}}</li>
                                                </ul>
                                            </td>
                                            <td width="5%" class="center">{{$sku->count}}</td>
                                            <td width="8%" class="center">
                                               
                                            </td>
                                            <td width="10%" class="center" >
                                                <ul class="unstyled">
                                                    <li>¥{{$v->real_payment}}</li>
                                                    <li>（含运费：￥0.00）</li>
                                                </ul>
                                            </td>
                                            <td width="10%" class="center">
                                                <ul class="unstyled">
                                                    <li>@if($v->state==5) 等待卖家付款 @endif</li>
                                                    <li><a href="{{route('orderDetail',['id'=>$v->id])}}" class="btn">订单详情 </a></li>
                                                </ul>
                                            </td>
                                            <td width="10%" class="center">
                                                <ul class="unstyled">
                                                    @if($v->state==1)
                                                        
                                                        @if($v->method=='wx')
                                                        <li><a href="{{route('wxpay',['number'=>$v->number])}}" class="sui-btn btn-info">立即付款</a></li>

                                                        @elseif($v->method='ali')
                                                        <li><a href="{{route('alipay',['number'=>$v->number])}}" class="sui-btn btn-info">立即付款</a></li>

                                                        @endif
                                                        <li><a href="{{route('order.destroy',['id'=>$v->id])}}" style="color:#ccc;">取消订单</a>  </li>
                                                    @elseif($v->state==2)
                                                        <li><a href="#" class="sui-btn btn-info">提醒发货</a></li>

                                                    @endif   
                                                </ul>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                @endforeach
                                <!--order2-->
                                <!-- <div class="choose-title">
                                    <label data-toggle="checkbox" class="checkbox-pretty ">
                                           <input type="checkbox" checked="checked"><span>2017-02-11 11:59　订单编号：7867473872181848  店铺：哇哈哈 <a>和我联系</a></span>
                                     </label>
									  <a class="sui-btn btn-info share-btn">分享</a>
                                </div>
                                <table class="sui-table table-bordered order-datatable">
                                    <tbody>
                                        <tr>
                                            <td width="35%">
                                                <div class="typographic"><img src="img/goods.png" />
                                                    <a href="#" class="block-text">包邮 正品玛姬儿压缩面膜无纺布纸膜100粒 送泡瓶面膜刷喷瓶 新款</a>
                                                    <span class="guige">规格：温泉喷雾150ml</span>
                                                </div>
                                            </td>
                                            <td width="5%" class="center">
                                                <ul class="unstyled">
                                                    <li class="o-price">¥599.00</li>
                                                    <li>¥299.00</li>
                                                </ul>
                                            </td>
                                            <td width="5%" class="center">1</td>
                                            <td width="8%" class="center">
                                                <ul class="unstyled">
                                                    <li>已发货</li>
                                                    <li><a>退货/退款</a></li>
                                                </ul>
                                            </td>
                                            <td width="10%" class="center" rowspan="2">
                                                <ul class="unstyled">
                                                    <li>¥299.00</li>
                                                    <li>（含运费：￥0.00）</li>
                                                </ul>
                                            </td>
                                            <td width="10%" class="center" rowspan="2">
                                                <ul class="unstyled">
                                                    <li>部分发货</li>
                                                    <li><a href="orderDetail.html" class="btn">订单详情 </a></li>
                                                </ul>
                                            </td>
                                            <td width="10%" class="center" rowspan="2">
                                                <ul class="unstyled">
                                                    <li>还剩4天23时</li>
                                                    <li><a href="#" class="sui-btn btn-info">确认发货</a></li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="35%">
                                                <div class="typographic"><img src="img/goods.png" />
                                                    <a href="#" class="block-text">包邮 正品玛姬儿压缩面膜无纺布纸膜100粒 送泡瓶面膜刷喷瓶 新款</a>
                                                    <span class="guige">规格：温泉喷雾150ml</span>
                                                </div>
                                            </td>
                                            <td width="5%" class="center">
                                                <ul class="unstyled">
                                                    <li class="o-price">¥199.00</li>
                                                    <li>¥212.00</li>
                                                </ul>
                                            </td>
                                            <td width="5%" class="center">1</td>
                                            <td width="8%" class="center">
                                                <ul class="unstyled">
                                                    <li>未发货</li>
                                                    <li><a>退货/退款</a></li>
                                                </ul>
                                            </td>


                                        </tr>

                                    </tbody>
                                </table> -->

                                <!--order3-->
                                <!-- <div class="choose-title">
                                    <label data-toggle="checkbox" class="checkbox-pretty ">
                                           <input type="checkbox" checked="checked"><span>2017-02-11 11:59　订单编号：7867473872181848  店铺：哇哈哈 <a>和我联系</a></span>
                                     </label>
                                    <a class="sui-btn btn-info share-btn">分享</a>
                                </div>
                                <table class="sui-table table-bordered order-datatable">
                                    <tbody>
                                        <tr>
                                            <td width="35%">
                                                <div class="typographic"><img src="img/goods.png" />
                                                    <a href="#" class="block-text">包邮 正品玛姬儿压缩面膜无纺布纸膜100粒 送泡瓶面膜刷喷瓶 新款</a>
                                                    <span class="guige">规格：温泉喷雾150ml</span>
                                                </div>
                                            </td>
                                            <td width="5%" class="center">
                                                <ul class="unstyled">
                                                    <li class="o-price">¥599.00</li>
                                                    <li>¥299.00</li>
                                                </ul>
                                            </td>
                                            <td width="5%" class="center">1</td>
                                            <td width="8%" class="center">
                                                <ul class="unstyled">

                                                    <li><a>退货/退款</a></li>
                                                </ul>
                                            </td>
                                            <td width="10%" class="center">
                                                <ul class="unstyled">
                                                    <li>¥299.00</li>
                                                    <li>（含运费：￥0.00）</li>
                                                </ul>
                                            </td>
                                            <td width="10%" class="center">
                                                <ul class="unstyled">
                                                    <li>买家已付款</li>
                                                    <li><a href="orderDetail.html" class="btn">订单详情 </a></li>
                                                </ul>
                                            </td>
                                            <td width="10%" class="center">
                                                <ul class="unstyled">
                                                    <li><a href="#" class="sui-btn btn-info">提醒发货</a></li>
                                                </ul>
                                            </td>
                                        </tr>


                                    </tbody>
                                </table> -->



                            </div>
                            <div class="choose-order">
                                <div class="sui-pagination pagination-large top-pages">
                                    <ul>
                                        <li class="prev disabled"><a href="#">«上一页</a></li>
                                        <li class="active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li class="dotted"><span>...</span></li>
                                        <li class="next"><a href="#">下一页»</a></li>
                                    </ul>
                                    <div><span>共10页&nbsp;</span><span>
                                            到
                                            <input type="text" class="page-num"><button class="page-confirm" onclick="alert(1)">确定</button>
                                            页</span></div>
                                </div>
                            </div>

                            <div class="clearfix"></div>
                        </div>

                        <div class="like-title">
                            <div class="mt">
                                <span class="fl"><strong>热卖单品</strong></span>
                            </div>
                        </div>
                        <div class="like-list">
                            <ul class="yui3-g">
                                <li class="yui3-u-1-4">
                                    <div class="list-wrap">
                                        <div class="p-img">
                                            <img src="/img/_/itemlike01.png" />
                                        </div>
                                        <div class="attr">
                                            <em>DELL戴尔Ins 15MR-7528SS 15英寸 银色 笔记本</em>
                                        </div>
                                        <div class="price">
                                            <strong>
											<em>¥</em>
											<i>3699.00</i>
										</strong>
                                        </div>
                                        <div class="commit">
                                            <i class="command">已有6人评价</i>
                                        </div>
                                    </div>
                                </li>
                                <li class="yui3-u-1-4">
                                    <div class="list-wrap">
                                        <div class="p-img">
                                            <img src="/img/_/itemlike02.png" />
                                        </div>
                                        <div class="attr">
                                            <em>Apple苹果iPhone 6s/6s Plus 16G 64G 128G</em>
                                        </div>
                                        <div class="price">
                                            <strong>
											<em>¥</em>
											<i>4388.00</i>
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
                                            <img src="/img/_/itemlike03.png" />
                                        </div>
                                        <div class="attr">
                                            <em>DELL戴尔Ins 15MR-7528SS 15英寸 银色 笔记本</em>
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
                                            <img src="/img/_/itemlike04.png" />
                                        </div>
                                        <div class="attr">
                                            <em>DELL戴尔Ins 15MR-7528SS 15英寸 银色 笔记本</em>
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
        </div>
    </div>
    <!-- 底部栏位 -->
@endsection