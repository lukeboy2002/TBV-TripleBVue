<script lang="ts" setup>
import AppHeader from '@/components/AppHeader.vue';
</script>

<template>
    <AppHeader />
    <section class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <!-- Page Heading -->
        <header v-if="$slots.header" class="my-4">
            <slot name="header"></slot>
        </header>

        <!-- Page Content -->
        <div v-if="$slots.side" class="mx-auto flex max-w-7xl flex-wrap">
            <main class="flex w-full flex-col px-3 lg:w-3/4">
                <slot></slot>
            </main>
            <aside class="flex w-full flex-col px-3 pt-0 lg:w-1/4 mb-20">
                <slot name="side"></slot>
            </aside>
        </div>

        <main v-else>
            <slot></slot>
        </main>
    </section>
</template>
