<template>
  <div class="category-product">
    <PageTitle/>
    <section class="product-area shop-sidebar shop section">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-4 col-12">
            <CategoryLeft/>
          </div>
          <div class="col-lg-9 col-md-8 col-12">
            <CategoryRight :key="$route.path"/>
          </div>
        </div>
      </div>
    </section>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
          </div>
          <div class="modal-body">
            <div class="row no-gutters">
              <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <!-- Product Slider -->
                <div class="product-gallery">
                  <div class="quickview-slider-active">
                    <div class="single-slider">
                      <img src="images/modal1.png" alt="#">
                    </div>
                    <div class="single-slider">
                      <img src="images/modal2.png" alt="#">
                    </div>
                    <div class="single-slider">
                      <img src="images/modal3.png" alt="#">
                    </div>
                    <div class="single-slider">
                      <img src="images/modal4.png" alt="#">
                    </div>
                  </div>
                </div>
                <!-- End Product slider -->
              </div>
              <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <div class="quickview-content">
                  <h2>Flared Shift Dress</h2>
                  <div class="quickview-ratting-review">
                    <div class="quickview-ratting-wrap">
                      <div class="quickview-ratting">
                        <i class="yellow fa fa-star"></i>
                        <i class="yellow fa fa-star"></i>
                        <i class="yellow fa fa-star"></i>
                        <i class="yellow fa fa-star"></i>
                        <i class="fa fa-star"></i>
                      </div>
                      <a href="#"> (1 customer review)</a>
                    </div>
                    <div class="quickview-stock">
                      <span><i class="fa fa-check-circle-o"></i> in stock</span>
                    </div>
                  </div>
                  <h3>$29.00</h3>
                  <div class="quickview-peragraph">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste laborum ad impedit pariatur esse optio tempora sint ullam autem deleniti nam in quos qui nemo ipsum numquam.</p>
                  </div>
                  <div class="size">
                    <div class="row">
                      <div class="col-lg-6 col-12">
                        <h5 class="title">Size</h5>
                        <select>
                          <option selected="selected">s</option>
                          <option>m</option>
                          <option>l</option>
                          <option>xl</option>
                        </select>
                      </div>
                      <div class="col-lg-6 col-12">
                        <h5 class="title">Color</h5>
                        <select>
                          <option selected="selected">orange</option>
                          <option>purple</option>
                          <option>black</option>
                          <option>pink</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="quantity">
                    <!-- Input Order -->
                    <div class="input-group">
                      <div class="button minus">
                        <button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                          <i class="ti-minus"></i>
                        </button>
                      </div>
                      <input type="text" name="quant[1]" class="input-number"  data-min="1" data-max="1000" value="1">
                      <div class="button plus">
                        <button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
                          <i class="ti-plus"></i>
                        </button>
                      </div>
                    </div>
                    <!--/ End Input Order -->
                  </div>
                  <div class="add-to-cart">
                    <a href="#" class="btn">Add to cart</a>
                    <a href="#" class="btn min"><i class="ti-heart"></i></a>
                    <a href="#" class="btn min"><i class="fa fa-compress"></i></a>
                  </div>
                  <div class="default-social">
                    <h4 class="share-now">Share:</h4>
                    <ul>
                      <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                      <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                      <li><a class="youtube" href="#"><i class="fa fa-pinterest-p"></i></a></li>
                      <li><a class="dribbble" href="#"><i class="fa fa-google-plus"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import PageTitle from "../components/includes/PageTitle";
import CategoryLeft from "../components/category/CategoryLeft";
import CategoryRight from "../components/category/CategoryRight";
export default {
  name: "CategoryProduct",
  components: {PageTitle, CategoryLeft, CategoryRight},
  mounted() {
    $('.quickview-slider-active').owlCarousel({
      items:1,
      autoplay:true,
      autoplayTimeout:5000,
      smartSpeed: 400,
      autoplayHoverPause:true,
      nav:true,
      loop:true,
      merge:true,
      dots:false,
      navText: ['<i class=" ti-arrow-left"></i>', '<i class=" ti-arrow-right"></i>'],
    });

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
  }
}
</script>

<style scoped>

</style>