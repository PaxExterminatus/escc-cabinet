<template>
    <router-link :to="{name: 'course', params: { courseId: id }}">
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
