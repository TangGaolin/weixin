<style scoped>
    li,ul {
        padding: 0;
        list-style: none;
    }
    .content {
        padding: 0 5%;
        margin-top: .4rem;
    }
    .content .content-item {
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 0 6px rgba(0, 93, 152,.5);
        position: relative;
        padding: 3rem 0 2.5rem;
        margin-bottom: 2rem;
    }
    .content .content-title {
        width: 10rem;
        position: absolute;
        top: -1rem;
        left: 50%;
        font-size: large;
        margin-left: -5rem;
        line-height: 2rem;
        vertical-align: middle;
        border:2px solid rgba(0, 93, 152, .5);
        border-radius: 10px;
        background: #fff;
        box-shadow: 0 0 2px rgba(0, 93, 152,.5);
        text-align: center;
        color: #2a88bd;
    }
    .content p{
        padding: 0 6%;
        font-weight: 200;
        text-align: justify;
        letter-spacing: .5px;
        font-size: small;
    }
    .form {
        padding: 2rem 1rem!important;
        font-size: 1.1rem;
        color: #a68353;
    }
    .form .input-container{
        margin-bottom: 1rem;
        width:auto;
    }
    .form .input-item {
        position: relative;
        margin-bottom: .8rem;
    }
    .form .input-i {
        width: 1.6rem;
        height: 1.6rem;
        position: absolute;
        top: 50%;
        left: .6rem;
        margin-top: -.8rem;
    }
    .form .info-input {
        border: 1px solid #2a88bd;
        padding: .8rem .2rem .8rem 2.5rem;
        font-size: 1.1rem;
        line-height: 1.2rem;
        height: 1.2rem;
        color: #2a88bd;
        width: 86%;
        border-radius: 5px;
        background: rgba(18, 201, 255, 0.04);
    }
    .form .user{
        background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFAAAABQCAMAAAC5zwKfAAAAY1BMVEUAAADq0rD/4s3q0rDu1bT74cDq0rDq0rDq0rDr1LHr07Hq0rDp0q/q0rDq0rDr0rLw2LTq0q/x17nq0rDq07Dr0rDr0rDq07Hs07Lp0rDq0q/s1bHs0rLq0rDr0rHp1K/p0a9kly+RAAAAIHRSTlMA5gWQHAnyud5Maq/30MY+FdcRoZV9cVFF1Z0xJ8BbU5ZekzoAAAKJSURBVFjDzZlhk6MgDIZBFBDFqlXr2rqb//8rb2Znb71WkqDWmXs+tswrkSQkUTDUo1OmkSVAKRuj3FiL/WS58rDCqzzbJXeZNCDo6bJVLXEWSKxLttg6SGCRQ7TluYUobB4llxYQTZHyejcNG9A37jAUbESRh9NWsJmqJV7fB+zgA32RDwm7kA9kfxJ2IoN7bHF7eavbwPlWcIBqfdYKDqFW/gwUZVUUVQkUt5cDoeLD3LLvlHEzVMw8H0xBHOG4LBslEddP+QVQfPpkiQeUfFmWWXx/9csdg+/RLvlxAJTL6mYAlOHXBSXzYiJft/zrjI7eYPwW3c8SSz1zgbfHso80IoDhDJoApQsJdoAyffuMfp+gzhCnRg6ZjSrImTRjQ4KWSToeCO5rvTsQeCFqJs1tTJy1GOlEmK5uHjotjsIByZy8uPUMJE50QHNNnvSu7FVggMHUi17NrxYNcOi+/pHrNXA0QkIEsxoGNUMEUpTwVkoBbyZOUDbeNzJOsGSkru6S/jr1xV0lZzK1wPaPQNHXW2oDhNtUOdomVITbGOxRX4LgS6KO3SF/tIKkNVjoOT6CF/ioduH0ZRLBkphw+qr50myBLwHr4BWgEAk+d/vwz3dEgb9dVPgazSK74PA1mundguGLXkzvM3lCiqU+TrDHqj+7Crs2Rq+VWKHh1oESI7gOFYeXkP0eg2VCFO1dwgReIKkMZFvh7+QBe6StoBqf6wPt1IOZJueLSPOZBdz506DFKd88lnOfp/8sy/u55JpHvr3VTWWKwlSNptrbkxvw4yOCc4cYx8cs5w+Cjo+qzh+mHR/3nT+QPD4yPT7UPX3sfP5gPH50/z98XPj9/NEtnz86/vPHH1CD6CzUXUzWAAAAAElFTkSuQmCC) no-repeat 50%;
        background-size: 100% 100%;
    }
    .form .phone{
        background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFAAAABQCAMAAAC5zwKfAAAAbFBMVEUAAAD/38bz2bbq0rHq0rDq0q/r1LHu1bTq0rDr07Hq0rDq0rDp0rDq0rDq0rDs1LTt1LHq0rDq0rDr07Lr07Hu2rXr07Ht1bLp0rDq07Dr07Hq0rDq0q/q0q/q0rDs1LLu1bTr0rDr07Lp0a+9GkgLAAAAI3RSTlMABxKR36pPHe1v8+TSwp4lRNayPmcMXi67hH7LuZd4NheKV39zNHsAAAMaSURBVFjDzVnXsqMwDHUjYKohAdLL1f//484s7GUiS9jhIbPn0YpPZFVbiACUs/pamgwgM+VVW6fEdsidLsFDqXdyE92+zoFBXu8/Vu5gYBXmID+hswUEUdhoyp2BKJhdFF3aQTS6NEK9DD5AFlJSavgQetWSqoKPUakV87WwAS1ryKaATSgaRr8CNqIgdVQtbEarCP9if+SmSrQd3GNsUtUL0au0GR9uuOukMjn2jO9rFC+h9N/XKHq8eH6XRyTVz+qO9D0/ziICp/eceXdM924+GVWTUF6vHPgoolCxh5aoXt0ERq+UrzXyi1l+YeEdr/l/hvMtqdos/zVF1laJPg+SDAywvwoWAJRPDsBgQF6ZUUiBNqK/OgOD+yS/A8JhJjSM4AUMXrSlwMxBzx3pBgzqST4Axh45CwVAAgySOVfof5I5YLhpwxUYHHH0LhlBLsMeBS7GZbEVcTaiLY3ThpItf5P8QbQseluDvI9RzC3Dl5RCKGAJC7Ybs4SghAMfaRxhSoicsDxhBgxyntBSPoHntCEHDpP8CZRXjpQh4ggVGaIlTwgbCEsyNvoQoZyqLiExpOVlUEOWMCN3yTgbSlKUU4tBQvYIOXlkEReHgjyy2UCY8Uc2ZNjIQOoVPGFJBnYfqDaG9/JVaD6w20A9VGTqWZ7wwlZsntAKxxeHIzCo+OLgyL9JvSsZedFK6cOVLGHNtlGWsKSbVBNo9De2BWi6jTaBq8iJJdzRjX6MuyyNRKOnTfWYNagTEnXKNfqaWXciCo67chjfEmFQ1jfchXMQHqT01wbuwikLT4AwVgCXB1613pWYk1j87p0CATPe2W3SwOpDKllSmH9KgZGseV9o5z+ToGW94spu9WnZLpV/AU7NbuXx2NGq1Gj5yj4e8aGxKn3510YKLWersavXAlHer9WpR4sHz0r8iCAbRRBj7o8I+CFGbtU6nbJoiBEes1y6+mR/3NikT9VLIWSvnmkzuh97qrsLGrN8ZxC0fVT1nWHa9nHfVwaS20em3xnqbh87f38wHj+6/x8+LiyfP47/Pn8cIz5//AFBFgA8F1J0kwAAAABJRU5ErkJggg==) no-repeat 50%;
        background-size: 100% 100%;
    }
    .form .submit {
        background: #e85d53;
        font-size: 1.0rem;
        color: #fff;
        border: none;
        font-weight: 500;
        border-radius: 5px;
        padding: .6rem .6rem;
        margin-top: .5rem;
        width: 100%;
    }
    .toast {
        position:fixed;
        top:40%;
        margin-top:-28px;
        width:100%;
        font-size:16px;
        text-align:center;
        z-index:10
    }
    .toast>p{display:inline-block;margin:0 auto;padding:16px;color:#fff;background-color:rgba(0,0,0,.8);border-radius:5px}

</style>
<template>

    <div>
        <section class="content">
            <li class="content-item form">
                <label class = "content-title" style="color: red">
                    <span>我要参与</span>
                </label>
                <ul class="input-container">
                    <li class="input-item">
                        <span class="input-i user"></span>
                        <input class="info-input name" placeholder="姓名" v-model="user.user_name">
                    </li>
                    <li class="input-item">
                        <span class="input-i phone"></span>
                        <input class="info-input phone-num" placeholder="手机号码"  v-model="user.phone_no"  maxlength="11">
                    </li>

                    <li>
                        <button class="btn submit" v-on:click="buyItem(1)"> 提交支付 </button>
                        <button class="btn submit" style="background: green" v-on:click="buyItem(0)"> 到店体验 </button>
                    </li>
                </ul>
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
    import { buyItem, jsSdkData, getUserStatus, joinAct } from '../api/api'
    export default {
        name: 'Index',

        data () {
            return {
                dialogShow: false,
                dialogContent: "",
                user: {
                    user_name:"",
                    phone_no:"",
                }
            }
        },
        methods: {
            buyItem(type) {
                // 姓名验证！
                if (!this.user.user_name){
                    this.toast("请输入姓名！")
                    return
                }
                // 手机验证
                if (!this.user.phone_no || !this.user.phone_no.match(/1\d{10}/)){
                    this.toast("要求输入正确的手机号码！")
                    return
                }

                if(1 === type){
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
                }else{
                    joinAct(this.user).then((response) => {
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
                }

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


