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
            let productes = await response.json()
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
            let llibre = this.carrito.find(llibre => llibre.id === index)
            this.quantitat = llibre ? llibre.quantitat : 0;
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
            this.afegirLlibreCarrito();
        },
        restarQuantitat() {
            if (this.quantitat !== 0) {
                this.quantitat--;
                this.treureLlibreCarrito()
            }
        },
        afegirLlibreCarrito() {
            let llibre = this.carrito.find(item => item.id === this.idActual)

            if (llibre) {
                this.carrito.forEach(item => {
                    if (item.id === this.idActual) {
                        item.quantitat++
                    }
                })
            } else {
                let llibreCarrito = {
                    "id": this.idActual,
                    "preu": this.getLlibreActual().preu,
                    "quantitat": 1
                };
                this.carrito.push(llibreCarrito);
            }
        },
        treureLlibreCarrito() {
            // Restar quantitat
            this.carrito.forEach(item => {
                if (item.id === this.idActual) {
                    item.quantitat--
                }
            })
            // Filtrar llibres amb quantitat zero
            let newCarrito = this.carrito.filter(item => item.quantitat != 0)
            this.carrito = newCarrito
        }
    }
}).mount('#app');