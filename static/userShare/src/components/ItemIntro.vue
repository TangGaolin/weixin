<style>

</style>
<template>
    <div>
        <section class="content">
            <ul>
                <li class="content-item" v-for="(item, index) in items">
                    <label class = "content-title">
                        <span>福利{{index + 1}}: {{item.itemName}}</span>
                    </label>
                    <p>市场客单价: <s> {{item.itemPrice}} 元 </s>
                    <p>{{item.itemDesc}}</p>
                </li>

            </ul>
        </section>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                items:[
                    {
                        itemName:"扶阳罐",
                        itemPrice:"398.00",
                        itemDesc:"扶阳罐以“温刮温灸亚健康调理技术”为核心，传承了中医经典养生文化，展示了我国数千年的中医养生之道，首次成功实现热能、红外线、磁疗的同步导入，真正做到排毒祛瘀、驱寒祛湿，有效宣通瘀结的经络、温补虚损的阳气，",
                    },
                    {
                        itemName:"雪肌放晒",
                        itemPrice:"199.00",
                        itemDesc:"加速新陈代谢，疏通经络，畅通气血，深层排除面部毒素，促进血液循环，美白淡斑，提升面部轮廓，使皮肤从内到外紧实红润，通透有光泽。",
                    },
                    {
                        itemName:"能量养生",
                        itemPrice:"166.00",
                        itemDesc:"畅通气血，通经活络，儒养脏腑，养颜美容，延缓衰老，提高机体免疫力，和机体抗病能力。",
                    }
                ]
            }
        }
    }
</script>


