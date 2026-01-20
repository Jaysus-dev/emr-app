<script setup lang="ts">
import PatientBanner from "../components/PatientBanner.vue";
import PatientTabs from "../components/PatientTabs.vue";
</script>

<template>
    <div class="flex flex-col">
        <!-- Banner at the top -->
        <PatientBanner />
        <!-- Tabs component -->
        <PatientTabs />

        <!-- Page content -->
        <div class="p-4 w-full">
            <slot />
        </div>
    </div>
</template>
