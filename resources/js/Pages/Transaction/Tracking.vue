<script setup>
import { reactive } from 'vue'
import { router } from '@inertiajs/vue3'

const props = defineProps({
    images: Object,
});

const image = reactive({
    logo: props.images.logo,
    banner: props.images.banner,
})

function submit() {
  router.post('/checkout', form)
}

</script>

<template>
</template>
