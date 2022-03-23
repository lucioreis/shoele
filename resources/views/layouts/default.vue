<script setup lang="ts">
import NavBar from '../components/NavBar.vue';
import Footer from '../components/Footer.vue';
// This is a peristent layout
// Include me with <template layout="default" />
</script>

<template>
  <NavBar />
  <slot />
  <Footer />
</template>

<style>
@import "@/assets/base.css";
</style>
