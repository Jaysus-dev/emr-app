<script setup lang="ts">
import SettingsLayout from "../layouts/SettingsLayout.vue";
</script>

<template>
    <SettingsLayout>
        <div class="flex flex-1 flex-col gap-4 h-full">
            <div
                class="min-h-screen flex-1 md:min-h-min flex items-center justify-center h-full bg-muted rounded-lg"
            >
                <h1 class="text-xl p-6 font-bold">Appearance</h1>
            </div>

            <div class="grid auto-rows-min gap-4 md:grid-cols-3">
                <div class="bg-muted aspect-video rounded-lg" />
                <div class="bg-muted aspect-video rounded-lg" />
                <div class="bg-muted aspect-video rounded-lg" />
            </div>
        </div>
    </SettingsLayout>
</template>
