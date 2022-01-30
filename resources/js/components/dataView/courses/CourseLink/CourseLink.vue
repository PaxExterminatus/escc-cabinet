<template>
    <router-link :to="{ name: 'course', params: { course: id }}">
        <slot></slot>
    </router-link>
</template>

<script>
export default {
    props: {
        id: {
            required: true,
        },
    },
}
</script>

