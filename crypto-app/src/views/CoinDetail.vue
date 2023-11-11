<template>
  <template v-if="isLoading">Loading...</template>
  <div v-else class="grid grid-cols-1 lg:grid-cols-3 mb-4">
    <div class="col-span-3 md:col-span-2">
      <div class="grid grid-cols-2">
        <div class="col-span-2 md:col-span-2">
          <div class="inline-flex items-center px-2 py-0.5 rounded-md text-xs font-medium bg-gray-800 text-gray-100 mb-1 md:mb-0 md:mt-0">
            Rank #{{coin.market_cap_rank}}
          </div>
          <div class="flex text-gray-900 mt-2 items-center">
            <img class="rounded-full" :alt="coin.name" height="28" width="28" :src="coin.image">
            <h1 class="m-0 text-base break-all">
              <span class="font-bold text-gray-900 text-xl md:text-lg leading-7 ml-2 mr-1">
                {{ coin.name }}
              </span>
              <span class="font-normal text-gray-500 text-base leading-6 mt-0.5 uppercase">
                {{coin.symbol}}
              </span>
            </h1> </div>
          <div class="grid-cols-3 mb-1 md:flex">
            <div class="col-span-3 lg:col-span-2">
              <div class="text-4xl font-bold my-2 flex items-center">
                <span class="text-gray-900 text-3xl"><span class="no-wrap">{{ formattedDollar(coin.current_price) }}</span></span>
                <span class="live-percent-change ml-2 text-xl"><span class="break-words" :class="computeClassText(coin.price_change_percentage_24h)">{{ 0.9 }}%</span></span>
              </div>
              <div class="text-gray-500 text-normal mb-3">
                <div class="mb-0.5">
                  {{numberWithCommas(coin.total_volume)}}
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-span-2 lg:col-span-2 text-sm">
          <div class="grid grid-cols-2">
            <div class="tailwind-reset col-span-2 lg:col-span-1">
              <div class="flex justify-between w-full h-10 py-2.5 lg:border-t-0 border-b border-gray-200 pl-0">
                <span class="text-gray-500">
                  Market Cap
                </span>
                <span class="text-gray-900 font-medium no-wrap">{{formattedDollar(coin.market_cap)}}</span>
              </div>
              <div class="flex justify-between w-full h-10 py-2.5 lg:border-t-0 border-b border-gray-200 pl-0">
                <span class="text-gray-500">
                  High 24 Hour
                </span>
                <span class="text-gray-900 font-medium no-wrap">{{formattedDollar(coin.high_24h)}}</span>
              </div>
              <div class="flex justify-between w-full h-10 py-2.5 lg:border-t-0 border-b border-gray-200 pl-0">
                <span class="text-gray-500">
                  Low 24 Hour
                </span>
                <span class="text-gray-900 font-medium no-wrap">{{formattedDollar(coin.low_24h)}}</span>
              </div>
            </div>
            <div class="tailwind-reset lg:pl-4 col-span-2 lg:col-span-1">
              <div class="flex justify-between w-full h-10 py-2.5 lg:border-t-0 border-b border-gray-200 pl-0">
                <span class="text-gray-500">
                  Circulating Supply
                </span>
                <span class="text-gray-900 font-medium no-wrap">{{numberWithCommas(coin.circulating_supply)}}</span>
              </div>
              <div class="flex justify-between w-full h-10 py-2.5 lg:border-t-0 border-b border-gray-200 pl-0">
                <span class="text-gray-500">
                  Total Supply
                </span>
                <span class="text-gray-900 font-medium no-wrap">{{numberWithCommas(coin.total_supply)}}</span>
              </div>
              <div class="flex justify-between w-full h-10 py-2.5 lg:border-t-0 border-b border-gray-200 pl-0">
                <span class="text-gray-500">
                  Max Supply
                </span>
                <span class="text-gray-900 font-medium no-wrap">{{numberWithCommas(coin.max_supply)}}</span>
              </div>
            </div>
          </div>
        </div>

        <div class="col-span-2 mt-6">
          <h2 class="text-2xl font-bold">
            {{ coin.name }} Price Chart ({{ coin.symbol }})
          </h2>
        </div>
        <div class="col-span-1 mt-3">
          <img loading="lazy" class="w-full" :alt="coin.name" :src="chart">
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import {computed, onMounted, ref, watch} from "vue";
import axios from "@/axios/index.js";
import {useRoute} from "vue-router";
import {formattedDollar, numberWithCommas} from "@/helpers/currency.js";
import {computeClassText} from "@/helpers/styling.js";

export default {
  setup() {
    const route = useRoute()
    const coin = ref({});
    const isLoading = ref(false);

    const getDetail = async () => {
      try {
        isLoading.value = true;
        const identifier = route.params.id;
        const response = await axios.get(`/coin/${identifier}`);
        coin.value = response.data;
        isLoading.value = false;
      } catch (error) {
        console.error('Error fetching data:', error);
      }
    }


    onMounted(() => getDetail());

    watch(
        () => route.params.id,
        () => getDetail()
    )

    const chart = computed(() => {
      if (!coin.value.image) return null;
      const originalImageProp = coin.value.image;
      const regex = /\/(\d+)\//;
      const match = originalImageProp.match(regex);
      if (match) {
        const number = match[1];
        return `https://www.coingecko.com/coins/${number}/sparkline.svg`
      }
      return null;
    })

    return {
      coin,
      isLoading,
      chart,
    };
  },
  methods: {
    formattedDollar,
    computeClassText,
    numberWithCommas
  }
}
</script>