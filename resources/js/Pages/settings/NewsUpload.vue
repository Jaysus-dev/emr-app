<script setup lang="ts">
import SettingsLayout from "../layouts/SettingsLayout.vue";
import {
    Select,
    SelectContent,
    SelectItem,
    SelectTrigger,
    SelectValue,
} from "@/components/ui/select";
import {
    Field,
    FieldDescription,
    FieldGroup,
    FieldLabel,
    FieldLegend,
    FieldSeparator,
    FieldSet,
} from "@/components/ui/field";
import { Image, ImageDown } from "lucide-vue-next";
import Button from "@/components/ui/button/Button.vue";
</script>

<template>
    <SettingsLayout>
        <div class="w-full max-w-lg">
            <FieldGroup>
                <FieldSet>
                    <FieldLegend> News Upload </FieldLegend>
                    <FieldDescription>
                        Upload News For the Log in News Carousel.
                    </FieldDescription>
                    <Field>
                        <div
                            class="flex justify-center rounded-lg border-2 border-dashed white/25 px-6 py-10 h-full"
                        >
                            <div class="text-center">
                                <div class="mt-4 flex text-sm/6 text-gray-400">
                                    <label
                                        for="file-upload"
                                        class="relative cursor-pointer rounded-md bg-transparent font-semibold text-indigo-400 focus-within:outline-2 focus-within:outline-offset-2 focus-within:outline-indigo-500 hover:text-indigo-300"
                                    >
                                        <span>Upload a file</span>
                                        <input
                                            id="file-upload"
                                            type="file"
                                            name="file-upload"
                                            class="sr-only"
                                        />
                                    </label>
                                    <p class="pl-1">or drag and drop</p>
                                </div>
                                <p class="text-xs/5 text-gray-400">
                                    PNG, JPG, GIF up to 10MB
                                </p>
                            </div>
                        </div>
                    </Field>

                    <Button> Upload Image</Button>
                </FieldSet>
            </FieldGroup>
        </div>
    </SettingsLayout>
</template>
