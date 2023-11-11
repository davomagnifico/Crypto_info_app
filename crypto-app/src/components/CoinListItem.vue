<template>
  <tr class="h-[60px] max-h-[60px] overflow-hidden">
    <td class="sticky md:relative left-0 md:left-auto py-2">
      {{ index + 1 }}
    </td>
    <td class="py-2 sticky md:relative left-[40px] md:left-auto">
      <div class="flex items-center">
        <img class="mr-1 lg:mr-2 h-5 w-5 overflow-hidden min-w-[20px] min-h-[20px]" :alt="coin.name" :src="coin.image">
        <RouterLink :to="{name: 'CoinDetail', params: {id: coin.symbol}}" class="flex flex-auto items-start md:flex-row flex-col">
          <span class="lg:flex font-bold items-center justify-between">
            {{ coin.name }}
          </span>
          <span class="d-lg-inline font-normal text-3xs ml-0 md:ml-2 md:self-center text-gray-500 uppercase">
            {{ coin.symbol }}
          </span>
        </RouterLink>
      </div>
    </td>
    <td class="td-price price text-right py-2">
      <div class="flex justify-between items-center gap-2">
        <div class="flex-1">
          <span class="whitespace-nowrap">{{ formattedDollar(coin.current_price) }}</span>
        </div>
      </div>
    </td>
    <td class="text-right py-2">
      <span class="break-words" :class="computeClassText(coin.price_change_percentage_24h)">{{ parseFloat(coin.price_change_percentage_24h).toFixed(2) }}%</span>
    </td>
    <td class="text-right py-2">
      <span class="whitespace-nowrap">{{ formattedDollar(coin.market_cap) }}</span>
    </td>
    <td class="cursor-pointer p-0 pl-2 text-center">
      <img loading="lazy" width="135" height="50" :alt="coin.name" :src="chart">
    </td>
  </tr>
</template>
<script>
import {computed, ref} from "vue";
import {formattedDollar} from "@/helpers/currency.js";
import {computeClassText} from "@/helpers/styling.js";

export default {
  props: {
    coin: {
      required: true
    },
    index: {
      required: true
    }
  },
  setup(props) {
    const chart = computed(() => {
      if (!props.coin.image) return null;
      const originalImageProp = props.coin.image;
      const regex = /\/(\d+)\//;
      const match = originalImageProp.match(regex);
      if (match) {
        const number = match[1];
        return `https://www.coingecko.com/coins/${number}/sparkline.svg`
      }
      return null;
    })

    return {
      chart
    }
  },
  methods: {
    formattedDollar,
    computeClassText
  }
}
</script>