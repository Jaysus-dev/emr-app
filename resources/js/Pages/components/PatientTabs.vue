<script setup>
import { ref, watch } from "vue";

// Import icons from lucide-vue-next
import {
    FileText,
    Clipboard,
    Package,
    Heart,
    Beaker,
    Image,
    Activity,
    BookOpen,
    File,
} from "lucide-vue-next";

const props = defineProps({
    modelValue: { type: String, default: "overview" },
});

const emit = defineEmits(["update:modelValue"]);

const internalActiveTab = ref(props.modelValue);

watch(internalActiveTab, (val) => emit("update:modelValue", val));
watch(
    () => props.modelValue,
    (val) => {
        if (val !== internalActiveTab.value) internalActiveTab.value = val;
    },
);

const tabs = [
    { key: "overview", label: "Overview", icon: FileText },
    { key: "notes", label: "Notes", icon: Clipboard },
    { key: "orders", label: "Orders", icon: Package },
    { key: "medications", label: "Medications", icon: Heart },
    { key: "labs", label: "Laboratory", icon: Beaker },
    { key: "imaging", label: "Imaging", icon: Image },
    { key: "vitals", label: "Vitals", icon: Activity },
    { key: "history", label: "History", icon: BookOpen },
    { key: "documents", label: "Documents", icon: File },
];
</script>
<template>
    <div>
        <!-- Tabs -->
        <nav class="my-4 border-b">
            <Separator />
            <ul class="flex gap-5 text-sm font-medium">
                <li v-for="tab in tabs" :key="tab.key">
                    <button
                        @click="$emit('update:modelValue', tab.key)"
                        class="relative flex items-center gap-1 py-2 transition-colors"
                        :class="
                            modelValue === tab.key
                                ? 'text-primary'
                                : 'text-muted-foreground hover:text-foreground'
                        "
                    >
                        <!-- Icon -->
                        <component
                            v-if="tab.icon"
                            :is="tab.icon"
                            class="w-4 h-4"
                        />
                        {{ tab.label }}

                        <!-- Underline for active -->
                        <span
                            v-if="modelValue === tab.key"
                            class="absolute left-0 -bottom-px h-0.5 w-full bg-primary"
                        />
                    </button>
                </li>
            </ul>
        </nav>

        <!-- Tab Content -->
        <div class="mt-4">
            <slot :name="modelValue" />
            <div v-if="!$slots[modelValue]" class="text-muted-foreground">
                Content for "{{ modelValue }}" not provided.
            </div>
        </div>
    </div>
</template>

<script setup>
import Separator from "@/components/ui/separator/Separator.vue";
import { defineProps, defineEmits } from "vue";

defineProps({
    modelValue: { type: String, required: true },
    tabs: { type: Array, required: true }, // Pass tabs from parent
});

const emit = defineEmits(["update:modelValue"]);
</script>
