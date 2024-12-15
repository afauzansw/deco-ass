<script setup>
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";
import { router } from '@inertiajs/vue3'
import { route } from 'ziggy-js';

const props = defineProps({
    error: String,
});

const form = useForm({
    email: "",
    password: "",
});

function submit() {
    router.post(route("auth.attempt"), form);
}

</script>

<template>
    <div>
        <div
            class="flex flex-col items-center justify-center min-h-screen p-4 space-y-4 antialiased text-gray-900 bg-gray-100 dark:bg-dark dark:text-light">
            <main>
                <div class="w-full max-w-sm px-4 py-6 space-y-6 bg-white rounded-md dark:bg-darker">
                    <h1 class="text-xl font-semibold text-center">Login</h1>

                    <div v-if="error" class="text-red-500 text-sm">
                        {{ error }}
                    </div>

                    <form @submit.prevent="submit" class="space-y-6">
                        <input
                            class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker"
                            type="email" v-model="form.email" placeholder="Email address" />
                        <input
                            class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-primary-100 dark:focus:ring-primary-darker"
                            type="password" v-model="form.password" placeholder="Password" />
                        <div>
                            <button type="submit"
                                class="w-full px-4 py-2 font-medium text-center text-white rounded-md bg-green-600">
                                Login
                            </button>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>
</template>
