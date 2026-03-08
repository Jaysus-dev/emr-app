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
import Admit from "./Admit.vue";

// Props from backend
const props = defineProps<{ patients: PatientList[] }>();
const patients = ref(props.patients);

// Modal states
const showAdmitModal = ref(false);
const selectedPatient = ref<PatientList | null>(null);

// Reload patient table
function refreshPatients() {
    router.reload();
}

// Open Admit modal
function openAdmit() {
    selectedPatient.value = null;
    showAdmitModal.value = true;
}

// Open Edit modal
function editPatient(patient: PatientList) {
    selectedPatient.value = patient;
    showAdmitModal.value = true;
}

// Open patient chart
function goToPatientChart(patientId: number) {
    router.visit(route("patientchart.info", patientId));
}
</script>

<template>
    <div class="p-6 bg-white rounded shadow">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold mb-4">Patient List</h2>

            <Button class="cursor-pointer" @click="openAdmit">
                Admit Patient
            </Button>
        </div>

        <Table>
            <TableCaption> List of Patients </TableCaption>

            <TableHeader>
                <TableRow>
                    <TableHead>Photo</TableHead>
                    <TableHead>ID</TableHead>
                    <TableHead>First Name</TableHead>
                    <TableHead>Last Name</TableHead>
                    <TableHead>Gender</TableHead>
                    <TableHead>DOB</TableHead>
                    <TableHead>Primary Dx</TableHead>
                    <TableHead>Status</TableHead>
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
                    <TableCell class="py-4">
                        <img
                            :src="
                                patient.photo
                                    ? `/storage/${patient.photo}`
                                    : 'https://via.placeholder.com/50'
                            "
                            alt="Patient Photo"
                            class="w-10 h-10 object-cover rounded-full"
                        />
                    </TableCell>

                    <TableCell>
                        {{ patient.id }}
                    </TableCell>

                    <TableCell>
                        {{ patient.first_name }}
                    </TableCell>

                    <TableCell>
                        {{ patient.last_name }}
                    </TableCell>

                    <TableCell>
                        {{ patient.gender }}
                    </TableCell>

                    <TableCell>
                        {{ patient.dob }}
                    </TableCell>

                    <TableCell>
                        {{ patient.dx }}
                    </TableCell>

                    <TableCell>
                        <span
                            class="px-2 py-1 text-xs rounded bg-green-100 text-green-700 capitalize"
                        >
                            {{ patient.status }}
                        </span>
                    </TableCell>

                    <TableCell>
                        <Button
                            class="cursor-pointer"
                            variant="destructive"
                            size="sm"
                            @click.stop="editPatient(patient)"
                        >
                            Edit
                        </Button>
                    </TableCell>
                </TableRow>
            </TableBody>
        </Table>

        <!-- Admit / Edit Modal -->

        <Admit
            v-model="showAdmitModal"
            :patient="selectedPatient"
            @saved="refreshPatients"
        />
    </div>
</template>
