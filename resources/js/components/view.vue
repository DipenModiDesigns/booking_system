<template>
    <div class="container py-5">
        <div class="text-end mb-4">
            <router-link to="/" class="btn btn-primary">Back</router-link>
        </div>
        <form class="mainForm mx-auto card p-4" style="max-width: 700px;" @submit.prevent="updateBooking">
            <div class="title text-center mb-2">
                <h2>View Booking</h2>
            </div>
             <div class="mb-3">
                <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="name" placeholder="Name" v-model="bookings.name" readonly disabled>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address <span class="text-danger">*</span></label>
                <input type="email" class="form-control" id="email" placeholder="name@example.com" v-model="bookings.email" readonly disabled>
            </div>
            <div class="mb-3 d-flex">
                <label class="form-label">Booking type: <span class="text-danger">*</span></label>
                <div class="form-check ms-5">
                    <input class="form-check-input" type="radio" name="booking_type" id="fullday" value="fullday" v-model="bookings.booking_type" readonly disabled>
                    <label class="form-check-label" for="fullday">
                        Full day
                    </label>
                </div>
                <div class="form-check ms-4">
                    <input class="form-check-input" type="radio" name="booking_type" id="halfday" value="halfday" v-model="bookings.booking_type" readonly disabled>
                    <label class="form-check-label" for="halfday">
                        Half day
                    </label>
                </div>
            </div>
            <div class="mb-3">
                <label for="booking_date" class="form-label">Booking Date <span class="text-danger">*</span></label>
                <input type="date" class="form-control" id="booking_date" placeholder="Booking Date" min="2023-12-23" v-model="bookings.booking_date" readonly disabled>
            </div>
            <div class="mb-3 d-flex">
                <label class="form-label">Booking Slot: <span class="text-danger">*</span></label>
                <div class="form-check ms-5">
                    <input class="form-check-input" type="radio" name="booking_slot" id="morning" value="morning" v-model="bookings.booking_slot" readonly disabled>
                    <label class="form-check-label" for="morning">
                        Morning
                    </label>
                </div>
                <div class="form-check ms-4">
                    <input class="form-check-input" type="radio" name="booking_slot" id="evening" value="evening" v-model="bookings.booking_slot" readonly disabled>
                    <label class="form-check-label" for="evening">
                        Evening
                    </label>
                </div>
            </div>
             <div class="mb-3">
                <label for="booking_time" class="form-label">Booking Time <span class="text-danger">*</span></label>
                <input type="time" class="form-control" id="booking_time" placeholder="Booking Time" v-model="bookings.booking_time" readonly disabled>
            </div>
        </form>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        name: 'create',
        data() {
            return {
                bookings: {},
            }
        },

        methods: {
            
        },

        created() {
            axios
                .get(`api/booking/${this.$route.params.id}`)
                .then(response => {
                    this.bookings = response.data;
                });
        },


    }
</script>