<template>
    <Swiper
        :modules="[Autoplay, Navigation, Pagination]"
        :slides-per-view="3"
        :space-between="20"
        :loop="true"
        :autoplay="{
      delay: props.delay,
      disableOnInteraction: false,
      pauseOnMouseEnter: true
    }"
        :observer="true"
        :observe-parents="true"
        class="sponsors-swiper"
    >
        <SwiperSlide v-for="sponsor in props.sponsors" :key="sponsor.id" class="flex items-center justify-center shrink-0"  >
            <img :src="sponsor.image"  class="max-h-32 object-contain" :alt="sponsor.alt" loading="lazy" />
        </SwiperSlide>
    </Swiper>
</template>

<script lang="ts" setup>
import { Swiper, SwiperSlide } from 'swiper/vue'
import { Autoplay, Navigation, Pagination } from 'swiper/modules'
import 'swiper/css'
import 'swiper/css/navigation'
import 'swiper/css/pagination'
const props = defineProps({
    sponsors: {
        type: Array,
        required: true
    },
    delay: {
        type: Number,
        default: 1500
    },
    number: {
        type: Number,
        default: 2
    }
});


</script>
