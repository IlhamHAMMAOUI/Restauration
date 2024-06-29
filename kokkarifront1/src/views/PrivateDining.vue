<template>
  <div class="private-dining-container">
    <h1>Private Dining Rooms</h1>
    <div v-for="dining in private_dinings" :key="dining.id" class="dining-card">
      <div class="dining-details">
        <div class="details-text">
          <h2>{{ dining.name }}</h2>
          <p>{{ dining.description }}</p>
          <p>Capacity : {{ dining.capacity }}</p>
          <p>Contact : {{ dining.contact_phone }} | {{ dining.contact_email }}</p>
        </div>
        <img :src="`http://127.0.0.1:8000/storage/${dining.image1}`" alt="Private dining image" v-if="dining.image1" class="dining-image">
        <img :src="`http://127.0.0.1:8000/storage/${dining.image2}`" alt="Private dining image" v-if="dining.image2" class="dining-image">
        <img :src="`http://127.0.0.1:8000/storage/${dining.image3}`" alt="Private dining image" v-if="dining.image3" class="dining-image">
        <img :src="`http://127.0.0.1:8000/storage/${dining.image4}`" alt="Private dining image" v-if="dining.image4" class="dining-image">
        <img :src="`http://127.0.0.1:8000/storage/${dining.image5}`" alt="Private dining image" v-if="dining.image5" class="dining-image">
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'Private_dinings',
  data() {
    return {
      private_dinings: [] // Les données seront récupérées via une requête API
    };
  },
  created() {
    this.fetchPrivate_dinings();
  },
  methods: {
    async fetchPrivate_dinings() {
      try {
        const response = await axios.get('http://127.0.0.1:8000/api/private_dinings');
        this.private_dinings = response.data;
      } catch (error) {
        console.error('Erreur lors de la récupération des données:', error);
      }
    }
  }
};
</script>

<style scoped>
.private-dining-container {
  font-family: 'Times New Roman', serif;
  color: #5a4a42;
  background-color: #f8f0e3;
  padding: 20px;
  border: 1px solid #d4c0a1;
  border-radius: 5px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
  max-width: 800px; /* Ajuster la valeur selon votre préférence */
  /* margin: 0 auto;  */
  margin: 20px auto 0; /* Ajoute 20px d'espace en haut, centre horizontalement */
  margin-bottom: 20px;

flex-direction: column; 

}


.dining-card {
  background-color: #fffaf5;
  margin: 10px 0;
  padding: 15px;
  border-left: 5px solid #c9b79c;
  font-size: 16px;
}

.dining-details {
  display: flex;
  align-items: center;
}

.details-text {
  flex: 1;
}

.details-text h2 {
  font-size: 20px;
  color: #814c30;
}

.details-text p {
  line-height: 1.6;
}

.dining-image {
  max-width: 50%;
  height: auto;
  display: block;
  margin-top: 10px;
}

.dining-card:hover {
  background-color: #f7f0e7;
  border-left: 5px solid #b39877;
}
</style>
