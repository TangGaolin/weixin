<style>
    .share-hand {
        width: 40%;
        position: absolute;
        top: 2%;
        right: 10%;
    }
    .pop-container {
        position: fixed;
        height: 100%;
        width: 100%;
        top: 0;
        left: 0;
        background: rgba(0, 0, 0, .7);
    }
</style>
<template>
    <div class="share">
        <HeaderShow></HeaderShow>
        <JoinInfo :orderDetail = orderDetail
                  v-on:showMask = "showMask">
        </JoinInfo>
        <ActDesc></ActDesc>
        <itemIntro></itemIntro>
        <div class="pop-container" v-if="isMaskShow" v-on:click = "isMaskShow = false">
            <img src="../assets/share-hand.png" alt="" class="share-hand">
        </div>
    </div>
</template>

<script>

    import wx from 'weixin-js-sdk'
    import { jsSdkData, getOrderInfo } from '../api/api'
    export default {
        name: 'share',
        data () {
            return {
                isMaskShow: false,
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

            showMask() {
                this.isMaskShow = true
            },
            wxConfig (){
                this.order_id = this.$route.query.order_id
                jsSdkData({
                    url: location.href.split('#')[0],
                    functions:['onMenuShareAppMessage','hideMenuItems']
                }).then((response) => {
                    response.debug = false
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
                            title: '美丽同行，送您夏日健康美', // 分享标题
                            desc: '走进德理堂，寻觅健康美', // 分享描述
                            link: 'http://dm-weixin.tanggaolin.com/activity/getUserShare?order_id=' + this.order_id, //
                            imgUrl: 'https://mmbiz.qlogo.cn/mmbiz_jpg/kvkOHnItLJjqiaI8QOQ0Nxnt0VeXzNIM4iammqJA72FwUcF7JAtl2sZ2OrlZm39tAZNUPHkSZw7J9rEh3hUXVDOQ/0?wx_fmt=jpeg', // 分享图标
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
