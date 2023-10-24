import {createApp} from 'http://unpkg.com/vue@3/dist/vue.esm-browser.js';
import { getProductes } from './managmentFunctions.js';

createApp({
    data() {
        return {
            buttonMostrar: true,
            divActual:'validacio',
            productes:[],
            categories:[],
            carrito:[
                {
                    "id":2,
                    "nom":"Llibre 2",
                    "preu": 9.99,
                    "quantity":5
                },
                {
                    "id":1,
                    "nom":"Llibre 1",
                    "preu": 4.66,
                    "quantity":3
                },
            ]
        }
    },
    methods: {
        cambiarDiv(id){
            this.divActual = id;
        },
        mostrar(id){
            return (this.divActual==id);
        },
        reutrnTotal(){
            let total = 0;
            for (let i = 0; i < this.carrito.length; i++) {
                total += this.carrito[i].preu*this.carrito[i].quantity;
            }
            
            return total.toFixed(2);
        },
    },
    created(){
        getProductes().then(data => {
            this.productes=data.llibres;
            this.categories=data.categories;
        });
    }
}).mount('#app');