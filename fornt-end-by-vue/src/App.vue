<template>
  <div id="app">
    <MyColor/>
    <Navbar :key="$route.path"/>
    <router-view/>
    <MyFooter/>
  </div>
</template>

<script>
  import Navbar from "./components/includes/Navbar";
  import MyFooter from "./components/includes/Footer";
  import MyColor from "./components/includes/Color";
  export default {
    name: "App",
    components: {Navbar, MyFooter,MyColor}
  }
</script>

<style>

</style>
