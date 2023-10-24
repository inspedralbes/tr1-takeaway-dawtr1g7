import { createApp } from 'http://unpkg.com/vue@3/dist/vue.esm-browser.js';
import { getLlibres } from './managmentFunctions.js';

createApp({
    data() {
        return {
            buttonMostrar: true,
            botigaStatus: 'landing',
            llibres: [],
            categories: [],
            carrito: [],
            idActual: 0,
            quantitat: 0
        }
    },
    methods: {
        cambiarDiv(id) {
            this.botigaStatus = id;
        },
        mostrar(id) {
            return (this.botigaStatus == id);
        },
        reutrnTotal() {
            let total = 0;
            for (let i = 0; i < this.carrito.length; i++) {
                total += this.carrito[i].preu * this.carrito[i].quantitat;
            }

            return total.toFixed(2);
        },

        mostrarLlibre(index) {

            this.idActual = index;
            this.quantitat = 0;
        },
        sumar() {
            this.quantitat++;
        },
        getLlibreActual() {
            return this.llibres.find(llibre => llibre.id === this.idActual)
        },
        restar() {
            if (this.quantitat === 0) {
                this.quantitat = 0;
            } else {
                this.quantitat--;
            }

        },
        afegirLlibreCarrito() {
            if (this.quantitat === 0) {
                alert('cuantitat 0')
            } else {
                let llibreBuscat = this.carrito.find(llibre => llibre.id === this.idActual);
                if(llibreBuscat){
                    llibreBuscat.quantitat += this.quantitat;
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
    },
    created() {
        getLlibres().then(data => {
            this.llibres = data.llibres;
            this.categories = data.categories;
        });
    }
}).mount('#app');