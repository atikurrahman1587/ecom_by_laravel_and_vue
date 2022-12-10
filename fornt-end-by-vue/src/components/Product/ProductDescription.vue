<template>
  <div class="product-description">
    <div class="col-12">
      <div class="product-info">
        <div class="nav-main">
          <!-- Tab Nav -->
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Reviews</a></li>
          </ul>
          <!--/ End Tab Nav -->
        </div>
        <div class="tab-content" id="myTabContent">
          <!-- Description Tab -->
          <div class="tab-pane fade show active" id="description" role="tabpanel">
            <div class="tab-single">
              <div class="row">
                <div class="col-12">
                  <div class="single-des" v-html="description"></div>
                </div>
              </div>
            </div>
          </div>
          <!--/ End Description Tab -->
          <!-- Reviews Tab -->
          <div class="tab-pane fade" id="reviews" role="tabpanel">
            <div class="tab-single review-panel">
              <div class="row">
                <div class="col-12">
                  <div class="ratting-main">
                    <div class="avg-ratting">
                      <h4>4.5 <span>(Overall)</span></h4>
                      <span>Based on 1 Comments</span>
                    </div>
                    <!-- Single Rating -->
                    <div class="single-rating">
                      <div class="rating-author">
                        <img src="/images/comments1.jpg" alt="#">
                      </div>
                      <div class="rating-des">
                        <h6>Naimur Rahman</h6>
                        <div class="ratings">
                          <ul class="rating">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star-half-o"></i></li>
                            <li><i class="fa fa-star-o"></i></li>
                          </ul>
                          <div class="rate-count">(<span>3.5</span>)</div>
                        </div>
                        <p>Duis tincidunt mauris ac aliquet congue. Donec vestibulum consequat cursus. Aliquam pellentesque nulla dolor, in imperdiet.</p>
                      </div>
                    </div>
                    <!--/ End Single Rating -->
                    <!-- Single Rating -->
                    <div class="single-rating">
                      <div class="rating-author">
                        <img src="/images/comments2.jpg" alt="#">
                      </div>
                      <div class="rating-des">
                        <h6>Advin Geri</h6>
                        <div class="ratings">
                          <ul class="rating">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                          </ul>
                          <div class="rate-count">(<span>5.0</span>)</div>
                        </div>
                        <p>Duis tincidunt mauris ac aliquet congue. Donec vestibulum consequat cursus. Aliquam pellentesque nulla dolor, in imperdiet.</p>
                      </div>
                    </div>
                    <!--/ End Single Rating -->
                  </div>
                  <!-- Review -->
                  <div class="comment-review">
                    <div class="add-review">
                      <h5>Add A Review</h5>
                      <p>Your email address will not be published. Required fields are marked</p>
                    </div>
                    <h4>Your Rating</h4>
                    <div class="review-inner">
                      <div class="ratings">
                        <ul class="rating">
                          <li><i class="fa fa-star"></i></li>
                          <li><i class="fa fa-star"></i></li>
                          <li><i class="fa fa-star"></i></li>
                          <li><i class="fa fa-star"></i></li>
                          <li><i class="fa fa-star"></i></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <!--/ End Review -->
                  <!-- Form -->
                  <form class="form" method="post" action="https://wpthemesgrid.com/themes/eshop/mail/mail.php">
                    <div class="row">
                      <div class="col-lg-6 col-12">
                        <div class="form-group">
                          <label>Your Name<span>*</span></label>
                          <input type="text" name="name" required="required" placeholder="">
                        </div>
                      </div>
                      <div class="col-lg-6 col-12">
                        <div class="form-group">
                          <label>Your Email<span>*</span></label>
                          <input type="email" name="email" required="required" placeholder="">
                        </div>
                      </div>
                      <div class="col-lg-12 col-12">
                        <div class="form-group">
                          <label>Write a review<span>*</span></label>
                          <textarea name="message" rows="6" placeholder="" ></textarea>
                        </div>
                      </div>
                      <div class="col-lg-12 col-12">
                        <div class="form-group button5">
                          <button type="submit" class="btn">Submit</button>
                        </div>
                      </div>
                    </div>
                  </form>
                  <!--/ End Form -->
                </div>
              </div>
            </div>
          </div>
          <!--/ End Reviews Tab -->
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "ProductDescription",
  data() {
    return {
      id: this.$route.params.id,
      description: '',
    }
  },
  created() {
    this.getProductDescription();
  },
  methods: {
    getProductDescription()
    {
      this.$http.get('http://localhost/admin-five/public/api/get-product-description/'+this.id).then(function (response){
        this.description = response.body;
      });
    }
  }
}
</script>

<style scoped>

</style>