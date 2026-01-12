<script setup lang="ts">
import Sidebar from "@/components/index.vue";
</script>

<template>
    <Sidebar>
        <!-- The slot will render page-specific content -->
        <slot />
    </Sidebar>
</template>
