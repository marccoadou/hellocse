<script setup lang="ts">
defineProps({
  starId: Number,
  firstName: String,
  lastName: String,
  description: String,
  imageUrl: String
})
</script>
<template>
  <div
    href="#"
    class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row hover:bg-gray-100"
  >
    <img
      class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg"
      :src="imageUrl"
      alt=""
    />
    <div class="flex flex-col justify-between w-full p-4 leading-normal">
      <h5 class="mb-4 text-2xl font-bold tracking-tight text-gray-900">
        {{ firstName + ' ' + lastName }}
      </h5>
      <p class="mb-3 font-normal text-gray-700">{{ description }}</p>
    </div>
  </div>
</template>
