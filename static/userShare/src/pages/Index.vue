
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
            }
        }
    }
</script>


