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
  <router-link
    :to="{ name: 'edit-star', params: { id: starId } }"
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
      <a
        href="#"
        class="inline-flex items-center w-20 px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300"
      >
        Edit
        <svg
          aria-hidden="true"
          class="w-4 h-4 ml-2 -mr-1"
          fill="currentColor"
          viewBox="0 0 20 20"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            fill-rule="evenodd"
            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
            clip-rule="evenodd"
          ></path>
        </svg>
      </a>
    </div>
  </router-link>
</template>
