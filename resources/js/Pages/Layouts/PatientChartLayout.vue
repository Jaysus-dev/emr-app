<script setup lang="ts">
import PatientBanner from "../components/PatientBanner.vue";
import PatientTabs from "../components/PatientTabs.vue";

const props = defineProps<{
    patient: any;
}>();
</script>

<template>
    <div class="flex flex-col">
        <!-- Pass patient to Banner and Tabs -->
        <PatientBanner :patient="props.patient" />
        <PatientTabs :patient="props.patient" />

        <div class="p-4 w-full">
            <slot />
        </div>
    </div>
</template>
