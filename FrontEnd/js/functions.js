import { createApp } from 'http://unpkg.com/vue@3/dist/vue.esm-browser.js';

createApp({
    data() {
        return {
            botigaStatus: 'landing',
            llibres: [],
            llibresFiltrats: [],
            indexLlibres: 0,
            llibresMostrats: 8,
            categories: [],
            carrito: [],
            comanda: { productes: [] },
            idActual: 0,
            quantitat: 0,
            previewCarrito: false,
            localhost: window.location.hostname == '127.0.0.1',
            usuari: null,
            errorMsg: "",
            previewCategories: false,
            textBuscat: "",
            categoriaActual: 0,
            comandaModificada: false,
            comptadorModificar: 0,
            comandesUsuari: [],
            loadingStatus: false,
            comandaEliminada: 0
        }
    },

    created() {
        this.getLlibres()
        this.fetchCategories()
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
            this.llibres = productes
            this.llibresFiltrats = productes
        },
        async fetchCategories() {
            let url
            if (this.localhost) {
                url = "http://localhost:8000/api/categories"
            } else {
                url = '../../laravel-backend/public/api/categories'
            }
            let response = await fetch(url)
            let categoriesProductes = await response.json()
            this.categories = categoriesProductes
        },
        async crearComanda() {
            if (!this.usuari) {
                this.errorMsg = "Inicia sessió per a crear una comanda!"
                return
            }

            this.cambiarDiv('loading');
            if (this.comandaModificada == false) {
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
                        'Content-Type': 'application/json',
                        'Authorization': `Bearer ${this.usuari.token}`
                    },
                    body: JSON.stringify(jsonObject)
                })

                const jsonResponse = await response.json();
                this.crearNovaComanda(jsonResponse);
            } else {
                let carrito = JSON.parse(JSON.stringify(this.carrito));
                let jsonObject = { "carrito": carrito }
                let url
                if (this.localhost) {
                    url = "http://localhost:8000/api/comanda/" + this.comanda.id
                } else {
                    url = '../../laravel-backend/public/api/comanda/' + this.comanda.id
                }

                let response = await fetch(url, {
                    method: 'PATCH',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': `Bearer ${this.usuari.token}`
                    },
                    body: JSON.stringify(jsonObject)
                })
                const jsonResponse = await response.json();
                this.crearNovaComanda(jsonResponse);
                this.comandaModificada = false;
            }
            this.getLlibres()
            await this.getLlistatComandesPerUsuari();
            this.comanda = { productes: [] }
        },
        async modificarComanda(index) {

            let comandaAuxiliar = {};
            comandaAuxiliar.id = this.comandesUsuari[index].id;
            comandaAuxiliar.estat = this.comandesUsuari[index].estat;
            comandaAuxiliar.productes = this.comandesUsuari[index].llibres;

            this.comandaModificada = true;
            this.carrito = [];
            this.comanda = comandaAuxiliar;
            for (let i = 0; i < this.comanda.productes.length; i++) {
                let llibre = {};
                llibre.id = this.comanda.productes[i].id;
                llibre.quantitat = this.comanda.productes[i].quantitat;
                llibre.preu = this.comanda.productes[i].preu;
                this.carrito.push(llibre);
            }
            this.cambiarDiv('botiga');
        },
        async eliminarComanda(id) {
            this.comandaEliminada = id;
            this.loadingStatus = !this.loadingStatus;
            let url;
            if (this.localhost) {
                url = `http://localhost:8000/api/comanda/${id}`;
            } else {
                url = `../../laravel-backend/public/api/comanda/${id}`;
            }

            let response = await fetch(url, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${this.usuari.token}`
                },
            })
            const jsonResponse = await response.json();
            this.comandaModificada = false
            this.getLlibres()
            this.getLlistatComandesPerUsuari()

            this.comandaEliminada = 0;
            this.loadingStatus = !this.loadingStatus;
        },
        cancelarModificarComanda() {
            this.carrito = [];
            this.comandaModificada = false;
            this.cambiarDiv('comandesUser');
        },
        cambiarDiv(id) {
            if (id === 'validacio' && this.carrito.length === 0) return;
            if (id === 'botiga') {
                this.indexLlibres = 0;
                this.previewCategories = false
            }
            this.errorMsg = ""
            this.botigaStatus = id;
            if (this.botigaStatus != 'botiga') {
                this.previewCarrito = false;
            }

        },
        mostrarloading(estat) {
            return this.loadingStatus === estat;
        },
        mostrar(id) {

            return this.botigaStatus === id;
        },
        getCarrito() {
            return this.carrito;
        },
        getCategories() {
            return this.categories;
        },
        canviarCat(id) {
            this.categoriaActual = id;
            if (this.categoriaActual === 0) {
                this.llibresFiltrats = this.llibres
            } else {
                this.llibresFiltrats = this.llibres.filter(llibre => llibre.categoria_id === this.categoriaActual)
            }
            this.indexLlibres = 0;
        },
        getComanda() {
            return this.comanda;
        },
        togglePreviewCarrito() {
            this.previewCategories = false
            this.previewCarrito = !this.previewCarrito;
            if (this.botigaStatus != 'botiga') {
                this.previewCarrito = false;
            }
        },
        togglePreviewCategories() {
            this.previewCarrito = false
            this.previewCategories = !this.previewCategories
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
        buscarLlibres(textBuscat) {
            this.indexLlibres = 0;
            if (textBuscat == "") {
                if (this.categoriaActual == 0) {
                    this.llibresFiltrats = this.llibres
                } else {
                    this.llibresFiltrats = this.llibres.filter(llibre => llibre.categoria_id == this.categoriaActual);
                }
            } else {
                if (this.categoriaActual == 0) {
                    this.llibresFiltrats = this.llibres.filter(llibre => llibre.titol.toLowerCase().includes(textBuscat.toLowerCase()));
                } else {
                    this.llibresFiltrats = this.llibresFiltrats.filter(llibre => llibre.titol.toLowerCase().includes(textBuscat.toLowerCase()) && llibre.categoria_id == this.categoriaActual);
                }
            }
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
            this.getUltimaComandaUsuari().llibres.forEach(llibre => {
                preu += llibre.preu * llibre.quantitat
            });
            return preu.toFixed(2)
        },
        getQuantitatTotalComanda() {
            let quantitat = 0
            this.getUltimaComandaUsuari().llibres.forEach(llibre => {
                quantitat += llibre.quantitat
            });
            return quantitat
        },
        getProducteInCarrito(producteId) {
            let producte = this.carrito.find(item => item.id === producteId)
            return producte != undefined
        },
        crearNovaComanda(objecteComanda) {
            let novaComanda = {
                id: objecteComanda.id,
                estat: objecteComanda.estat,
                productes: this.carrito
            }
            this.comanda = novaComanda
            this.carrito = []
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
            if (this.carrito.length <= 0) {
                this.previewCarrito = false;
            }
        },
        guardarUsuari(dadesUsuari) {
            this.usuari = {
                id: dadesUsuari.user.id,
                nom: dadesUsuari.user.name,
                email: dadesUsuari.user.email,
                telefon: dadesUsuari.user.telefon,
                token: dadesUsuari.token.split('|')[1]
            }
            this.errorMsg = ""
            if (this.carrito.length > 0) {
                this.cambiarDiv('validacio')
            } else {
                this.cambiarDiv('landing')
            }
        },
        redirectToAdminPage() {
            if (this.localhost) {
                window.location.href = 'http://127.0.0.1:8000'
            } else {
                window.location.href = '../../laravel-backend/public/'
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
            this.comandesUsuari = jsonResponse;
            this.comanda = {
                id: jsonResponse[0].id,
                estat: jsonResponse[0].estat,
                productes: jsonResponse[0].llibres
            }
        },
        async getUltimaComandaPerUsuari() {
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
            this.comanda = {
                id: jsonResponse[jsonResponse.length - 1].id,
                estat: jsonResponse[jsonResponse.length - 1].estat,
                productes: jsonResponse[jsonResponse.length - 1].llibres
            }
            return this.comanda;
        },
        async getLlistatComandesPerUsuari() {
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
            let jsonResponse = await response.json();
            if (jsonResponse.status !== 'error') {
                this.comandesUsuari = jsonResponse;
            } else {
                this.comandesUsuari = []
            }
        },
        getQuantitatTotalCom(comanda) {
            let quantitat = 0
            comanda.llibres.forEach(llibre => {
                quantitat += llibre.quantitat
            });
            return quantitat
        },
        getPreuTotalCom(comanda) {
            let preu = 0
            comanda.llibres.forEach(llibre => {
                preu += llibre.preu * llibre.quantitat
            });
            return preu.toFixed(2)
        },
        getUltimaComandaUsuari() {
            return this.comandesUsuari[this.comandesUsuari.length - 1]
        },

        // USUARIS
        async registrarUsuari() {
            this.loadingStatus = !this.loadingStatus
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
            if (!jsonResponse.errors) {
                this.guardarUsuari(jsonResponse)
            } else {
                this.errorMsg = jsonResponse.message
            }
            this.loadingStatus = !this.loadingStatus
        },

        async iniciarSessio() {
            this.loadingStatus = !this.loadingStatus
            let jsonObject = {
                email: document.getElementById("correuIniciSessio").value,
                password: document.getElementById("passwordIniciSesio").value
            }
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
            if (!jsonResponse.errors) {
                this.guardarUsuari(jsonResponse)
                this.getComandaPerUsuari()
            } else {
                this.errorMsg = jsonResponse.message
            }
            this.loadingStatus = !this.loadingStatus
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
            this.usuari = null
            this.comanda = { productes: [] }
        },
        seguentPagina() {
            if (this.indexLlibres < this.llibresFiltrats.length - this.llibresMostrats) {
                this.indexLlibres += this.llibresMostrats;
            }
        },
        paginaAnterior() {
            if (this.indexLlibres >= this.llibresMostrats) {
                this.indexLlibres -= this.llibresMostrats;
            }
        },
        comandaEliminat(id) {
            return this.comandaEliminada == id;
        }
    }
}).mount('#app');
