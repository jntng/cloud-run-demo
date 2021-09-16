<template>
    <div class="">
<!--        {{ aaa }}-->
        <div v-for="(coin, index) of aaa">
            <div class="">
                <div class="bg-gray-800 text-white">
                    <div class="container mx-auto">時間{{  coin['time'] }}</div>
                </div>
                <div class="bg-gray-700 text-white">
                    <div class="container mx-auto">最低價格{{  coin['celling_price_24H']  }}</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['aaa'],
    }
</script>
