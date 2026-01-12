<script setup lang="ts">
import type { SidebarProps } from "@/components/ui/sidebar";

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

const props = withDefaults(defineProps<SidebarProps>(), {
    collapsible: "icon",
    variant: "inset",
});
const data = {
    user: {
        name: "shadcn",
        email: "m@example.com",
        avatar: "/avatars/shadcn.jpg",
    },
    navMain: [
        // {
        //     title: "Dashboard",
        //    url: "#",
        //     icon: LayoutDashboard,
        //  },
        {
            title: "Patients",
            url: "#",
            icon: SquareUserRound,
            isActive: true,
            items: [
                {
                    title: "Patient List",
                    url: "#",
                },
                {
                    title: "All Patients",
                    url: "#",
                },
                {
                    title: "Express PTs",
                    url: "#",
                },
            ],
        },
        {
            title: "Transfers",
            url: "#",
            icon: Move3D,
            items: [
                {
                    title: "For Trans-In",
                    url: "#",
                },
                {
                    title: "For Trans-Out",
                    url: "#",
                },
            ],
        },
        {
            title: "Finalization",
            url: "#",
            icon: CalendarCheck2,
            items: [
                {
                    title: "For Finalization",
                    url: "#",
                },
                {
                    title: "Finalized PTs",
                    url: "#",
                },
            ],
        },
        {
            title: "Referral List ",
            url: "#",
            icon: FileSliders,
            items: [
                {
                    title: "Incoming",
                    url: "#",
                },
                {
                    title: "Outgoing",
                    url: "#",
                },
            ],
        },
        {
            title: "Clinical Overview ",
            url: "#",
            icon: BookOpen,
            items: [
                {
                    title: "Reassessment Calendar",
                    url: "#",
                },
                {
                    title: "Diet Summary",
                    url: "#",
                },
                {
                    title: "Census",
                    url: "#",
                },
            ],
        },
    ],
    // projects: [
    //    {
    //      name: "Reassessment Calendar",
    //     url: "#",
    //     icon: Frame,
    // },
    //  {
    //     name: "Sales & Marketing",
    //      url: "#",
    //     icon: PieChart,
    //   },
    //   {
    //       name: "Travel",
    //       url: "#",
    //       icon: Map,
    //   },
    // ],
    navSecondary: [
        {
            title: "Ward Settings",
            url: "#",
            icon: Settings2,
        },
        {
            title: "Data Quality Check",
            url: "#",
            icon: PackageCheck,
        },
        {
            title: "Learning Center",
            url: "#",
            icon: BookAlert,
        },
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
                    <SidebarMenuButton size="lg" as-child>
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
        <SidebarFooter>
            <NavUser :user="data.user" />
        </SidebarFooter>
    </Sidebar>
</template>
