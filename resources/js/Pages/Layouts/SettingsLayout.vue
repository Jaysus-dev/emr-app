<script setup lang="ts">
import Separator from "@/components/ui/separator/Separator.vue";
import { router, usePage } from "@inertiajs/vue3";
import { route } from "ziggy-js";

const page = usePage();

const nav = [
    { label: "Profile", route: "settings.profile" },
    { label: "Appearance", route: "settings.appearance" },
    { label: "News Upload", route: "settings.newsupload" },
];

function goTo(routeName: string) {
    router.visit(route(routeName));
}

function isActive(routeName: string) {
    return page.url === route(routeName);
}
</script>

<template>
    <div class="flex flex-1 p-4 pt-0">
        <div class="flex w-full rounded-lg bg-primary-foreground border">
            <!-- LEFT SIDEBAR -->
            <aside class="w-full md:w-56 shrink-0">
                <div class="p-4 space-y-1 h-full">
                    <button
                        v-for="item in nav"
                        :key="item.route"
                        @click="goTo(item.route)"
                        class="w-full text-left px-3 py-2 rounded-md text-sm transition cursor-pointer"
                        :class="
                            isActive(item.route)
                                ? 'bg-primary text-white'
                                : 'hover:bg-muted'
                        "
                    >
                        {{ item.label }}
                    </button>
                </div>
            </aside>

            <!-- SEPARATOR -->
            <Separator
                orientation="vertical"
                class="hidden md:block h-auto mx-0"
            />

            <!-- RIGHT CONTENT -->
            <section class="flex-1">
                <div class="p-6 h-full">
                    <slot />
                </div>
            </section>
        </div>
    </div>
</template>
