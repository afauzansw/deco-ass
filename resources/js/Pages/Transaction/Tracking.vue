<script setup>
import { toRefs } from 'vue'
import { router } from '@inertiajs/vue3'
import { route } from 'ziggy-js';

const props = defineProps({
    transaction: Object,
});

const { transaction } = toRefs(props);
</script>

<template>
    <div class="max-w-lg mx-auto bg-white shadow-md rounded-lg p-6 border-l-4 border-[#1D55FF]">
        <div class="flex items-center justify-center mb-4">
            <div class="w-16 h-16 bg-[#1D55FF] rounded-full flex items-center justify-center relative">
                <i class="fas fa-check-circle text-white text-3xl absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"></i>
            </div>
        </div>
        <div class="text-center">
            <p class="text-gray-500 font-semibold">{{ transaction.number }}</p>
            <p class="text-body">{{ transaction.created_at_ind }}</p>
            <p v-if="transaction.status === 'UNPAID'" class="mt-4 py-3 text-body mt-2 bg-yellow-200 rounded-md font-semibold text-[#FE3F9B]">Menunggu Konfirmasi</p>
            <p v-if="transaction.status === 'PAID'" class="mt-4 py-3 text-body mt-2 bg-blue-200 rounded-md font-semibold text-[#FE3F9B]">Telah Dikonfirmasi</p>
        </div>
    </div>

</template>
