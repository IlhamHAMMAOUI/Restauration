<template>
  <div class="cuisine-page">
    <h1>Cuisine Page</h1>
    <div class="cuisine-container">
      <div v-for="cuisine in cuisines" :key="cuisine.id" class="cuisine-card">
        <!-- <img :src="`http://127.0.0.1:8000/storage/${cuisine.image1}`" alt="Cuisine Image" v-if="cuisine.image" class="cuisine-image" /> -->
        <img :src="`http://127.0.0.1:8000/storage/${cuisine.image1}`" alt="Cuisine image" v-if="cuisine.image1" class="cuisine-image">
        <img :src="`http://127.0.0.1:8000/storage/${cuisine.image2}`" alt="Cuisine image" v-if="cuisine.image2" class="cuisine-image">
        <img :src="`http://127.0.0.1:8000/storage/${cuisine.image3}`" alt="Cuisine image" v-if="cuisine.image3" class="cuisine-image">
        <img :src="`http://127.0.0.1:8000/storage/${cuisine.image4}`" alt="Cuisine image" v-if="cuisine.image4" class="cuisine-image">
        <img :src="`http://127.0.0.1:8000/storage/${cuisine.image5}`" alt="Cuisine image" v-if="cuisine.image5" class="cuisine-image">
        <div class="cuisine-info">
          <h2>{{ cuisine.description }}</h2>
          <p>{{ cuisine.specialties }}</p>
          <p>{{ cuisine.ingredients }}</p>
          <p>{{ cuisine.techniques }}</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'Cuisine',
  data() {
    return {
      cuisines: []
    };
  },
  created() {
    this.fetchCuisines();
  },
  methods: {
    async fetchCuisines() {
      try {
        const response = await axios.get('http://127.0.0.1:8000/api/cuisines');
        this.cuisines = response.data;
      } catch (error) {
        console.error('Error fetching cuisines:', error);
      }
    }
  }
};
</script>

<style scoped>
.cuisine-page {
  max-width: 1200px;
  margin: 0 auto;
  padding: 20px;
  margin-bottom: 20px;

flex-direction: column; 
}

.cuisine-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}

.cuisine-card {
  width: calc(33.333% - 10px);
  border: 1px solid #ccc;
  padding: 16px;
  margin-bottom: 16px;
  box-shadow: 0 2px 4px rgba(0,0,0,0.1);
  transition: transform 0.3s ease;
}

.cuisine-card:hover {
  transform: translateY(-5px);
}

.cuisine-image {
  width: 100%;
  height: 200px;
  object-fit: cover;
  border-bottom: 1px solid #ccc;
  margin-bottom: 16px;
}

.cuisine-info {
  text-align: left;
}

.cuisine-info h2 {
  font-size: 1.5em;
  color: #333;
  margin-bottom: 8px;
}

.cuisine-info p {
  font-size: 1em;
  color: #666;
}
</style>
