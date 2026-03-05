<script setup lang="ts">
import type { LucideIcon } from "lucide-vue-next";
import { ChevronRight } from "lucide-vue-next";
import {
    Collapsible,
    CollapsibleContent,
    CollapsibleTrigger,
} from "@/components/ui/collapsible";
import {
    SidebarGroup,
    SidebarGroupLabel,
    SidebarMenu,
    SidebarMenuAction,
    SidebarMenuButton,
    SidebarMenuItem,
    SidebarMenuSub,
    SidebarMenuSubButton,
    SidebarMenuSubItem,
} from "@/components/ui/sidebar";
import { router } from "@inertiajs/vue3";

defineProps<{
    items: {
        title: string;
        url: string;
        icon: LucideIcon;
        isActive?: boolean;
        items?: {
            title: string;
            url: string;
            onClick?: () => void; // optional click handler for Inertia
        }[];
    }[];
}>();
</script>

<template>
    <SidebarGroup>
        <SidebarGroupLabel>Clinical</SidebarGroupLabel>
        <SidebarMenu>
            <!-- Loop through main items -->
            <Collapsible
                v-for="item in items ?? []"
                :key="item.title"
                as-child
                :default-open="item.isActive"
            >
                <SidebarMenuItem>
                    <!-- Main item button -->
                    <SidebarMenuButton as-child :tooltip="item.title">
                        <a
                            :href="item.url ?? '#'"
                            @click.prevent="item?.onClick && item.onClick()"
                            class="flex items-center gap-2"
                        >
                            <component v-if="item.icon" :is="item.icon" />
                            <span>{{ item.title }}</span>
                        </a>
                    </SidebarMenuButton>

                    <!-- Sub-items (collapsible) -->
                    <template v-if="item.items?.length">
                        <CollapsibleTrigger as-child>
                            <SidebarMenuAction
                                class="data-[state=open]:rotate-90"
                            >
                                <ChevronRight />
                                <span class="sr-only">Toggle</span>
                            </SidebarMenuAction>
                        </CollapsibleTrigger>

                        <CollapsibleContent>
                            <SidebarMenuSub>
                                <SidebarMenuSubItem
                                    v-for="subItem in item.items ?? []"
                                    :key="subItem.title"
                                >
                                    <SidebarMenuSubButton as-child>
                                        <a
                                            :href="subItem.url ?? '#'"
                                            @click.prevent="
                                                subItem?.onClick &&
                                                subItem.onClick()
                                            "
                                            class="flex items-center gap-2"
                                        >
                                            <span>{{ subItem.title }}</span>
                                        </a>
                                    </SidebarMenuSubButton>
                                </SidebarMenuSubItem>
                            </SidebarMenuSub>
                        </CollapsibleContent>
                    </template>
                </SidebarMenuItem>
            </Collapsible>
        </SidebarMenu>
    </SidebarGroup>
</template>
