<template>
    <div>
        <section class="content">
            <ul>
                <li class="content-item">
                    <label class = "content-title">
                        <span>活动说明</span>
                    </label>
                    <p>
                        1. 填写姓名和手机号，完成支付，可体验活动项目任意项目三次，并且获得一次好友免费体验名额。
                    </p>
                    <p>
                        2. 保证提交信息真实有效。
                    </p>
                    <p>
                        3. 所提交信息不会向任何人透露。
                    </p>
                    <p>
                        4. 提交信息之后，我们客服人员会尽快和取得联系，预约体验时间和最近的门店。
                    </p>
                    <p>
                        5. 活动最终解释权归德理堂版权所有。
                    </p>
                </li>

                <li class="content-item">
                    <label class = "content-title">
                        <span>活动门店</span>
                    </label>
                    <div v-for="shop in shops">
                        <p>门店：{{shop.shopName}}</p>
                        <p>门店电话：{{shop.tel}}</p>
                        <p>门店地址：{{shop.addr}}</p>
                        <p>&nbsp;</p>
                    </div>
                </li>
            </ul>
        </section>
    </div>

</template>

<script>
    export default {
        data () {
            return {
                shops:[
                    {
                        shopName:"德理堂莱蒙店",
                        tel:"0791-86807978 或 177770065786",
                        addr:"南昌红谷滩万达广场会展路与沙井路交接的莱蒙写字楼B区915室",
                    },
                    {
                        shopName:"德理堂名门店",
                        tel:"0791-86807978 或 88537978",
                        addr:"南昌红谷滩新区金融大街和世贸路交接路口名门世家2期东入门8号楼526室",
                    }
                ]
            }
        }
    }
</script>


