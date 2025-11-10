<script setup lang="ts">
import { Dialog, DialogPanel } from '@headlessui/vue';
import { Bars3Icon, XMarkIcon,MapPinIcon,PhoneIcon,EnvelopeIcon } from '@heroicons/vue/24/outline';
import LocaleSwitcher from '@/components/LocaleSwitcher.vue';
import { usePage,Link } from '@inertiajs/vue3';
import { computed, onMounted, onUnmounted, ref } from 'vue';
import { GoogleMap, Marker } from 'vue3-google-map';

const MAP_KEY = 'AIzaSyAAO9bRrIJHwWwBn38Kpn1tjhAATAnjYII'; // Replace with your actual API key
const center = ref({ lat: 30.219075, lng: -9.373946});


const page = usePage();
const props = defineProps({
    menuBlack: {
        type: Boolean,
        default: false,
    },
});
const isScrolled = ref(false);
function handleScroll() {
    isScrolled.value = window.scrollY > 10;
}

onMounted(() => {
    window.addEventListener('scroll', handleScroll);
});
onUnmounted(() => {
    window.removeEventListener('scroll', handleScroll);
});
const mobileMenuOpen = ref(false);
const navigation = computed(()=>[
    { name: page.props.translations.navigation.our_projects, href: '/#realisations' },
    { name: page.props.translations.navigation.our_services, href: '/#services' },
    { name: page.props.translations.navigation.our_strengths, href: '/#atous' },
    { name: page.props.translations.navigation.contact, href: '/contact' },
]);
const footerNavigation = {

};

</script>

<template>
    <div class="bg-white" :dir="page.props.locale === 'ar' ? 'rtl' : 'ltr'">
        <!-- Header -->
        <header class="absolute inset-x-0 top-0 z-50">
            <nav
                :class="[
                    'fixed flex w-full items-center justify-between transition-all duration-300 lg:px-8',
                    isScrolled||props.menuBlack
                        ? 'bg-gray-50 p-2 text-gray-700 shadow-lg backdrop-blur'
                        : 'bg-transparent p-6 text-white',
                ]"
                aria-label="Global"
            >
                <div class="flex p-2 lg:flex-1">
                    <Link href="/" class="-m-1.5 bg-gray-200 p-1.5">
                        <span class="sr-only">KMT SERICES PRIVE</span>
                        <img class="h-10 w-auto" src="../../logo.png" alt="" />
                    </Link>
                </div>
                <div class="flex lg:hidden">
                    <button
                        type="button"
                        class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700"
                        @click="mobileMenuOpen = true"
                    >
                        <span class="sr-only">Open main menu</span>
                        <Bars3Icon class="size-6" aria-hidden="true" />
                    </button>
                </div>
                <div class="hidden lg:flex lg:gap-x-12">
                    <Link
                        v-for="item in navigation"
                        :key="item.name"
                        :href="item.href"
                        class="px-3 text-lg/6 font-semibold"
                        >{{ item.name }}</Link
                    >
                </div>
                <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                    <LocaleSwitcher />
                </div>
            </nav>
            <Dialog
                class="lg:hidden"
                @close="mobileMenuOpen = false"
                :open="mobileMenuOpen"
            >
                <div class="fixed inset-0 z-50" />
                <DialogPanel
                    class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white p-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10"
                >
                    <div class="flex items-center justify-between">
                        <a href="/" class="-m-1.5 p-1.5">
                            <span class="sr-only">KMT SERVICES PRIVE</span>
                            <img
                                class="h-8 w-auto"
                                src="../../logo.png"
                                alt=""
                            />
                        </a>
                        <button
                            type="button"
                            class="-m-2.5 rounded-md p-2.5 text-gray-700"
                            @click="mobileMenuOpen = false"
                        >
                            <span class="sr-only">Close menu</span>
                            <XMarkIcon class="size-6" aria-hidden="true" />
                        </button>
                    </div>
                    <div class="mt-6 flow-root">
                        <div class="-my-6 divide-y divide-gray-500/10">
                            <div class="space-y-2 py-6">
                                <a
                                    v-for="item in navigation"
                                    :key="item.name"
                                    :href="item.href"
                                    class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 hover:bg-gray-50"
                                    >{{ item.name }}</a
                                >
                            </div>
                            <div class="py-6">
                                <a
                                    href="#"
                                    class="-mx-3 block rounded-lg px-3 py-2.5 text-base/7 font-semibold text-gray-900 hover:bg-gray-50"
                                    >Log in</a
                                >
                            </div>
                        </div>
                    </div>
                </DialogPanel>
            </Dialog>
        </header>
        <div>
            <slot></slot>
        </div>
        <GoogleMap :api-key="MAP_KEY" style="width: 100%; height: 500px" :center="center" :zoom="17">
                <Marker :options="{ position: center }" />
            </GoogleMap>
        <footer class="relative mx-auto mt-10 max-w-7xl px-6 lg:px-8">
            <div class="border-t border-gray-900/10 py-16 sm:py-24 lg:py-32">
                <div class="flex justify-between">
                    <img class="h-40" src="../../logo.png" alt="Company name" />
                    <div
                        class="mt-16 flex flex-col  gap-8  xl:mt-0"
                    >
                        <div class="flex items-center gap-2 text-gray-700">
                                <MapPinIcon class="text-gray-900 size-10"/>
                                <p class="">{{page.props.translations.address}}</p>

                            </div>
                        <div class="flex items-center gap-2 text-gray-700">
                            <PhoneIcon class="text-gray-900 size-5"/>
                            <div class="flex gap-5">
                                <p>(+212) 671 891 892</p>
                                <p>/</p>
                                <p>(+212) 610 60 39 39</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-2 text-gray-700">
                            <EnvelopeIcon class="text-gray-900 size-5"/>
                            <a href="mailto:contact@kmt-service.com" class="text-blue-500 hover:text-blue-600">contact@kmt-service.com</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</template>

<style scoped>

</style>
