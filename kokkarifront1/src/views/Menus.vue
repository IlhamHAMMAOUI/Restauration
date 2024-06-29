<template>
  <div class="menu-page">
    <h1>Menu Page</h1>


    <div class="menu-container">
      <b-row>
        <b-col v-for="menu in menus" :key="menu.id" cols="12" md="4" class="mb-4">
          <b-card
            v-if="menu.image1"
            title="Votre Menu"
            :img-src="`http://127.0.0.1:8000/storage/${menu.image1}`"
            img-alt="Menu image"
            img-top
            style="max-width: 20rem;"
            class="menu-card"
          >
          <b-card-text>
      Veuillez consulter les reçette que tu as choisis et clické sur consulter
         </b-card-text>
         <b-button href="#" variant="primary">consulter</b-button>
          </b-card>
        </b-col>

      </b-row>
    </div>
    </div>

</template>

<script>
import axios from 'axios';
import { BRow, BCol, BCard, BCardText } from 'bootstrap-vue-3';

export default {
  name: 'Menu',
  components: {
    BRow,
    BCol,
    BCard,
    BCardText
  },
  data() {
    return {
      menus: []
    };
  },
  created() {
    this.fetchMenus();
  },
  methods: {
    async fetchMenus() {
      try {
        const response = await axios.get('http://127.0.0.1:8000/api/menus');
        this.menus = response.data;
      } catch (error) {
        console.error('Error fetching menus:', error);
      }
    }
  }
};
</script>

<style scoped>
.menu-page {
  max-width: 1200px;
  margin: 0 auto;
  padding: 20px;
}

.menu-card {
  transition: transform 0.3s ease;
}

.menu-card:hover {
  transform: translateY(-5px);
}
</style>


