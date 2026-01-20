<script setup lang="ts">
import { computed } from "vue";
import { Tabs, TabsList, TabsTrigger } from "@/components/ui/tabs";
import { router, usePage } from "@inertiajs/vue3";
import { route } from "ziggy-js";

import {
    Activity,
    Apple,
    ClipboardPlus,
    FolderHeart,
    Info,
    NotebookPen,
    NotepadText,
    WalletCards,
} from "lucide-vue-next";

/* ---------------------------------------------------
   Styling
--------------------------------------------------- */
const tabTriggerClass = "rounded-none px-2!";
const tabListClass =
    "flex p-0 px-4 rounded-none **:text-muted-foreground **:data-[state=active]:bg-transparent **:data-[state=active]:shadow-none **:data-[state=active]:relative **:data-[state=active]:text-foreground **:data-[state=active]:after:absolute **:data-[state=active]:after:left-0 **:data-[state=active]:after:-bottom-px **:data-[state=active]:after:h-0.5 **:data-[state=active]:after:w-full **:data-[state=active]:after:bg-foreground **:data-[state=active]:after:transition-transform";

/* ---------------------------------------------------
   Tabs Configuration
--------------------------------------------------- */
const tabs = [
    {
        value: "patientinfo",
        label: "Patient Info",
        icon: Info,
        route: "patientchart.info",
    },
    {
        value: "clinicalnotes",
        label: "Clinical Notes",
        icon: NotepadText,
        route: "patientchart.clinical-notes",
    },
    {
        value: "vitalsigns",
        label: "Vital Signs",
        icon: Activity,
        route: "patientchart.vital-signs",
    },
    {
        value: "plan",
        label: "Plan",
        icon: NotebookPen,
        route: "patientchart.plan",
    },
    {
        value: "diet",
        label: "Diet",
        icon: Apple,
        route: "patientchart.diet",
    },
    {
        value: "diagnosis",
        label: "Diagnosis",
        icon: ClipboardPlus,
        route: "patientchart.diagnosis",
    },
    {
        value: "abstract",
        label: "Abstract",
        icon: WalletCards,
        route: "patientchart.abstract",
    },
    {
        value: "documents",
        label: "Documents",
        icon: FolderHeart,
        route: "patientchart.documents",
    },
];

/* ---------------------------------------------------
   Route → Tab Mapping
--------------------------------------------------- */
const routeToTabMap: Record<string, string> = {
    "patientchart.info": "patientinfo",
    "patientchart.clinical-notes": "clinicalnotes",
    "patientchart.vital-signs": "vitalsigns",
    "patientchart.plan": "plan",
    "patientchart.diet": "diet",
    "patientchart.diagnosis": "diagnosis",
    "patientchart.abstract": "abstract",
    "patientchart.documents": "documents",
};

/* ---------------------------------------------------
   Active Tab (Derived from Laravel Route)
--------------------------------------------------- */
const page = usePage();

const activeTab = computed(() => {
    const currentRoute = page.props.ziggy?.route?.name;
    console.log(page.props.ziggy.route.name);
    return routeToTabMap[currentRoute] ?? "patientinfo";
});

/* ---------------------------------------------------
   Navigation
--------------------------------------------------- */
function goTo(routeName: string) {
    router.visit(route(routeName));
}
</script>

<template>
    <div class="flex w-full flex-col gap-6 bg-primary-foreground">
        <Tabs
            :default-value="activeTab"
            class="w-full border-b **:bg-transparent gap-0"
        >
            <TabsList :class="tabListClass">
                <TabsTrigger
                    v-for="item in tabs"
                    :key="item.route"
                    :value="item.value"
                    @click="goTo(item.route)"
                    :class="tabTriggerClass"
                >
                    <component :is="item.icon" class="mr-1 h-4 w-4" />
                    {{ item.label }}
                </TabsTrigger>
            </TabsList>
        </Tabs>
    </div>
</template>
