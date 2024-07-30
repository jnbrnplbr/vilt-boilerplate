<script setup>
import { containerMaxW } from "@/config.js";
import BaseLevel from "@/Components/BaseLevel.vue";
import JustboilLogo from "@/Components/JustboilLogo.vue";

const year = new Date().getFullYear();
</script>

<template>
  <footer class="py-2 px-6" :class="containerMaxW">
    <BaseLevel>
      <div class="text-sm text-center md:text-left">
        &copy; {{ year }} - RJB Clinic
          <a href="https://github.com/bangbangbang45/" target="_blank"></a>
        <slot />
      </div>
      <div class="md:py-2">
        <a href="/">
          <img src="/rjb-black.png" class="w-[200px]">
        </a>
      </div>
    </BaseLevel>
  </footer>
</template>
