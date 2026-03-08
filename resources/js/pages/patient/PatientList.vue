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
const patients = ref<PatientList[]>([...props.patients]);

// Modal states
const showAdmitModal = ref(false);
const selectedPatient = ref<PatientList | null>(null);

// Open Admit modal
function openAdmit() {
    selectedPatient.value = null;
    showAdmitModal.value = true;
}

// Open Edit modal
function editPatient(patient: PatientList) {
    selectedPatient.value = { ...patient }; // clone to avoid reactive issues
    showAdmitModal.value = true;
}

// Discharge patient
async function dischargePatient(patient: PatientList) {
    if (!confirm(`Are you sure you want to discharge ${patient.first_name}?`))
        return;

    try {
        await router.delete(route("patient.discharge", patient.id), {
            preserveScroll: true,
        });
        patients.value = patients.value.filter((p) => p.id !== patient.id);
    } catch (error) {
        console.error("Failed to discharge patient:", error);
        alert("Failed to discharge patient. Please try again.");
    }
}

// Handle saved patient from modal (add or update)
function handleSaved(savedPatient: any) {
    const index = patients.value.findIndex((p) => p.id === savedPatient.id);

    if (index !== -1) {
        // Update existing patient in the table
        patients.value[index] = { ...patients.value[index], ...savedPatient };
    } else {
        // Add new patient to the table
        patients.value.push(savedPatient);
    }

    // Close modal
    showAdmitModal.value = false;
}
</script>

<template>
    <div class="p-6 bg-white rounded shadow">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold">Patient List</h2>
            <Button @click="openAdmit">Admit Patient</Button>
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
                    <TableHead>Primary Dx</TableHead>
                    <TableHead>Status</TableHead>
                    <TableHead>Actions</TableHead>
                </TableRow>
            </TableHeader>

            <TableBody>
                <TableRow
                    v-for="patient in patients"
                    :key="patient.id"
                    class="hover:bg-gray-50"
                >
                    <TableCell>
                        <img
                            :src="
                                patient.photo
                                    ? `/storage/${patient.photo}`
                                    : 'https://via.placeholder.com/50'
                            "
                            alt="Photo"
                            class="w-10 h-10 object-cover rounded-full"
                        />
                    </TableCell>
                    <TableCell>{{ patient.id }}</TableCell>
                    <TableCell>{{ patient.first_name }}</TableCell>
                    <TableCell>{{ patient.last_name }}</TableCell>
                    <TableCell>{{ patient.gender }}</TableCell>
                    <TableCell>{{ patient.dob }}</TableCell>
                    <TableCell>{{ patient.dx }}</TableCell>
                    <TableCell>
                        <span
                            class="px-2 py-1 text-xs rounded bg-green-100 text-green-700 capitalize"
                        >
                            {{ patient.status }}
                        </span>
                    </TableCell>
                    <TableCell>
                        <div class="flex justify-end gap-2">
                            <Button
                                variant="secondary"
                                size="sm"
                                @click="editPatient(patient)"
                            >
                                Edit
                            </Button>
                            <Button
                                variant="destructive"
                                size="sm"
                                @click="dischargePatient(patient)"
                            >
                                Discharge
                            </Button>
                        </div>
                    </TableCell>
                </TableRow>
            </TableBody>
        </Table>

        <!-- Admit/Edit Modal -->
        <Admit
            v-model="showAdmitModal"
            :patient="selectedPatient"
            @saved="handleSaved"
        />
    </div>
</template>
