<template>
    <div class="hello">
        <article class="weui-article">
            <h1>你好友请你寻觅的健康美</h1>
            <section>
                <h2 class="title"></h2>
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

            },
        }
    }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
</style>
