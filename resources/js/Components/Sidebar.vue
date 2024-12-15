<script>
export default {
    name: 'Sidebar',
};
</script>

<template>
    <aside class="flex-shrink-0 hidden w-64 bg-white border-r dark:border-primary-darker dark:bg-darker md:block">
        <div class="flex flex-col h-full">
            <nav aria-label="Main" class="flex-1 px-2 py-4 space-y-2 overflow-y-hidden hover:overflow-y-auto">
                <div>
                    <a href="/dashboard"
                        class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
                        aria-haspopup="true">
                        <span class="ml-2 text-sm"> Dashboards </span>
                    </a>
                </div>

                <div>
                    <a href="/dashboard/transaction"
                        class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
                        aria-haspopup="true">
                        <span class="ml-2 text-sm"> Transaksi </span>
                    </a>
                </div>

                <div>
                    <a href="/dashboard/setting"
                        class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
                        aria-haspopup="true">
                        <span class="ml-2 text-sm"> Setting </span>
                    </a>
                </div>
            </nav>
        </div>
    </aside>
</template>
