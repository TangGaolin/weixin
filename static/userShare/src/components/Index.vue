<template>
    <div class="hello">
        <article class="weui-article">
            <h1>你请客，我买单</h1>
            <section>
                <h2 class="title">走进德理堂，寻觅健康美</h2>
                <section>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat.
                    </p>
                    <p>
                        <img src="http://ympt.yimee.net/attachment/images/46/2017/07/Kxftq6hq9069Z0556C3f404Df6mzqM.jpg" alt="">
                    </p>
                </section>
                <section>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                    <p>
                        <img src="http://ympt.yimee.net/attachment/images/46/2017/07/Kxftq6hq9069Z0556C3f404Df6mzqM.jpg" alt="">
                    </p>
                </section>
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
    import { buyItem } from '../api/api'
    export default {
        name: 'hello',
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
        methods: {
            closeDialog() {
                this.dialogContent = ""
                this.dialogShow = false
            },
            buyItem() {
                // 手机验证
                if (!this.user.phone_no || !this.user.phone_no.match(/1\d{10}/)){
                    this.dialogContent = "要求输入正确的手机号码！"
                    this.dialogShow = true
                    return
                }

                let prepay_id = ""
                let appId = ""
                buyItem(this.user).then((response) => {
                    if(0 !== response.statusCode) {
                        this.$Message.error(response.msg)
                    }else{
                        prepay_id = response.prepay_id
                        appId = response.app_id
                    }
                }).catch((error) => {
                    console.log(error)
                })

                if (typeof WeixinJSBridge === "undefined"){
                    if( document.addEventListener ){
                        document.addEventListener('WeixinJSBridgeReady', onBridgeReady, false);
                    }else if (document.attachEvent){
                        document.attachEvent('WeixinJSBridgeReady', onBridgeReady);
                        document.attachEvent('onWeixinJSBridgeReady', onBridgeReady);
                    }
                }else{
                    WeixinJSBridge.invoke(
                        'getBrandWCPayRequest', {
                            "appId": appId,     //公众号名称，由商户传入
                            "timeStamp":"1395712654",         //时间戳，自1970年以来的秒数
                            "nonceStr":"e61463f8efa94090b1f366cccfbbb444", //随机串
                            "package":"prepay_id=u802345jgfjsdfgsdg888",
                            "signType":"MD5",         //微信签名方式：
                            "paySign":"70EA570631E4BB79628FBCA90534C63FF7FADD89" //微信签名
                        },
                        function(res){
                            if(res.err_msg == "get_brand_wcpay_request:ok" ) {}     // 使用以上方式判断前端返回,微信团队郑重提示：res.err_msg将在用户支付成功后返回    ok，但并不保证它绝对可靠。
                        }
                    );
                }



            },

        }
    }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
    h1, h2 {
        font-weight: normal;
    }

    ul {
        list-style-type: none;
        padding: 0;
    }

    li {
        display: inline-block;
        margin: 0 10px;
    }

    a {
        color: #42b983;
    }
</style>
