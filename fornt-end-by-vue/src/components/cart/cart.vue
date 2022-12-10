<template>
  <div class="my-shopping-cart">
    <div class="shopping-cart section">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <!-- Shopping Summery -->
            <table class="table shopping-summery">
              <thead>
              <tr class="main-hading">
                <th>PRODUCT</th>
                <th>NAME</th>
                <th class="text-center">UNIT PRICE</th>
                <th class="text-center">QUANTITY</th>
                <th class="text-center">TOTAL</th>
                <th class="text-center"><i class="ti-trash remove-icon"></i></th>
              </tr>
              </thead>
              <tbody>
              <tr v-for="(product, key) in products" :key="key">
                <td class="image" data-title="No"><img :src="product.image" alt="#"></td>
                <td class="product-des" data-title="Description">
                  <p class="product-name"><a href="#">{{ product.name }}</a></p>
                  <p class="product-des"></p>
                </td>
                <td class="price" data-title="Price"><span>TK. {{ product.price }}</span></td>
                <td class="qty" data-title="Qty"><!-- Input Order -->
                  <div class="input-group">
                    <input type="text"  class="input-number" :id="'qty'+product.id" data-min="1" data-max="100" :value="product.qty">
                    <div class="button plus">
                      <button type="button" class="btn btn-primary btn-number" @click="updateCartProduct(product.id)">
                        <i class="ti-upload"></i>
                      </button>
                    </div>
                  </div>
                  <!--/ End Input Order -->
                </td>
                <td class="total-amount" data-title="Total"><span>TK. {{ product.price*product.qty }}</span></td>
                <td class="action" data-title="Remove"><a href="#"><i class="ti-trash remove-icon" @click="deleteCartProduct(product.id)"></i></a></td>
              </tr>
              </tbody>
            </table>
            <!--/ End Shopping Summery -->
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <!-- Total Amount -->
            <div class="total-amount">
              <div class="row">
                <div class="col-lg-8 col-md-5 col-12">
                  <div class="left">
                    <div class="coupon">
                      <form action="#" target="_blank">
                        <input name="Coupon" placeholder="Enter Your Coupon">
                        <button class="btn">Apply</button>
                      </form>
                    </div>
                    <div class="checkbox">
                      <label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox"> Shipping (+10$)</label>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-7 col-12">
                  <div class="right">
                    <ul>
                      <li>Cart Subtotal<span>TK. {{ subTotal }}</span></li>
                      <li>Shipping<span>Free</span></li>
                      <li>Tax<span>TK. {{ taxTotal }}</span></li>
                      <li class="last">You Pay<span>TK. {{ grandTotal }}</span></li>
                    </ul>
                    <div class="button5">
                      <a href="#" class="btn">Checkout</a>
                      <a href="#" class="btn">Continue shopping</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--/ End Total Amount -->
          </div>
        </div>
      </div>
    </div>
    <!--/ End Shopping Cart -->
  </div>
</template>

<script>
export default {
  name: "card",
  computed:{
    products()
    {
      return this.$store.getters.getProducts;
    },
    subTotal()
    {
      return this.$store.getters.getSubTotal;
    },
    taxTotal()
    {
      return this.$store.getters.getTaxTotal;
    },
    grandTotal()
    {
      return Number(this.$store.getters.getSubTotal) + Number(this.$store.getters.getTaxTotal)
    }
  },
  methods: {
    deleteCartProduct(id)
    {
      event.preventDefault();
      this.$store.commit('removeCartProduct', id);
    },
    updateCartProduct(id)
    {
      this.$store.commit('updateCartProduct', id);
    }
  }
}
</script>

<style scoped>

</style>