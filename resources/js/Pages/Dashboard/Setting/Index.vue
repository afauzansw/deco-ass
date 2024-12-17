<script setup>
import BackofficeLayout from '../../../Layout/BackofficeLayout.vue'
import { Head } from '@inertiajs/vue3'
import { reactive } from 'vue'
import { router } from '@inertiajs/vue3'

const props = defineProps({
    setting: Object,
});

const setting = reactive({
    account_name: props.setting.account_name,
    account_number: props.setting.account_number,
    account_channel: props.setting.account_channel,
})

function submit() {
    router.put('/dashboard/setting/update', setting)
}
</script>

<template>
    <BackofficeLayout :title="'Setting'">
        <div class="mt-2">
            <div class="max-w-full mb-7 mx-auto mx-4 p-6 bg-white shadow-lg rounded-lg">
                <form @submit.prevent="submit">
                    <div class="mb-5">
                        <label for="account_name" class="mb-2">Pemilik Nomer Rekening</label>
                        <input
                            class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker"
                            type="text" id="account_name" placeholder="Email address"
                            v-model="setting.account_name" />
                    </div>
                    <div class="mb-5">
                        <label for="account_number" class="mb-2">Nomer Rekening</label>
                        <input
                            class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker"
                            type="text" id="account_number" placeholder="Email address"
                            v-model="setting.account_number" />
                    </div>
                    <div class="mb-5">
                        <label class="mb-2">Nama Bank</label>
                        <input for="account_channel"
                            class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker"
                            type="text" id="account_channel" placeholder="Email address"
                            v-model="setting.account_channel" />
                    </div>

                    <button type="submit" class="px-5 py-2 rounded-lg bg-green-600 text-white">Simpan</button>
                </form>
            </div>
        </div>
    </BackofficeLayout>
</template>
