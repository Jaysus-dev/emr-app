<script setup lang="ts">
import { ref } from "vue";
import { router } from "@inertiajs/vue3";
import { route } from "ziggy-js";
import type { PatientList } from "../../types/patientlist";
import {
    Table,
    TableBody,
    TableCaption,
    TableCell,
    TableHead,
    TableHeader,
    TableRow,
} from "@/components/ui/table";
import Button from "@/components/ui/button/Button.vue";
import Admit from "./Admit.vue"; // Import Admit Modal

// Props from server
const props = defineProps<{ patients: PatientList[] }>();
const patients = ref(props.patients);

// Modal state
const showAdmitModal = ref(false);

// Refresh table after admitting a patient
function refreshPatients() {
    router.reload(); // reloads current page to get latest patients
}

// Row click to open patient chart
function goToPatientChart(patientId: number) {
    router.visit(route("patientchart.info", patientId));
}
</script>

<template>
    <div class="p-6 bg-white rounded shadow">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold mb-4">Patient List</h2>
            <Button class="cursor-pointer" @click="showAdmitModal = true"
                >Admit Patient</Button
            >
        </div>

        <Table>
            <TableCaption>List of Patients</TableCaption>
            <TableHeader>
                <TableRow>
                    <TableHead>Photo</TableHead>
                    <TableHead>ID</TableHead>
                    <TableHead>First Name</TableHead>
                    <TableHead>Last Name</TableHead>
                    <TableHead>Gender</TableHead>
                    <TableHead>DOB</TableHead>
                    <TableHead>Action</TableHead>
                </TableRow>
            </TableHeader>

            <TableBody>
                <TableRow
                    v-for="patient in patients"
                    :key="patient.id"
                    class="hover:bg-gray-50 cursor-pointer"
                    @click="goToPatientChart(patient.id)"
                >
                    <TableCell>
                        <img
                            :src="
                                patient.photo ||
                                'https://via.placeholder.com/50'
                            "
                            alt="Patient Photo"
                            class="w-12 h-12 object-cover rounded-full"
                        />
                    </TableCell>
                    <TableCell>{{ patient.id }}</TableCell>
                    <TableCell>{{ patient.first_name }}</TableCell>
                    <TableCell>{{ patient.last_name }}</TableCell>
                    <TableCell>{{ patient.gender }}</TableCell>
                    <TableCell>{{ patient.dob }}</TableCell>
                    <TableCell>
                        <Button
                            size="sm"
                            @click.stop="goToPatientChart(patient.id)"
                        >
                            View
                        </Button>
                    </TableCell>
                </TableRow>
            </TableBody>
        </Table>

        <!-- Admit Modal -->
        <Admit v-model="showAdmitModal" @saved="refreshPatients" />
    </div>
</template>
