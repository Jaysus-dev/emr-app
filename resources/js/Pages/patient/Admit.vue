<script setup lang="ts">
import { ref, watch } from "vue";
import { router } from "@inertiajs/vue3";
import Button from "@/components/ui/button/Button.vue";
import FormInput from "@/components/ui/input/Input.vue";
import {
    Select,
    SelectContent,
    SelectItem,
    SelectTrigger,
    SelectValue,
} from "@/components/ui/select";
import { route } from "ziggy-js";

// Props: modal state and optional patient
const props = defineProps<{ modelValue: boolean; patient?: any | null }>();
const emit = defineEmits(["update:modelValue", "saved"]);

// Local modal open state
const open = ref(props.modelValue);

// Sync modal state with parent
watch(
    () => props.modelValue,
    (val) => (open.value = val),
);

// Form data
const form = ref({
    first_name: "",
    last_name: "",
    gender: "",
    dob: "",
    dx: "",
    photo: null as File | null,
});

// Prefill form when editing
watch(
    () => props.patient,
    (patient) => {
        if (patient) {
            form.value = {
                first_name: patient.first_name || "",
                last_name: patient.last_name || "",
                gender: patient.gender || "",
                dob: patient.dob || "",
                dx: patient.dx || "",
                photo: null, // always reset photo input
            };
        } else {
            form.value = {
                first_name: "",
                last_name: "",
                gender: "",
                dob: "",
                dx: "",
                photo: null,
            };
        }
    },
    { immediate: true },
);

// Close modal
function close() {
    open.value = false;
    emit("update:modelValue", false);
}

// Handle photo upload
function handlePhotoUpload(e: Event) {
    const target = e.target as HTMLInputElement;
    if (target.files && target.files[0]) form.value.photo = target.files[0];
}

// Submit form (Admit or Edit)
function submit() {
    const data = new FormData();
    data.append("first_name", form.value.first_name);
    data.append("last_name", form.value.last_name);
    data.append("gender", form.value.gender);
    data.append("dob", form.value.dob);
    data.append("dx", form.value.dx);
    if (form.value.photo) data.append("photo", form.value.photo);

    if (props.patient) {
        // Edit patient
        router.put(route("patients.update", props.patient.id), data, {
            forceFormData: true,
            onSuccess: (response) => {
                // Backend must return the updated patient JSON
                const updatedPatient = response ?? props.patient;
                emit("saved", updatedPatient);
                close();
            },
            onError: (errors) => {
                console.log(errors);
                alert("Failed to update patient. Check console for errors.");
            },
        });
    } else {
        // Admit new patient
        router.post(route("patients.store"), data, {
            forceFormData: true,
            onSuccess: (response) => {
                // Backend must return the new patient JSON
                const newPatient = response ?? {};
                emit("saved", newPatient);
                close();
            },
            onError: (errors) => {
                console.log(errors);
                alert("Failed to admit patient. Check console for errors.");
            },
        });
    }
}
</script>

<template>
    <div
        v-if="open"
        class="fixed inset-0 bg-black/50 flex items-center justify-center z-50"
    >
        <div class="bg-white p-6 rounded shadow-lg w-full max-w-md">
            <h2 class="text-xl font-bold mb-4">
                {{ props.patient ? "Edit Patient" : "Admit Patient" }}
            </h2>

            <div class="grid gap-4">
                <FormInput
                    v-model="form.first_name"
                    label="First Name"
                    placeholder="First Name"
                />
                <FormInput
                    v-model="form.last_name"
                    label="Last Name"
                    placeholder="Last Name"
                />

                <div>
                    <Select v-model="form.gender">
                        <SelectTrigger class="w-full">
                            <SelectValue placeholder="Select Gender" />
                        </SelectTrigger>
                        <SelectContent>
                            <SelectItem value="M">Male</SelectItem>
                            <SelectItem value="F">Female</SelectItem>
                        </SelectContent>
                    </Select>
                </div>

                <FormInput
                    v-model="form.dob"
                    label="Date of Birth"
                    type="date"
                />
                <FormInput
                    v-model="form.dx"
                    label="Diagnosis"
                    placeholder="Diagnosis"
                />

                <div>
                    <label class="text-sm font-medium">Photo</label>
                    <input
                        type="file"
                        accept="image/*"
                        @change="handlePhotoUpload"
                        class="mt-1 block w-full text-sm"
                    />
                </div>
            </div>

            <div class="flex justify-end gap-2 mt-4">
                <Button variant="secondary" @click="close">Cancel</Button>
                <Button @click="submit">
                    {{ props.patient ? "Update Patient" : "Admit" }}
                </Button>
            </div>
        </div>
    </div>
</template>
