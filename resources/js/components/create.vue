<template>
    <div class="container py-5">
        <form class="mainForm mx-auto card p-4" style="max-width: 700px;" @submit.prevent="onSubmit" method="post">
            <div class="title text-center mb-2">
                <h2>Create Booking</h2>
            </div>
             <div class="mb-3">
                <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="name" placeholder="Name" v-model="name">
                <span v-if="errorMsgs.name" v-text="errorMsgs.name[0]" class="text-danger block w-100"></span>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address <span class="text-danger">*</span></label>
                <input type="email" class="form-control" id="email" placeholder="name@example.com" v-model="email">
                <span v-if="errorMsgs.email" v-text="errorMsgs.email[0]" class="text-danger block w-100"></span>
            </div>
            <div class="mb-3 d-flex flex-wrap">
                <label class="form-label">Booking type: <span class="text-danger">*</span></label>
                <div class="form-check ms-5">
                    <input class="form-check-input" type="radio" name="booking_type" id="fullday" value="fullday" v-model="booking_type">
                    <label class="form-check-label" for="fullday">
                        Full day
                    </label>
                </div>
                <div class="form-check ms-4">
                    <input class="form-check-input" type="radio" name="booking_type" id="halfday" value="halfday" v-model="booking_type">
                    <label class="form-check-label" for="halfday">
                        Half day
                    </label>
                </div>
                <span v-if="errorMsgs.booking_type" v-text="errorMsgs.booking_type[0]" class="text-danger block w-100"></span>
            </div>
            <div class="mb-3">
                <label for="booking_date" class="form-label">Booking Date <span class="text-danger">*</span></label>
                <input type="date" class="form-control" id="booking_date" placeholder="Booking Date" min="2023-12-23" v-model="booking_date">
                <span v-if="errorMsgs.booking_date" v-text="errorMsgs.booking_date[0]" class="text-danger block w-100"></span>
                <span v-if="dateError" v-text="dateError" class="text-danger block w-100"></span>
            </div>
            <div class="mb-3 d-flex flex-wrap">
                <label class="form-label">Booking Slot: <span class="text-danger">*</span></label>
                <div class="form-check ms-5">
                    <input class="form-check-input" type="radio" name="booking_slot" id="morning" value="morning" v-model="booking_slot">
                    <label class="form-check-label" for="morning">
                        Morning
                    </label>
                </div>
                <div class="form-check ms-4">
                    <input class="form-check-input" type="radio" name="booking_slot" id="evening" value="evening" v-model="booking_slot">
                    <label class="form-check-label" for="evening">
                        Evening
                    </label>
                </div>
                <span v-if="errorMsgs.booking_slot" v-text="errorMsgs.booking_slot[0]" class="text-danger block w-100"></span>
            </div>
             <div class="mb-3">
                <label for="booking_time" class="form-label">Booking Time <span class="text-danger">*</span></label>
                <input type="time" class="form-control" id="booking_time" placeholder="Booking Time" v-model="booking_time">
                <span v-if="errorMsgs.booking_time" v-text="errorMsgs.booking_time[0]" class="text-danger block w-100"></span>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        name: 'create',
        data() {
            return {
                name: '',
                email: '',
                booking_type: '',
                booking_date: '',
                booking_slot: '',
                booking_time: '',
                dateError: '',
                errorMsgs: []
            }
        },

        methods: {
            onSubmit() {
                axios.post('api/booking', this.$data)
                .then(()=> {
                    this.$router.push({ path: '/' });
                }).catch(e => {
                    const response = e.response.data;
                    console.log(response)
                    if (typeof response === "string") {
                        this.errorMsgs = [];
                        this.dateError = response;
                    } else {
                        this.dateError = '';
                        this.errorMsgs = response;
                    }
                })

            }
        }
    }
</script>