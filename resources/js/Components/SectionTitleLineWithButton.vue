<script setup>
import { 
  mdiCog,  
  mdiChevronDown,
  mdiChevronUp, 
  mdiKeyboardReturn
} from "@mdi/js";
import { useSlots, computed, ref } from "vue";
import { Link} from '@inertiajs/vue3';
import BaseIcon from "@/Components/BaseIcon.vue";
import BaseButton from "@/Components/BaseButton.vue";
import IconRounded from "@/Components/IconRounded.vue";

defineProps({
  icon: {
    type: String,
    default: null,
  },
  title: {
    type: String,
    required: true,
  },
  main: Boolean,
  add: {
    type: Object,
    default: {
      visible: false,
      route: ''
    }
  },
  back: {
    type: Object,
    default: {
      visible: false,
      route: '',
      class: ''
    }
  },
  filter: {
    type: Boolean,
    default: false
  }
});

const hasSlot = computed(() => useSlots().default);

const showFilter = ref(false);
</script>

<template>
  <section
    :class="{ 'pt-6': !main }"
    class="mb-6"
  >
 
        <div class="flex justify-between">
          
          <div class="">
            <slot name="links"/><br>
            <h1 
              :class="main ? 'text-3xl' : 'text-2xl'" class="leading-tight text-sky-900 dark:text-sky-200 font-bold"
            >
              {{ title }}
            </h1>
          </div>
          <div>
            <Link
              v-if="add.visible" 
              class="rounded-sm bg-emerald-600 dark:bg-emerald-600 text-white hover:bg-emerald-500 hover:border-emerald-500 hover:dark:bg-emerald-500 hover:dark:border-emerald-600 py-2 px-6 text-sm" 
              :href="route(add.route)"
            >
                <span>Add New</span>
            </Link>
            <BaseButton
              v-if="back.visible" 
              :icon="mdiKeyboardReturn" 
              color="contrast" 
              :routeName="back.route"
              class="text-xs"
              :small="true"
            />
            <BaseButton
              v-if="filter" 
              :icon="showFilter ? mdiChevronUp : mdiChevronDown" 
              color="whiteDark" 
              @click="showFilter = !showFilter" 
              class="text-xs"
              :small="true"
            />
            
          </div>
        </div>
      
    <slot v-if="hasSlot" />
    
  </section>
</template>
