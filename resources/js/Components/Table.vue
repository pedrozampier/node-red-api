<template>
    <div class="overflow-x-auto m-8">
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="py-2 px-4 border-b">Temperatura</th>
                    <th class="py-2 px-4 border-b">Eficiência</th>
                    <th class="py-2 px-4 border-b">Data e hora</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(row, index) in combinedData" :key="index" class="hover:bg-gray-50">
                    <td class="py-2 px-4 border-b">{{ row.temperature }}</td>
                    <td class="py-2 px-4 border-b">{{ row.efficiency }}</td>
                    <td class="py-2 px-4 border-b">{{ row.recorded_at }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script setup>
import { defineProps, onBeforeMount, ref, watch } from 'vue';
import axios from 'axios';

const props = defineProps({
    endpoint: {
        type: String,
        required: true
    }
});

const combinedData = ref([]);

const getData = async () => {
    try {
        const response = await axios.get(props.endpoint);

        const { temperature, efficiency, recorded_at } = response.data;

        combinedData.value = temperature.map((temp, index) => ({
            temperature: temp,
            efficiency: efficiency[index],
            recorded_at: recorded_at[index]
        }));

    } catch (error) {
        console.error(error);
    }
};

onBeforeMount(() => {
    getData();
});

watch(() => props.endpoint, () => {
    getData();
});

</script>