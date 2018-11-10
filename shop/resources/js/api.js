import Vue from 'vue';
import VueResource from 'vue-resource';
Vue.use(VueResource);

// 设置 Laravel 的csrfToken
Vue.http.interceptors.push((request, next) => {
    request.headers.set('X-CSRF-TOKEN', Laravel.csrfToken);
    next();
});

const API_ROOT = ''; //可以根据自己的开发环境设置

export default({
    // 首页推荐信息
    getNewsRecommend: function() {
        return Vue.resource(API_ROOT + '/news').get();
    },
    // 列表信息
    getNewsLists: function() {
        return Vue.resource(API_ROOT + '/newslist').get();
    },
    // 详情
    getNewsDetail: function(id) {
        return Vue.resource(API_ROOT + '/newsdetail/' + id).get();
    }
})
