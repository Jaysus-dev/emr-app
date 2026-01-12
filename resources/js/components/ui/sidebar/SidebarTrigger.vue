<script setup lang="ts">
import type { HTMLAttributes } from "vue";
import { ChevronLeft, ChevronRight } from "lucide-vue-next";

import { cn } from "@/lib/utils";
import { Button } from "@/components/ui/button";
import { useSidebar } from "./utils";

const props = defineProps<{
    class?: HTMLAttributes["class"];
}>();

const { open, toggleSidebar } = useSidebar();
</script>

<template>
    <Button
        class="shadow rounded-xl bg-muted"
        data-sidebar="trigger"
        data-slot="sidebar-trigger"
        variant="ghost"
        size="icon"
        :class="cn('h-7 w-7', props.class)"
        @click="toggleSidebar"
    >
        <ChevronLeft v-if="open" />
        <ChevronRight v-else />
        <span class="sr-only">Toggle Sidebar</span>
    </Button>
</template>
