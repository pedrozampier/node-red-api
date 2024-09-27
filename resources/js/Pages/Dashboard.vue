<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Table from '@/Components/Table.vue';
import DateSearch from '@/Components/DateSearch.vue';
import { Head } from '@inertiajs/vue3';
import { ref, watch } from 'vue';

const dateFilterQuery = ref('');

const headers = ref([
    'efficiency',
    'temperature',
    'recorded_at',
]);

const labels = ref([
    'Eficiência',
    'Temperatura',
    'Data de Registro',
]);

watch(() => dateFilterQuery.value, () => {
    console.log(dateFilterQuery.value)
});
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                Dashboard
            </h2>
        </template>
        
        <div>
            <DateSearch v-model:dateFilterQuery="dateFilterQuery" />
        </div>
        <div>
            <Table :endpoint="`/machine-temperature${dateFilterQuery}`" :headers="headers" :labels="labels" />
        </div>

    </AuthenticatedLayout>
</template>
