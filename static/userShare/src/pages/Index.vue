
<template>

    <div class="index">
        <header>
            <img src="../assets/header.jpg" alt="" style="width: 100%">
        </header>
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
                items:[
                    {
                       itemName:"",
                       itemPrice:"",
                       itemActPrice:"",
                       itemDesc:"",
                    }
                ],
                dialogShow: false,
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


