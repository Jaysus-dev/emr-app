<script setup lang="ts">
import { Button } from "@/components/ui/button";
import {
    Card,
    CardContent,
    CardDescription,
    CardFooter,
    CardHeader,
    CardTitle,
} from "@/components/ui/card";
import { Input } from "@/components/ui/input";
import { Label } from "@/components/ui/label";
import { Tabs, TabsContent, TabsList, TabsTrigger } from "@/components/ui/tabs";
</script>

<template>
    <div class="flex w-full flex-col gap-6">
        <Tabs default-value="account" class="w-full border-b">
            <TabsList
                class="flex p-0 px-4 rounded-none text-m **:data-[state=active]:shadow-none **:data-[state=active]:bg-primary-foreground **:data-[state=active]:relative **:data-[state=active]:text-foreground **:data-[state=active]:after:absolute **:data-[state=active]:after:left-0 **:data-[state=active]:after:-bottom-px **:data-[state=active]:after:h-0.5 **:data-[state=active]:after:w-full **:data-[state=active]:after:bg-primary **:data-[state=active]:after:transition-transform **:data-[state=active]:after:scale-x-100 **:data-[state=inactive]:after:scale-x-0"
            >
                <TabsTrigger
                    value="patientinfo"
                    class="px-2 rounded-none gap-0"
                >
                    Patient Info</TabsTrigger
                >
                <TabsTrigger
                    value="clinicalnotes"
                    class="px-2 rounded-none gap-0"
                    >Clinical Notes</TabsTrigger
                >
                <TabsTrigger value="vitalsigns" class="px-2 rounded-none gap-0"
                    >Vital Signs</TabsTrigger
                >
                <TabsTrigger value="plan" class="px-2 rounded-none gap-0"
                    >Plan</TabsTrigger
                >
                <TabsTrigger value="diet" class="px-2 rounded-none gap-0"
                    >Diet</TabsTrigger
                >
                <TabsTrigger value="diagnois" class="px-2 rounded-none gap-0"
                    >Diagnosis</TabsTrigger
                >
                <TabsTrigger value="abstract" class="px-2 rounded-none gap-0"
                    >Abstract</TabsTrigger
                >
                <TabsTrigger value="documents" class="px-2 rounded-none gap-0"
                    >Documents
                </TabsTrigger>
            </TabsList>
        </Tabs>
    </div>
</template>
