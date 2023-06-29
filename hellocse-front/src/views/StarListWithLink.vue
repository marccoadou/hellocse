<script setup lang="ts">
import axios from 'axios'
import StarCardWithLink from '../components/StarCardWithLink.vue'
import { ref, onMounted } from 'vue'

const stars = ref<Star[]>([])
const getStars = () => {
  axios
    .get<Star[]>('http://localhost:8000/api/stars')
    .then((res) => (stars.value = res.data.data))
    .catch((error) => console.log(error.message))
}

onMounted(() => {
  getStars()
})
</script>

<template>
  <main class="flex flex-col justify-center w-full gap-4">
    <div v-for="star in stars" :key="star.starId" class="">
      <StarCardWithLink
        :star-id="star.starId"
        :first-name="star.firstName"
        :last-name="star.lastName"
        :description="star.description"
        :image-url="star.imageUrl"
      />
    </div>
  </main>
</template>
