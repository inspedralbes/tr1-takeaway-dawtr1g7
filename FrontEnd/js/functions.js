import {createApp} from 'http://unpkg.com/vue@3/dist/vue.esm-browser.js';
import { getLlibres } from './managmentFunctions.js';

createApp({
    data() {
        return {
            buttonMostrar: true,
            botigaStatus:'validacio',
            llibres:[],
            categories:[],
            carrito:[
                {
                    "id":2,
                    "preu": 9.99,
                    "quantitat":5
                },
                {
                    "id":1,
                    "preu": 4.66,
                    "quantitat":3
                },
            ]
        }
    },
    methods: {
        cambiarDiv(id){
            this.botigaStatus = id;
        },
        mostrar(id){
            return (this.botigaStatus==id);
        },
        reutrnTotal(){
            let total = 0;
            for (let i = 0; i < this.carrito.length; i++) {
                total += this.carrito[i].preu*this.carrito[i].quantitat;
            }
            
            return total.toFixed(2);
        },
    },
    created(){
        getLlibres().then(data => {
            this.llibres=data.llibres;
            this.categories=data.categories;
        });
    }
}).mount('#app');