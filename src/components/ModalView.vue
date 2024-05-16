<template>
    <div class="backdrop" @click.self="$emit('hideModal')">
        <div class="modal md:w-2/3 lg:w-2/5 p-5  mx-auto my-32 rounded-lg bg-white w-2/3" :style="modWidth">
            <slot name="modification"></slot>
            <slot name="ajout"></slot>           
        </div>
    </div>
</template>

<script setup>

const emit = defineEmits(['hideModal'])
const props = defineProps({
    modWidth: {
        type: String
    }
})

</script>

<style>

.backdrop {
        top: 0;
        position: fixed;
        background: rgba(0, 0, 0, 0.5);
        width: 100%;
        height: 100%;
    }

    .modal h1 {
        color: #03cfb4;
        border: none;
        padding: 0;
    }

    .modal .actions {
        text-align: center;
        margin: 30px 0 10px 0;
    }

    .modal .actions a {
        color: #333;
        padding: 8px;
        border: 1px solid #eee;
        border-radius: 4px;
        text-decoration: none;
        margin: 10px;
    }

    .modal.sale {
        background: crimson;
        color: white;
    }

    .modal.sale h1 {
        color: white;
    }

    .modal.sale .actions {
        color: white;
    }

    .modal.sale .actions a {
        color: white;
    }
</style>