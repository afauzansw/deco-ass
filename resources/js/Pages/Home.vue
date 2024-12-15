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
    product: '',
    photo: null,
    price: '',
})

const trackOrder = reactive({
    number: '',
    email: '',
})

const products = [
    { id: 'bundling', name: 'Bundling 3 Buku', price: 50000 },
    { id: 'ddm', name: 'Deteksi Diabetes Melitus', price: 20000 },
    { id: 'dt', name: 'Deteksi Tiroid', price: 20000 },
    { id: 'djk', name: 'Deteksi Jantung Koroner', price: 20000 },
];

function handleFileChange(event) {
    transaction.photo = event.target.files[0];
}

function handleProductChange(event) {
    const selectedProduct = products.find(product => product.id == event.target.value);
    if (selectedProduct) {
        transaction.price = selectedProduct.price;
    }
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
            <nav
                class="mt-4 fixed overflow-hidden z-20 w-full border-b bg-white/50 dark:bg-gray-950/50 backdrop-blur-2xl rounded-2xl">
                <div class="px-6 m-auto max-w-6xl 2xl:px-0">
                    <div class="flex flex-wrap items-center justify-between py-2 sm:py-4">
                        <div class="w-full items-center flex justify-between lg:w-auto">
                            <a href="/" aria-label="tailus logo">
                                <img :src="image.logo" class="h-12" alt="Example Image" />
                            </a>
                        </div>
                        <div
                            class="w-full group-data-[state=active]:h-fit h-0 lg:w-fit flex-wrap justify-end items-center space-y-8 lg:space-y-0 lg:flex lg:h-fit md:flex-nowrap">
                            <div class="mt-6 dark:text-body md:-ml-4 lg:pr-4 lg:mt-0">
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

                                    <li>
                                        <a href="#track" class="hover:link md:px-4 block">
                                            <span>Lacak Pemesanan</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#step" class="hover:link md:px-4 block">
                                            <span>Cara Beli</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div
                                class="w-full space-y-2 gap-2 pt-6 pb-4 lg:pb-0 border-t items-center flex flex-col lg:flex-row lg:space-y-0 lg:w-fit lg:border-l lg:border-t-0 lg:pt-0 lg:pl-2">
                                <a class="btn px-6 py-2 bg-[#1D55FF] text-white font-semibold rounded-full" href="#buy">
                                    <span>Beli Sekarang!</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <main class="overflow-hidden">
            <section class="relative" id="home">
                <img :src="image.banner" class="w-full" alt="Example Image" />
            </section>

            <section id="about" class="py-24 bg-gray-100">
                <div class="mx-auto px-6 max-w-6xl">
                    <div class="text-center">
                        <h2 class="text-3xl text-[#383838] dark:text-white font-semibold">Tentang Produk Kami
                        </h2>
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
                                <p class="text-[#383838] dark:text-gray-300 text-left">Kdetek merupakan tools kesehatan
                                    untuk
                                    mendeteksi penyakit kronis dalam waktu dini dengan efektif dan efisien. Difasilitasi
                                    fitur score berdasarkan refrensi jurnal, research, dan pedoman komunitas yang
                                    up-to-date
                                    setiap hari.</p>
                                <p class="mt-4 text-[#383838] dark:text-gray-300 text-left">Kdetek menyediakan 3 buku
                                    yaitu: Deteksi Diabetes Melitus, Tiroid, dan Jantung Koroner.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="track"
                class="relative bg-gradient-to-r from-[#a6c8ff] via-[#c59efb] to-[#ffd5e9] overflow-hidden">
                <div class="absolute top-0 left-0 right-0 -translate-y-full">
                    <svg class="w-full h-auto" viewBox="0 0 1440 100" xmlns="http://www.w3.org/2000/svg" fill="none">
                        <path d="M0 100h1440V0s-120 45-240 45-240-45-480-45S480 90 240 90 0 45 0 45v55Z"
                            fill="#a6c8ff" />
                    </svg>
                </div>

                <div class="relative py-36">
                    <div class="mx-auto px-6 max-w-6xl">
                        <div class="text-center">
                            <h2 class="text-3xl text-[#383838] font-semibold">Lacak Pemesanan Anda!</h2>
                            <p class="mt-2 text-[#383838]">Lihat status pesanan anda dan download buku PDF.</p>
                        </div>
                        <form @submit.prevent="track">
                            <div class="mt-12 mx-auto text-center w-1/2">
                                <div class="mb-4">
                                    <label class="block mb-1 font-medium text-left" for="number">ID Transaksi</label>
                                    <input class="input py-2 px-4 variant-mixed" placeholder="TR-xxxx" type="text"
                                        id="number" required v-model="trackOrder.number">
                                </div>
                                <div class="mb-4">
                                    <label class="block mb-1 font-medium text-left" for="email">Email</label>
                                    <input class="input py-2 px-4 variant-mixed" placeholder="kdetek@gmail.com"
                                        type="email" id="email" required v-model="trackOrder.email">
                                </div>
                                <button type="submit"
                                    class="mt-2 py-2 bg-[#1D55FF] text-white w-full rounded-full">Lacak</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="absolute bottom-0 left-0 right-0 translate-y-full">
                    <svg class="w-full h-auto" viewBox="0 0 1440 100" xmlns="http://www.w3.org/2000/svg" fill="none">
                        <path d="M0 0h1440v55s-120-45-240-45-240 45-480 45-480-90-720-90V0Z" fill="#c59efb" />
                    </svg>
                </div>
            </section>

            <section id="step" class="py-24 bg-gray-100">
                <div class="mx-auto px-6 max-w-6xl">
                    <div class="text-center">
                        <h2 class="text-3xl text-[#383838] font-semibold">Anda Tertarik?</h2>
                        <p class="mt-2 text-[#383838]">Masukkan data dan lakukan pembayaran, lalu tunggu konfirmasi.</p>
                    </div>

                    <div class="mt-16 max-w-6xl space-y-10">
                        <div class="flex items-center space-x-4">
                            <div
                                class="flex-shrink-0 w-12 h-12 bg-blue-500 text-white flex items-center justify-center rounded-full">
                                1</div>
                            <div>
                                <h3 class="text-xl font-semibold">Masukkan Data</h3>
                                <p class="text-gray-600">Isi formulir dengan lengkap sesuai dengan petunjuk.</p>
                            </div>
                        </div>

                        <div class="flex items-center space-x-4">
                            <div
                                class="flex-shrink-0 w-12 h-12 bg-blue-500 text-white flex items-center justify-center rounded-full">
                                2</div>
                            <div>
                                <h3 class="text-xl font-semibold">Lakukan Pembayaran</h3>
                                <p class="text-gray-600">Transfer ke rekening <span
                                        class="font-semibold">{{ setting.account_number }} ({{ setting.account_channel
                                        }})</span> a/n {{ setting.account_name }} <br> dan upload bukti pemayaran melalui
                                    formulir tadi.
                                </p>
                            </div>
                        </div>
                        
                        <div class="flex items-center space-x-4">
                            <div
                                class="flex-shrink-0 w-12 h-12 bg-blue-500 text-white flex items-center justify-center rounded-full">
                                3</div>
                            <div>
                                <h3 class="text-xl font-semibold">Tunggu Konfirmasi</h3>
                                <p class="text-gray-600">Setelah pembayaran selesai, tunggu konfirmasi dari kami.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section id="buy"
                class="relative bg-gradient-to-r from-[#a6c8ff] via-[#c59efb] to-[#ffd5e9] overflow-hidden">
                <div class="absolute top-0 left-0 right-0 -translate-y-full">
                    <svg class="w-full h-auto" viewBox="0 0 1440 100" xmlns="http://www.w3.org/2000/svg" fill="none">
                        <path d="M0 100h1440V0s-120 45-240 45-240-45-480-45S480 90 240 90 0 45 0 45v55Z"
                            fill="#a6c8ff" />
                    </svg>
                </div>

                <div class="relative py-36">
                    <div class="mx-auto px-6 max-w-6xl">
                        <div class="text-center">
                            <h2 class="text-3xl text-[#383838] font-semibold">Pesan Sekarang Juga!</h2>
                            <p class="mt-2 text-[#383838]">Masukkan data dan lakukan pembayaran, lalu tunggu konfirmasi.
                            </p>
                        </div>
                        <form @submit.prevent="checkout">
                            <div class="mt-12 mx-auto text-center w-1/2">
                                <div class="mb-4">
                                    <label class="block mb-1 font-medium text-left" for="receipt_name">Nama
                                        Penerima</label>
                                    <input class="input py-2 px-4 variant-mixed" placeholder="Abdul Ghofur" type="text"
                                        id="receipt_name" required v-model="transaction.receipt_name">
                                    <span
                                        class="hidden peer-disabled:text-gray-600 dark:peer-disabled:text-gray-400 text-gray-500 dark:text-gray-400 text-sm">Helper
                                        message</span>
                                </div>
                                <div class="mb-4">
                                    <label class="block mb-1 font-medium text-left" for="address">Alamat</label>
                                    <input class="input py-2 px-4 variant-mixed" placeholder="Jl. Hati Mulia No.5"
                                        type="text" id="address" required v-model="transaction.address">
                                    <span
                                        class="hidden peer-disabled:text-gray-600 dark:peer-disabled:text-gray-400 text-gray-500 dark:text-gray-400 text-sm">Helper
                                        message</span>
                                </div>
                                <div class="grid grid-cols-12 gap-4">
                                    <div class="col-span-9 mb-4">
                                        <label class="block mb-1 font-medium text-left" for="email">Desa /
                                            Kelurahan</label>
                                        <input class="input py-2 px-4 variant-mixed" placeholder="Pandean" type="text"
                                            id="email" required v-model="transaction.village">
                                        <span
                                            class="hidden peer-disabled:text-gray-600 dark:peer-disabled:text-gray-400 text-gray-500 dark:text-gray-400 text-sm">Helper
                                            message</span>
                                    </div>
                                    <div class="col-span-3 mb-4">
                                        <label class="block mb-1 font-medium text-left" for="post_code">Kode Pos</label>
                                        <input class="input py-2 px-4 variant-mixed" placeholder="56231" type="text"
                                            id="post_code" required v-model="transaction.post_code">
                                        <span
                                            class="hidden peer-disabled:text-gray-600 dark:peer-disabled:text-gray-400 text-gray-500 dark:text-gray-400 text-sm">Helper
                                            message</span>
                                    </div>
                                </div>
                                <div class="grid grid-cols-12 gap-4">
                                    <div class="col-span-6 mb-4">
                                        <label class="block mb-1 font-medium text-left" for="email">Kecamatan</label>
                                        <input class="input py-2 px-4 variant-mixed" placeholder="Lowokwaru" type="text"
                                            id="email" required v-model="transaction.subdistrict">
                                        <span
                                            class="hidden peer-disabled:text-gray-600 dark:peer-disabled:text-gray-400 text-gray-500 dark:text-gray-400 text-sm">Helper
                                            message</span>
                                    </div>
                                    <div class="col-span-6 mb-4">
                                        <label class="block mb-1 font-medium text-left" for="email">Kabupaten</label>
                                        <input class="input py-2 px-4 variant-mixed" placeholder="Malang" type="text"
                                            id="email" required v-model="transaction.regency">
                                        <span
                                            class="hidden peer-disabled:text-gray-600 dark:peer-disabled:text-gray-400 text-gray-500 dark:text-gray-400 text-sm">Helper
                                            message</span>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="block mb-1 font-medium text-left" for="province">Provinsi</label>
                                    <input class="input py-2 px-4 variant-mixed" placeholder="Jl. Hati Mulia No.5"
                                        type="text" id="province" required v-model="transaction.province">
                                    <span
                                        class="hidden peer-disabled:text-gray-600 dark:peer-disabled:text-gray-400 text-gray-500 dark:text-gray-400 text-sm">Helper
                                        message</span>
                                </div>
                                <div class="grid grid-cols-12 gap-4">
                                    <div class="col-span-6 mb-4">
                                        <label class="block mb-1 font-medium text-left" for="email">Email</label>
                                        <input class="input py-2 px-4 variant-mixed" placeholder="kdetek@gmail.com"
                                            type="email" id="email" required v-model="transaction.email">
                                        <span
                                            class="hidden peer-disabled:text-gray-600 dark:peer-disabled:text-gray-400 text-gray-500 dark:text-gray-400 text-sm">Helper
                                            message</span>
                                    </div>
                                    <div class=" col-span-6 mb-4">
                                        <label class="block mb-1 font-medium text-left" for="phone">Nomer HP</label>
                                        <input class="input py-2 px-4 variant-mixed" placeholder="0896 7366 3546"
                                            type="tel" id="phone" required v-model="transaction.phone_number">
                                        <span
                                            class="hidden peer-disabled:text-gray-600 dark:peer-disabled:text-gray-400 text-gray-500 dark:text-gray-400 text-sm">Helper
                                            message</span>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="block mb-1 font-medium text-left" for="email">Produk</label>
                                    <select class="input py-2 px-4 variant-mixed" id="product" placeholder="0896 7366 3546" @change="handleProductChange" required v-model="transaction.product">
                                        <option v-for="product in products" :key="product.id" :value="product.id">
                                            {{ product.name }}
                                        </option>
                                    </select>
                                    <span
                                        class="hidden peer-disabled:text-gray-600 dark:peer-disabled:text-gray-400 text-gray-500 dark:text-gray-400 text-sm">Helper
                                        message</span>
                                </div>
                                <div class=" col-span-6 mb-4">
                                    <label class="block mb-1 font-medium text-left" for="email">Harga</label>
                                    <input class="input py-2 px-4 variant-mixed" type="text" id="price" required
                                        v-model="transaction.price" readonly>
                                    <span
                                        class="hidden peer-disabled:text-gray-600 dark:peer-disabled:text-gray-400 text-gray-500 dark:text-gray-400 text-sm">Helper
                                        message</span>
                                </div>
                                <div class="mb-4">
                                    <label class="block mb-1 font-medium text-left" for="email">Bukti Pembayaran</label>
                                    <input type="file" id="file-upload"
                                        class="input py-2 px-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-[#1D55FF] focus:ring-opacity-50"
                                        required @change="handleFileChange">
                                    <span
                                        class="hidden peer-disabled:text-gray-600 dark:peer-disabled:text-gray-400 text-gray-500 dark:text-gray-400 text-sm">Helper
                                        message</span>
                                </div>
                                <button type="submit"
                                    class="mt-2 py-2 bg-[#1D55FF] text-white w-full rounded-full">Pesan</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="absolute bottom-0 left-0 right-0 translate-y-full">
                    <svg class="w-full h-auto" viewBox="0 0 1440 100" xmlns="http://www.w3.org/2000/svg" fill="none">
                        <path d="M0 0h1440v55s-120-45-240-45-240 45-480 45-480-90-720-90V0Z" fill="#c59efb" />
                    </svg>
                </div>
            </section>
        </main>

        <footer>
            <div class="variant-outlined bg-gray-100">
                <div class="max-w-6xl mx-auto space-y-16 px-6 py-16 2xl:px-0">
                    <div class="flex flex-wrap items-center justify-between gap-4 border-b pb-8">
                        <a href="/" aria-label="tailus logo">
                            <img :src="image.logo" class="h-14" alt="Example Image" />
                        </a>
                    </div>
                    <div class="flex items-center justify-between rounded-md px-6 py-3 card bg-[#FFCFDF]">
                        <span class="text-[#383838]">K D.E.T.E.K &copy; 2024</span>
                        <a href="#"
                            class="text-sm text-body hover:text-primary-600 dark:hover:text-primary-500">Licence</a>
                    </div>
                </div>
            </div>
        </footer>
    </PublicLayout>
</template>
