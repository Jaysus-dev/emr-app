<script setup lang="ts">
import { router } from "@inertiajs/vue3";
import { computed } from "vue";

const tabs = [
    { key: "profile", label: "Profile" },
    { key: "appearance", label: "Appearance" },
    { key: "news", label: "News Upload" },
];

// get tab from URL (?tab=profile)
const currentTab = computed(() => {
    const params = new URLSearchParams(window.location.search);
    return params.get("tab") ?? "profile";
});

function goTo(tab: string) {
    router.visit(`/settings?tab=${tab}`);
}
</script>

<template>
    <div class="w-full px-4">
        <div class="grid grid-cols-12 gap-4">
            <!-- LEFT NAV -->
            <aside class="col-span-12 md:col-span-2">
                <div class="rounded-lg border bg-white p-2 space-y-1">
                    <h1 class="text-2xl font-semibold mb-6">Settings</h1>
                    <button
                        v-for="tab in tabs"
                        :key="tab.key"
                        @click="goTo(tab.key)"
                        class="w-full text-left px-3 py-2 rounded-md text-sm transition"
                        :class="
                            currentTab === tab.key
                                ? 'bg-primary text-white'
                                : 'hover:bg-muted'
                        "
                    >
                        {{ tab.label }}
                    </button>
                </div>
            </aside>

            <!-- RIGHT CONTENT -->
            <section class="col-span-12 md:col-span-10">
                <div
                    class="rounded-lg border bg-white flex justify-center items-center min-h-[300px]"
                >
                    <template v-if="currentTab === 'profile'">
                        <h2 class="text-lg font-medium mb-4">Profile</h2>
                        <!-- Profile form here -->
                    </template>

                    <template v-else-if="currentTab === 'appearance'">
                        <h2 class="text-lg font-medium mb-4">Appearance</h2>
                        <!-- Theme / UI settings -->
                    </template>

                    <template v-else-if="currentTab === 'news'">
                        <h2 class="text-lg font-medium mb-4">News Upload</h2>
                        <!-- News upload component -->
                    </template>
                </div>
            </section>
        </div>
    </div>
</template>
