<script setup>
import PublicLayout from '../Layout/PublicLayout.vue'
import { reactive, toRefs } from 'vue'
import { router } from '@inertiajs/vue3'
import { route } from 'ziggy-js';

const props = defineProps({
    images: Object,
    setting: Object,
});

const image = reactive({
    logo: props.images.logo,
    banner: props.images.banner,
    mockups: props.images.mockup,
    currentIndex: 0,
    slideDirection: '',
})

const transaction = reactive({
    receipt_name: '',
    address: '',
    village: '',
    post_code: '',
    subdistrict: '',
    regency: '',
    province: '',
    email: '',
    phone_number: '',
    photo: null,
    price: '',
})

const trackOrder = reactive({
    number: '',
    email: '',
})

function handleFileChange(event) {
    transaction.photo = event.target.files[0];
}

function checkout() {
    const formData = new FormData();

    for (const key in transaction) {
        formData.append(key, transaction[key]);
    }

    router.post('/checkout', formData, {
        headers: {
            'Content-Type': 'multipart/form-data',
        },
    });
}

function track() {
    router.post(route('transaction.track'), trackOrder)
}

function nextImage() {
    image.currentIndex = (image.currentIndex + 1) % image.mockups.length;
}

function prevImage() {
    image.currentIndex = (image.currentIndex - 1 + image.mockups.length) % image.mockups.length;
}

const { setting } = toRefs(props);

</script>

