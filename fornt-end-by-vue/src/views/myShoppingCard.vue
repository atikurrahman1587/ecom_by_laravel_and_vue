<template>
  <div>
    <pageTitle/>
    <cart/>
  </div>
</template>

<script>
import pageTitle from "../components/includes/PageTitle";
import cart from "../components/cart/cart";
export default {
  name: "myShoppingCard",
  components:{pageTitle, cart}
}
</script>

<style scoped>

</style>