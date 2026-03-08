<script setup lang="ts">
import {
    Button,
    Card,
    CardAction,
    CardContent,
    CardDescription,
    CardFooter,
    CardHeader,
    CardTitle,
    Input,
    Label,
} from "@/components/ui";

import { useForm } from "@inertiajs/vue3";
import { route } from "ziggy-js";

const form = useForm({
    username: "",
    password: "",
});
</script>

<script lang="ts">
export default {
    layout: null, // <- disables AppLayout
};
</script>

<template>
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <!-- Right Column: Login Card -->
        <Card class="w-full max-w-sm flex justify-center py-10!">
            <CardContent>
                <form
                    class="grid w-full items-center gap-3"
                    @submit.prevent="form.post(route('login.submit'))"
                >
                    <div class="grid w-full items-center gap-2">
                        <div class="flex flex-col space-y-1.5">
                            <Label for="username">Username</Label>
                            <Input
                                id="username"
                                type="username"
                                v-model="form.username"
                                placeholder="Input Username"
                            />
                        </div>
                        <div class="flex flex-col space-y-1.5">
                            <div class="flex items-center">
                                <Label for="password">Password</Label>
                            </div>
                            <Input
                                id="pavilion"
                                type="password"
                                v-model="form.password"
                                placeholder="Input Password"
                            />
                        </div>

                        <div class="flex flex-col space-y-1.5">
                            <!-- temporary removed for tech exam
                                <div class="flex items-center">
                                    <Label for="password">Pavilion</Label>
                                </div>
                                <Input
                                    id=""
                                    type=""
                                    v-model="form.password"
                                    placeholder="Choose Pavilion"
                                />-->
                        </div>
                    </div>
                    <Button
                        type="submit"
                        class="w-full cursor-pointer"
                        :disabled="form.processing"
                    >
                        Login
                    </Button>
                </form>
            </CardContent>
        </Card>
    </div>
</template>
