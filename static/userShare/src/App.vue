<template>
  <div id="app">
    <router-view></router-view>
  </div>
</template>

<script>
    import wx from 'weixin-js-sdk'
    import { jsSdkData } from './api/api'
    export default {
        name: 'app',
        data() {
            return {
                jsApiParam: {},
            }
        },
        created() {
            this.wxConfig()
        },
        methods: {
            wxConfig (){
                jsSdkData().then((response) => {
                    wx.config(response)
                    wx.ready(()=>{
                        console.log('wx.ready')
                    });
                    wx.error(function(res){
                        console.log('wx err',res);
                        //可以更新签名
                    });

                    wx.onMenuShareTimeline({
                        title: '你请课,我付钱，走进德理堂，寻觅健康美', // 分享标题
                        link: 'http://dm-weixin.tanggaolin.com/activity/userShare', // 分享链接，该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
                        imgUrl: '', // 分享图标
                        success: function () {
                            // 用户确认分享后执行的回调函数
                        },
                        cancel: function () {
                            // 用户取消分享后执行的回调函数
                        }
                    });
                }).catch((error) => {
                    console.log(error)
                })
            }
        }
    }
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}
</style>
