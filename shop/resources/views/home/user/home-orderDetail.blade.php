@extends('home.layouts.home')
@section('content')
                <div class="yui3-u-5-6">
                    <div class="body">
                        <div class="order-detail">
                            <h4>订单详情</h4>
                            <div class="order-bar">
                                <div class="sui-steps-round steps-round-auto steps-4">
                                    <div class="@if($data->state  == 1) current @elseif($data->state > 1) finished @else todo @endif">
                                        <div class="wrap">
                                        <div class="round">1</div>
                                        <div class="bar"></div>
                                        </div>
                                        <label>
                                            <span>提交订单</span>
                                            <span>{{substr($data->created_at,0,10)}}</span>
                                            <span>{{substr($data->created_at,11,8)}}</span>
                                        </label>
                                    </div>
                                    <div class="@if($data->state  == 2) current @elseif($data->state > 2) finished @else todo @endif">
                                        <div class="wrap">
                                        <div class="round">2</div>
                                        <div class="bar"></div>
                                        </div>
                                        <label>
                                            <span>付款成功</span>
                                            <span>{{substr($data->payment_time,0,10)}}</span>
                                            <span>{{substr($data->payment_time,11,8)}}</span>
                                        </label>
                                    </div>
                                    <div class="@if($data->state  == 3) current @elseif($data->state > 3) finished @else todo @endif">
                                        <div class="wrap">
                                        <div class="round">3</div>
                                        <div class="bar"></div>
                                        </div>
                                        <label>
                                            <span>发货</span>
                                            <span>{{substr($data->delivery_time,0,10)}}</span>
                                            <span>{{substr($data->delivery_time,11,8)}}</span>
                                        </label>
                                    </div>
                                    <div class="@if($data->state  == 6) current @elseif($data->state > 6) finished @else todo @endif">
                                        <div class="wrap">
                                        <div class="round">4</div>
                                        <div class="bar"></div>
                                        </div>
                                        <label>
                                            <span>确认收货</span>
                                            <span>{{substr($data->receipt_time,0,10)}}</span>
                                            <span>{{substr($data->receipt_time,11,8)}}</span>
                                        </label>
                                    </div>
                                    
                                    <div class="@if($data->state==8) current @else todo last @endif">
                                        <div class="wrap">
                                        <div class="round">5</div>
                                        </div>
                                        <label>
                                            <span>评价晒单</span>
                                            <span>{{substr($data->evaluation_time,0,10)}}</span>
                                            <span>{{substr($data->evaluation_time,11,8)}}</span>
                                        </label>
                                    </div>
                                    </div>
                            </div>
                            <div class="order-state">
                                <p>当前订单状态：<span class="red">

								@if($data->state==1)
								未付款
								@elseif($data->state==2)
								已付款
								@elseif($data->state==3)
								未发货
								@elseif($data->state==5)
								已发货
								<p>还剩06天00小时 自动确认收货</p>
								@elseif($data->state==6)
								确认收货
								@elseif($data->state==8)
								评价成功
								@endif
								</span></p>
                               
                            </div>
                        </div>
                        <div class="order-info">
							<h5>订单信息</h5>
                            <p>收货地址：{{$data->address[0]}}  </p>
                            <p>订单单号：{{$data->number}}</p>
                            <p>下单时间：{{$data->created_at}}</p>
                            <p>支付时间：{{$data->payment_time}}</p>
                            <p>支付方式：@if($data->method=='wx') 微信 @endif</p>
                            <p>发货时间：{{$data->delivery_time}}</p>
                        </div>
                        <div class="order-goods">
                            <table class="sui-table">
                                    <thead>
                                        <th class="center" >商品</th>
                                        <th class="center" >价格</th>
                                        <th class="center" >数量</th>
                                        <th class="center" >优惠</th>
                                        <th class="center" >状态</th>
                                    </thead>                                   
                             
                                <tbody>                               
                                    <tr>
                                        <td colspan="5">订单编号：787587819591509</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="typographic"><img src="img/goods.png" />
                                                    <span>包邮 正品玛姬儿压缩面膜无纺布纸膜100粒 送泡瓶面膜刷喷瓶 新款</span>
                                                    <span class="guige">规格：温泉喷雾150ml</span>
                                                </div>
                                        </td>
                                        <td>
                                            <ul class="unstyled">
                                                    <li class="o-price">¥599.00</li>	
                                                    <li>¥299.00</li>											
                                                </ul>
                                        </td>
                                        <td>1</td>
                                        <td>无优惠</td>
                                        <td>交易成功</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="order-price">
                                <p>商品总金额：￥1.8</p>
                                <p>运费金额：，免费用</p>
                                <p>使用优惠券：无</p>
                                <h4 class="red">实际支付：￥1.8</h4>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <!--猜你喜欢-->
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
                                            <img src="img/_/itemlike01.png" />
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
                                            <img src="img/_/itemlike02.png" />
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
                                            <img src="img/_/itemlike03.png" />
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
                                            <img src="img/_/itemlike04.png" />
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
  @endsection