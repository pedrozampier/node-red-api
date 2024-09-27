<template>
    <div>
        <div class="relative">
            <label :for="id"
                class="absolute text-sm text-gray-500 rounded-lg duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white  px-2 peer-focus:px-2 peer-focus:text-blue-900 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 left-1">{{ label }}</label>
            <input v-model="value" type="datetime-local" :name="name" :id="id"
                class="block px-2.5 pb-1.5 pt-3 w-full text-sm text-gray-900 bg-white rounded-lg border-1 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-blue-900 peer"
                placeholder="" />
        </div>
    </div>
</template>

<script setup>

const value = defineModel('value')

const props = defineProps({
    name: {
        type: String,
        required: false,
    },
    id: {
        type: String,
        required: true,
    },
    label: {
        type: String,
        required: true,
    },
})

</script>