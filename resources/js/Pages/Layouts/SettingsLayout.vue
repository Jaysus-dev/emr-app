<script setup lang="ts">
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
    <div class="flex flex-1 gap-4 p-4 pt-0">
        <div class="flex-1 flex w-full rounded-lg">
            <div class="grid grid-cols-12 gap-4 w-full">
                <!-- LEFT -->
                <aside class="col-span-12 md:col-span-2 m-0">
                    <div
                        class="rounded-lg border bg-primary-foreground p-4 space-y-1 h-full"
                    >
                        <button
                            v-for="item in nav"
                            :key="item.route"
                            @click="goTo(item.route)"
                            class="w-full text-left px-3 py-2 rounded-md text-sm transition cursor-pointer"
                            :class="
                                isActive(item.route)
                                    ? 'bg-primary text-white '
                                    : 'hover:bg-muted'
                            "
                        >
                            {{ item.label }}
                        </button>
                    </div>
                </aside>

                <!-- RIGHT -->
                <section class="col-span-12 md:col-span-10">
                    <div
                        class="rounded-lg border bg-primary-foreground p-6 h-full m-0"
                    >
                        <slot />
                    </div>
                </section>
            </div>
        </div>
    </div>
</template>
