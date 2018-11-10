// // 设置AJAX超时时间
// axios.defaults.timeout = 3000
// // 设置提交数据时的格式
// let token = document.head.querySelector('meta[name="csrf-token"]');

// if (token) {
//     window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
// }
// axios.defaults.headers['Content-Type'] = 'application/x-www-form-urlencoded'

// 设置前置拦截器->以后所有的AJAX都会自动添加上 Authorization:token 的协议头
// axios.interceptors.request.use(function (config) {
//     // 判断如果用户登录了就把token 配置上axios 的协议头中
//     let token = localStorage.getItem('token')
//     // let token = document.head.querySelector('meta[name="csrf-token"]');
//     if(token){
//         config.headers['Authorzation'] = token
//     }
//     // 处理请求前代码
//     return config;
//   }, function (error) {
//     // Do something with request error
//     return Promise.reject(error);
// });
 
/*所有的AJAX代码*/

// 创建订单
function createOrder(params)
{
    return axios.post('/order/store',params)
}
function regist(params){
    return axios.post('/regist', params)
} 
function sendSMS(params){
    return axios.post('/sms', params)
}
function login(params){
    //执行AJAX并返回一个promise 对象
    return axios.post('/login', params)
}
//网站快报
function getTopNews(){
    return axios.get('/news',{
        params:{
            limit:8,
            sort_by:'id',
            sort_way:"desc"
        }
    })
}
//网站分类
function getCategorys(){
    return axios.get('/categorys')
}
//楼层
function getFloors(){
    return axios.get('/floors')
}

//推荐商品
function getRecomend(){
    return axios.get('/recomend_goods')
}
//获取商品详情
function getGoodsInfo(skuid) {
    return axios.get('/goods/'+skuid)
}
//商品评论
function getComments(spuid,per_page,page){
    return axios.get('/comments/'+spuid+'?limit='+per_page+'&page='+page+'&sort_by=id&sort_way=desc')
}
//加入购物车
function addToCart(data){
    return axios.post('/carts',data)
}
// 获取数据
function getCarts(){
    return axios.get('/carts')
}
// 修改购物车
function updateCart(id,data){
    return axios.put('/cart/'+id, data)
}
// 删除购物车
function deleteCart(id){
    return axios.delete('/cart/'+id)
}
// 得到地址
function getAddress(){
    return axios.get('/address')
}
//得到品牌
function getBrands(catid){
    return axios.get('/brands/'+catid)
}
// 搜索商品
function searchGoods(search){
    return axios.get('/goods', {
        params:search
    })
}
//得到规格
function getSpecifications(catid){
    return axios.get('/specifications/'+catid)
}