<template>
  <div class="image-zoom">
    <!-- Product Slider -->
    <div class="product-gallery">
      <!-- Images slider -->
      <div class="flexslider-thumbnails">
        <ul class="slides">
          <li v-for="(image, key) in images" :key="key" :data-thumb="image" rel="adjustX:10, adjustY:">
            <img :src="image" alt="#">
          </li>
        </ul>
      </div>
      <!-- End Images slider -->
    </div>
    <!-- End Product slider -->
  </div>
</template>

<script>
export default {
  name: "ImageGallery",
  mounted() {
    this.$http.get('http://localhost/admin-five/public/api/get-product-image-by-id/'+this.id).then(function (){
      (function($) {
        'use strict';
        $('.flexslider-thumbnails').flexslider({
          animation: "slide",
          controlNav: "thumbnails",
        });
      })(jQuery);
    });
  },
  data(){
    return {
      id: this.$route.params.id,
      images: [],
    }
  },
  created() {
    this.getAllProductImage();
  },
  methods: {
    getAllProductImage(){
      this.$http.get('http://localhost/admin-five/public/api/get-product-image-by-id/'+this.id).then(function (response){
        this.images = response.body;
      });
    }
  },
}
</script>

<style scoped>

</style>