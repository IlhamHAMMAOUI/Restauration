<!-- src/App.vue -->
<template>
  <div class="fusion-logo" :style="{ backgroundColor: logoBackgroundColor }">
    <div class="app-container">
      <div class="fusion-sticky-header-wrapper">
        <div class="fusion-header">
          <div class="fusion-row justify-content-center">
            <div class="fusion-logo">
              <a class="fusion-logo-link" href="/">
                <img
                  src="https://kokkari.com/wp-content/uploads/kokkari-logo-350.png"
                  srcset="https://kokkari.com/wp-content/uploads/kokkari-logo-350.png 1x, https://kokkari.com/wp-content/uploads/kokkari-logo-700.png 2x"
                  width="350"
                  height="102"
                  style="max-height: 102px; height: auto; filter: invert(0);"
                  alt="KOKKARI Logo"
                  data-retina_logo_url="https://kokkari.com/wp-content/uploads/kokkari-logo-700.png"
                  class="fusion-standard-logo"
                >
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="fusion-secondary-main-menu">
        <div class="fusion-row">
          <Navbar />
        </div>
      </div>
      <router-view />
      <footer id="footer" class="fusion-footer-copyright-area">
        <div class="fusion-row">
          <div class="fusion-copyright-content">
            <div class="fusion-copyright-notice" style="padding-bottom: 0px;">
              <div>
                © {{ currentYear }} Tous droits réservés. Restaurent
              </div>
            </div>
            <div class="fusion-social-links-footer" style="display: none;"></div>
          </div>
        </div>
      </footer>
    </div>
  </div>
</template>

<script>
import Navbar from './components/Navbar.vue';

export default {
  name: 'App',
  components: {
    Navbar
  },
  data() {
    return {
      logoBackgroundColor: '#efe8d8',
      currentYear: new Date().getFullYear()
    };
  }
};
</script>

<style scoped>
/* Utiliser positionnement absolu pour aligner le logo à droite */
.fusion-header {
  position: 120px;
  /* position: fixed; */
}
/* Style pour le conteneur principal */
.app-container {
  display: flex;
  flex-direction: column;
  min-height: 100vh;
}
/* Style pour centrer le logo horizontalement */
.fusion-row.justify-content-center {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100px;
}

body {
  background-color: #efe8d8; /* Couleur de fond désirée */
  margin: 0; /* Assurez-vous qu'il n'y a pas de marges par défaut */
}

/* Style pour le logo */
.fusion-logo {
  text-align: center;
  margin: 0 auto;
  /* background-color: #efe8d8; */
}
.fusion-logo img {
  max-height: 102px;
  height: auto;
  filter: invert(0);
}
footer {
  background-color: #707070;
  color: white;
  text-align: center;
  padding: 10px;
  position: fixed;
  bottom: 0;
  width: 100%;
}
</style>
