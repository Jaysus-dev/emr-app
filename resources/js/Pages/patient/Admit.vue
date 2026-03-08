<script setup lang="ts">
import { ref, watch } from "vue";
import { router } from "@inertiajs/vue3";
import Button from "@/components/ui/button/Button.vue";
import FormInput from "@/components/ui/input/Input.vue";

// Props for v-model
const props = defineProps<{ modelValue: boolean }>();
const emit = defineEmits(["update:modelValue", "saved"]);

// Local state for modal visibility
const open = ref(props.modelValue);

// Sync prop changes to local state
watch(
    () => props.modelValue,
    (val) => {
        open.value = val;
    },
);

// Form data
const form = ref({
    first_name: "",
    last_name: "",
    gender: "",
    dob: "",
    photo: "",
});

// Close modal
function close() {
    open.value = false;
    emit("update:modelValue", false); // sync with parent
}

// Submit form
function submit() {
    router.post("/patients", form.value, {
        onSuccess: () => {
            emit("saved"); // tell parent to refresh table
            close();
        },
        onError: (errors) => console.log(errors),
    });
}
</script>

<template>
    <div
        v-if="open"
        class="fixed inset-0 bg-black/50 flex items-center justify-center z-50"
    >
        <div class="bg-white p-6 rounded shadow-lg w-full max-w-md">
            <h2 class="text-xl font-bold mb-4">Admit Patient</h2>

            <div class="grid gap-4">
                <FormInput
                    v-model="form.first_name"
                    placeholder="First Name"
                    label="First Name"
                />
                <FormInput
                    v-model="form.last_name"
                    placeholder="Last Name"
                    label="Last Name"
                />
                <FormInput
                    v-model="form.gender"
                    label="Gender"
                    placeholder="Gender"
                />
                <FormInput
                    v-model="form.dob"
                    label="Date of Birth"
                    type="date"
                />
                <FormInput v-model="form.photo" label="Photo URL (optional)" />
            </div>

            <div class="flex justify-end gap-2 mt-4">
                <Button variant="secondary" @click="close">Cancel</Button>
                <Button @click="submit">Admit</Button>
            </div>
        </div>
    </div>
</template>
