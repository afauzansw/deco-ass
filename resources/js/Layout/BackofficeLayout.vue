<script>
import Sidebar from '../Components/Sidebar.vue'
import DashboardFooter from '../Components/DashboardFooter.vue'
import DashboardHeader from '../Components/DashboardHeader.vue'

export default {
    name: 'BackofficeLayout',
    components: {
        Sidebar,
        DashboardFooter,
        DashboardHeader,
    },
    props: {
        title: {
            type: String,
        }
    },
};
</script>

<template>
    <div x-data="setup()">
        <div class="flex h-screen antialiased text-gray-900 bg-gray-100 dark:bg-dark dark:text-light">
            <!-- Sidebar -->
            <Sidebar />

            <div class="flex-1 h-full overflow-x-hidden overflow-y-auto">
                <!-- Navbar -->
                <DashboardHeader />

                <!-- Main content -->
                <main>
                    <div class="px-8">
                        <!-- Content header -->
                        <div
                            class="flex items-center justify-between py-4 border-b lg:py-6 dark:border-primary-darker">
                            <h1 class="text-2xl font-semibold">{{ title }}</h1>
                            <a href="https://github.com/Kamona-WD/kwd-dashboard" target="_blank"
                                class="px-4 py-2 text-sm text-white rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring focus:ring-primary focus:ring-offset-1 focus:ring-offset-white dark:focus:ring-offset-dark">
                                View on github
                            </a>
                        </div>


                        <slot />
                    </div>
                </main>

                <!-- Main footer -->
                <!-- <DashboardFooter/> -->
            </div>
        </div>
    </div>
</template>


<style>
:root {
    --light: #edf2f9;
    --dark: #152e4d;
    --darker: #12263f;
    /*  */
    --color-primary: var(--color-cyan);
    --color-primary-50: var(--color-cyan-50);
    --color-primary-100: var(--color-cyan-100);
    --color-primary-light: var(--color-cyan-light);
    --color-primary-lighter: var(--color-cyan-lighter);
    --color-primary-dark: var(--color-cyan-dark);
    --color-primary-darker: var(--color-cyan-darker);
    /*  */
    --color-green: #16a34a;
    --color-green-50: #f0fdf4;
    --color-green-100: #dcfce7;
    --color-green-light: #22c55e;
    --color-green-lighter: #4ade80;
    --color-green-dark: #15803d;
    --color-green-darker: #166534;
    /*  */
    --color-blue: #2563eb;
    --color-blue-50: #eff6ff;
    --color-blue-100: #dbeafe;
    --color-blue-light: #3b82f6;
    --color-blue-lighter: #60a5fa;
    --color-blue-dark: #1d4ed8;
    --color-blue-darker: #1e40af;
    /*  */
    --color-cyan: #0891b2;
    --color-cyan-50: #ecfeff;
    --color-cyan-100: #cffafe;
    --color-cyan-light: #06b6d4;
    --color-cyan-lighter: #22d3ee;
    --color-cyan-dark: #0e7490;
    --color-cyan-darker: #155e75;
    /*  */
    --color-teal: #0d9488;
    --color-teal-50: #f0fdfa;
    --color-teal-100: #ccfbf1;
    --color-teal-light: #14b8a6;
    --color-teal-lighter: #2dd4bf;
    --color-teal-dark: #0f766e;
    --color-teal-darker: #115e59;
    /*  */
    --color-fuchsia: #c026d3;
    --color-fuchsia-50: #fdf4ff;
    --color-fuchsia-100: #fae8ff;
    --color-fuchsia-light: #d946ef;
    --color-fuchsia-lighter: #e879f9;
    --color-fuchsia-dark: #a21caf;
    --color-fuchsia-darker: #86198f;
    /*  */
    --color-violet: #7c3aed;
    --color-violet-50: #f5f3ff;
    --color-violet-100: #ede9fe;
    --color-violet-light: #8b5cf6;
    --color-violet-lighter: #a78bfa;
    --color-violet-dark: #6d28d9;
    --color-violet-darker: #5b21b6;
}
</style>
