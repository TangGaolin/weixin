<style scoped>
    li,ul {
        padding: 0;
        list-style: none;
    }
    label {
        font-weight: bolder;
    }
    .btn {
        background-color: #4CAF50; /* Green */
        border: none;
        border-radius: 5px;
        color: white;
        padding: 5px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
    }
    .qr_code {
        width: 7rem;
        position: absolute;
        top: 3rem;
        left: 60%;
        border-radius: 10px;
    }
    .qr_code span{
        font-size: .5rem;
        font-weight: 300;
        margin-top: -2rem;
    }

</style>
<template>

    <div>
        <section class="content">
            <li class="content-item form">
                <label class = "content-title" style="color: red">
                    <span>您的参与信息</span>
                </label>

                <label class = "qr_code">
                    <img src="../assets/qrcode_for_dlt.jpg" style="width: 100%; box-shadow: 0 0 2px rgba(0, 93, 152, .5);">
                    <span class="">长按关注 &nbsp;&nbsp; 更多体验</span>
                </label>

                <p>
                    <label>姓名：</label> {{ orderDetail.user_name }}
                </p>
                <p>
                    <label>手机：</label> {{ orderDetail.phone_no }}
                </p>
                <br/>
                <p>
                    <label>支付状态：</label> {{ orderDetail.status ? "已经支付" : "未支付" }}
                </p>
                <p v-if = "!orderDetail.status">
                    <button class="btn" v-on:click="buyItem"> 点击支付 </button>
                </p>

                <p v-if = "orderDetail.status">
                    <label>邀请状态：</label> {{  orderDetail.share_phone_no ? "分享成功": "未分享"}}
                </p>

                <p v-if = "!orderDetail.share_phone_no && orderDetail.status">
                    <button class="btn" v-on:click="shareNow"> 立即分享 </button>
                </p>

                <br/>
                <p v-if = "orderDetail.status && orderDetail.share_phone_no">
                    <label>好友姓名：</label> {{ orderDetail.share_user }}<br/>
                    <label>好友手机：</label> {{ orderDetail.share_phone_no }}
                </p>
            </li>
        </section>

        <section>
            <div class = "toast" v-if="dialogShow">
                <p>{{dialogContent}}</p>
            </div>
        </section>


    </div>

</template>

<script>
    import wx from 'weixin-js-sdk'
    import { buyItem, jsSdkData, getUserStatus } from '../api/api'
    export default {
        name: 'Index',
        props: {
            orderDetail: Object
        },

        data () {
            return {
                dialogShow: false,
                dialogContent: "",
            }
        },
        methods: {
            buyItem() {
                buyItem(this.orderDetail).then((response) => {
                    if(0 !== response.statusCode) {
                        this.toast(response.msg)
                    }else{
                        if (typeof WeixinJSBridge === "undefined"){
                            if( document.addEventListener ){
                                document.addEventListener('WeixinJSBridgeReady', onBridgeReady, false);
                            }else if (document.attachEvent){
                                document.attachEvent('WeixinJSBridgeReady', onBridgeReady);
                                document.attachEvent('onWeixinJSBridgeReady', onBridgeReady);
                            }
                        }else{
                            WeixinJSBridge.invoke(
                                'getBrandWCPayRequest', response.data,
                                function(res){
                                    if(res.err_msg === "get_brand_wcpay_request:ok" ) {
                                        location.reload()
                                    }
                                }
                            );
                        }
                    }
                }).catch((error) => {
                    console.log(error)
                })
            },

            shareNow() {
                this.$emit('showMask')
            },
            toast(c){
                var _this = this
                _this.dialogContent = c
                _this.dialogShow = true
                setTimeout(function () {
                    _this.dialogShow = false
                    _this.dialogContent = ""
                }, 3000)
            }

        }
    }
</script>


