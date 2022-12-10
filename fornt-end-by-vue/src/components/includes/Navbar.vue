<script src="../../../public/js/nicesellect.js"></script>
<template>
  <div class="nabvar">
    <header class="header shop">
      <!-- Topbar -->
      <div class="topbar">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 col-md-12 col-12">
              <!-- Top Left -->
              <div class="top-left">
                <ul class="list-main">
                  <li><i class="ti-headphone-alt"></i> +060 (800) 801-582</li>
                  <li><i class="ti-email"></i> support@shophub.com</li>
                </ul>
              </div>
              <!--/ End Top Left -->
            </div>
            <div class="col-lg-6 col-md-12 col-12">
              <!-- Top Right -->
              <div class="right-content">
                <ul class="list-main">
                  <li><i class="ti-location-pin"></i> Store location</li>
                  <li><i class="ti-alarm-clock"></i> <a href="#">Daily deal</a></li>
                  <li><i class="ti-user"></i> <a href="#">My account</a></li>
                  <li><i class="ti-power-off"></i><a href="login.html#">Login</a></li>
                </ul>
              </div>
              <!-- End Top Right -->
            </div>
          </div>
        </div>
      </div>
      <!-- End Topbar -->
      <div class="middle-inner">
        <div class="container">
          <div class="row">
            <div class="col-lg-2 col-md-2 col-12">
              <!-- Logo -->
              <div class="logo">
                <router-link :to="{name: 'Home'}" href="index-2.html"><img src="/images/logo.png" alt="logo"></router-link>
              </div>
              <!--/ End Logo -->
              <!-- Search Form -->
              <div class="search-top">
                <div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
                <!-- Search Form -->
                <div class="search-top">
                  <form class="search-form">
                    <input type="text" placeholder="Search here..." name="search">
                    <button value="search" type="submit"><i class="ti-search"></i></button>
                  </form>
                </div>
                <!--/ End Search Form -->
              </div>
              <!--/ End Search Form -->
              <div class="mobile-nav"></div>
            </div>
            <div class="col-lg-8 col-md-7 col-12">
              <div class="search-bar-top">
                <div class="search-bar">
                  <select>
                    <option selected="selected">All Category</option>
                    <option>watch</option>
                    <option>mobile</option>
                    <option>kid’s item</option>
                  </select>
                  <form>
                    <input name="search" placeholder="Search Products Here....." type="search">
                    <button class="btnn"><i class="ti-search"></i></button>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-lg-2 col-md-3 col-12">
              <div class="right-bar">
                <!-- Search Form -->
                <div class="sinlge-bar">
                  <a href="#" class="single-icon"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                </div>
                <div class="sinlge-bar">
                  <a href="#" class="single-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
                </div>
                <div class="sinlge-bar shopping">
                  <a href="#" class="single-icon"><i class="ti-bag"></i> <span class="total-count">2</span></a>
                  <!-- Shopping Item -->
                  <div class="shopping-item">
                    <div class="dropdown-cart-header">
                      <span>2 Items</span>
                      <a href="#">View Cart</a>
                    </div>
                    <ul class="shopping-list">
                      <li>
                        <a href="#" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
                        <a class="cart-img" href="#"><img src="/images/product-1.jpg" alt="#"></a>
                        <h4><a href="#">Woman Ring</a></h4>
                        <p class="quantity">1x - <span class="amount">$99.00</span></p>
                      </li>
                      <li>
                        <a href="#" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
                        <a class="cart-img" href="#"><img src="/images/product-2.jpg" alt="#"></a>
                        <h4><a href="#">Woman Necklace</a></h4>
                        <p class="quantity">1x - <span class="amount">$35.00</span></p>
                      </li>
                    </ul>
                    <div class="bottom">
                      <div class="total">
                        <span>Total</span>
                        <span class="total-amount">$134.00</span>
                      </div>
                      <a href="checkout.html" class="btn animate">Checkout</a>
                    </div>
                  </div>
                  <!--/ End Shopping Item -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Header Inner -->
      <div class="header-inner">
        <div class="container">
          <div class="cat-nav-head">
            <div class="row" v-if="check">
              <div class="col-lg-3">
                <div class="all-category">
                  <h3 class="cat-heading"><i class="fa fa-bars" aria-hidden="true"></i>CATEGORIES</h3>
                  <ul class="main-category">
                    <li v-for="(category, key) in categories" :key="key">
                      <router-link :to="{name: 'categoryProduct', params:{id: category.category.id, name:category.category.name}}">{{ category.category.name}}<i class="fa fa-angle-right" aria-hidden="true"></i></router-link>
                      <ul class="sub-category">
                        <li v-for="(subCategory, key1) in category.sub_categories" :key="key1">
                          <router-link :to="{name: 'subCategoryProduct', params:{id: subCategory.id, name:subCategory.name}}">{{ subCategory.name }}</router-link>
                        </li>
                      </ul>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-lg-9 col-12">
                <div class="menu-area">
                  <!-- Main Menu -->
                  <nav class="navbar navbar-expand-lg">
                    <div class="navbar-collapse">
                      <div class="nav-inner">
                        <ul class="nav main-menu menu navbar-nav">
                          <li><a href="#">About Us</a></li>
                          <li><a href="#">Policy & privacy</a></li>
                          <li><a href="#">Contact Us</a></li>
                        </ul>
                      </div>
                    </div>
                  </nav>
                  <!--/ End Main Menu -->
                </div>
              </div>
            </div>
            <div class="row" v-else>
              <div class="col-lg-12 col-12">
                <div class="menu-area">
                  <!-- Main Menu -->
                  <nav class="navbar navbar-expand-lg">
                    <div class="navbar-collapse">
                      <div class="nav-inner">
                        <ul class="nav main-menu menu navbar-nav">
                          <li><router-link :to="{name: 'Home'}">Home</router-link></li>
                          <li v-for="(othersCategory, key2) in othersCategories" :key="key2">
                            <router-link :to="{name: 'categoryProduct', params:{id: othersCategory.id, name:othersCategory.name}}">{{ othersCategory.name}}</router-link>
                          </li>
                          <li><a href="#">Contact Us</a></li>
                        </ul>
                      </div>
                    </div>
                  </nav>
                  <!--/ End Main Menu -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--/ End Header Inner -->
    </header>
  </div>
</template>

<script>
export default {
  name: "Navbar",
  // mounted() {
  //   this.$http.get('http://localhost/admin-five/public/api/all-category').then(function (){
  //     $('select').niceSelect();
  //   });
  // },
  data() {
    return {
      check: true,
      categories: [],
      othersCategories: [],
    }
  },
  created() {
    this.getAllCategory();
    this.getCategoryForOther();
    if (this.$route.path == '/')
    {
      this.check = true;
    }else
    {
      this.check = false;
    }
  },
  methods: {
    getAllCategory()
    {
      this.$http.get('http://localhost/admin-five/public/api/all-category').then(function (response){
        this.categories = response.body;
      });
    },
    getCategoryForOther()
    {
      this.$http.get('http://localhost/admin-five/public/api/category-for-others').then(function (response){
        this.othersCategories = response.body;
      });
    }
  }
}
</script>

<style scoped>

</style>