<script setup lang="ts">
import axios from 'axios'
import { ref, onMounted } from 'vue'
import { useRoute } from 'vue-router'

const id = useRoute().params.id

const star = ref<Star | undefined>()
const getStars = (id: string | string[]) => {
    axios
        .get<Star>(`http://localhost:8000/api/stars/` + id)
        .then((res) => (star.value = res.data.data))
        .catch((error) => console.log(error.message))
}

onMounted(() => {
    getStars(id)
})

let image: File | null = null

const onUploadFile = (payload: Event): void => {
    image = payload?.target?.files[0]
}

const submit = (e: Event) => {
    e.preventDefault()
    axios.postForm(`http://localhost:8000/api/stars/${id}?_method=PATCH`, {
        image: image,
        firstName: star.value?.firstName,
        lastName: star.value?.lastName,
        description: star.value?.description
    },
        {
            headers: {
                "Content-Type": "multipart/form-data",
            }
        }
    )
}

const deleteStar = (e: Event) => {
    e.preventDefault()
    if (confirm('This will delete the star, are you sure?')) {
        axios.delete(`http://localhost:8000/api/stars/${id}`)
    }
}
</script>
<template>
    <div>
        <div v-if="star">
            <form action="" class="flex flex-col w-full gap-4">
                <div class="flex flex-row w-full gap-4">
                    <div class="w-full">
                        <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900">First Name</label>
                        <input type="text" id="default-input" v-model="star.firstName"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                    </div>
                    <div class="w-full">
                        <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900">Last Name</label>
                        <input type="text" id="default-input" v-model="star.lastName"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                    </div>
                </div>
                <div>
                    <div>
                        <p class="mb-4 text-gray-900 text-md">Current picture</p>
                        <img class="object-cover w-full rounded-lg h-96 md:h-auto md:w-48" :src="star.imageUrl" alt="" />
                    </div>

                    <label class="block mb-2 text-sm font-medium text-gray-900" for="file_input">Upload new picture</label>
                    <input @change="onUploadFile"
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50"
                        aria-describedby="file_input_help" id="file_input" type="file" />
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">
                        SVG, PNG, JPG or GIF (MAX. 2M).
                    </p>
                </div>
                <div>
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900">Description</label>
                    <textarea id="message" rows="4" v-model="star.description"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Your description of the Star..."></textarea>
                </div>
                <div class="flex flex-row gap-4">
                    <button type="button" @click="deleteStar"
                        class="w-1/2 focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                        Delete
                    </button>
                    <button type="button" @click="submit"
                        class="w-1/2 focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                        Edit
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>
