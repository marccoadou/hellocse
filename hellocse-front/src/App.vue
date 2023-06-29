<script setup lang="ts">
import { RouterView } from 'vue-router'
</script>

<template>
  <div class="container mx-auto p-4">
    <nav class="flex flex-row gap-4 justify-center items-center pb-4">
      <router-link to="/" class="px-4 py-2" active-class="bg-green-500 rounded-sm text-white"
        >Home</router-link
      >
      <router-link
        to="/manage-star"
        class="px-4 py-2"
        active-class="bg-green-500 rounded-sm text-white"
        >Edit list</router-link
      >
      <router-link
        to="/manage-star/create"
        class="px-4 py-2"
        active-class="bg-green-500  rounded-sm text-white"
        >Create a Star</router-link
      >
    </nav>
    <RouterView />
  </div>
</template>
