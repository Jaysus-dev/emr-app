<script lang="ts">
export const description = "An inset sidebar with secondary navigation.";
export const iframeHeight = "800px";
</script>

<script setup lang="ts">
import AppSidebar from "@/components/AppSidebar.vue";
import NavUser from "./NavUser.vue";
import {
    Breadcrumb,
    BreadcrumbItem,
    BreadcrumbLink,
    BreadcrumbList,
    BreadcrumbPage,
    BreadcrumbSeparator,
} from "@/components/ui/breadcrumb";
import { Separator } from "@/components/ui/separator";
import {
    SidebarInset,
    SidebarProvider,
    SidebarTrigger,
} from "@/components/ui/sidebar";

type User = {
    name: string;
    email: string;
    avatar: string;
};

const user: User = {
    name: "Dr. Jay Estoquia ",
    email: "Pavilion 2",
    avatar: "/avatars/shadcn.jpg",
};
</script>

<template>
    <SidebarProvider>
        <AppSidebar />

        <SidebarInset>
            <header
                class="flex w-full justify-between h-16 shrink-0 items-center gap-2"
            >
                <div class="flex justify-between items-center gap-2 px-4">
                    <SidebarTrigger class="-ml-1" />
                    <Separator
                        orientation="vertical"
                        class="mr-2 data-[orientation=vertical]:h-4"
                    />
                    <Breadcrumb>
                        <BreadcrumbList>
                            <BreadcrumbItem class="hidden md:block">
                                <BreadcrumbLink href="">
                                    Building Your Application
                                </BreadcrumbLink>
                            </BreadcrumbItem>
                            <BreadcrumbSeparator class="hidden md:block" />
                            <BreadcrumbItem>
                                <BreadcrumbPage>Data Fetching</BreadcrumbPage>
                            </BreadcrumbItem>
                        </BreadcrumbList>
                    </Breadcrumb>
                </div>
                <div>
                    <NavUser :user="user" class="px-4" />
                </div>
            </header>
            <slot />
        </SidebarInset>
    </SidebarProvider>
</template>
