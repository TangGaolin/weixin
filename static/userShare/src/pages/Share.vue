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
                        <img :src="orderDetail.share_headimgurl"/>
                    </div>
                </section>

                <section>
                    <div class="weui-btn-area" v-if = "0 == orderDetail.bind_status">
                        <button class="weui-btn weui-btn_primary" id="showTooltips" v-on:click="sharePage">分享给你要请客的好友</button>
                    </div>
                </section>
            </section>
        </article>

    </div>
</template>

<script>

    import wx from 'weixin-js-sdk'
    import { jsSdkData, getOrderInfo } from '../api/api'
    export default {
        name: 'share',
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
                this.order_id = this.$route.query.order_id
                jsSdkData({
                    url: location.href.split('#')[0],
                    functions:['onMenuShareAppMessage','hideMenuItems']
                }).then((response) => {
                    wx.config(response)
                    wx.ready(() => {
                        wx.hideMenuItems({
                            menuList: [
                                "menuItem:share:timeline",
                                "menuItem:share:qq",
                                "menuItem:share:weiboApp",
                                "menuItem:favorite",
                                "menuItem:share:QZone"
                            ] // 要隐藏的菜单项
                        });
                        wx.onMenuShareAppMessage({
                            title: '赠送', // 分享标题
                            desc: '走进德理堂，寻觅健康美', // 分享描述
                            link: 'http://dm-weixin.tanggaolin.com/activity/getUserShare?order_id=' + this.order_id, //
                            imgUrl: 'https://mmbiz.qpic.cn/mmbiz_jpg/4ta2hGQS1TJODnIXtpuPiblQUwNAxbQdBU49sQ4aU7ibVlutsmqLrIvOahQwS2BxBHAq6DibqHXrpNdreMpzz4lIw/640', // 分享图标
                            type: 'link', // 分享类型,music、video或link，不填默认为link
                            dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
                        })
                    })
                })

            },
        }
    }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
</style>
