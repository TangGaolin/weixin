<template>
    <div class="hello">
        <article class="weui-article">
            <h1>你好友{{ orderDetail.user_name }}请你寻觅的健康美</h1>
            <section>
                <h2 class="title"></h2>
                <section>
                    <div class="weui-btn-area">
                        <img :src="orderDetail.headimgurl"/>
                    </div>

                    <div class="weui-btn-area" v-if = "1 == orderDetail.bind_status">
                        来晚了，你好友的邀请已经被别人捷足先登啦，点击查看活动详情！
                    </div>
                </section>

                <section v-if = "0 == orderDetail.bind_status">
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
                    <div class="weui-btn-area" >
                        <button class="weui-btn weui-btn_primary" id="showTooltips" v-on:click="getItem">点击领取</button>
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
    import { jsSdkData,getOrderInfo,getItems } from '../api/api'
    export default {
        name: 'hello',
        data () {
            return {
                dialogShow: false,
                dialogTitle: "",
                dialogContent: "",
                orderDetail: {},
                user: {
                    user_name: "",
                    phone_no: "",
                }
            }
        },
        created() {
            this.getOrderDetail()
            this.wxConfig()
        },
        methods: {
            closeDialog() {
                this.dialogContent = ""
                this.dialogShow = false
            },
            getItem() {
                // 手机验证
                if (!this.user.phone_no || !this.user.phone_no.match(/1\d{10}/)){
                    this.dialogContent = "要求输入正确的手机号码！"
                    this.dialogShow = true
                    return
                }

                getItems({
                    user_name: this.user.user_name,
                    phone_no: this.user.phone_no,
                    order_id: this.$route.query.order_id
                }).then((response) => {
                    if(0 !== response.statusCode){
                        this.dialogContent = response.msg
                        this.dialogShow = true
                        return
                    }else{
                        this.dialogContent = "领取成功！"
                        this.dialogShow = true
                        return
                    }
                }).catch((error) => {
                    console.log(error)
                })
            },
            getOrderDetail(){
                getOrderInfo(this.$route.query).then((response) => {
                    this.orderDetail = response.data
                }).catch((error) => {
                    console.log(error)
                })
            },
            wxConfig (){

            },
        }
    }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
</style>
