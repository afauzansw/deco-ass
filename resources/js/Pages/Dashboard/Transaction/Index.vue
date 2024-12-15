<script setup>
import { route } from 'ziggy-js';
import BackofficeLayout from '../../../Layout/BackofficeLayout.vue'
import { router } from '@inertiajs/vue3'

const props = defineProps({
    transactions: Array,
});

function approve(id) {
    router.put(route('dashboard.transaction.status', id));
}

</script>

<template>
    <BackofficeLayout :title="'Transaksi'">
        <div class="mt-2">
            <div class="max-w-full mb-7 mx-auto mx-4 p-6 bg-white shadow-lg rounded-lg">
                <table class="min-w-full table-auto border-collapse">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-left border-b border-gray-300">#</th>
                            <th class="px-4 py-2 text-left border-b border-gray-300">Nama</th>
                            <th class="px-4 py-2 text-left border-b border-gray-300">No Telp</th>
                            <th class="px-4 py-2 text-left border-b border-gray-300">Total Harga</th>
                            <th class="px-4 py-2 text-left border-b border-gray-300">Status</th>
                            <th class="px-4 py-2 text-left border-b border-gray-300">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-gray-50 hover:bg-gray-100" v-for="transaction in transactions"
                            :key="transaction.id">
                            <td class="px-4 py-2 border-b border-gray-200">{{ transaction.id }}</td>
                            <td class="px-4 py-2 border-b border-gray-200">{{ transaction.receipt_name }}</td>
                            <td class="px-4 py-2 border-b border-gray-200">{{ transaction.phone_number }}</td>
                            <td class="px-4 py-2 border-b border-gray-200">{{ transaction.price.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' }) }}</td>
                            <td v-if="transaction.status === 'UNPAID'" class="px-4 py-2 border-b border-gray-200">
                                <span class="px-4 py-2 bg-yellow-200 text-yellow-800 text-sm font-semibold rounded-md">Menunggu</span>
                            </td>
                            <td v-if="transaction.status === 'PAID'" class="px-4 py-2 border-b border-gray-200">
                                <span class="px-4 py-2 bg-green-200 text-green-800 text-sm font-semibold rounded-md">Dikonfirmasi</span>
                            </td>
                            <td class="px-4 py-2 border-b border-gray-200 space-x-3">
                                <button @click="approve(transaction.id)" v-if="transaction.status === 'UNPAID'" class="px-4 py-2 bg-green-500 text-white rounded-full text-sm">
                                    <i class="fa-regular fa-circle-check mr-1"></i>
                                    Konfirmasi
                                </button>
                                <a :href="route('dashboard.transaction.show', transaction.id)" class="px-4 py-2 bg-blue-500 text-white rounded-full text-sm">
                                    <i class="fa-regular fa-eye mr-1"></i>
                                    Lihat
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </BackofficeLayout>
</template>
