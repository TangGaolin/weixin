<template>
    <div class="hello">
        <article class="weui-article">
            <h1>你请客，我买单</h1>
            <section>
                <h2 class="title">走进德理堂，寻觅健康美</h2>
                <section>
                    <div class="weui-btn-area">
                        <img :src="orderDetail.headimgurl"/>
                    </div>

                    <div class="weui-btn-area" v-if = "1 == orderDetail.bind_status">
                        <img :src="orderDetail.headimgurl"/>
                    </div>
                </section>

                <section>
                    <div class="weui-btn-area" v-if = "0 == orderDetail.bind_status">
                        <button class="weui-btn weui-btn_primary" id="showTooltips" v-on:click="sharePage">点击领取</button>
                    </div>
                </section>
            </section>
        </article>

    </div>
</template>

<script>

    import wx from 'weixin-js-sdk'
    import { jsSdkData,getOrderInfo } from '../api/api'
    export default {
        name: 'hello',
        data () {
            return {
                dialogShow: false,
                dialogTitle: "",
                dialogContent: "",
                orderDetail: {}
            }
        },
        created() {
            this.getOrderInfo()
            this.wxConfig()
        },
        methods: {
            closeDialog() {
                this.dialogContent = ""
                this.dialogShow = false
            },
            sharePage() {

            },
            getOrderInfo(){
                getOrderInfo(this.$route.query).then((response) => {
                    this.orderDetail = response.data
                }).catch((error) => {
                    console.log(error)
                })
            },
            wxConfig (){
                jsSdkData({ url: location.href.split('#')[0] }).then((response) => {
                    wx.config(response)
                    wx.ready(()=>{
                        wx.onMenuShareTimeline({
                            title: '你请客，我付钱，走进德理堂，寻觅健康美',
                            link: 'http://dm-weixin.tanggaolin.com/activity/getUserShare?order_id=' + this.$route.query.order_id, // 分享链接，该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
                            imgUrl: '', // 分享图标
                            success: function () {
                                // 用户确认分享后执行的回调函数
                            },
                            cancel: function () {
                                // 用户取消分享后执行的回调函数
                            }
                        })
                        wx.onMenuShareAppMessage({
                            title: '你请客，我付钱', // 分享标题
                            desc: '走进德理堂，寻觅健康美', // 分享描述
                            link: 'http://dm-weixin.tanggaolin.com/activity/getUserShare?order_id=' + this.$route.query.order_id, // 分享链接，该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
                            imgUrl: '', // 分享图标
                            type: 'link', // 分享类型,music、video或link，不填默认为link
                            dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
                            success: function () {
                                // 用户确认分享后执行的回调函数
                            },
                            cancel: function () {
                                // 用户取消分享后执行的回调函数
                            }
                        })
                    })
                    wx.error(function(res){
                        console.log('wx err',res)
                        //可以更新签名
                    })



                }).catch((error) => {
                    console.log(error)
                })
            },
        }
    }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
</style>
