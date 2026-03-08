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
</script>

<template>
    <SettingsLayout>
        <div class="w-full max-w-md">
            <FieldGroup>
                <FieldSet>
                    <FieldLegend>Appearance</FieldLegend>
                    <FieldDescription>
                        Choose how the app looks: Dark mode, Light mode, or
                        match your system settings.
                    </FieldDescription>
                    <Field>
                        <Select default-value="">
                            <SelectTrigger
                                id="checkout-exp-month-ts6 "
                                class="cursor-pointer"
                            >
                                <SelectValue placeholder="Choose Appearance" />
                            </SelectTrigger>
                            <SelectContent>
                                <SelectItem class="cursor-pointer" value="01">
                                    Light Mode
                                </SelectItem>
                                <SelectItem class="cursor-pointer" value="02">
                                    Dark Mode
                                </SelectItem>
                                <SelectItem class="cursor-pointer" value="03">
                                    System
                                </SelectItem>
                                <SelectItem class="cursor-pointer" value="04">
                                    Custom
                                </SelectItem>
                            </SelectContent>
                        </Select>
                    </Field>
                </FieldSet>
            </FieldGroup>
        </div>
    </SettingsLayout>
</template>
