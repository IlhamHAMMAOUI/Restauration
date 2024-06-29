<template>
  <div class="reservation-page">
    <h1>Reservations Page</h1>
    <div class="reservation-container">
      <div v-for="reservation in reservations" :key="reservation.id" class="reservation-card">
        <img :src="`http://127.0.0.1:8000/storage/${reservation.image1}`" alt="Reservation image" v-if="reservation.image1" class="reservation-image">
        <img :src="`http://127.0.0.1:8000/storage/${reservation.image2}`" alt="Reservation image" v-if="reservation.image2" class="reservation-image">
        <img :src="`http://127.0.0.1:8000/storage/${reservation.image3}`" alt="Reservation image" v-if="reservation.image3" class="reservation-image">
        <img :src="`http://127.0.0.1:8000/storage/${reservation.image4}`" alt="Reservation image" v-if="reservation.image4" class="reservation-image">
        <img :src="`http://127.0.0.1:8000/storage/${reservation.image5}`" alt="Reservation image" v-if="reservation.image5" class="reservation-image">
        <div class="details-text">
          <h2>{{ reservation.phone_number }}</h2>
          <p>Instructions: {{ reservation.instructions }}</p>
          <p>Hours of Operation: {{ reservation.hours_of_operation }}</p>
          <p>Corkage Info: {{ reservation.corkage_info }}</p>
          <p>Location Address: {{ reservation.location_address }}</p>
          <p>Directions: {{ reservation.directions }}</p>
          <p>Online Reservation Link: <a :href="reservation.online_reservation_link" target="_blank">{{ reservation.online_reservation_link }}</a></p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'Reservations',
  data() {
    return {
      reservations: []
    };
  },
  created() {
    this.fetchReservations();
  },
  methods: {
    async fetchReservations() {
      try {
        const response = await axios.get('http://127.0.0.1:8000/api/reservations');
        this.reservations = response.data;
      } catch (error) {
        console.error('Error fetching reservations:', error);
      }
    }
  }
};
</script>

<style scoped>
.reservation-page {
  font-family: 'Times New Roman', serif;
  color: #5a4a42;
  background-color: #f8f0e3;
  padding: 20px;
  border: 1px solid #d4c0a1;
  border-radius: 5px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
  max-width: 800px;
  margin: 0 auto ;
  margin-bottom: 20px;

  flex-direction: column; 
  height: auto;
}

.reservation-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  height: auto;
}

.reservation-card {
  width: calc(33.333% - 10px);
  border: 1px solid #ccc;
  padding: 16px;
  margin-bottom: 16px;
  box-shadow: 0 2px 4px rgba(0,0,0,0.1);
  transition: transform 0.3s ease;
  display: flex; 
  flex-direction: column; 
}

.reservation-card:hover {
  background-color: #f7f0e7;
  border-left: 5px solid #b39877;
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
  margin-bottom: 8px;
}

.reservation-image {
  max-width: 100%;
  height: auto;
  display: block;
  margin-bottom: 10px; 
  }
</style>
