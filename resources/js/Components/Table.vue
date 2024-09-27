<template>
    <div class="overflow-x-auto m-8">
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th v-for="(header, index) in props.labels" :key="index" class="py-2 px-4 border-b">
                        {{ header }}
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(row, rowIndex) in tableData" :key="rowIndex" class="hover:bg-gray-50">
                    <td v-for="(header, colIndex) in props.headers" :key="colIndex" class="py-2 px-4 border-b">
                        {{ row[header] }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script setup>
import { defineProps, ref, onMounted, watch } from 'vue';
import axios from 'axios';

const props = defineProps({
    endpoint: {
        type: String,
        required: true
    },
    headers: {
        type: Array,
        required: true
    },
    labels: {
        type: Array,
        required: true
    }
});

const tableData = ref([]);

const getData = async () => {
    try {
        const response = await axios.get(props.endpoint);

        tableData.value = response.data;

    } catch (error) {
        console.error('Erro ao buscar dados:', error);
    }
};

onMounted(() => {
    getData();
});

watch(() => props.endpoint, () => {
    getData();
});

</script>