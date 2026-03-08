<script setup lang="ts">
import { router } from "@inertiajs/vue3";
import { route } from "ziggy-js";
import { PatientList } from "../../types/patientlist";
import {
    Table,
    TableBody,
    TableCaption,
    TableCell,
    TableHead,
    TableHeader,
    TableRow,
} from "@/components/ui/table";

defineProps<{
    patients: PatientList[];
}>();

function goToPatientChart(patientId: number) {
    // Pass the patient ID to the route
    router.visit(route("patientchart.info", patientId));
}
</script>

<template>
    <div class="p-6 bg-white rounded shadow">
        <h2 class="text-2xl font-bold mb-4">Patient List</h2>

        <Table>
            <TableCaption>List of admitted patients</TableCaption>

            <TableHeader>
                <TableRow>
                    <TableHead>Photo</TableHead>
                    <TableHead>ID</TableHead>
                    <TableHead>First Name</TableHead>
                    <TableHead>Last Name</TableHead>
                    <TableHead>Gender</TableHead>
                    <TableHead>DOB</TableHead>
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
                </TableRow>
            </TableBody>
        </Table>
    </div>
</template>
