<template>
    <div class="flex items-center space-x-6 p-4 bg-white rounded-lg shadow-sm m-8">
        <InputDate v-model:value="startDate" label="Data Inicio" id="startDate" />
        <InputDate v-model:value="endDate" label="Data Fim" id="endDate" />
        <button @click="search" class="text-white rounded-md bg-blue-600 p-1 -">Buscar</button>
    </div>
</template>

<script setup>
import { onMounted, ref } from 'vue'
import InputDate from '@/Components/InputDate.vue'

const startDate = ref();
const endDate = ref();

const dateFilterQuery = defineModel('dateFilterQuery');

onMounted(() => {
    search();
});

const search = () => {
    let timestamp_end = new Date(endDate.value);
    let timestamp_start = new Date(startDate.value);

    if (timestamp_end.getTime() < timestamp_start.getTime()) {
        endDate.value = startDate.value;
    }

    dateFilterQuery.value = `?start_date=${startDate.value}&end_date=${endDate.value}`;
};
</script>
