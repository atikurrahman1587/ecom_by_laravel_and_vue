<template>
  <div class="home">
    <HeroSlider/>
    <SmallBanner/>
    <ProductArea/>
    <MidiumBanner/>
    <HotItem/>
    <OnSale/>
    <DealOfday/>
    <Subscribe/>
  </div>
</template>

<script>
import HeroSlider from "../components/home/HeroSlider";
import SmallBanner from "../components/home/SmallBanner";
import ProductArea from "../components/home/ProductArea";
import MidiumBanner from "../components/home/MidiumBanner";
import HotItem from "../components/home/HotItem";
import OnSale from "../components/home/OnSale";
import DealOfday from "../components/home/DealOfday";
import Subscribe from "../components/home/Subscribe";
export default {
  name: 'Home',
  components: {HeroSlider, SmallBanner, ProductArea, MidiumBanner, HotItem, OnSale, DealOfday, Subscribe}
}
</script>
