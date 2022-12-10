<template>
  <div class="category-left">
    <div class="shop-sidebar">
      <!-- Single Widget -->
      <div class="single-widget category">
        <h3 class="title">Categories</h3>
        <ul class="categor-list">
          <li v-for="(category, key) in categories" :key="key">
            <router-link :to="{name: 'categoryProduct', params:{id: category.category.id, name:category.category.name}}">{{ category.category.name}}</router-link>
          </li>
        </ul>
      </div>
      <!--/ End Single Widget -->
      <!-- Shop By Price -->
      <div class="single-widget range">
        <h3 class="title">Shop by Price</h3>
        <div class="price-filter">
          <div class="price-filter-inner">
            <div id="slider-range"></div>
            <div class="price_slider_amount">
              <div class="label-input">
                <span>Range:</span><input type="text" id="amount" name="price" placeholder="Add Your Price"/>
              </div>
            </div>
          </div>
        </div>
        <ul class="check-box-list">
          <li>
            <label class="checkbox-inline" for="1"><input name="news" id="1" type="checkbox">$20 - $50<span class="count">(3)</span></label>
          </li>
          <li>
            <label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox">$50 - $100<span class="count">(5)</span></label>
          </li>
          <li>
            <label class="checkbox-inline" for="3"><input name="news" id="3" type="checkbox">$100 - $250<span class="count">(8)</span></label>
          </li>
        </ul>
      </div>
      <!--/ End Shop By Price -->
      <!-- Single Widget -->
      <div class="single-widget recent-post">
        <h3 class="title">Recent post</h3>
        <!-- Single Post -->
        <div v-for="(product, key) in products" :key="key" class="single-post first">
          <div class="image">
            <img :src="product.image" alt="#">
          </div>
          <div class="content">
            <h5><router-link :to="{name: 'ProductDetail', params:{id: product.id, name: product.name}}">{{ product.category }}</router-link></h5>
            <p class="price">TK. {{ product.selling_price}}</p>
            <ul class="reviews">
              <li class="yellow"><i class="ti-star"></i></li>
              <li class="yellow"><i class="ti-star"></i></li>
              <li class="yellow"><i class="ti-star"></i></li>
              <li><i class="ti-star"></i></li>
              <li><i class="ti-star"></i></li>
            </ul>
          </div>
        </div>
        <!-- End Single Post -->
      </div>
      <!--/ End Single Widget -->
      <!-- Single Widget -->
      <div class="single-widget category">
        <h3 class="title">Manufacturers</h3>
        <ul class="categor-list">
          <li><a href="#">Forever</a></li>
          <li><a href="#">giordano</a></li>
          <li><a href="#">abercrombie</a></li>
          <li><a href="#">ecko united</a></li>
          <li><a href="#">zara</a></li>
        </ul>
      </div>
      <!--/ End Single Widget -->
    </div>
  </div>
</template>

<script>
export default {
name: "CategoryLeft",
  data() {
    return {
      categories: [],
      products: [],
    }
  },
  created() {
  this.getAllCategory();
  this.getRecentProductForCategory();
  },
  methods: {
    getAllCategory()
    {
      this.$http.get('http://localhost/admin-five/public/api/all-category').then(function (response){
        this.categories = response.body;
      });
    },
    getRecentProductForCategory()
    {
      this.$http.get('http://localhost/admin-five/public/api/recent-product-for-category').then(function (response){
        this.products = response.body;
      });
    },
  }
}
</script>

<style scoped>

</style>