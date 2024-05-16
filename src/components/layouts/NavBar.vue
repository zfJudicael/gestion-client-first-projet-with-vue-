<template>
    <div class="bg-green-600 px-12">
        <nav class=" flex justify-end">
            <RouterLink :to="{name: 'home'}" class="routerLink border-black"><i class="fa-solid fa-house"></i> Home</RouterLink>
            <RouterLink :to="{name: 'addClient'}" class="routerLink"><i class="fa-solid fa-user-plus"></i> Ajouter Client</RouterLink>
        </nav>
    </div>
</template>

<script setup>

</script>

<style>
@tailwind components;

@layer components{
    .routerLink{
        @apply  p-5 hover:underline hover:text-white transition duration-300;
    }
}
</style>