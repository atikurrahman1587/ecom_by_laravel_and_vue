<template>
  <div class="product-detail">
    <PageTitle/>
    <section class="shop single section">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="row">
              <div class="col-lg-6 col-12">
                <ImageGallery/>
              </div>
              <div class="col-lg-6 col-12">
                <ProductBasic/>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <ProductDescription/>
        </div>
      </div>
    </section>
    <RelatedProduct/>
  </div>
</template>

<script>
import PageTitle from "../components/includes/PageTitle";
import ImageGallery from "../components/Product/ImageGallery";
import ProductBasic from "../components/Product/ProductBasic";
import ProductDescription from "../components/Product/ProductDescription";
import RelatedProduct from "../components/Product/RelatedProduct";
export default {
  name: "ProductDetail",
  components: {PageTitle, ImageGallery, ProductBasic, ProductDescription, RelatedProduct},
  data() {
    return {
      id: this.$route.params.id,
    }
  },

  mounted() {
    this.$http.get('http://localhost/admin-five/public/api/get-product-basic-info/'+this.id).then(function (){
      $('.btn-number').click(function(e){
        e.preventDefault();

        var fieldName = $(this).attr('data-field');
        var type      = $(this).attr('data-type');
        var input = $("input[name='"+fieldName+"']");
        var currentVal = parseInt(input.val());
        if (!isNaN(currentVal)) {
          if(type == 'minus') {

            if(currentVal > input.attr('data-min')) {
              input.val(currentVal - 1).change();
            }
            if(parseInt(input.val()) == input.attr('data-min')) {
              $(this).attr('disabled', true);
            }

          } else if(type == 'plus') {

            if(currentVal < input.attr('data-max')) {
              input.val(currentVal + 1).change();
            }
            if(parseInt(input.val()) == input.attr('data-max')) {
              $(this).attr('disabled', true);
            }

          }
        } else {
          input.val(0);
        }
      });
      $('.input-number').focusin(function(){
        $(this).data('oldValue', $(this).val());
      });
      $('.input-number').change(function() {

        var minValue =  parseInt($(this).attr('data-min'));
        var maxValue =  parseInt($(this).attr('data-max'));
        var valueCurrent = parseInt($(this).val());

        var name = $(this).attr('name');
        if(valueCurrent >= minValue) {
          $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
        } else {
          alert('Sorry, the minimum value was reached');
          $(this).val($(this).data('oldValue'));
        }
        if(valueCurrent <= maxValue) {
          $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
        } else {
          alert('Sorry, the maximum value was reached');
          $(this).val($(this).data('oldValue'));
        }


      });
      $(".input-number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
            // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
            // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
          // let it happen, don't do anything
          return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
          e.preventDefault();
        }
      });
    });
  }
}
</script>

<style scoped>

</style>