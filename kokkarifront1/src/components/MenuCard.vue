<!-- MenuCard.vue -->
<template>
    <article class="menu-card">
      <b-img :src="`http://127.0.0.1:8000/storage/${menu.image1}`" alt="Menu image" />
    </article>
  </template>
  
  <script>
  export default {
    props: {
      menu: Object, // Pass menu data as a prop
    },
  };
  </script>
  
  <style scoped lang="scss">
  .menu-card {
    /* Styling for menu cards */
    border: 1px solid #ddd;
    padding: 10px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    background-color: #fff;
    text-align: center;
  
    b-img {
      max-width: 100%;
      height: auto;
    }
  
    p {
      margin: 8px 0;
    }
  }
  </style>
  