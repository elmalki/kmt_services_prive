<template>
    <section
        class="w-full overflow-hidden bg-white py-6"
        aria-label="Our sponsors"
    >
        <!-- outer wrapper - clip overflow -->
        <div
            class="relative w-full"
            @mouseenter="isHover = true"
            @mouseleave="isHover = false"
            @focusin="isHover = true"
            @focusout="isHover = false"
        >
            <!-- scrolling track (duplicated content for infinite loop) -->
            <div
                :class="['flex items-center gap-8 whitespace-nowrap will-change-transform',
                 'min-h-[64px]']"
                :style="trackStyle"
                role="list"
            >
                <template v-for="(sponsor, idx) in repeatedLogos" :key="`sponsor-${idx}-${sponsor.id ?? idx}`">
                    <div class="flex items-center justify-center shrink-0" role="listitem">
                        <img
                            :src="'storage/'+sponsor.image"
                            :alt="sponsor.alt || 'Sponsor sponsor'"
                            class="max-h-16 object-contain"
                            loading="lazy"
                            @error="onImgError"
                            :title="sponsor.title || ''"
                        />
                    </div>
                </template>
            </div>
        </div>
    </section>
</template>

<script setup>
/*
  Props:
    Sponsors: Array<{ id?, src: string, alt?: string, title?: string }>
    speed: number (seconds for one full translation of single track) default 20
    gap: spacing between Sponsors, controlled by Tailwind gap classes (we used gap-8)
    duplicates: how many times to duplicate the track to ensure continuous loop (default 2)
*/
import { ref, computed } from 'vue';

const props = defineProps({
    sponsors: {
        type: Array,
        required: true
    },
    speed: {
        type: Number,
        default: 20
    },
    duplicates: {
        type: Number,
        default: 2
    }
});

const isHover = ref(false);

function onImgError(e) {
    // optional: fallback when image fails
    e.target.style.opacity = '0.5';
}

// duplicate Sponsors to create infinite feel
const repeatedLogos = computed(() => {
    const arr = [];
    for (let i = 0; i < props.duplicates; i++) {
        props.sponsors.forEach((l) => arr.push(l));
    }
    return arr;
});

// inline style for animation and pause on hover
const trackStyle = computed(() => {
    // Use CSS variable for animation duration to enable dynamic control
    const duration = `${props.speed}s`;
    return {
        animation: `marquee ${duration} linear infinite`,
        animationPlayState: isHover.value ? 'paused' : 'running'
    };
});
</script>

<style>
/* Basic marquee animation: translateX from 0 -> -50% (since we duplicate the track) */
@keyframes marquee {
    0% { transform: translateX(0%); }
    100% { transform: translateX(-50%); }
}

/* Pause animation when user prefers reduced motion */
@media (prefers-reduced-motion: reduce) {
    .marquee,
    [style*="animation: marquee"] {
        animation: none !important;
        transform: none !important;
    }
}

/* Ensure the animation-play-state toggles when hovered via computed style.
   If you prefer pure CSS pause-on-hover, you can also add:
   .outer:hover .track { animation-play-state: paused; }
*/
</style>
