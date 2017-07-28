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
        padding: .6rem .2rem .6rem 2.5rem;
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
        background: #04be02;
        font-size: 1.0rem;
        color: #fff;
        border: none;
        font-weight: 500;
        border-radius: 5px;
        padding: .6rem .6rem;
        margin-top: .5rem;
        width: 100%;
    }

</style>
<template>

    <div>
        <section class="content">
            <li class="content-item form">
                <label class = "content-title" style="color: red">
                    <span>参与活动</span>
                </label>

                <p style="color: red;text-align: center;font-size: large">您的好友邀请您体验免费</p>
                <p>&nbsp;</p>
                <p>
                    <label>邀请人：</label> {{ orderDetail.user_name }}
                </p>

                <p v-if = "!orderDetail.share_phone_no">
                    <label>邀请状态：</label> {{  orderDetail.share_phone_no ? "分享成功": "未分享"}}
                </p>
                <p>&nbsp;</p>

                <ul class="input-container" v-if="!orderDetail.share_phone_no">
                    <li class="input-item">
                        <span class="input-i user"></span>
                        <input class="info-input name" placeholder="姓名" v-model="user.user_name">
                    </li>
                    <li class="input-item">
                        <span class="input-i phone"></span>
                        <input class="info-input phone-num" placeholder="手机号码"  v-model="user.phone_no"  maxlength="11">
                    </li>
                    <li>
                        <button class="btn submit" v-on:click="getItem()"> 立即领取 </button>
                    </li>
                </ul>

                <p v-if = "orderDetail.status && orderDetail.share_phone_no">
                    <br/>
                    <label>被邀请人：</label> {{ orderDetail.share_user }}<br/>
                    <label>手机号码：</label> {{ orderDetail.share_phone_no }}
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
    import { getItems } from '../api/api'
    export default {
        name: 'Index',
        props: {
            orderDetail: Object
        },

        data () {
            return {
                user: {
                    user_name: "",
                    phone_no: "",
                },
                dialogShow: false,
                dialogContent: "",
            }
        },
        created() {
        },
        methods: {
            getItem() {
                // 手机验证
                if (!this.user.user_name){
                    this.toast('请输入姓名')
                    return
                }
                if (!this.user.phone_no || !this.user.phone_no.match(/1\d{10}/)){
                    this.toast('请输入正确的手机号码')
                    return
                }
                getItems({
                    user_name: this.user.user_name,
                    phone_no: this.user.phone_no,
                    order_id: this.$route.query.order_id
                }).then((response) => {
                    if(0 !== response.statusCode){
                        this.toast(response.msg)
                        return
                    }else{
                        this.toast('领取成功,了解更多活动详情！')
                        this.$router.push('/')
                    }
                }).catch((error) => {
                    console.log(error)
                })
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


