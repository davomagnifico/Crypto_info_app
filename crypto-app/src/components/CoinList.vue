<template>
  <template v-if="isLoading">Loading...</template>
  <div v-else class="relative">
    <div class="overflow-x-auto w-full block lg:table">
      <table class="min-w-[600px] text-sm w-full overflow-y-hidden tabled-coin">
        <thead class="sticky top-0 z-1">
        <tr>
          <th class="w-[40px] sticky md:relative left-0 md:left-auto min-w-[40px] max-w-[40px] font-semibold py-4">
            #
          </th>
          <th class="font-semibold py-4 w-3/12 md:w-5/12 sticky md:relative left-[40px] md:left-auto">
            Coin
          </th>
          <th class="font-semibold py-4">
            Price
          </th>
          <th class="font-semibold py-4">
            24h
          </th>
          <th class="font-semibold py-4">
            Mkt Cap
          </th>
          <th class="font-semibold py-4">
            Last 7 Days
          </th>
        </tr>
        </thead>
        <tbody data-target="currencies.contentBox" data-controller="coin-row-ads">
          <CoinListItem v-for="(coin, index) in coins" :coin="coin" :index="index"/>
        </tbody>
      </table>
    </div>
  </div>
</template>
<script>
import { ref, onMounted } from 'vue';
import axios from "@/axios"
import CoinListItem from "@/components/CoinListItem.vue";

export default {
  components: {CoinListItem},
  setup() {
    const coins = ref([]);
    const isLoading = ref(false);
    onMounted(async () => {
      try {
        isLoading.value = true;
        const response = await axios.get('/coin');
        coins.value = response.data;
        isLoading.value = false;
      } catch (error) {
        console.error('Error fetching data:', error);
      }
    });

    return {
      coins,
      isLoading,
    };
  },
};
</script>