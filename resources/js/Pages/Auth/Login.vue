<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import AuthenticationCard from "@/Components/AuthenticationCard.vue";
import AuthenticationCardLogo from "@/Components/AuthenticationCardLogo.vue";
import Checkbox from "@/Components/Checkbox.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.transform((data) => ({
        ...data,
        remember: form.remember ? "on" : "",
    })).post(route("login"), {
        onFinish: () => form.reset("password"),
    });
};
</script>

<template>

    <Head title="Log in" />

    <div class="flex">

        <div class="w-1/2 flex items-center justify-end h-screen">
            <div class="flex flex-col gap-4">



                <div class="relative bg-slate-100 text-black w-24 p-4 rounded-full rounded-e-none">
                    <Link :href="route('login')" class="relative z-10">Login</Link>
                    <!-- Circle before -->
                    <div
                        class="absolute right-0 -top-12 w-12 h-12 bg-transparent rounded-full shadow-[31px_35px_0_10px_rgba(241,245,249,1)] pointer-events-none">
                    </div>
                    <!-- Circle after -->
                    <div
                        class="absolute right-0 -bottom-12 w-12 h-12 bg-transparent rounded-full shadow-[31px_-35px_0_10px_rgba(241,245,249,1)] pointer-events-none">
                    </div>
                </div>



                <div class="relative bg-slate-100 text-black w-24 p-4 rounded-full rounded-e-none">
                    <Link :href="route('register')"  class="relative z-10">Register</Link>
                    <!-- Circle before -->
                    <div
                        class="absolute right-0 -top-12 w-12 h-12 bg-transparent rounded-full shadow-[31px_35px_0_10px_rgba(241,245,249,1)] pointer-events-none">
                    </div>
                    <!-- Circle after -->
                    <div
                        class="absolute right-0 -bottom-12 w-12 h-12 bg-transparent rounded-full shadow-[31px_-35px_0_10px_rgba(241,245,249,1)] pointer-events-none">
                    </div>
                </div>








            </div>
        </div>

        <div class="w-1/2">

            <AuthenticationCard>
                <template #logo>
                    <AuthenticationCardLogo />
                </template>

                <div v-if="status" class="mb-4 text-sm font-medium text-green-600">
                    {{ status }}
                </div>

                <form @submit.prevent="submit">
                    <div>
                        <InputLabel for="email" value="Email" />
                        <TextInput id="email" v-model="form.email" type="email" class="mt-1 block w-full" required
                            autofocus autocomplete="username" />
                        <InputError class="mt-2" :message="form.errors.email" />
                    </div>

                    <div class="mt-4">
                        <InputLabel for="password" value="Password" />
                        <TextInput id="password" v-model="form.password" type="password" class="mt-1 block w-full"
                            required autocomplete="current-password" />
                        <InputError class="mt-2" :message="form.errors.password" />
                    </div>

                    <div class="mt-4 block">
                        <label class="flex items-center">
                            <Checkbox v-model:checked="form.remember" name="remember" />
                            <span class="ml-2 text-sm text-gray-600">Remember me</span>
                        </label>
                    </div>

                    <div class="mt-4 flex items-center justify-end">
                        <Link v-if="canResetPassword" :href="route('password.request')"
                            class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-rose-500 focus:ring-offset-2">
                        Forgot your password?
                        </Link>

                        <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing">
                            Log in
                        </PrimaryButton>
                    </div>
                </form>
            </AuthenticationCard>
        </div>
    </div>

</template>