<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Enter Property Details</div>

                    <div class="panel-body">
                        <form @submit.prevent="onSubmitted">
                            <fieldset>
                                <div class="form-group">
                                    <label :class="label_classes" for="street_address">Street Address</label>
                                    <div class="col-lg-8">
                                        <input
                                                type="text"
                                                id="street_address"
                                                class="form-control"
                                                v-model="fields.street_address">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label :class="label_classes" for="city">City</label>
                                    <div class="col-lg-8">
                                        <input
                                                type="text"
                                                id="city"
                                                class="form-control"
                                                v-model="fields.city">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label :class="label_classes" for="state">State</label>
                                    <div class="col-lg-8">
                                        <input
                                                type="text"
                                                id="state"
                                                class="form-control"
                                                v-model="fields.state_id">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label :class="label_classes" for="zip">Zip Code</label>
                                    <div class="col-lg-8">
                                        <input
                                                type="text"
                                                id="zip"
                                                class="form-control"
                                                v-model="fields.zip">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label :class="label_classes" for="bedrooms">Bedrooms</label>
                                    <div class="col-lg-8">
                                        <input
                                                type="text"
                                                id="bedrooms"
                                                class="form-control"
                                                v-model="fields.bedrooms">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label :class="label_classes" for="bathrooms">Bathrooms</label>
                                    <div class="col-lg-8">
                                        <input
                                                type="text"
                                                id="bathrooms"
                                                class="form-control"
                                                v-model="fields.bathrooms">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label :class="label_classes" for="garages">Garages</label>
                                    <div class="col-lg-8">
                                        <input
                                                type="text"
                                                id="garages"
                                                class="form-control"
                                                v-model="fields.garages">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label :class="label_classes" for="year_built">Year Built</label>
                                    <div class="col-lg-8">
                                        <input
                                                type="text"
                                                id="year_built"
                                                class="form-control"
                                                v-model="fields.year_built">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label :class="label_classes" for="living_square_footage">Living Square Footage</label>
                                    <div class="col-lg-8">
                                        <input
                                                type="text"
                                                id="living_square_footage"
                                                class="form-control"
                                                v-model="fields.living_square_footage">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label :class="label_classes" for="lot_square_footage">Lot Square Footage</label>
                                    <div class="col-lg-8">
                                        <input
                                                type="text"
                                                id="lot_square_footage"
                                                class="form-control"
                                                v-model="fields.lot_square_footage">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label :class="label_classes" for="neighborhood">Neighborhood</label>
                                    <div class="col-lg-8">
                                        <input
                                                type="text"
                                                id="neighborhood"
                                                class="form-control"
                                                v-model="fields.neighborhood">
                                    </div>
                                </div>
                            </fieldset>
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from "axios";

    export default {
        data() {
            return {
                // Styling for form:
                label_classes:      'col-lg-4 control-label',
                fields: {
                    street_address:         '',
                    city:                   '',
                    state_id:               '',
                    zip:                    '',
                    bedrooms:               '',
                    bathrooms:              '',
                    garages:                '',
                    year_built:             '',
                    living_square_footage:  '',
                    lot_square_footage:     '',
                    neighborhood:           ''
                }
            }
        },
        methods: {
            onSubmitted() {
                axios.post(
                    '/api/property',
                    {
                        user_id:            1, // todo: pass in via prop later
                        street_address:         this.fields.street_address,
                        city:                   this.fields.city,
                        state_id:               this.fields.state_id,
                        zip:                    this.fields.zip,
                        bedrooms:               this.fields.bedrooms,
                        bathrooms:              this.fields.bathrooms,
                        garages:                this.fields.garages,
                        year_built:             this.fields.year_built,
                        living_square_footage:  this.fields.living_square_footage,
                        lot_square_footage:     this.fields.lot_square_footage,
                        neighborhood:           this.fields.neighborhood
                    }
                )
                .then(
                    (response) => console.log(response)
                )
                .catch(
                    (error) => console.log(error)
                );
            }
        }
    }
</script>

<style scoped>

</style>