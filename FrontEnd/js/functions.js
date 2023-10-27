import { createApp } from 'http://unpkg.com/vue@3/dist/vue.esm-browser.js';

createApp({
    data() {
        return {
            botigaStatus: 'landing',
            llibres: [],
            categories: [],
            carrito: [],
            comanda: { productes: [] },
            idActual: 0,
            quantitat: 0,
            previewCarrito: false,
            localhost: window.location.hostname == '127.0.0.1'
        }
    },

    created() {
        this.getLlibres()
    },

    methods: {
        async getLlibres() {
            let url
            if (this.localhost) {
                url = "http://localhost:8000/api/llibres"
            } else {
                url = '../../laravel-backend/public/api/llibres'
            }
            let response = await fetch(url)
            let productes = await response.json()
            console.log(productes)
            this.llibres = productes
        },
        async crearComanda() {
            let carrito = JSON.parse(JSON.stringify(this.carrito));
            let jsonObject = { "carrito": carrito }
            let url
            if (this.localhost) {
                url = "http://localhost:8000/api/novaComanda"
            } else {
                url = '../../laravel-backend/public/api/novaComanda'
            }

            let response = await fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(jsonObject)
            })

            const jsonResponse = await response.json();
            console.log(jsonResponse);
            this.crearNovaComanda(jsonResponse);
        },
        cambiarDiv(id) {
            this.botigaStatus = id;
        },
        mostrar(id) { 
            
            return this.botigaStatus === id;  
        },
        getCarrito() {
            return this.carrito
        },
        getComanda() {
            return this.comanda
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
        getPreuTotalComanda() {
            let preu = 0
            this.comanda.productes.forEach(llibre => {
                preu += llibre.preu * llibre.quantitat
            });
            return preu.toFixed(2)
        },
        getQuantitatTotalComanda() {
            let quantitat = 0
            this.comanda.productes.forEach(llibre => {
                quantitat += llibre.quantitat
            });
            return quantitat
        },
        crearNovaComanda(objecteComanda) {
            let novaComanda = {
                id: objecteComanda.id,
                estat: objecteComanda.estat,
                productes: this.carrito
            }
            this.comanda = novaComanda
            this.carrito = []
            console.log("creada")
            this.cambiarDiv('estat')
        },
        sumarQuantitat(id) {
            this.quantitat++;
            this.afegirLlibreCarrito(id);
        },
        restarQuantitat(id, comprovacio) {
            if (comprovacio && this.quantitat !== 0) {
                this.quantitat--
                this.treureLlibreCarrito(id)
            } else {
                this.treureLlibreCarrito(id)
            }

        },
        afegirLlibreCarrito(id) {
            let llibre = this.carrito.find(item => item.id === id)

            if (llibre) {
                this.carrito.forEach(item => {
                    if (item.id === id) {
                        item.quantitat++
                    }
                })
            } else {
                let llibreCarrito = {
                    "id": id,
                    "preu": this.getLlibreActual().preu,
                    "quantitat": 1
                };
                this.carrito.push(llibreCarrito);
            }
        },
        treureLlibreCarrito(id) {
            // Restar quantitat
            this.carrito.forEach(item => {
                if (item.id === id) {
                    item.quantitat--
                }
            })
            // Filtrar llibres amb quantitat zero
            let newCarrito = this.carrito.filter(item => item.quantitat != 0)
            this.carrito = newCarrito
        }
    }
}).mount('#app');
