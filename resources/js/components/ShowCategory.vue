<template>
  <div>
    <div v-for="category in this.categories" :key="category.category_id">
      <h4>{{category.categoryname}}</h4>
      <ul>
        <li v-for="subcat in category.subcategories" :key="subcat">{{subcat.subcategoryname}}</li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  props: ["categories"]
};
</script>
