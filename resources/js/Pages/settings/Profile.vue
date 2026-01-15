<script setup lang="ts">
import { Avatar, AvatarFallback } from "@/components/ui/avatar";
import SettingsLayout from "../layouts/SettingsLayout.vue";
import { Button } from "@/components/ui/button";
import { Checkbox } from "@/components/ui/checkbox";
import {
    Field,
    FieldDescription,
    FieldGroup,
    FieldLabel,
    FieldLegend,
    FieldSeparator,
    FieldSet,
} from "@/components/ui/field";
import { Input } from "@/components/ui/input";
import {
    Select,
    SelectContent,
    SelectItem,
    SelectTrigger,
    SelectValue,
} from "@/components/ui/select";
import { Textarea } from "@/components/ui/textarea";
</script>

<template>
    <SettingsLayout>
        <div class="w-full max-w-lg">
            <form>
                <FieldGroup>
                    <FieldSet>
                        <FieldLegend>Profile</FieldLegend>
                        <FieldDescription>
                            This information will be displayed publicly so be
                            careful what you share.
                        </FieldDescription>
                        <FieldGroup>
                            <Field>
                                <FieldLabel for="checkout-7j9-card-name-43j">
                                    Username
                                </FieldLabel>
                                <Input
                                    id="checkout-7j9-card-name-43j"
                                    placeholder="Evil Rabbit"
                                    required
                                />
                            </Field>
                            <Field>
                                <FieldLabel for="checkout-7j9-card-number-uw1">
                                    About
                                </FieldLabel>
                                <Textarea placeholder="Tell About your self." />

                                <FieldDescription>
                                    Write a few sentences about yourself.
                                </FieldDescription>
                            </Field>
                            <Field class="flex">
                                <FieldLabel for="checkout-7j9-card-number-uw1">
                                    Avatar
                                </FieldLabel>
                                <div class="flex gap-x-3">
                                    <Avatar>
                                        <AvatarImage
                                            src="https://github.com/shadcn.png"
                                            alt="@shadcn"
                                        />
                                        <AvatarFallback>CN</AvatarFallback>
                                    </Avatar>
                                    <Button> Change</Button>
                                </div>
                                <FieldDescription>
                                    Your image for your account.
                                </FieldDescription>
                            </Field>
                        </FieldGroup>
                    </FieldSet>
                    <FieldSeparator />
                    <FieldSet>
                        <FieldLegend>Personal Information</FieldLegend>
                        <FieldDescription>
                            Use a permanent address where you can receive mail.
                        </FieldDescription>
                        <FieldGroup>
                            <Field orientation="horizontal">
                                <Field>
                                    <FieldLabel
                                        for="checkout-7j9-card-name-43j"
                                    >
                                        Firstname
                                    </FieldLabel>
                                    <Input
                                        id="checkout-7j9-card-name-43j"
                                        placeholder="Evil Rabbit"
                                        required
                                    />
                                </Field>
                                <Field>
                                    <FieldLabel
                                        for="checkout-7j9-card-name-43j"
                                    >
                                        Lastname
                                    </FieldLabel>
                                    <Input
                                        id="checkout-7j9-card-name-43j"
                                        placeholder="Evil Rabbit"
                                        required
                                    />
                                </Field>
                            </Field>
                        </FieldGroup>
                    </FieldSet>
                    <FieldSet>
                        <FieldGroup>
                            <Field>
                                <FieldLabel
                                    for="checkout-7j9-optional-comments"
                                >
                                    Comments
                                </FieldLabel>
                                <Textarea
                                    id="checkout-7j9-optional-comments"
                                    placeholder="Add any additional comments"
                                    class="resize-none"
                                />
                            </Field>
                        </FieldGroup>
                    </FieldSet>
                    <Field orientation="horizontal">
                        <Button type="submit"> Submit </Button>
                        <Button variant="outline" type="button">
                            Cancel
                        </Button>
                    </Field>
                </FieldGroup>
            </form>
        </div>
    </SettingsLayout>
</template>
