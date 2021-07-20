<template>
    <div id="app" class="application">
        <div id="nav">
            <router-link :to="{name: 'signin'}">Sign in</router-link> |
        </div>
        <router-view></router-view>
    </div>
</template>

<script>
export default {

}
</script>
