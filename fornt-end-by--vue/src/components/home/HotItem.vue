<template>
  <div class="hot-item">
    <div class="product-area most-popular section">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="section-title">
              <h2>Hot Item</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="owl-carousel popular-slider">
              <!-- Start Single Product -->
              <div class="single-product" v-for="(product, key) in products" :key="key">
                <div class="product-img">
                  <router-link :to="{name: 'ProductDetail', params:{id: product.id, name: product.name}}">
                    <img class="default-img" :src="product.image" alt="#">
                    <img class="hover-img" :src="product.image2" alt="#">
                    <span class="out-of-stock">Hot</span>
                  </router-link>
                  <div class="button-head">
                    <div class="product-action">
                      <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                      <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                      <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                    </div>
                    <div class="product-action-2">
                      <a title="Add to cart" href="#">Add to cart</a>
                    </div>
                  </div>
                </div>
                <div class="product-content">
                  <h3><router-link :to="{name: 'ProductDetail', params:{id: product.id, name: product.name}}">{{ product.name}}</router-link></h3>
                  <div class="product-price">
                    <span class="old">TK. {{ product.regular_price}}</span>
                    <span>TK. {{ product.selling_price}}</span>
                  </div>
                </div>
              </div>
              <!-- End Single Product -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "HotItem",
  data() {
    return {
      products: [],
    }
  },

  created() {
    this.getAllRecentProduct();
  },
  mounted() {
    this.$http.get('http://localhost/admin-five/public/api/all-recent-product').then(function (){
      $('.popular-slider').owlCarousel({
        items:1,
        autoplay:true,
        autoplayTimeout:5000,
        smartSpeed: 400,
        animateIn: 'fadeIn',
        animateOut: 'fadeOut',
        autoplayHoverPause:true,
        loop:true,
        nav:true,
        merge:true,
        dots:false,
        navText: ['<i class="ti-angle-left"></i>', '<i class="ti-angle-right"></i>'],
        responsive:{
          0: {
            items:1,
          },
          300: {
            items:1,
          },
          480: {
            items:2,
          },
          768: {
            items:3,
          },
          1170: {
            items:4,
          },
        }
      });
    });
  },
  methods: {
    getAllRecentProduct()
    {
      this.$http.get('http://localhost/admin-five/public/api/all-recent-product').then(function (response){
        this.products = response.body;
      });
    }
  },
}
</script>

<style scoped>

</style>