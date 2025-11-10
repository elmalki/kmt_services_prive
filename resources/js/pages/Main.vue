<template>
    <AppLayout>
        <!-- Header -->

        <main class="isolate">
            <!-- Hero section -->
            <div class="relative h-screen w-full overflow-hidden">
                <!-- Background video -->
                <video
                    autoplay
                    loop
                    muted
                    playsinline
                    class="absolute top-0 left-0 h-full w-full object-cover blur-[1px] brightness-75"
                >
                    <source
                        src="http://www.kmt-service.com/videos/backgroud_video.mp4"
                        type="video/mp4"
                    />
                </video>

                <!-- Overlay (optional for readability) -->
                <div class="absolute inset-0 bg-black/40"></div>

                <!-- Foreground content -->
                <div
                    class="relative z-10 flex h-full flex-col items-center justify-center text-center text-white"
                >
                    <h1
                        class="xs:w-full mb-10 text-5xl font-semibold tracking-tight text-balance text-gray-100 sm:text-7xl md:w-1/2"
                    >
                        {{ page.props.translations.title }}
                    </h1>
                    <p class="w-1/3 text-lg">
                        {{ page.props.translations.subtitle }}
                    </p>
                </div>
            </div>
            <!-- Réalisation section -->
            <div id="realisations" class="mx-auto mt-32 max-w-7xl px-6 sm:mt-56 lg:px-8">
                <div class="mx-auto max-w-2xl lg:text-center">
                    <h2 class="text-base/7 font-semibold text-indigo-600">
                        {{ page.props.translations.innovation }}
                    </h2>
                    <p
                        class="mt-2 text-4xl font-semibold tracking-tight text-pretty text-gray-900 uppercase sm:text-5xl lg:text-balance"
                    >
                        {{ page.props.translations.innovation_subtitle }}
                    </p>
                </div>
                <div
                    class="mt-16 flex align-baseline"
                    v-for="(app, index) in realisations"
                    :key="index"
                >
                    <div v-if="index % 2 == 0">
                        <h2 class="text-center text-3xl font-bold">
                            {{ app.title[page.props.locale] }}
                        </h2>
                        <p
                            class="md:text-md text-xs sm:text-sm lg:text-lg"
                            v-html="app.description[page.props.locale]"
                        ></p>
                    </div>

                    <img :src="'/storage/' + app.image" class="w-1/2" />
                    <div v-if="index % 2 == 1">
                        <p
                            class="md:text-md text-xs sm:text-sm lg:text-lg"
                            v-html="app.description[page.props.locale]"
                        ></p>
                    </div>
                </div>
            </div>
            <!-- Logo cloud -->

            <!-- Feature section -->
            <div id="services" class="mx-auto mt-32 max-w-7xl px-6 sm:mt-56 lg:px-8">
                <div class="mx-auto max-w-2xl lg:text-center">
                    <h2 class="text-base/7 font-semibold text-indigo-600">
                        {{ page.props.translations.faisons }}
                    </h2>
                    <p
                        class="mt-2 text-4xl font-semibold tracking-tight text-pretty text-gray-900 uppercase sm:text-5xl lg:text-balance"
                    >
                        {{ page.props.translations.faisons_subtitle }}
                    </p>
                    <p class="mt-6 text-lg/8 text-gray-700">
                        Quis tellus eget adipiscing convallis sit sit eget
                        aliquet quis. Suspendisse eget egestas a elementum
                        pulvinar et feugiat blandit at. In mi viverra elit nunc.
                    </p>
                </div>
                <div
                    class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-4xl"
                >
                    <dl
                        class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-10 lg:max-w-none lg:grid-cols-2 lg:gap-y-16"
                    >
                        <div
                            v-for="feature in features"
                            :key="feature.name"
                            class="relative pl-16"
                        >
                            <dt class="text-base/7 font-semibold text-gray-900">
                                <div
                                    class="absolute top-0 left-0 flex size-10 items-center justify-center rounded-lg bg-indigo-600"
                                >
                                    <component
                                        :is="feature.icon"
                                        class="size-6 text-white"
                                        aria-hidden="true"
                                    />
                                </div>
                                {{ feature.name }}
                            </dt>
                            <dd
                                class="mt-2 text-justify text-base/7 text-gray-800"
                            >
                                {{ feature.description }}
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
            <!-- Atous section -->
            <div id="atous" class="mx-auto mt-32 max-w-7xl px-6 sm:mt-56 lg:px-8">
                <div class="mx-auto max-w-2xl lg:text-center">
                    <h2 class="text-base/7 font-semibold text-indigo-600">
                        {{ page.props.translations.pourquoi }}
                    </h2>
                    <p
                        class="mt-2 text-4xl font-semibold tracking-tight text-pretty text-gray-900 uppercase sm:text-5xl lg:text-balance"
                    >
                        {{ page.props.translations.atous }}
                    </p>
                </div>
                <div
                    class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-4xl"
                >
                    <dl
                        class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-10 lg:max-w-none lg:grid-cols-2 lg:gap-y-16"
                    >
                        <div
                            v-for="feature in props.qualities"
                            :key="feature.name"
                            class="relative pl-16"
                        >
                            <dt class="text-base/7 font-semibold text-gray-900">
                                <div
                                    class="absolute top-0 left-0 flex size-10 items-center justify-center rounded-lg bg-indigo-600"
                                >
                                    <component
                                        :is="getIcon(feature.icon)"
                                        class="size-6 text-white"
                                        aria-hidden="true"
                                    />
                                </div>
                                {{ feature.icon }}
                                {{ feature.quality[page.props.locale] }}
                            </dt>
                        </div>
                    </dl>
                </div>
            </div>

            <div class="mx-auto my-32 max-w-7xl">
                <Sponsor
                    :sponsors="props.sponsors"
                    :speed="10"
                    :duplicates="100"
                />
            </div>
        </main>

        <!-- Footer -->

    </AppLayout>
