<template>
    <div class="container">
        <form @submit.prevent="onSubmit" @reset="onReset">
            <div class="card m-3">
                <h5 class="card-header">Vue.js + Vuelidate - Dynamic Form Example</h5>
                <div class="card-body border-bottom">
                    <div class="form-row">
                        <div class="form-group">
                            <label>Number of Tickets</label>
                            <select v-model="numberOfTickets" class="form-control" :class="{ 'is-invalid': $v.numberOfTickets.$error }" @change="onChangeTickets">
                                <option value=""></option>
                                <option v-for="i in [1,2,3,4,5,6,7,8,9,10]" :key="i" :value="i">{{i}}</option>
                            </select>
                            <div class="invalid-feedback">Number of tickets is required</div>
                        </div>
                    </div>
                </div>
                <div v-for="(ticket, i) in tickets" :key="i" :set="v = $v.tickets.$each[i]" class="list-group list-group-flush">
                    <div class="list-group-item">
                        <h5 class="card-title">Ticket {{i + 1}}</h5>
                        <div class="form-row">
                            <div class="form-group col-6">
                                <label>Name</label>
                                <input type="text" v-model="ticket.name" class="form-control" :class="{ 'is-invalid': v.name.$error }" />
                                <div class="invalid-feedback">
                                    <div>Name is required</div>
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <label>Email</label>
                                <input type="text" v-model="ticket.email" class="form-control" :class="{ 'is-invalid': v.email.$error }" />
                                <div class="invalid-feedback">
                                    <div v-if="!v.email.required">Email is required</div>
                                    <div v-if="!v.email.email">Email is invalid</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center border-top-0">
                    <button class="btn btn-primary mr-1">
                        Buy Tickets
                    </button>
                    <button class="btn btn-secondary mr-1" type="reset">Reset</button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
import { required, email } from "vuelidate/lib/validators";

export default {
    data() {
        return {
            numberOfTickets: '',
            tickets: []
        };
    },
    validations: {
        numberOfTickets: { required },
        tickets: {
            $each: {
                name: { required },
                email: { required, email }
            }
        }
    },
    methods: {
        onChangeTickets(e) {
            const numberOfTickets = Number(e.target.value || 0);
            this.tickets = [...Array(numberOfTickets).keys()].map(i => this.tickets[i] || {});
        },
        onSubmit(e) {
            // set all fields to touched
            this.$v.$touch();

            // stop here if form is invalid
            if (this.$v.$invalid) return;

            // display form values on success
            alert("SUCCESS!! :-)\n\n" + JSON.stringify(this.$data, null, 4));
        },
        onReset() {
            // reset form validation errors
            this.$v.$reset();

            // reset form data
            const initialData = this.$options.data.call(this);
            Object.assign(this.$data, initialData);
        }
    }
};
</script>
