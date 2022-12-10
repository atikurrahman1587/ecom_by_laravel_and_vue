<template>
  <div class="product-basic">
    <div class="product-des">
      <!-- Description -->
      <div class="short">
        <h4>{{ product.name }}</h4>
        <div class="rating-main">
          <ul class="rating">
            <li><i class="fa fa-star"></i></li>
            <li><i class="fa fa-star"></i></li>
            <li><i class="fa fa-star"></i></li>
            <li><i class="fa fa-star-half-o"></i></li>
            <li class="dark"><i class="fa fa-star-o"></i></li>
          </ul>
          <a href="#" class="total-review">(102) Review</a>
        </div>
        <p class="price"><span class="discount">TK. {{ product.selling_price }}</span><s>TK. {{ product.regular_price }}</s> </p>
        <p class="description" v-html="product.description"></p>
      </div>
      <!--/ End Description -->
      <!-- Color -->
      <div class="color">
        <h4>Available Options <span>Color</span></h4>
        <select class="form-control" id="productColor">
          <option :value="color" v-for="(color, key) in product.colors" :key="key">{{color}}</option>
        </select>
      </div>
      <!--/ End Color -->
      <!-- Size -->
      <div class="size">
        <h4>Size</h4>
        <select class="form-control" id="productSize">
          <option :value="size" v-for="(size, key1) in product.sizes" :key="key1">{{size}}</option>
        </select>
      </div>
      <!--/ End Size -->
      <!-- Product Buy -->
      <div class="product-buy">
        <div class="quantity">
          <h6>Quantity :</h6>
          <!-- Input Order -->
          <div class="input-group">
            <div class="button minus">
              <button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="qty">
                <i class="ti-minus"></i>
              </button>
            </div>
            <input type="text" name="qty" class="input-number" v-model="qty" data-min="1" :data-max="product.qty_amount" value="1">
            <div class="button plus">
              <button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="qty">
                <i class="ti-plus"></i>
              </button>
            </div>
          </div>
          <!--/ End Input Order -->
        </div>
        <div class="add-to-cart">
          <a href="#" :class="['btn', product.stock_status == 'Out of Stock' ? 'disabled' : '']" @click="addToCard">Add to cart</a>
          <a href="#" class="btn min"><i class="ti-heart"></i></a>
          <a href="#" class="btn min"><i class="fa fa-compress"></i></a>
        </div>
        <p class="cat">Category :<a href="#">{{ product.category}}</a></p>
        <p class="availability">Availability : {{ product.stock_status}}</p>
      </div>
      <!--/ End Product Buy -->
    </div>
  </div>
</template>

<script>
export default {
  name: "ProductBasic",
  data() {
    return {
      id: this.$route.params.id,
      product: {},
      cardItem: {},
      qty:1,
      exitCartItem: {}
    }
  },

  created() {
    this.getProductBasicInfo();
  },

  methods: {
    getProductBasicInfo()
    {
      this.$http.get('http://localhost/admin-five/public/api/get-product-basic-info/'+this.id).then(function (response){
        this.product = response.body;
      });
    },
    addToCard()
    {
      event.preventDefault();
      this.cartItem = {
        id:     this.product.id,
        name:   this.product.name,
        image:  this.product.image,
        price:  this.product.selling_price,
        color:  document.getElementById('productColor').value,
        size:   document.getElementById('productSize').value,
        qty:    this.qty,
        total:  this.product.selling_price * this.qty,
      };
      this.exitCartItem = this.$store.getters.getProducts.find(product => {return product.id == this.cartItem.id});
      if (this.exitCartItem)
      {
        this.exitCartItem.qty = Number(this.exitCartItem.qty) + Number(this.cartItem.qty);
        this.$router.push('/my-shopping-cart')
      }
      else
      {
        this.$store.commit('addProduct', this.cartItem)
        this.$router.push('/my-shopping-cart')
      }

    }

  }
}
</script>

<style scoped>

</style>