<script setup lang="ts">
import { computed } from "vue";
import Avatar from "@/components/ui/avatar/Avatar.vue";
import Badge from "@/components/ui/badge/Badge.vue";
import Button from "@/components/ui/button/Button.vue";
import Card from "@/components/ui/card/Card.vue";
import Separator from "@/components/ui/separator/Separator.vue";
import {
    BedSingle,
    Copy,
    User,
    UserCheck2,
    UserCog,
    UserSearch,
} from "lucide-vue-next";

// Accept patient as a prop
const props = defineProps<{
    patient?: {
        id?: number;
        first_name?: string;
        middle_name?: string;
        last_name?: string;
        gender?: string;
        dob?: string;
        weight?: number;
        height?: number;
        bmi?: number;
        status?: string;
        admitted_at?: string;
        trans_in?: string;
    };
}>();

// Compute age safely
const age = computed(() => {
    if (!props.patient?.dob) return "-";
    const diff = new Date().getTime() - new Date(props.patient.dob).getTime();
    return Math.floor(diff / (1000 * 60 * 60 * 24 * 365));
});
</script>

<template>
    <div v-if="props.patient">
        <Card class="rounded-none border-x-0 bg-transparent shadow-none">
            <div class="flex justify-between">
                <!-- Left section -->
                <div class="flex gap-4">
                    <div class="bg-foreground h-20 w-20 rounded-full" />
                    <div class="flex flex-col justify-between">
                        <div class="inline-flex">
                            <Badge>First Admission</Badge>
                        </div>
                        <h3
                            class="text-sm text-muted-foreground font-medium flex gap-2 items-center"
                        >
                            Hospital ID: {{ props.patient.id ?? "-" }}
                            <Copy class="size-3 cursor-pointer" />
                        </h3>
                        <h3 class="text-lg font-bold">
                            {{ props.patient.last_name ?? "" }},
                            {{ props.patient.first_name ?? "" }}
                            {{ props.patient.middle_name ?? "" }}
                        </h3>
                    </div>
                </div>

                <!-- Center section -->
                <div class="flex justify-between gap-4 text-sm">
                    <div class="flex flex-col justify-between">
                        <h3 class="font-medium text-muted-foreground">
                            Demographics
                        </h3>
                        <span class="text-xs font-medium"
                            >Gender: {{ props.patient.gender ?? "-" }}</span
                        >
                        <span class="text-xs font-medium">Age: {{ age }}</span>
                        <span class="text-xs font-medium">
                            DOB:
                            {{
                                props.patient.dob
                                    ? new Date(
                                          props.patient.dob,
                                      ).toLocaleDateString()
                                    : "-"
                            }}
                        </span>
                    </div>

                    <Separator orientation="vertical" />

                    <div class="flex flex-col justify-between">
                        <h3 class="font-medium text-muted-foreground">
                            Measurements
                        </h3>
                        <span class="text-xs font-medium"
                            >Weight: {{ props.patient.weight ?? "-" }} kg</span
                        >
                        <span class="text-xs font-medium"
                            >Height: {{ props.patient.height ?? "-" }} cm</span
                        >
                        <span class="text-xs font-medium"
                            >BMI: {{ props.patient.bmi ?? "-" }}</span
                        >
                    </div>

                    <Separator orientation="vertical" />

                    <div class="flex flex-col justify-between">
                        <h3 class="font-bold text-muted-foreground">
                            Admission Details
                        </h3>
                        <span class="text-xs font-medium"
                            >Status: {{ props.patient.status ?? "-" }}</span
                        >
                        <span class="text-xs font-medium">
                            Admitted:
                            {{
                                props.patient.admitted_at
                                    ? new Date(
                                          props.patient.admitted_at,
                                      ).toLocaleDateString()
                                    : "-"
                            }}
                        </span>
                        <span class="text-xs font-medium">
                            Trans-in:
                            {{
                                props.patient.trans_in
                                    ? new Date(
                                          props.patient.trans_in,
                                      ).toLocaleDateString()
                                    : "-"
                            }}
                        </span>
                    </div>
                </div>

                <!-- Right section buttons -->
                <div class="flex flex-col gap-2 max-w-50 w-full">
                    <div class="flex justify-between">
                        <Button variant="outline"><User /></Button>
                        <Button variant="outline"><UserSearch /></Button>
                        <Button variant="outline"><UserCheck2 /></Button>
                        <Button variant="outline"><UserCog /></Button>
                    </div>
                    <Button
                        variant="outline"
                        class="shadow-none cursor-pointer"
                    >
                        <BedSingle /> Disposition
                    </Button>
                </div>
            </div>
        </Card>
    </div>
</template>
