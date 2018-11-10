<template>
    <div class="cart py-container">
		<!--logoArea-->
		<div class="logoArea">
			<div class="fl logo"><span class="title">结算页</span></div>
			<div class="fr search">
				<form class="sui-form form-inline">
					<div class="input-append">
						<input type="text" class="input-error input-xxlarge" placeholder="品优购自营" />
						<button class="sui-btn btn-xlarge btn-danger" type="button">搜索</button>
					</div>
				</form>
			</div>
		</div>
		<!--主内容-->
		<div class="checkout py-container">
			<div class="checkout-tit">
				<h4 class="tit-txt">填写并核对订单信息</h4>
			</div>
			<div class="checkout-steps">
				<!--收件人信息-->
				<div class="step-tit">
					<h5>收件人信息<span><a data-toggle="modal" data-target=".edit" data-keyboard="false" class="newadd">新增收货地址</a></span></h5>
				</div>
				<div class="step-cont">
					<div class="addressInfo">
						<ul class="addr-detail">
							<li class="addr-item">
							  <div v-for="v in address" :key="v.id">
								<div class="con name" :class="{selected:v.default}"><a href="javascript:;" >{{v.name}}<span title="点击取消选择">&nbsp;</span></a></div>
								<div class="con address">{{v.name}} {{v.province}}{{v.city}}{{v.district}} {{v.detailed_address}} <span>{{v.mobile}}</span>
									<span class="base" v-if="v.default==1">默认地址</span>
                                    <a v-else @click="editAddress(v.id)"  href="javascript:void(0)">设为默认</a>
									<!-- <span class=""><a data-toggle="modal" data-target=".edit" data-keyboard="false" >编辑</a>&nbsp;&nbsp;<a href="javascript:;">删除</a></span> -->
								</div>
								<div class="clearfix"></div>
							  </div>
							</li>
							
							
						</ul>
						<!--添加地址-->
                          <div  tabindex="-1" role="dialog" data-hasfoot="false" class="sui-modal hide fade edit">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" data-dismiss="modal" aria-hidden="true" class="sui-close">×</button>
						        <h4 id="myModalLabel" class="modal-title">添加收货地址</h4>
						      </div>
						      <div class="modal-body">
						      	<form action="" class="sui-form form-horizontal">
						      		 <div class="control-group">
									    <label class="control-label">收货人：</label>
									    <div class="controls">
									      <input type="text" class="input-medium">
									    </div>
									  </div>
									   
									   <div class="control-group">
									    <label class="control-label">详细地址：</label>
									    <div class="controls">
									      <input type="text" class="input-large">
									    </div>
									  </div>
									   <div class="control-group">
									    <label class="control-label">联系电话：</label>
									    <div class="controls">
									      <input type="text" class="input-medium">
									    </div>
									  </div>
									   <div class="control-group">
									    <label class="control-label">邮箱：</label>
									    <div class="controls">
									      <input type="text" class="input-medium">
									    </div>
									  </div>
									   <div class="control-group">
									    <label class="control-label">地址别名：</label>
									    <div class="controls">
									      <input type="text" class="input-medium">
									    </div>
									    <div class="othername">
									    	建议填写常用地址：<a href="#" class="sui-btn btn-default">家里</a>　<a href="#" class="sui-btn btn-default">父母家</a>　<a href="#" class="sui-btn btn-default">公司</a>
									    </div>
									  </div>
									  
						      	</form>
						      	
						      	
						      </div>
						      <div class="modal-footer">
						        <button type="button" data-ok="modal" class="sui-btn btn-primary btn-large">确定</button>
						        <button type="button" data-dismiss="modal" class="sui-btn btn-default btn-large">取消</button>
						      </div>
						    </div>
						  </div>
						</div>
						 <!--确认地址-->
					</div>
					<div class="hr"></div>
					
				</div>
				<div class="hr"></div>
				<!--支付和送货-->
				<div class="payshipInfo">
					<div class="step-tit">
						<h5>支付方式</h5>
					</div>
					<div class="step-cont">
						<ul class="payType">
							<li @click="pam='wx'" class="selected">微信付款<span title="点击取消选择"></span></li>
							<li @click="pam='ali'">支付宝付款<span title="点击取消选择"></span></li>
						</ul>
					</div>
					<div class="hr"></div>
					<div class="step-tit">
						<h5>送货清单</h5>
					</div>
					<div class="step-cont">
						<ul class="send-detail">
							<li>
								
								<div class="sendGoods">
									<ul class="yui3-g" v-for="v in carts" :key="v.id">
										<li class="yui3-u-1-6">
											<span><img src="/img/goods.png"/></span>
										</li>
										<li class="yui3-u-7-12">
											<div class="desc">{{v.goodsName}} {{v.skus[0]}}</div>
											<div class="seven">7天无理由退货</div>
										</li>
										<li class="yui3-u-1-12">
											<div class="price">￥{{ (v.price * v.count).toFixed(2) }}</div>
										</li>
										<li class="yui3-u-1-12">
											<div class="num">X{{v.count}}</div>
										</li>
										<li class="yui3-u-1-12">
											<div class="exit">有货</div>
										</li>
									</ul>
								</div>
							</li>
							<li></li>
							<li></li>
						</ul>
					</div>
					<div class="hr"></div>
				</div>
				<div class="linkInfo">
					<div class="step-tit">
						<h5>发票信息</h5>
					</div>
					<div class="step-cont">
						<span>普通发票（电子）</span>
						<span>个人</span>
						<span>明细</span>
					</div>
				</div>
				<div class="cardInfo">
					<div class="step-tit">
						<h5>使用优惠/抵用</h5>
					</div>
				</div>
			</div>
		</div>
		<div class="order-summary">
			<div class="static fr">
				<div class="list">
	
					<span><i class="number"></i>{{number}}件商品，总商品金额</span>
					<em class="allprice">¥{{totalPrice}}</em>

				</div>
				<div class="list">
					<span>返现：</span>
					<em class="money">0.00</em>
				</div>
				<div class="list">
					<span>运费：</span>
					<em class="transport">0.00</em>
				</div>
			</div>
		</div>
		<div class="clearfix trade">
			<div class="fc-price">应付金额:　<span class="price">¥{{totalPrice}}</span></div>
			<div class="fc-receiverInfo" v-for="v in address" :key="v.id" v-if="v.default==1">
                寄送至:{{v.province}}{{v.city}}{{v.district}} {{v.detailed_address}} 收货人：{{v.name}} {{v.mobile}}
            </div>
		</div>
		<div class="submit">
			<a @click.prevent="submit" class="sui-btn btn-danger btn-xlarge" href="pay.html">提交订单</a>
		</div>
	</div>
	
