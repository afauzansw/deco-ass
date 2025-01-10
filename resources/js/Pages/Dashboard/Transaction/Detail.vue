<script setup>
import { route } from 'ziggy-js';
import BackofficeLayout from '../../../Layout/BackofficeLayout.vue'

const props = defineProps({
    transaction: Object,
});

</script>

<template>
    <BackofficeLayout :title="'Detail Transaksi'">
        <div class="mt-2">
            <div class="max-w-full mb-7 mx-auto mx-4 p-6 bg-white shadow-lg rounded-lg">
                <div class="max-w-full mx-auto p-4 bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-6 mb-4">
                            <div class="grid grid-cols-12 gap-4">
                                <div class="col-span-4 mb-4">
                                    ID Transaksi
                                </div>
                                <div class="col-span-8 mb-4 font-semibold">
                                    {{ transaction.number }}
                                </div>
                                <div class="col-span-4 mb-4">
                                    Nama Penerima
                                </div>
                                <div class="col-span-8 mb-4 font-semibold">
                                    {{ transaction.receipt_name }}
                                </div>
                                <div class="col-span-4 mb-4">
                                    Email
                                </div>
                                <div class="col-span-8 mb-4 font-semibold">
                                    {{ transaction.email }}
                                </div>
                                <div class="col-span-4 mb-4">
                                    Nomor HP
                                </div>
                                <div class="col-span-8 mb-4 font-semibold">
                                    {{ transaction.phone_number }}
                                </div>
                                <div class="col-span-4 mb-4">
                                    Produk
                                </div>
                                <div class="col-span-8 mb-4 font-semibold">
                                    Deco-Ass bag
                                </div>
                                <div class="col-span-4 mb-4">
                                    Harga
                                </div>
                                <div class="col-span-8 mb-4 font-semibold">
                                    {{ transaction.price }}
                                </div>
                                <div class="col-span-4 mb-4">
                                    Status
                                </div>
                                <div v-if="transaction.status === 'UNPAID'" class="col-span-8 mb-4 font-semibold">
                                    <span
                                        class="px-4 py-2 bg-yellow-200 text-yellow-800 text-sm font-semibold rounded-md">Menunggu</span>
                                </div>
                                <div v-if="transaction.status === 'PAID'" class="col-span-8 mb-4 font-semibold">
                                    <span
                                        class="px-4 py-2 bg-green-200 text-green-800 text-sm font-semibold rounded-md">Dikonfirmasi</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-6 mb-4">
                            <div class="grid grid-cols-12 gap-4">
                                <div class="col-span-4 mb-4">
                                    Alamat
                                </div>
                                <div class="col-span-8 mb-4 font-semibold">
                                    {{ transaction.receipt_name }}
                                </div>
                                <div class="col-span-4 mb-4">
                                    Desa
                                </div>
                                <div class="col-span-8 mb-4 font-semibold">
                                    {{ transaction.village }}
                                </div>
                                <div class="col-span-4 mb-4">
                                    Kode Post
                                </div>
                                <div class="col-span-8 mb-4 font-semibold">
                                    {{ transaction.post_code }}
                                </div>
                                <div class="col-span-4 mb-4">
                                    Kecamatan
                                </div>
                                <div class="col-span-8 mb-4 font-semibold">
                                    {{ transaction.subdistrict }}
                                </div>
                                <div class="col-span-4 mb-4">
                                    Kabupaten
                                </div>
                                <div class="col-span-8 mb-4 font-semibold">
                                    {{ transaction.regency }}
                                </div>
                                <div class="col-span-4 mb-4">
                                    Provinsi
                                </div>
                                <div class="col-span-8 mb-4 font-semibold">
                                    {{ transaction.province }}
                                </div>
                                <div class="col-span-4 mb-4">
                                    URL Foto
                                </div>
                                <div class="col-span-8 mb-4 font-semibold">
                                    <a :href="transaction.photo_url" target="_blank" rel="noopener noreferrer"
                                        class="text-blue-500 underline">
                                        Link
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="bg-gray-500 w-full">

                    <div class="mt-7">
                        <p>Bukti Pembayaran</p>
                        <img :src="transaction.photo_url" class="mt-4 mx-auto h-[400px]" alt="Example Image" />
                    </div>

                </div>
            </div>
        </div>
    </BackofficeLayout>
</template>
