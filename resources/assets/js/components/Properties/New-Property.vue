<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Enter Property Details</div>

                    <div class="panel-body">
                        <form @submit.prevent="onSubmitted">
                            <fieldset>
                                <div :class="styleClasses.div_group">
                                    <label :class="styleClasses._1_label" for="street_address">Street Address</label>
                                    <div :class="styleClasses._2_div">
                                        <input
                                                type="text"
                                                id="street_address"
                                                :class="styleClasses._input"
                                                v-model="fields.street_address">
                                    </div>
                                </div>
                                <div :class="styleClasses.div_group">
                                    <label :class="styleClasses._1_label" for="city">City</label>
                                    <div :class="styleClasses._2_div">
                                        <input
                                                type="text"
                                                id="city"
                                                :class="styleClasses._input"
                                                v-model="fields.city">
                                    </div>
                                </div>
                                <div :class="styleClasses.div_group">
                                    <label :class="styleClasses._1_label" for="state_id">State</label>
                                    <div :class="styleClasses._2_div">
                                        <select id="state_id" name="state_id" v-model="fields.state_id" :class="styleClasses._input">
                                            <option value="">Choose a state...</option>
                                            <option v-for="(item, index) in this.$store.state.statesList" :value="index">{{ item }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div :class="styleClasses.div_group">
                                    <label :class="styleClasses._1_label" for="zip">Zip Code</label>
                                    <div :class="styleClasses._2_div">
                                        <input
                                                type="text"
                                                id="zip"
                                                :class="styleClasses._input"
                                                v-model="fields.zip">
                                    </div>
                                </div>
                                <div :class="styleClasses.div_group">
                                    <label :class="styleClasses._1_label" for="bedrooms">Bedrooms</label>
                                    <div :class="styleClasses._2_div">
                                        <input
                                                type="text"
                                                id="bedrooms"
                                                :class="styleClasses._input"
                                                v-model="fields.bedrooms">
                                    </div>
                                </div>
                                <div :class="styleClasses.div_group">
                                    <label :class="styleClasses._1_label" for="bathrooms">Bathrooms</label>
                                    <div :class="styleClasses._2_div">
                                        <input
                                                type="text"
                                                id="bathrooms"
                                                :class="styleClasses._input"
                                                v-model="fields.bathrooms">
                                    </div>
                                </div>
                                <div :class="styleClasses.div_group">
                                    <label :class="styleClasses._1_label" for="garages">Garages</label>
                                    <div :class="styleClasses._2_div">
                                        <input
                                                type="text"
                                                id="garages"
                                                :class="styleClasses._input"
                                                v-model="fields.garages">
                                    </div>
                                </div>
                                <div :class="styleClasses.div_group">
                                    <label :class="styleClasses._1_label" for="year_built">Year Built</label>
                                    <div :class="styleClasses._2_div">
                                        <input
                                                type="text"
                                                id="year_built"
                                                :class="styleClasses._input"
                                                v-model="fields.year_built">
                                    </div>
                                </div>
                                <div :class="styleClasses.div_group">
                                    <label :class="styleClasses._1_label" for="living_square_footage">Living Square Footage</label>
                                    <div :class="styleClasses._2_div">
                                        <input
                                                type="text"
                                                id="living_square_footage"
                                                :class="styleClasses._input"
                                                v-model="fields.living_square_footage">
                                    </div>
                                </div>
                                <div :class="styleClasses.div_group">
                                    <label :class="styleClasses._1_label" for="lot_square_footage">Lot Square Footage</label>
                                    <div :class="styleClasses._2_div">
                                        <input
                                                type="text"
                                                id="lot_square_footage"
                                                :class="styleClasses._input"
                                                v-model="fields.lot_square_footage">
                                    </div>
                                </div>
                                <div :class="styleClasses.div_group">
                                    <label :class="styleClasses._1_label" for="neighborhood">Neighborhood</label>
                                    <div :class="styleClasses._2_div">
                                        <input
                                                type="text"
                                                id="neighborhood"
                                                :class="styleClasses._input"
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
    import "../Location/Form-States";

    let styleClasses = {
        div_group: 'form-group',
        _1_label: 'col-lg-4 control-label',
        _2_div: 'col-lg-8',
        _input: 'form-control'
    };

    export default {
        data() {
            return {
                // Styling for form:
                styleClasses: styleClasses,
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
                this.$router.push('home');
            }
        }
    }
</script>

<style scoped>

</style>