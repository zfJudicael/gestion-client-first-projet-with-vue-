<template>
  <div class="addClient pt-12 w-96 mx-auto">
    <form @submit="saveClient">
      <label>Nom :</label>
      <input type="text" class="bg-gray-200 p-2" placeholder="Nom du client..." title="Veuillez entrer un nom valide"
        v-autofocus v-model="client.nom" required><br><br>

      <label>Prénoms :</label>
      <input type="text" class="bg-gray-200 p-2" placeholder="Prénoms..." v-model="client.prenoms"
        title="Veuillez entrer un prénom valide"><br><br>

      <label>Solde :</label>
      <input type="number" min="0" class="bg-gray-200 p-2" pattern="[0-9]+" placeholder="0 Ar par défaut"
        v-model="client.solde" title="Veuillez entrer une suite de nombres valide"><br><br>

      <input type="submit" class="bg-blue-600 p-1 m-1 rounded-lg hover:text-slate-200 btn ml-7" value="Sauvegarder">

      <input type="button" class="bg-red-600 p-1 m-1 rounded-lg hover:text-slate-200 btn" value="Annuler"
        @click="viderChamp">
    </form>
  </div>

  <Teleport to="#modal" v-if="showModal">
    <ModalView modWidth="width: 300px" @close="() => {
      showModal = false;
      success = false;
      fail = false
    }">
      <template v-slot:ajout>
        <div v-if="fail" class="text-center">
          <h2 class="text-center font-bold p-5 border border-solid border-black">Echec de l'ajout</h2>
          <p>{{ error }}</p>
          <button @click="() => showModal = !showModal"
            class="bg-red-600 p-1 mx-auto my-1 rounded-lg hover:text-slate-200 btn">Annuler</button>
        </div>
        <div v-if="success" class="text-center">
          <h2 class="text-center font-bold border border-solid border-black">Ajout effectué avec
            succès</h2>
          <button @click="() => showModal = !showModal"
            class="bg-blue-600 p-1 mx-auto my-1 rounded-lg hover:text-slate-200 btn">Annuler</button>
        </div>
      </template>
    </ModalView>
  </Teleport>
</template>

<script setup>
import { ref } from 'vue';
import { vAutofocus } from '../directives/vAutoFocus'
import ModalView from '../components/ModalView.vue';
import { useAccountStore } from '../store/AccountStore';

const client = ref({
  nom: null,
  prenoms: null,
  solde: null
})
const success = ref(false)
const fail = ref(false)
const error = ref('')
const showModal = ref(false)
const accountStore = useAccountStore()

const viderChamp = () => {
  client.value.nom = null
  client.value.prenoms = null
  client.value.solde = null
}

const saveClient = (event) => {
  event.preventDefault();
  
  if(client.value.nom != null){
    accountStore.addAccount(client.value.nom.toUpperCase(), client.value.prenoms, client.value.solde);
    
    if(accountStore.success) {
      success.value = true;
      fail.value = false; 
    }else {
      success.value = false;
      fail.value = true;
    }
    showModal.value = true;
    console.log(accountStore.success)
    console.log(accountStore.message)
  }
}

</script>

<style>
@tailwind components;

@layer components {
  label {
    @apply inline-block p-1 w-24;
  }
}
</style>
