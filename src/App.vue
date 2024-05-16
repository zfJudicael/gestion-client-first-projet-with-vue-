<template>
  <NavBar />
  <RouterView />
</template>

<script setup>
  import NavBar from './components/layouts/NavBar.vue';
  import { RouterView } from 'vue-router'
</script>

<style>
</style>
