<!-- resources/js/Components/LocaleSwitcher.vue -->
<script setup>
import { useForm, usePage } from '@inertiajs/vue3';

const page = usePage();
const form = useForm({ locale: page.props.locale });

function switchTo(locale) {
    form.locale = locale;
    form.post('/locale', {
        preserveScroll: true,
        preserveState: true,
        onSuccess:()=>page.props.translations
    });
}
</script>

<template>
       <div class="flex gap-2 p-2 cursor-pointer">
                <span v-if="page.props.locale==='ar'" @click="switchTo('fr')"  style="width: 1.5rem; height: 1.5rem; flex-shrink: 0;">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 480">
                        <g fill-rule="evenodd" stroke-width="1pt">
                            <path fill="#fff" d="M0 0h640v480H0z"></path>
                            <path fill="#00267f" d="M0 0h213.3v480H0z"></path>
                            <path fill="#f31830" d="M426.7 0H640v480H426.7z"></path>
                        </g>
                    </svg>
                </span>
               <span v-else  @click="switchTo('ar')" style="width: 1.5rem; height: 1.5rem; flex-shrink: 0;">
                   <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 480">
                       <path fill="#c1272d" d="M640 0H0v480h640z"></path>
                       <path fill="none" stroke="#006233" stroke-width="11.7" d="M320 179.4L284.4 289l93.2-67.6H262.4l93.2 67.6z"></path>
                   </svg>
               </span>
    </div>
</template>
