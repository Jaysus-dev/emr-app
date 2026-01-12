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

const form = useForm({
    email: "",
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
        <div
            class="grid grid-cols-1 md:grid-cols-[2fr_1.3fr] grid-col w-full max-w-4xl shadow-lg h-120 rounded-lg overflow-hidden"
        >
            <!-- Left Column: Carousel / Images -->
            <div class="bg-gray-200 relative overflow-hidden">
                <img
                    src="https://via.placeholder.com/800x600"
                    alt="News Image"
                    class="object-cover w-full h-full"
                />
                <div
                    class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white p-4 text-center"
                >
                    <h2 class="font-bold text-lg">Latest News</h2>
                    <p class="text-sm">
                        This is your EMR news or carousel section.
                    </p>
                </div>
            </div>
            <!-- Right Column: Login Card -->
            <Card
                class="w-full max-w-sm flex justify-center rounded-bl-none rounded-tl-none"
            >
                <CardHeader>
                    <CardTitle>Login to your account</CardTitle>
                    <CardDescription>
                        Enter your email below to login to your account
                    </CardDescription>
                </CardHeader>
                <CardContent>
                    <form
                        class="grid w-full items-center gap-3"
                        @submit.prevent="form.post(route('login.submit'))"
                    >
                        <div class="grid w-full items-center gap-2">
                            <div class="flex flex-col space-y-1.5">
                                <Label for="email">Username</Label>
                                <Input
                                    id="email"
                                    type="email"
                                    v-model="form.email"
                                    placeholder="Input Username"
                                />
                            </div>
                            <div class="flex flex-col space-y-1.5">
                                <div class="flex items-center">
                                    <Label for="password">Password</Label>
                                </div>
                                <Input
                                    id="password"
                                    type="password"
                                    v-model="form.password"
                                    placeholder="Input Password"
                                />
                            </div>
                            <div class="flex flex-col space-y-1.5">
                                <div class="flex items-center">
                                    <Label for="password">Pavilion</Label>
                                </div>
                                <Input
                                    id=""
                                    type=""
                                    v-model="form.password"
                                    placeholder="Choose Pavilion"
                                />
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

                <CardFooter class="flex flex-col gap-2">
                    <!--<Button variant="outline" class="w-full cursor-pointer">
                        Login with Google
                    </Button>-->
                    <CardAction
                        class="flex justify-between w-full items-center"
                    >
                        <Button
                            class="cursor-pointer italic text-blue-600"
                            variant="link"
                        >
                            Sign Up
                        </Button>
                        <Button
                            href="#"
                            variant="link"
                            class="cursor-pointer italic text-blue-600"
                        >
                            Forgot your password?
                        </Button>
                    </CardAction>
                </CardFooter>
            </Card>
        </div>
    </div>
</template>