</template>

<script>
export default {
    data() {
        return {
            address:[],
            carts:[],
            method:'',
            // totalPrice:'',
            pam:'wx',
            addressId:'',
        }
    },
    created:function(){
        // getCarts().then( (res) => {
        //     this.carts = res.data
        // })
        $.get('/order/address',(data) => {//this 代表的是外面的this
        	// console.log(data)//
        	this.address = data
        })
        $.get('/order/carts',(data) => {//this 代表的是外面的this
        	// console.log(data)//
        	this.carts = data
        })
        // console.log(this.carts)
    },
    methods:{
       
        submit:function(){
            // console.log( this.pam ,this.totalPrice )
            // 执行AJAX
            createOrder({
                method:this.pam,
                real_payment:this.totalPrice,
                address_id:this.defaultAddress,
                carts:this.carts,
            }).then( (res)=> {

				// console.log(res.data.number,this.pam)
				if(this.pam=='ali')
				{
					location.href = '/alipay?number='+res.data.number
				}
				else if(this.pam=='wx')
				{
					location.href = '/wxpay?number='+res.data.number
				}
                
            })
        },
        editAddress:function(k)
        {
            this.addressId = k
            // console.log( k )
            $.get('/order/address',{id:k},(data) => {//this 代表的是外面的this
                // console.log(data)//
                this.address = data
            })
        }

    },
    // 计算属性
    computed: {
        totalPrice:function(){
            let sum = 0;
            // 循环计算总价
            for(let i=0;i<this.carts.length;i++)
            {
                if( this.carts[i].checked ){
                    sum += this.carts[i].price * this.carts[i].count
                }
            }
            // 返回 (js小数运算会出问题：toFixed)
            return sum.toFixed(2)
        },
        number:function()
        {
            let sum = 0;
            // 获取商品数量
            for(let i=0;i<this.carts.length;i++)
            {
                if( this.carts[i].checked ){
                    sum += this.carts[i].count
                }
            }
            return sum
		},
		defaultAddress:function()
		{
			for(let i=0;i<this.address.length;i++)
            {
                if( this.address[i].default ){
                    return this.address[i].id
                }
            }
		}

    }
}
</script>

