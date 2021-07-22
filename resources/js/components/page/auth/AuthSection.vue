<template>
    <div class="page-section">
        <AppHeader></AppHeader>

        <main class="content-main">
            <router-view/>
        </main>

        <footer>
            footer
        </footer>
    </div>
</template>

<script>
import AppHeader from 'cmp/page/template/AppHeader';

export default {
    components: {
        AppHeader,
    },
}
</script>
