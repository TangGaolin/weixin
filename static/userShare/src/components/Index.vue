<style scoped>
    .title {
        text-align: center;
    }
</style>
<template>
    <div class="hello">
        <article class="weui-article">
            <p>
                <img src="../assets/header.jpg" alt="">
            </p>
            <section>
                <h1 class="title">活动项目</h1>
                <section>
                    <h3>项目1-扶阳罐</h3>
                    <p>
                        市场客单价: <s> 398 元</s>
                        <img src="../assets/item123.jpg" alt="">
                        扶阳罐以“温刮温灸亚健康调理技术”为核心，传承了中医经典养生文化，展示了我国数千年的中医养生之道，首次成功实现热能、红外线、磁疗的同步导入，真正做到排毒祛瘀、驱寒祛湿，有效宣通瘀结的经络、温补虚损的阳气
                    </p>
                </section>

            </section>
            <section>
                <h1 class="title">活动规则</h1>
                <section style="color: red">
                    <p>1. 填写姓名和手机号，支付198元 </p>
                    <p>2. 支付成功即可体验以上任意一种项目</p>
                    <p>3. 获得赠与好友免费一次体验名额</p>
                </section>

            </section>
            <section>
                <section>
                    <div class="weui-cells weui-cells_form">
                        <div class="weui-cell">
                            <div class="weui-cell__hd"><label for="" class="weui-label">姓名</label></div>
                            <div class="weui-cell__bd">
                                <input class="weui-input" type="string"  v-model="user.user_name" placeholder="请输入姓名"/>
                            </div>
                        </div>
                        <div class="weui-cell">
                            <div class="weui-cell__hd"><label for="" class="weui-label">手机号</label></div>
                            <div class="weui-cell__bd">
                                <input class="weui-input" type="number"  v-model="user.phone_no"  placeholder="请输入手机号"/>
                            </div>
                        </div>
                    </div>
                    <div class="weui-btn-area">
                        <button class="weui-btn weui-btn_primary" id="showTooltips" v-on:click="buyItem">确定购买</button>
                    </div>
                </section>

            </section>
        </article>

        <div v-if = dialogShow>
            <div class="weui-mask"></div>
            <div class="weui-dialog">
                <div class="weui-dialog__bd">{{ dialogContent }}</div>
                <div class="weui-dialog__ft">
                    <a href="javascript:;" v-on:click="closeDialog()" class="weui-dialog__btn weui-dialog__btn_primary">确定</a>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    import wx from 'weixin-js-sdk'
    import { buyItem, jsSdkData, getUserStatus } from '../api/api'
    export default {
        name: 'Index',

        data () {
            return {
                dialogShow: false,
                dialogTitle: "",
                dialogContent: "",
                user: {
                    user_name:"",
                    phone_no:"",
                }
            }
        },
        created() {
            this.checkUserStatus()
            this.wxConfig()
        },
        methods: {
            closeDialog() {
                this.dialogContent = ""
                this.dialogShow = false
            },
            checkUserStatus(){
                getUserStatus().then((response) => {
                    //判断用户是否购买
                    console.log(response.data.order_id)
                    if("" !== response.data.order_id){
                        this.$router.push('/share?order_id=' + response.data.order_id)
                    }
                }).catch((error) => {
                    console.log(error)
                })
            },
            wxConfig (){

            },
            buyItem() {
                // 手机验证
                if (!this.user.phone_no || !this.user.phone_no.match(/1\d{10}/)){
                    this.dialogContent = "要求输入正确的手机号码！"
                    this.dialogShow = true
                    return
                }
                buyItem(this.user).then((response) => {
                    if(0 !== response.statusCode) {
                        this.dialogContent = response.msg
                        this.dialogShow = true
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

        }
    }
</script>


