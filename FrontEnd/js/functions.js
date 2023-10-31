import { createApp } from 'http://unpkg.com/vue@3/dist/vue.esm-browser.js';

createApp({
    data() {
        return {
            botigaStatus: 'landing',
            llibres: [],
            llibresFiltrats: [],
            indexLlibres: 0,
            llibresMostrats: 6,

            categories: [],
            carrito: [],
            comanda: {productes: []},
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
        async crearComanda() {
            if (!this.usuari) {
                this.errorMsg = "Inicia sessió per a crear una comanda!"
                return
            }

            let carrito = JSON.parse(JSON.stringify(this.carrito));
            let jsonObject = {
                "carrito": carrito
            }
            try {
                let response = await fetch('http://localhost:8000/api/novaComanda', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(jsonObject)
                })

                const jsonResponse = await response.json();
                console.log(jsonResponse);
                this.crearNovaComanda(jsonResponse);

            } catch(error) {
                console.error(error)
            }
        },
        cambiarDiv(id) {
            if (id === 'validacio' && this.carrito.length === 0) return;
            this.errorMsg = ""
            this.botigaStatus = id;
        },
        mostrar(id) {
            return (this.botigaStatus == id);
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
            if(comprovacio) {
                if (this.quantitat !== 0) {
                    this.quantitat--
                    this.treureLlibreCarrito(id)
                }
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
        },
        guardarUsuari(dadesUsuari) {
            this.usuari = {
                id: dadesUsuari.user.id,
                nom: dadesUsuari.user.name,
                email: dadesUsuari.user.email,
                telefon: dadesUsuari.user.telefon,
                token: dadesUsuari.token.split('|')[1]
            }
            console.log(this.usuari)
            this.errorMsg = ""
            if (this.carrito.length > 0) {
                this.cambiarDiv('validacio')
            } else {
                this.cambiarDiv('landing')
            }
        },

        async getComandaPerUsuari() {
            let url;
            if (this.localhost) {
                url = `http://localhost:8000/api/comandes/user/${this.usuari.id}`
            } else {
                url = `../../laravel-backend/public/api/comandes/user/${this.usuari.id}`
            }
            let response = await fetch(url, {
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                },
            })
            let jsonResponse = await response.json()
            console.log(jsonResponse)
            this.comanda = {
                id: jsonResponse[0].id,
                estat: jsonResponse[0].estat,
                productes: jsonResponse[0].llibres
            }
        },

        // USUARIS
        async registrarUsuari() {
            let jsonObject = {
                name: document.getElementById("nomRegistre").value,
                email: document.getElementById("correuRegistre").value,
                password: document.getElementById("passwordRegistre").value,
                password_confirmation: document.getElementById("password2Registre").value,
                telefon: document.getElementById("telefonRegistre").value
            }
            let url;
            if (this.localhost) {
                url = "http://localhost:8000/api/registre"
            } else {
                url = '../../laravel-backend/public/api/registre'
            }

            let response = await fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                },
                body: JSON.stringify(jsonObject)
            })
            let jsonResponse = await response.json()
            console.log(jsonResponse)
            if (!jsonResponse.errors) {
                this.guardarUsuari(jsonResponse)
            } else {
                this.errorMsg = jsonResponse.message
            }
        },

        async iniciarSessio() {
            let jsonObject = {
                email: document.getElementById("correuIniciSessio").value,
                password: document.getElementById("passwordIniciSesio").value
            }
            console.log(jsonObject)
            let url;
            if (this.localhost) {
                url = "http://localhost:8000/api/login"
            } else {
                url = '../../laravel-backend/public/api/login'
            }
            let response = await fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                },
                body: JSON.stringify(jsonObject)
            })
            let jsonResponse = await response.json()
            console.log(jsonResponse)
            if (!jsonResponse.errors) {
                this.guardarUsuari(jsonResponse)
                this.getComandaPerUsuari()
            } else {
                this.errorMsg = jsonResponse.message
            }
        },

        async tancarSessio() {
            let url;
            if (this.localhost) {
                url = "http://localhost:8000/api/logout"
            } else {
                url = '../../laravel-backend/public/api/logout'
            }
            let response = await fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'Authorization': `Bearer ${this.usuari.token}`
                },
            })
            let jsonResponse = await response.json()
            console.log(jsonResponse)
            this.usuari = null
            this.comanda = { productes: [] }
        },
        endevant() {
            if (this.indexLlibres < this.llibresFiltrats.length - this.llibresMostrats) {
                this.indexLlibres += this.llibresMostrats;
            }
        },
        enrere() {
            if (this.indexLlibres >= this.llibresMostrats) {
                this.indexLlibres -= this.llibresMostrats;
            }

        }
    }
}).mount('#app');