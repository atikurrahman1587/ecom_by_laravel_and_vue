import Vue from 'vue'
import Vuex from 'vuex'
import persisTedState from 'vuex-persistedstate'

Vue.use(Vuex)

export const store = new Vuex.Store({
    state:{
        products: [],
        subTotal: 0,
        taxTotal: 0,
    },
    getters:{
        getProducts(state)
        {
            return  state.products;
        },
        getSubTotal(state)
        {
            var sum = 0;
            for (var i = 0; i < state.products.length; i++)
            {
                sum = Number(sum) + Number(state.products[i].total)
            }
            return state.subTotal = sum;
        },
        getTaxTotal(state)
        {
            var tax = (state.subTotal * 15)/100;
            return state.taxTotal = Math.round(tax);
        }
    },
    mutations:{
        addProduct(state, item)
        {
            state.products.push(item)
        },
        removeCartProduct(state, id)
        {
            state.products.splice(state.products.findIndex(product => {return product.id == id}), 1);
        },
        updateCartProduct(state, id)
        {
            var product     = state.products.find(product => {return product.id == id});
            var qty         = document.getElementById('qty'+id).value;
            product.qty     = qty;
            product.total   = product.price * qty;
        }
    },
    plugins: [persisTedState()]
});
