import { createApp } from 'http://unpkg.com/vue@3/dist/vue.esm-browser.js';

createApp({
    data() {
        return {
            botigaStatus: 'landing',
            llibres: [],
            categories: [],
            carrito: [],
            idActual: 0,
            quantitat: 0,
            previewCarrito: false
        }
    },

    created() {
        this.getLlibres()
    },

    methods: {
        async getLlibres() {
            let response = await fetch('http://localhost:8000/api/llibres')
            let productes =  await response.json()
            console.log(productes)
            this.llibres = productes
        },
        async cambiarDiv(id) {
            this.botigaStatus = id;
        },
        mostrar(id) {
            return (this.botigaStatus == id);
        },
        getCarrito() {
            return this.carrito
        },
        togglePreviewCarrito() {
            this.previewCarrito = !this.previewCarrito
        },
        mostrarLlibre(index) {
            this.idActual = index;
            this.quantitat = 0;
        },
        getLlibreActual() {
            return this.llibres.find(llibre => llibre.id === this.idActual)
        },
        getLlibrePerId(id) {
            return this.llibres.find(llibre => llibre.id === id)
        },
        getQuantitatTotalCarrito() {
            let quantitat = 0
            this.carrito.forEach(llibre => {
                quantitat += llibre.quantitat
            });
            return quantitat
        },
        getPreuTotalCarrito() {
            let preu = 0
            this.carrito.forEach(llibre => {
                preu += llibre.preu * llibre.quantitat
            });
            return preu.toFixed(2)
        },
        sumarQuantitat() {
            this.quantitat++;
        },
        restarQuantitat() {
            if (this.quantitat !== 0) {
                this.quantitat--
            }
        },
        afegirLlibreCarrito() {
            if (this.quantitat !== 0) {
                let llibre = this.carrito.find(llibre => llibre.id === this.idActual);
                if(llibre){
                    llibre.quantitat += this.quantitat;
                } else{
                    var llibreCarrito = {
                        "id": this.idActual,
                        "preu": this.getLlibreActual().preu,
                        "quantitat": this.quantitat
                    };
                    this.carrito.push(llibreCarrito);
                }
            }
            console.log(this.carrito);
        }
    }
}).mount('#app');