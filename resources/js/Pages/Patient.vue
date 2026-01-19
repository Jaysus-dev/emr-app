<script setup>
import { ref } from "vue";
import PatientLayout from "@/pages/layouts/PatientLayout.vue";

const activeTab = ref("overview");

// Example patient data
const patient = {
    name: "Juan Dela Cruz",
    age: 45,
    gender: "Male",
    ward: "Pavilion A",
    room: "203-B",
    diagnosis: "Hypertension",
    status: "Stable",
};
</script>

<template>
    <PatientLayout v-model="activeTab">
        <!-- Card Header -->
        <template #title>{{ patient.name }}</template>
        <template #subtitle>Patient ID: P-102938</template>

        <!-- Column 1: Personal Info -->
        <template #col-1>
            <h2 class="mb-2 text-sm font-semibold text-muted-foreground">
                Personal Information
            </h2>
            <ul class="space-y-2 text-sm">
                <li><b>Name:</b> {{ patient.name }}</li>
                <li><b>Age:</b> {{ patient.age }}</li>
                <li><b>Gender:</b> {{ patient.gender }}</li>
            </ul>
        </template>

        <!-- Column 2: Admission Info -->
        <template #col-2>
            <h2 class="mb-2 text-sm font-semibold text-muted-foreground">
                Admission
            </h2>
            <ul class="space-y-2 text-sm">
                <li><b>Ward:</b> {{ patient.ward }}</li>
                <li><b>Room:</b> {{ patient.room }}</li>
            </ul>
        </template>

        <!-- Column 3: Medical Info -->
        <template #col-3>
            <h2 class="mb-2 text-sm font-semibold text-muted-foreground">
                Medical
            </h2>
            <ul class="space-y-2 text-sm">
                <li><b>Diagnosis:</b> {{ patient.diagnosis }}</li>
                <li><b>Status:</b> {{ patient.status }}</li>
            </ul>
        </template>

        <!-- Tab Content -->
        <template #overview>
            <p>Overview tab content goes here.</p>
        </template>

        <template #notes>
            <p>Notes tab content goes here.</p>
        </template>

        <template #orders>
            <p>Orders tab content goes here.</p>
        </template>

        <template #medications>
            <p>Medications tab content goes here.</p>
        </template>

        <template #labs>
            <p>Laboratory tab content goes here.</p>
        </template>

        <template #imaging>
            <p>Imaging tab content goes here.</p>
        </template>

        <template #vitals>
            <p>Vitals tab content goes here.</p>
        </template>

        <template #history>
            <p>History tab content goes here.</p>
        </template>

        <template #documents>
            <p>Documents tab content goes here.</p>
        </template>
    </PatientLayout>
</template>
