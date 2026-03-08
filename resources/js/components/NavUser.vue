<script setup lang="ts">
import { Bell, ChevronDown, LogOut, Settings } from "lucide-vue-next";

import { Avatar, AvatarFallback, AvatarImage } from "@/components/ui/avatar";
import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuGroup,
    DropdownMenuItem,
    DropdownMenuLabel,
    DropdownMenuSeparator,
    DropdownMenuTrigger,
} from "@/components/ui/dropdown-menu";
import {
    SidebarMenu,
    SidebarMenuButton,
    SidebarMenuItem,
    useSidebar,
} from "@/components/ui/sidebar";
import { useForm, router, Link } from "@inertiajs/vue3";

const props = defineProps<{
    user: {
        name: string;
        email: string;
        avatar: string;
    };
}>();

const { isMobile } = useSidebar();

const form = useForm({});

function handleLogout() {
    form.post("/logout");
}

function goToSettings() {
    router.visit("/settings");
}
</script>

<template>
    <SidebarMenu>
        <SidebarMenuItem>
            <DropdownMenu>
                <DropdownMenuTrigger as-child>
                    <SidebarMenuButton
                        size="lg"
                        class="bg-primary-foreground border data-[state=open]:bg-sidebar-accent data-[state=open]:text-sidebar-accent-foreground cursor-pointer hover:bg-primary-foreground hover:text-sidebar-accent-foreground"
                    >
                        <Avatar class="h-8 w-8 rounded-2xl">
                            <AvatarImage :src="user.avatar" :alt="user.name" />
                            <AvatarFallback class="rounded-lg">
                                DR
                            </AvatarFallback>
                        </Avatar>
                        <div
                            class="grid flex-1 text-left text-sm leading-tight"
                        >
                            <span class="truncate font-medium">{{
                                user.name
                            }}</span>
                            <span
                                class="truncate text-xs tracking-widest uppercase"
                                >{{ user.email }}</span
                            >
                        </div>

                        <ChevronDown class="ml-auto size-4" />
                    </SidebarMenuButton>
                </DropdownMenuTrigger>
                <DropdownMenuContent
                    class="w-[--reka-dropdown-menu-trigger-width] min-w-56 rounded-lg"
                    :side="isMobile ? 'right' : 'bottom'"
                    align="end"
                    :side-offset="4"
                >
                    <DropdownMenuLabel class="p-0 font-normal">
                    </DropdownMenuLabel>
                    <DropdownMenuItem
                        @click="handleLogout"
                        class="cursor-pointer"
                    >
                        <LogOut />
                        Log out
                    </DropdownMenuItem>
                </DropdownMenuContent>
            </DropdownMenu>
        </SidebarMenuItem>
    </SidebarMenu>
</template>