</template>

<script lang="ts" setup>
import * as HeroIcons from '@heroicons/vue/24/outline';
const iconName = (name) =>
    name
        .split('-')
        .map((w) => w.charAt(0).toUpperCase() + w.slice(1))
        .join('') + 'Icon';

// get icon component by name
const getIcon = (name) => {
    const compName = iconName(name);
    return HeroIcons[compName] || HeroIcons.QuestionMarkCircleIcon;
};
import {
    BrainElectricity,
    DataTransferBoth,
} from '@iconoir/vue';
import { computed } from 'vue';
import Sponsor from '@/components/Sponsor.vue';
import Testimonial from '@/components/Testimonial.vue';
import { Swiper, SwiperSlide } from 'swiper/vue';
// Import Swiper styles
import 'swiper/css';
import { usePage } from '@inertiajs/vue3';
import AppLayout from './layout/AppLayout.vue';
import { ArrowPathIcon, ComputerDesktopIcon } from '@heroicons/vue/24/outline';
const page = usePage();
const props = defineProps({
    realisations: Array,
    sponsors: Array,
    qualities: Array,
});


const features = [
    {
        name: computed(() => page.props.translations.features.web.name),
        description: computed(
            () => page.props.translations.features.web.description,
        ),
        icon: ComputerDesktopIcon,
    },
    {
        name: computed(() => page.props.translations.features.ia.name),
        description: computed(
            () => page.props.translations.features.ia.description,
        ),
        icon: BrainElectricity,
    },
    {
        name: computed(() => page.props.translations.features.maintenance.name),
        description: computed(
            () => page.props.translations.features.maintenance.description,
        ),
        icon: ArrowPathIcon,
    },
    {
        name: computed(() => page.props.translations.features.api.name),
        description: computed(
            () => page.props.translations.features.api.description,
        ),
        icon: DataTransferBoth,
    },
];
</script>
