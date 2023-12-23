<template>
	<div class="container py-5">
		<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">ID</th>
		      <th scope="col">Name</th>
		      <th scope="col">Booking Date</th>
		      <th scope="col">Booking Time</th>
		      <th scope="col">Action</th>
		    </tr>
		  </thead>
		  <tbody>
		    <tr v-for="(booking, index) in bookings">
		    	<td>{{ index + 1 }}</td>
		      <td>{{ booking.name }}</td>
		      <td>{{ booking.booking_date }}</td>
		      <td>{{ booking.booking_time }}</td>
		      <td>
		      	<div class="btn-group">
		      		<router-link :to="{name: 'view', params: { id: booking.id }}" class="btn btn-primary">View</router-link>
		      		<router-link :to="{name: 'edit', params: { id: booking.id }}" class="btn btn-warning">Edit</router-link>
		      		<button class="btn btn-danger" @click="deleteBooking(booking.id)">Delete</button>
		      	</div>
		      </td>
		    </tr>
		  </tbody>
		</table>
	</div>
</template>

<script>
    import axios from 'axios';
    export default {
        name: 'list',
        data() {
            return {
            	bookings: [],
            }
        },

        methods: {
        	deleteBooking(id) { 
                axios
                    .delete(`api/booking/${id}`)
                    .then(response => {
                        let i = this.bookings.map(data => data.id).indexOf(id);
                        this.bookings.splice(i, 1)
                    });
            }
        },

        created() {
            axios
                .get('api/booking')
                .then(response => {
                    this.bookings = response.data;
                });
        },
        
    }
</script>