<template>
  <div>
  	<h5>heloo</h5>
    <ul>
      <li v-for="post in laravelData.data" :key="post.id">{{ post.title }}</li>
    </ul>

    <Bootstrap5Pagination
      :data="laravelData"
      @pagination-change-page="getResults"
  />
  </div>
</template>

<script setup>
import { ref } from 'vue';
import { Bootstrap5Pagination } from 'laravel-vue-pagination';

const laravelData = ref({});

const getResults = async (page = 1) => {
    const response = await fetch(`/api/products?page=${page}`);
    laravelData.value = await response.json();
}

getResults();
</script>