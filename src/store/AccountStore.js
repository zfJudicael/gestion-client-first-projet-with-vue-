import { defineStore } from "pinia";
import axios from "axios";

export const useAccountStore = defineStore('accountStore', {
    state: ()=>({
        comptes: [],
        error: '',
        message: '', 
        success: true,
        mod: true  
    }),
    actions: {
        getAllAccount() {
            axios.get('http://localhost/Projet_vue/API/readAccount.php')
            .then((response) => {
                if (response.data.error) {
                    this.error = response.data.errorMessage;
                    this.message = response.data.message;
                } else {
                    this.comptes = response.data.comptes
                    this.message = response.data.message;
                }
            })
        },
        deleteAccount(params){
            if(confirm("Voulez-vous vraiment effectuer cette suppréssion?")){
                axios.post('http://localhost/Projet_vue/API/removeAccount.php', {
                    numCompte: params
                })
                .then((response) => {
                    if (response.data.error) {
                        console.log(response.data.message);
                        console.log(response.data.errorMessage);
                    } else {
                        console.log(response.data.message)
                        this.getAllAccount();
                    }
                })
            }
        },
        updateAccount(numCompteVal, nomVal, prenomsVal, soldeVal){
            axios.post('http://localhost/Projet_vue/API/editAccount.php', {
                numCompte: numCompteVal,
                nom: nomVal,
                prenoms: prenomsVal,
                solde: soldeVal
            })
            .then((response) => {
                if (response.data.error) {
                    this.error = response.data.errorMessage;
                    this.message = response.data.message;
                    alert(this.message +"\n"+this.error);
                } else {
                    this.message = response.data.message;
                    alert(this.message)
                    this.getAllAccount()
                }
                this.mod = response.data.error
            })
        },
        addAccount(nomVal, prenomsVal, soldeVal) {
            axios.post('http://localhost/Projet_vue/API/addAccount.php', {
                nom: nomVal,
                prenoms: prenomsVal,
                solde: soldeVal
            })
            .then((response) => {
                console.log(response)
                if (response.data.message === "Ajout bien effectué") {
                    this.success = true;
                    this.message = response.data.errorMessage;
                    console.log('Okay')
                } else {
                    this.success = false;
                    this.message = response.data.errorMessage;
                    console.log('Not Okay')
                }
            })
        }
    },
    getters: {
        calculTotal(state){
            let total = 0;
            state.comptes.map(compte => {
                total += parseInt(compte.solde)
            })
           
            return total.toLocaleString('fr-FR');
        },
        
        chercherMin(state){
            let solde = [];
            let minimal = 0;

            state.comptes.map(compte => {
                solde.push(compte.solde)
            })
            if (solde.length > 0) minimal = Math.min(...solde);
        
            return minimal.toLocaleString('fr-FR');
        },
        
        chercherMax(state){
            let solde = [];
            let maximal = 0;
            state.comptes.map(compte => {
                solde.push(compte.solde)
            })
            if (solde.length > 0) maximal = Math.max(...solde);
        
            return maximal.toLocaleString('fr-FR');
        }
    }
})