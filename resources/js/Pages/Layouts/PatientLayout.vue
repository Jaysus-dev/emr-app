<script setup lang="ts">
import Avatar from "@/components/ui/avatar/Avatar.vue";
import Badge from "@/components/ui/badge/Badge.vue";
import Button from "@/components/ui/button/Button.vue";
import Card from "@/components/ui/card/Card.vue";
import Separator from "@/components/ui/separator/Separator.vue";
import PatientTabs from "../components/PatientTabs.vue";
import {
    BedSingle,
    Copy,
    User,
    UserCheck,
    UserCheck2,
    UserCog,
    UserSearch,
} from "lucide-vue-next";
</script>

<template>
    <Card class="rounded-none border-x-0 bg-transparent shadow-none">
        <div class="flex justify-between">
            <!--Left-->
            <div class="flex gap-4">
                <!--image here-->
                <div class="bg-foreground h-20 w-20 rounded-[100px]" />
                <!--image here-->
                <div class="flex flex-col justify-between">
                    <div class="inline-flex">
                        <Badge>First Admission</Badge>
                        <Badge>First Admission</Badge>
                    </div>
                    <h3
                        class="text-sm text-muted-foreground font-medium flex gap-2 items-center"
                    >
                        Hospital ID: 0000000

                        <Copy class="size-3 cursor-pointer" />
                    </h3>
                    <h3 class="text-lg font-bold">Marcos, Ferdinand S. III</h3>
                </div>
            </div>
            <!--Center-->
            <div class="flex justify-between gap-4 text-sm">
                <div class="flex flex-col justify-between">
                    <h3 class="font-medium text-muted-foreground">
                        Demographics
                    </h3>
                    <span class="text-xs font-medium">Gender : Male </span>
                    <span class="text-xs font-medium">Age : 26</span>
                    <span class="text-xs font-medium">DOB : Apr 3, 2002</span>
                </div>
                <Separator orientation="vertical" />
                <div class="flex flex-col justify-between">
                    <h3 class="font-medium text-muted-foreground">
                        Measurements
                    </h3>
                    <span class="text-xs font-medium">Weight : 69 kg </span>
                    <span class="text-xs font-medium">Height : 172 cm</span>
                    <span class="text-xs font-medium">BMI : 23.2</span>
                </div>
                <Separator orientation="vertical" />
                <div class="flex flex-col justify-between">
                    <h3 class="font-bold text-muted-foreground">
                        Admission Details
                    </h3>
                    <span class="text-xs font-medium">Status : Admitted </span>
                    <span class="text-xs font-medium"
                        >Admitted: Jan 2, 2025</span
                    >
                    <span class="text-xs font-medium"
                        >Trans-in : Apr 3, 2026</span
                    >
                </div>
            </div>
            <div class="flex flex-col gap-2 max-w-50 w-full">
                <div class="flex justify-between">
                    <Button variant="outline"><User /></Button>
                    <Button variant="outline"><UserSearch /></Button>
                    <Button variant="outline"><UserCheck2 /></Button>
                    <Button variant="outline"><UserCog /></Button>
                </div>
                <Button variant="outline" class="shadow-none cursor-pointer"
                    ><BedSingle /> Disposition</Button
                >
            </div>
        </div>
    </Card>
    <PatientTabs />
</template>
