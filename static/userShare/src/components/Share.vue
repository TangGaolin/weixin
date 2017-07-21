<template>
    <div class="hello">
        <article class="weui-article">
            <h1>你请客，我买单</h1>
            <section>
                <h2 class="title">走进德理堂，寻觅健康美</h2>
                <section>
                    <div class="weui-btn-area">
                        <button class="weui-btn weui-btn_primary" id="showTooltips" v-on:click="sharePage">分享给你要请客的好友</button>
                    </div>
                </section>
            </section>
        </article>

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
            sharePage() {

            }
        }
    }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
</style>
