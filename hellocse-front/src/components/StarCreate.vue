<script setup lang="ts">
import axios from 'axios'
import router from "@/router";

let star = {
  firstName: '',
  lastName: '',
  file: null,
  description: ''
}

const onUploadFile = (payload: Event): void => {
  star.file = payload?.target?.files[0]
}
const submit = (e: Event) => {
  e.preventDefault()
  axios.postForm(`${import.meta.env.VITE_API_ENDPOINT}/stars`, {
    image: star.file,
    firstName: star.firstName,
    lastName: star.lastName,
    description: star.description
  })
}
</script>
<template>
  <p class="mb-4 text-xl text-gray-900">Create a star</p>
  <form action="" class="flex flex-col w-full gap-4">
    <div class="flex flex-row w-full gap-4">
      <div class="w-full">
        <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900"
          >First Name</label
        >
        <input
          type="text"
          id="default-input"
          v-model="star.firstName"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
        />
      </div>
      <div class="w-full">
        <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900"
          >Last Name</label
        >
        <input
          type="text"
          id="default-input"
          v-model="star.lastName"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
        />
      </div>
    </div>
    <div>
      <label class="block mb-2 text-sm font-medium text-gray-900" for="file_input"
        >Upload file</label
      >
      <input
        @change="onUploadFile"
        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none"
        aria-describedby="file_input_help"
        id="file_input"
        type="file"
      />
      <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">
        SVG, PNG, JPG or GIF (MAX. 2M).
      </p>
    </div>
    <div>
      <label for="message" class="block mb-2 text-sm font-medium text-gray-900">Description</label>
      <textarea
        id="message"
        rows="4"
        v-model="star.description"
        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
        placeholder="Your description of the star..."
      ></textarea>
    </div>
    <button
      type="button"
      @click="submit"
      class="ml-auto w-1/2 focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2"
    >
      Valider
    </button>
  </form>
</template>
