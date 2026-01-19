<script setup lang="ts">
import Avatar from "@/components/ui/avatar/Avatar.vue";
import Badge from "@/components/ui/badge/Badge.vue";
import Card from "@/components/ui/card/Card.vue";
import { Copy } from "lucide-vue-next";
</script>

<template>
    <Card class="rounded-none border-x-0 bg-primary-foreground shadow-none">
        <div class="flex justify-between">
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
                        <Copy class="h-3 w-3 cursor-pointer" />
                    </h3>
                    <h3 class="text-lg font-bold">Marcos, Ferdinand S. III</h3>
                </div>
            </div>

            <div class="grid grid-cols-3 gap-4">
                <div>col 2.1</div>
                <div>col 2.2</div>
                <div>col 2.3</div>
            </div>
            <div>col 3</div>
        </div>
    </Card>

    <div class="min-h-screen bg-muted/40">
        <main class="mx-auto max-w-7xl px-6 py-6">
            <div class="rounded-2xl bg-background p-6 shadow-sm">
                Card Header
                <div class="mb-4 border-b pb-4">
                    <h2 class="text-xl font-semibold"><slot name="title" /></h2>
                    <p class="text-sm text-muted-foreground">
                        <slot name="subtitle" />
                    </p>
                </div>

                <!-- 3 Columns -->
                <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                    <section><slot name="col-1" /></section>
                    <section><slot name="col-2" /></section>
                    <section><slot name="col-3" /></section>
                </div>
                <!-- Tabs -->
            </div>
        </main>
    </div>
</template>
