<script setup>
import { ref } from 'vue';
import { router } from '@inertiajs/vue3';
import { route } from 'ziggy-js';

const logout = () => {
    router.post(route('auth.logout'), );
};
</script>

<template>
    <header class="relative bg-white dark:bg-darker">
        <div class="flex items-center justify-between p-2 border-b dark:border-primary-darker">

            <!-- Brand -->
            <a href="index.html"
                class="inline-block text-2xl font-bold tracking-wider uppercase text-primary-dark dark:text-light">

            </a>

            <!-- Desktop Right buttons -->
            <nav aria-label="Secondary" class="hidden space-x-2 md:flex md:items-center">

                <div class="relative">
                    <form @submit.prevent="logout" class="space-y-6">
                        <button type="submit"
                            class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary">
                            Logout
                        </button>
                    </form>
                </div>
            </nav>

        </div>
    </header>
</template>
