<script setup lang="ts">
import NavBar from '../components/NavBar.vue';
import Footer from '../components/Footer.vue';
import { computed } from 'vue';
// This is a peristent layout
// Include me with <template layout="default" />
const props = defineProps(['auth']);
const username = computed(() => {
  if (props.auth)
    return props.auth.user.username;
  else return null;
});
</script>

<template>
  <NavBar :username="username" />
  <slot />
  <Footer />
</template>

<style>
@import "@/assets/base.css";
</style>
