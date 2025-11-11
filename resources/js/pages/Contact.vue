<template>
    <AppLayout :menuBlack="true">
        <div class="mt-40 lg:absolute lg:inset-0 ltr:lg:left-1/2 rtl:lg:right-1/2">
            <img
                class="h-64 w-full bg-gray-50 object-cover sm:h-80 lg:absolute lg:h-full"
                src="https://images.unsplash.com/photo-1559136555-9303baea8ebd?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&crop=focalpoint&fp-x=.4&w=2560&h=3413&&q=80"
                alt=""
            />
        </div>
        <div
            class="pt-16 pb-24 sm:pt-24 sm:pb-32 lg:mx-auto lg:grid lg:max-w-7xl lg:grid-cols-2 lg:pt-32"
        >
            <div class="px-6 lg:px-8">
                <div class="mx-auto max-w-xl lg:mx-0 lg:max-w-lg">
                    <h2
                        class="text-4xl font-semibold tracking-tight text-pretty text-gray-900 sm:text-5xl"
                    >
                        {{ page.props.translations.working_together }}
                    </h2>
                    <p class="mt-2 text-lg/8 text-gray-600">
                        {{ page.props.translations.working_together_subtitle }}
                    </p>
                    <form class="mt-16">
                        <input
                            type="hidden"
                            name="csrf_token"
                            :value="page.props.csrf_token"
                        />
                        <div
                            class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2"
                        >
                            <div class="sm:col-span-2">
                                <label
                                    for="name"
                                    class="block text-sm/6 font-semibold text-gray-900"
                                    >{{ page.props.translations.nom }}</label
                                >
                                <div class="mt-2.5">
                                    <input
                                        id="name"
                                        v-model="form.name"
                                        type="text"
                                        autocomplete="name"
                                        class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600"
                                    />
                                </div>
                            </div>

                            <div class="sm:col-span-2">
                                <label
                                    for="email"
                                    class="block text-sm/6 font-semibold text-gray-900"
                                    >{{ page.props.translations.email }}</label
                                >
                                <div class="mt-2.5">
                                    <input
                                        id="email"
                                        v-model="form.email"
                                        type="email"
                                        autocomplete="email"
                                        class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600"
                                    />
                                </div>
                            </div>
                            <div class="sm:col-span-2">
                                <label
                                    for="subject"
                                    class="block text-sm/6 font-semibold text-gray-900"
                                    >{{
                                        page.props.translations.subject
                                    }}</label
                                >
                                <div class="mt-2.5">
                                    <input
                                        type="text"
                                        v-model="form.subject"
                                        id="subject"
                                        autocomplete="organization"
                                        class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600"
                                    />
                                </div>
                            </div>
                            <div class="sm:col-span-2">
                                <div class="flex justify-between text-sm/6">
                                    <label
                                        for="message"
                                        class="block text-sm/6 font-semibold text-gray-900"
                                        >{{
                                            page.props.translations.message
                                        }}</label
                                    >
                                </div>
                                <div class="mt-2.5">
                                    <textarea
                                        id="message"
                                        v-model="form.message"
                                        rows="4"
                                        aria-describedby="message-description"
                                        class="block w-full rounded-md bg-white px-3.5 py-2 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600"
                                    ></textarea>
                                </div>
                            </div>
                        </div>
                        <div
                            class="mt-10 flex justify-end border-t border-gray-900/10 pt-8"
                        >
                            <button
                                @click="submit"
                                type="submit"
                                class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                            >
                               {{page.props.translations.send_message}}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
<script setup lang="ts">
import AppLayout from '@/pages/layout/AppLayout.vue';
import { useForm, usePage } from '@inertiajs/vue3';
const page = usePage();
const form = useForm({
    name: null,
    email: null,
    subject: null,
    message: null,
});
const submit = () => {
    form.submit('post', '/contact');
};
</script>
