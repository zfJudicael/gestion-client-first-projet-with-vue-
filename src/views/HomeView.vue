<template>
    <table class="text-center border mx-auto block overflow-y-scroll  w-3/4 mt-7" style="max-height: 450px">
        <thead class="bg-green-500 text-white sticky top-0">
            <tr>
                <th class=" w-36">Numéro du compte</th>
                <th class=" w-60">Nom</th>
                <th class=" w-60">Prénoms</th>
                <th class=" w-40">Solde</th>
                <th class=" w-40">Observation</th>
                <th class=" w-24">Modifier</th>
                <th class=" w-24">Supprimer</th>
            </tr>
        </thead>
        <tbody v-if="accountStore.comptes">
            <tr v-for="compte in accountStore.comptes">
                <td>{{ compte.numCompte }}</td>
                <td>{{ compte.nom }}</td>
                <td>{{ compte.prenoms }}</td>
                <td>{{ compte.solde }}</td>
                <td :class="observationColor(observation(compte.solde))">{{ observation(compte.solde) }}</td>
                <td>
                    <button @click="openModal(compte.numCompte, compte.nom, compte.prenoms, compte.solde)">
                        <i class="fa-regular fa-pen-to-square fa-lg text-blue-600 hover:text-blue-800"></i>
                    </button>
                </td>
                <td>
                    <button @click="accountStore.deleteAccount(compte.numCompte)">
                        <i class="fa-solid fa-trash fa-lg text-red-600 hover:text-red-800"></i>
                    </button>
                </td>
            </tr>
        </tbody>
        <tbody v-else>
            <tr class="col-span-7 text-center">Aucun compte à afficher</tr>
        </tbody>
    </table>

    <div class="text-right mt-12 w-4/5">
        <p class="text-lg inline">Solde total des clients : </p><span class="text-2xl inline-block w-40">{{
            accountStore.calculTotal }} Ar</span><br>
        <p class="text-lg inline">Solde maximal : </p><span class="text-2xl inline-block w-40">{{
            accountStore.chercherMax }} Ar</span><br>
        <p class="text-lg inline">Solde minimal : </p><span class="text-2xl inline-block w-40">{{
            accountStore.chercherMin }} Ar</span>
    </div>

    <Teleport to="#modal" v-if="showModal">
        <ModalView @hideModal="toggleShowModal">
            <template v-slot:modification>
                <h2 class="text-center font-bold p-5 border-black border-solid border-b">Modification du compte numéro : {{
                    numCompte }}</h2>
                <form class="formulaire text-center" @submit="modify">
                    <label class="inline-block p-1 w-40">Nom :</label><input type="text" required v-autofocus v-model="nom"
                        class="bg-gray-200 p-2 m-1"><br><br>
                    <label class="inline-block p-1 w-40">Prénoms :</label><input type="text" v-model="prenoms"
                        class="bg-gray-200 p-2 m-1"><br><br>
                    <label class="inline-block p-1 w-40">Solde :</label><input type="number" v-model="solde"
                        class="bg-gray-200 p-2 m-1"><br><br>

                    <div class=" flex justify-center">
                        <input type="submit" class="bg-blue-600 p-1 m-1 rounded-lg hover:text-slate-200 btn"
                            value="Confirmer">
                        <input type="button" @click="toggleShowModal"
                            class="bg-red-600 p-1 m-1 rounded-lg hover:text-slate-200 btn" value="Annuler">
                    </div>
                </form>
            </template>
        </ModalView>
    </Teleport>
</template>

<script setup>
import { onMounted } from 'vue';
import { ref } from 'vue';
import { useAccountStore } from '../store/AccountStore';
import { vAutofocus } from '../directives/vAutoFocus';
import ModalView from '../components/ModalView.vue';


const showModal = ref(false)
const numCompte = ref('')
const nom = ref('')
const prenoms = ref('')
const solde = ref('')
const accountStore = useAccountStore()

onMounted(() => {
    accountStore.getAllAccount()
})

const openModal = (numParam, nomParam, prenomsParam, soldeParam) => {
    numCompte.value = numParam;
    nom.value = nomParam;
    prenoms.value = prenomsParam;
    solde.value = soldeParam;
    toggleShowModal()
}

const toggleShowModal = () => {
    showModal.value = !showModal.value
}

const modify = (event) => {
    event.preventDefault()
    accountStore.updateAccount(numCompte.value, nom.value.toUpperCase(), prenoms.value, solde.value)   
    toggleShowModal()
}

const observation = (solde) => {
    let observation = '';
    if (solde < 1000) {
        observation = 'Insuffisant'
    } else if (solde < 5000) {
        observation = 'Moyen'
    } else {
        observation = 'Elevé'   
    };

    return observation;
}

const observationColor = (params) => {
    let color = '';

    if (params == 'Insuffisant') { color = 'text-red-500' }
    else if (params == 'Moyen') color = 'text-green-500'
    else color = 'text-blue-500';

    return color;
}

</script>

<style>
@tailwind components;

@layer components {
    table {
        @apply rounded-xl cursor-default;
    }

    td, th{
        @apply border;
    }

    tbody td{
        @apply p-2;
    }

    tbody tr:nth-child(even){
        @apply bg-gray-100;
    }
    tbody tr:hover{
        @apply bg-gray-300;
    }
}

</style>