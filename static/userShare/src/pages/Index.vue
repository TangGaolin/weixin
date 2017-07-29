
<template>

    <div class="index">
        <HeaderShow></HeaderShow>
        <ItemIntro></ItemIntro>
        <ActDesc></ActDesc>
        <JoinAct></JoinAct>
    </div>

</template>

<script>
    import wx from 'weixin-js-sdk'
    import { buyItem, jsSdkData, getUserStatus } from '../api/api'
    export default {
        name: 'Index',

        data () {
            return {
            }
        },
        created() {
            this.checkUserStatus()
            this.wxConfig()
        },
        methods: {
            checkUserStatus(){
                getUserStatus().then((response) => {
                    if("" !== response.data.order_id){
                        this.$router.push('/share?order_id=' + response.data.order_id)
                    }
                }).catch((error) => {
                    console.log(error)
                })
            },
            wxConfig (){
                this.order_id = this.$route.query.order_id
                jsSdkData({
                    url: location.href.split('#')[0],
                    functions:['onMenuShareAppMessage','onMenuShareTimeline']
                }).then((response) => {
                    response.debug = false
                    wx.config(response)
                    wx.ready(() => {
                        wx.onMenuShareAppMessage({
                            title: '你请客，我买单', // 分享标题
                            desc: '走进德理堂，寻觅健康美', // 分享描述
                            link: 'http://dm-weixin.tanggaolin.com/activity/userShare', //
                            imgUrl: 'https://mmbiz.qlogo.cn/mmbiz_jpg/kvkOHnItLJjqiaI8QOQ0Nxnt0VeXzNIM4iammqJA72FwUcF7JAtl2sZ2OrlZm39tAZNUPHkSZw7J9rEh3hUXVDOQ/0?wx_fmt=jpeg', // 分享图标
                            type: 'link', // 分享类型,music、video或link，不填默认为link
                            dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
                        });
                        wx.onMenuShareTimeline({
                            title: '走进德理堂，寻觅健康美', // 分享标题
                            link: 'http://dm-weixin.tanggaolin.com/activity/userShare', // 分享链接，该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
                            imgUrl: 'https://mmbiz.qlogo.cn/mmbiz_jpg/kvkOHnItLJjqiaI8QOQ0Nxnt0VeXzNIM4iammqJA72FwUcF7JAtl2sZ2OrlZm39tAZNUPHkSZw7J9rEh3hUXVDOQ/0?wx_fmt=jpeg', // 分享图标
                        });
                    })
                })
            }
        },

    }
</script>


