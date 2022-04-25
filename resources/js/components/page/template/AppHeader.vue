<template>
    <header class="app-header-component">
        <Toolbar>
            <template #start>
                <div class="header-logo">
                    ЕШКО
                    <div class="text-xs">
                        <a href="https://www.eshko.by/cabinet">старый кабинет</a>
                    </div>
                </div>
                <slot></slot>
            </template>
            <template #end>
                <slot name="right"></slot>
            </template>
        </Toolbar>
    </header>
</template>

<script>
import Toolbar from 'primevue/toolbar'

export default {
    components: {
        Toolbar,
    },
}
</script>
