<!-- src/components/Navbar.vue -->
<template>
  <nav class="navbar">
    <ul class="nav-menu">
      <li class="nav-item"><router-link to="/about" class="fusion-bar-highlight">ABOUT</router-link></li>
      <li class="nav-item"><router-link to="/cuisine" class="fusion-bar-highlight">CUISINE</router-link></li>
      <li class="nav-item"><router-link to="/menus" class="fusion-bar-highlight">MENUS</router-link></li>
      <li class="nav-item"><router-link to="/reservations" class="fusion-bar-highlight">RESERVATIONS</router-link></li>
      <li class="nav-item"><router-link to="/private-dining" class="fusion-bar-highlight">PRIVATE DINING</router-link></li>
    </ul>
  </nav>
</template>

<script>
export default {
  name: 'Navbar'
};
</script>

<style scoped>
/* Styles pour le Navbar */
.navbar {
  display: inline-block;
  margin: 0;
  padding: 0;
}

.nav-menu {
  list-style: none;
  padding-left: 0;
  margin: 0;
  display: flex;
  justify-content: center;
}

.nav-item {
  margin: 0 10px;
}
.nav-item a {
  text-decoration: none;
  color: #333;
  font-weight: bold;
  font-family: 'VotrePoliceDeCaractères', sans-serif;
  font-size: 18px;
}
.nav-item a:hover {
  text-decoration: underline;
}
</style>