<template>
    <PublicLayout>
        <header id="header" class="group px-6">
            <nav class="mt-4 fixed overflow-hidden z-20 w-full border-b bg-white/50 backdrop-blur-2xl rounded-2xl">
                <div class="px-6 m-auto max-w-6xl 2xl:px-0">
                    <div class="flex flex-wrap items-center justify-between py-2 sm:py-4">
                        <div class="w-full items-center flex justify-between lg:w-auto">
                            <a href="/" aria-label="tailus logo">
                                <img :src="image.logo" class="h-16" alt="Example Image" />
                            </a>
                        </div>
                        <div
                            class="w-full group-data-[state=active]:h-fit h-0 lg:w-fit flex-wrap justify-end items-center space-y-8 lg:space-y-0 lg:flex lg:h-fit md:flex-nowrap">
                            <div class="mt-6 md:-ml-4 lg:pr-4 lg:mt-0">
                                <ul class="space-y-6 tracking-wide text-base lg:text-sm lg:flex lg:space-y-0">
                                    <li>
                                        <a href="#home" class="hover:link md:px-4 block">
                                            <span>Beranda</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#about" class="hover:link md:px-4 block">
                                            <span>Tentang</span>
                                        </a>
                                    </li>

                                </ul>
                            </div>

                            <div
                                class="w-full space-y-2 gap-2 pt-6 pb-4 lg:pb-0 border-t items-center flex flex-col lg:flex-row lg:space-y-0 lg:w-fit lg:border-l lg:border-t-0 lg:pt-0 lg:pl-2">
                                <a class="btn px-6 py-2 bg-[#F5B0AE] text-[#333333] font-semibold rounded-full"
                                    href="#buy">
                                    <span>Beli Sekarang!</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <main class="overflow-hidden">
            <section id="home"
                class="h-screen relative bg-gradient-to-r from-[#FDD9D8] via-[#E1D8E5] to-[#C5D8F2] overflow-hidden">
                <div class="absolute top-0 left-0 right-0 -translate-y-full">
                    <svg class="w-full h-auto" viewBox="0 0 1440 100" xmlns="http://www.w3.org/2000/svg" fill="none">
                        <path d="M0 100h1440V0s-120 45-240 45-240-45-480-45S480 90 240 90 0 45 0 45v55Z"
                            fill="#FDD9D8" />
                    </svg>
                </div>

                <div class="relative py-36">
                    <div class="mx-auto px-6 max-w-6xl">

                    </div>
                </div>

                <div class="absolute bottom-0 left-0 right-0 translate-y-full">
                    <svg class="w-full h-auto" viewBox="0 0 1440 100" xmlns="http://www.w3.org/2000/svg" fill="none">
                        <path d="M0 0h1440v55s-120-45-240-45-240 45-480 45-480-90-720-90V0Z" fill="#A2BDE6" />
                    </svg>
                </div>
            </section>

            <div class="relative mt-[-43px] lg:mt-[-152px]">
                <svg viewBox="0 0 1428 174" version="1.1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g transform="translate(-2.000000, 44.000000)" fill="#F4F4F5" fill-rule="nonzero">
                            <path
                                d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496"
                                opacity="0.100000001"></path>
                            <path
                                d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
                                opacity="0.100000001"></path>
                            <path
                                d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z"
                                id="Path-4" opacity="0.200000003"></path>
                        </g>
                        <g transform="translate(-4.000000, 76.000000)" fill="#F4F4F5" fill-rule="nonzero">
                            <path
                                d="M0.457,34.035 C57.086,53.198 98.208,65.809 123.822,71.865 C181.454,85.495 234.295,90.29 272.033,93.459 C311.355,96.759 396.635,95.801 461.025,91.663 C486.76,90.01 518.727,86.372 556.926,80.752 C595.747,74.596 622.372,70.008 636.799,66.991 C663.913,61.324 712.501,49.503 727.605,46.128 C780.47,34.317 818.839,22.532 856.324,15.904 C922.689,4.169 955.676,2.522 1011.185,0.432 C1060.705,1.477 1097.39,3.129 1121.236,5.387 C1161.703,9.219 1208.621,17.821 1235.4,22.304 C1285.855,30.748 1354.351,47.432 1440.886,72.354 L1441.191,104.352 L1.121,104.031 L0.457,34.035 Z">
                            </path>
                        </g>
                    </g>
                </svg>
            </div>

            <section id="about" class="py-24 bg-gray-100">
                <div class="mx-auto px-6 max-w-6xl">
                    <div class="text-center">
                        <h2 class="text-3xl text-[#333333] font-semibold">Tentang Produk Kami</h2>
                        <div class="mt-2 mx-auto bg-[#F5B0AE] rounded-full h-1 w-1/6"></div>
                        <div class="mt-12 grid grid-cols-12 space-x-4 gap-4 mx-auto w-4/6">
                            <div class="col-span-6 mb-4 relative">
                                <img :src="image.mockups[image.currentIndex]" class="h-64 mx-auto"
                                    alt="Example Image" />
                                <button @click="prevImage"
                                    class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-300 hover:bg-gray-400 text-white rounded-full px-3 py-2">
                                    &#8592;
                                </button>
                                <button @click="nextImage"
                                    class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-300 hover:bg-gray-400 text-white rounded-full px-3 py-2">
                                    &#8594;
                                </button>
                            </div>

                            <div class="col-span-6 mb-4">
                                <p class="text-[#383838] text-left">Kdetek merupakan tools kesehatan
                                    untuk
                                    mendeteksi penyakit kronis dalam waktu dini dengan efektif dan efisien. Difasilitasi
                                    fitur score berdasarkan refrensi jurnal, research, dan pedoman komunitas yang
                                    up-to-date
                                    setiap hari.</p>
                                <p class="mt-4 text-[#383838] text-left">Kdetek menyediakan 3 buku
                                    yaitu: Deteksi Diabetes Melitus, Tiroid, dan Jantung Koroner.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="about" class="py-24 bg-gray-100">
                <div class="mx-auto px-6 max-w-6xl">
                    <div class="text-center">
                        <h2 class="text-3xl text-[#333333] rounded-full font-semibold">Formulir Pembelian</h2>
                        <div class="mt-2 mx-auto bg-[#F5B0AE] h-1 w-1/6"></div>
                    </div>
                    <form @submit.prevent="checkout">
                        <div class="mt-12 mx-auto text-center w-1/2">
                            <div class="mb-4">
                                <label class="block mb-1 font-medium text-left" for="receipt_name">Nama
                                    Penerima</label>
                                <input class="input py-2 px-4 variant-mixed" placeholder="Abdul Ghofur" type="text"
                                    id="receipt_name" required v-model="transaction.receipt_name">
                                <span class="hidden peer-disabled:text-gray-600 text-gray-500 text-sm">Helper
                                    message</span>
                            </div>
                            <div class="mb-4">
                                <label class="block mb-1 font-medium text-left" for="address">Alamat</label>
                                <input class="input py-2 px-4 variant-mixed" placeholder="Jl. Hati Mulia No.5"
                                    type="text" id="address" required v-model="transaction.address">
                                <span class="hidden peer-disabled:text-gray-600 text-gray-500 text-sm">Helper
                                    message</span>
                            </div>
                            <div class="grid grid-cols-12 gap-4">
                                <div class="col-span-9 mb-4">
                                    <label class="block mb-1 font-medium text-left" for="email">Desa /
                                        Kelurahan</label>
                                    <input class="input py-2 px-4 variant-mixed" placeholder="Pandean" type="text"
                                        id="email" required v-model="transaction.village">
                                    <span class="hidden peer-disabled:text-gray-600 text-gray-500 text-sm">Helper
                                        message</span>
                                </div>
                                <div class="col-span-3 mb-4">
                                    <label class="block mb-1 font-medium text-left" for="post_code">Kode Pos</label>
                                    <input class="input py-2 px-4 variant-mixed" placeholder="56231" type="text"
                                        id="post_code" required v-model="transaction.post_code">
                                    <span class="hidden peer-disabled:text-gray-600 text-gray-500 text-sm">Helper
                                        message</span>
                                </div>
                            </div>
                            <div class="grid grid-cols-12 gap-4">
                                <div class="col-span-6 mb-4">
                                    <label class="block mb-1 font-medium text-left" for="email">Kecamatan</label>
                                    <input class="input py-2 px-4 variant-mixed" placeholder="Lowokwaru" type="text"
                                        id="email" required v-model="transaction.subdistrict">
                                    <span class="hidden peer-disabled:text-gray-600 text-gray-500 text-sm">Helper
                                        message</span>
                                </div>
                                <div class="col-span-6 mb-4">
                                    <label class="block mb-1 font-medium text-left" for="email">Kabupaten</label>
                                    <input class="input py-2 px-4 variant-mixed" placeholder="Malang" type="text"
                                        id="email" required v-model="transaction.regency">
                                    <span class="hidden peer-disabled:text-gray-600 text-gray-500 text-sm">Helper
                                        message</span>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="block mb-1 font-medium text-left" for="province">Provinsi</label>
                                <input class="input py-2 px-4 variant-mixed" placeholder="Jl. Hati Mulia No.5"
                                    type="text" id="province" required v-model="transaction.province">
                                <span class="hidden peer-disabled:text-gray-600 text-gray-500 text-sm">Helper
                                    message</span>
                            </div>
                            <div class="grid grid-cols-12 gap-4">
                                <div class="col-span-6 mb-4">
                                    <label class="block mb-1 font-medium text-left" for="email">Email</label>
                                    <input class="input py-2 px-4 variant-mixed" placeholder="kdetek@gmail.com"
                                        type="email" id="email" required v-model="transaction.email">
                                    <span class="hidden peer-disabled:text-gray-600 text-gray-500 text-sm">Helper
                                        message</span>
                                </div>
                                <div class=" col-span-6 mb-4">
                                    <label class="block mb-1 font-medium text-left" for="phone">Nomer HP</label>
                                    <input class="input py-2 px-4 variant-mixed" placeholder="0896 7366 3546" type="tel"
                                        id="phone" required v-model="transaction.phone_number">
                                    <span class="hidden peer-disabled:text-gray-600 text-gray-500 text-sm">Helper
                                        message</span>
                                </div>
                            </div>
                            <div class=" col-span-6 mb-4">
                                <label class="block mb-1 font-medium text-left" for="email">Harga</label>
                                <input class="input py-2 px-4 variant-mixed" type="text" id="price" required
                                    v-model="transaction.price" readonly>
                                <span class="hidden peer-disabled:text-gray-600 text-gray-500 text-sm">Helper
                                    message</span>
                            </div>
                            <div class="mb-4">
                                <label class="block mb-1 font-medium text-left" for="email">Bukti Pembayaran</label>
                                <input type="file" id="file-upload"
                                    class="input py-2 px-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-[#1D55FF] focus:ring-opacity-50"
                                    required @change="handleFileChange">
                                <span class="hidden peer-disabled:text-gray-600   text-gray-500   text-sm">Helper
                                    message</span>
                            </div>
                            <button type="submit"
                                class="mt-2 py-2 bg-[#F5B0AE] font-semibold text-[#333333] w-full rounded-full">Pesan</button>
                        </div>
                    </form>
                </div>
            </section>
        </main>

        <footer>
            <div class="variant-outlined bg-gray-100">
                <div class="max-w-6xl mx-auto space-y-16 px-6 pb-8 border-t 2xl:px-0">
                    <div class="border-b pb-8">

                    </div>
                    <div class="flex items-center justify-between rounded-md px-6">
                        <span class="text-[#333333]">DeCo-Ass &copy; 2024</span>
                        <a href="#" class="text-sm text-body hover:text-primary-600">Licence</a>
                    </div>
                </div>
            </div>
        </footer>
    </PublicLayout>
</template>
