<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-8">Enter Property Details</div>
                            <div class="col-md-4">
                                <router-link to="/home">
                                    <button class="btn btn-primary">Back</button>
                                </router-link>
                            </div>
                        </div>
                    </div>

                    <div class="panel-body">
                        <form @submit.prevent="onSubmitted">
                            <fieldset>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-lg-4 control-label" for="property_id">Property</label>
                                        <div class="col-lg-8">
                                            <input
                                                    type="text"
                                                    id="property_id"
                                                    class="form-control"
                                                    v-model="fields.property_id">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-lg-4 control-label" for="how_quick_to_sell">How Quick to Sell</label>
                                        <div class="col-lg-8">
                                            <input
                                                    type="text"
                                                    id="how_quick_to_sell"
                                                    class="form-control"
                                                    v-model="fields.how_quick_to_sell">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-lg-4 control-label" for="arv">After Repair Value</label>
                                        <div class="col-lg-8">
                                            <input
                                                    type="text"
                                                    id="arv"
                                                    class="form-control"
                                                    v-model="fields.arv">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-lg-4 control-label" for="rental_arv">Rental - After Repair Value</label>
                                        <div class="col-lg-8">
                                            <input
                                                    type="text"
                                                    id="rental_arv"
                                                    class="form-control"
                                                    v-model="fields.rental_arv">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-lg-4 control-label" for="estimated_repairs">Estimated Repairs</label>
                                        <div class="col-lg-8">
                                            <input
                                                    type="text"
                                                    id="estimated_repairs"
                                                    class="form-control"
                                                    v-model="fields.estimated_repairs">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-lg-4 control-label" for="assignment_fee">Assignment Fee</label>
                                        <div class="col-lg-8">
                                            <input
                                                    type="text"
                                                    id="assignment_fee"
                                                    class="form-control"
                                                    v-model="fields.assignment_fee">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-lg-4 control-label" for="mortgage_amount">Mortgage Amount</label>
                                        <div class="col-lg-8">
                                            <input
                                                    type="text"
                                                    id="mortgage_amount"
                                                    class="form-control"
                                                    v-model="fields.mortgage_amount">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-lg-4 control-label" for="monthly_payment">Monthly Payment</label>
                                        <div class="col-lg-8">
                                            <input
                                                    type="text"
                                                    id="monthly_payment"
                                                    class="form-control"
                                                    v-model="fields.monthly_payment">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-lg-4 control-label" for="asking_price">Asking Price</label>
                                        <div class="col-lg-8">
                                            <input
                                                    type="text"
                                                    id="asking_price"
                                                    class="form-control"
                                                    v-model="fields.asking_price">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-lg-4 control-label" for="deal_type">Deal Type</label>
                                        <div class="col-lg-8">
                                            <input
                                                    type="text"
                                                    id="deal_type"
                                                    class="form-control"
                                                    v-model="fields.deal_type">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-lg-4 control-label" for="buyers">Buyers</label>
                                        <div class="col-lg-8">
                                            <input
                                                    type="text"
                                                    id="buyers"
                                                    class="form-control"
                                                    v-model="fields.buyers">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-lg-4 control-label" for="notes">Notes</label>
                                        <div class="col-lg-8">
                                            <input
                                                    type="text"
                                                    id="notes"
                                                    class="form-control"
                                                    v-model="fields.notes">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="panel-footer">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "new-wholesale-exit",
        data: function() {
            return {
                fields: {
                    property_id:        '',
                    how_quick_to_sell:  '',
                    arv:                '',
                    rental_arv:         '',
                    estimated_repairs:  '',
                    assignment_fee:     '',
                    mortgage_amount:    '',
                    monthly_payment:    '',
                    asking_price:       '',
                    deal_type:          '',
                    buyers:             '',
                    notes:              ''
                }
            }
        },
        methods: {
            onSubmitted() {
                axios.post(
                    '/api/wholesale',
                    {
                        property_id:        this.fields.property_id,
                        how_quick_to_sell:  this.fields.how_quick_to_sell,
                        arv:                this.fields.arv,
                        rental_arv:         this.fields.rental_arv,
                        estimated_repairs:  this.fields.estimated_repairs,
                        assignment_fee:     this.fields.assignment_fee,
                        mortgage_amount:    this.fields.mortgage_amount,
                        monthly_payment:    this.fields.monthly_payment,
                        asking_price:       this.fields.asking_price,
                        deal_type:          this.fields.deal_type,
                        buyers:             this.fields.buyers,
                        notes:              this.fields.notes
                    }
                )
                    .then(
                        (response) => console.log(response)
                    )
                    .catch(
                        (error) => console.log(error)
                    );
                // this.$router.push('home');
            }
        }
    }
</script>

<style scoped>
    .row {
        margin: 10px;
    }
</style>