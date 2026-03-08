<script setup lang="ts">
import type { SidebarProps } from "@/components/ui/sidebar";
import { router } from "@inertiajs/vue3";

import {
    LayoutDashboard,
    SquareUserRound,
    BookOpen,
    Command,
    Settings2,
    Move3D,
    FileSliders,
    CalendarCheck2,
    PackageCheck,
    Scroll,
    BookAlert,
    LayoutDashboardIcon,
} from "lucide-vue-next";

import NavMain from "@/components/NavMain.vue";
import NavProjects from "@/components/NavProjects.vue";
import NavSecondary from "@/components/NavSecondary.vue";
import NavUser from "@/components/NavUser.vue";
import {
    Sidebar,
    SidebarContent,
    SidebarFooter,
    SidebarHeader,
    SidebarMenu,
    SidebarMenuButton,
    SidebarMenuItem,
} from "@/components/ui/sidebar";
import { route } from "ziggy-js";

const props = withDefaults(defineProps<SidebarProps>(), {
    collapsible: "icon",
    variant: "inset",
});

function goToDashboard() {
    router.visit("/dashboard");
}

const data = {
    navMain: [
        {
            title: "Patients",
            url: "#",
            icon: SquareUserRound,
            isActive: true,
            onClick: () => router.visit(route("patients.index")),
        },
    ],

    navSecondary: [
        {
            title: "Release Notes",
            url: "#",
            icon: Scroll,
        },
    ],
};
</script>

<template>
    <Sidebar v-bind="props">
        <SidebarHeader>
            <SidebarMenu>
                <SidebarMenuItem>
                    <SidebarMenuButton
                        size="lg"
                        as-child
                        @click="goToDashboard"
                        class="cursor-pointer"
                    >
                        <a href="#">
                            <div
                                class="flex aspect-square size-8 items-center justify-center rounded-lg bg-sidebar-primary text-sidebar-primary-foreground"
                            >
                                <LayoutDashboard class="size-6" />
                            </div>
                            <div
                                class="grid flex-1 text-left text-sm leading-tight"
                            >
                                <span class="truncate font-bold uppercase"
                                    >Jay-emr</span
                                >
                                <span class="truncate text-xs">Dashboard</span>
                            </div>
                        </a>
                    </SidebarMenuButton>
                </SidebarMenuItem>
            </SidebarMenu>
        </SidebarHeader>
        <SidebarContent>
            <NavMain :items="data.navMain" />
            <!--<NavProjects :projects="data.projects" />-->
            <NavSecondary :items="data.navSecondary" class="mt-auto" />
        </SidebarContent>
        <!--<SidebarFooter>
            <NavUser :user="data.user" />
        </SidebarFooter>-->
    </Sidebar>
</template>
