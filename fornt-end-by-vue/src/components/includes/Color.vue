<template>
  <div class="color">
    <!-- Preloader -->
<!--    <div class="preloader">-->
<!--      <div class="preloader-inner">-->
<!--        <div class="preloader-icon">-->
<!--          <span></span>-->
<!--          <span></span>-->
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->
    <!-- End Preloader -->

    <!-- Eshop Color Plate -->
    <div class="color-plate">
      <a class="color-plate-icon"><i class="ti-paint-bucket"></i></a>
      <h4>Eshop Colors</h4>
      <p>Here is some awesome color's available on Eshop Template.</p>
      <span class="color1"></span>
      <span class="color2"></span>
      <span class="color3"></span>
      <span class="color4"></span>
      <span class="color5"></span>
      <span class="color6"></span>
      <span class="color7"></span>
      <span class="color8"></span>
      <span class="color9"></span>
      <span class="color10"></span>
      <span class="color11"></span>
      <span class="color12"></span>
    </div>
  </div>
</template>

<script>
export default {
  name: "Color",
  mounted() {
    $('.preloader').delay(2000).fadeOut('slow');
    setTimeout(function() {
      //After 2s, the no-scroll class of the body will be removed
      $('body').removeClass('no-scroll');
    }, 2000); //Here you can change preloader time
  }
}
</script>

<style scoped>

</style>