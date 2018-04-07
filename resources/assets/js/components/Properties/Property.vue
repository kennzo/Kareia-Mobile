<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="panel-heading col-md-6">Property Details</div>
                            <router-link to="/home">
                                <button class="btn btn-primary col-md-3">Back</button>
                            </router-link>
                        </div>
                    </div>

                    <div v-if="!editing">
                        <div class="panel-body">
                            <show-property-field
                                    v-for="(value, key) in propertyAttributesOrder" :key="key"
                                    v-if="ignoreFields.indexOf(key) < 0"
                                    label_class="col-lg-4"
                                    :label_text="key"
                                    display_class="col-lg-8"
                                    :display_text="value"
                            ></show-property-field>
                        </div>

                        <div class="panel-footer">
                            <a @click="onEdit">Edit</a> |
                            <a @click="onDelete">Delete</a>
                        </div>
                    </div>

                    <div v-if="editing">
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-lg-4 control-label" for="street_address">Street Address</label>
                                <div class="col-lg-8">
                                    <input
                                            type="text"
                                            id="street_address"
                                            class="form-control"
                                            v-model="editValues.street_address"
                                    >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-4 control-label" for="city">City</label>
                                <div class="col-lg-8">
                                    <input
                                            type="text"
                                            id="city"
                                            class="form-control"
                                            v-model="editValues.city"
                                    >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-4 control-label" for="state_id">State</label>
                                <div class="col-lg-8">
                                    <select id="state_id" name="state_id" v-model="editValues.state_id" class="form-control">
                                        <option value="">Choose a state...</option>
                                        <option v-for="(item, index) in this.$store.state.statesList" :value="index">{{ item }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-4 control-label" for="zip">Zip</label>
                                <div class="col-lg-8">
                                    <input
                                            type="text"
                                            id="zip"
                                            class="form-control"
                                            v-model="editValues.zip"
                                    >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-4 control-label" for="bedrooms">Bedrooms</label>
                                <div class="col-lg-8">
                                    <input
                                            type="text"
                                            id="bedrooms"
                                            class="form-control"
                                            v-model="editValues.bedrooms"
                                    >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-4 control-label" for="bathrooms">Bathrooms</label>
                                <div class="col-lg-8">
                                    <input
                                            type="text"
                                            id="bathrooms"
                                            class="form-control"
                                            v-model="editValues.bathrooms"
                                    >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-4 control-label" for="garages">Garages</label>
                                <div class="col-lg-8">
                                    <input
                                            type="text"
                                            id="garages"
                                            class="form-control"
                                            v-model="editValues.garages"
                                    >
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-4 control-label" for="year_built">Year Built</label>
                                    <div class="col-lg-8">
                                        <input
                                                type="text"
                                                id="year_built"
                                                class="form-control"
                                                v-model="editValues.year_built"
                                        >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-4 control-label" for="living_square_footage">Living Square Footage</label>
                                    <div class="col-lg-8">
                                        <input
                                                type="text"
                                                id="living_square_footage"
                                                class="form-control"
                                                v-model="editValues.living_square_footage"
                                        >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-4 control-label" for="lot_square_footage">Lot Square Footage</label>
                                    <div class="col-lg-8">
                                        <input
                                                type="text"
                                                id="lot_square_footage"
                                                class="form-control"
                                                v-model="editValues.lot_square_footage"
                                        >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-4 control-label" for="neighborhood">Neighborhood</label>
                                    <div class="col-lg-8">
                                        <input
                                                type="text"
                                                id="neighborhood"
                                                class="form-control"
                                                v-model="editValues.neighborhood"
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <a @click="onUpdate">Save</a> |
                            <a @click="onCancel">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</template>

<script>
    import axios from 'axios';
    import ShowPropertyField from "./ShowPropertyField";

    export default {
        components: {
            ShowPropertyField,
        },
        name: "property",
        data() {
            return {
                editing: false,
                editValues: {},
                ignoreFields: [
                    'id',
                    'user_id',
                    'created_at',
                    'updated_at',
                    'deleted_at'
                ]
            }
        },
        computed: {
            thisProperty: function () {
                let properties = this.$store.state.properties;
                for (let i = 0, len = properties.length; i < len; i++) {
                    if (properties[i].id === this.$route.params.id) {
                        return properties[i];
                    }
                }
            },
            propertyAttributesOrder: function () {
                let stateId = this.thisProperty.state_id;
                let stateName = this.$store.state.statesList[stateId];

                return {
                    'Street Address':           this.thisProperty.street_address,
                    'City':                     this.thisProperty.city,
                    'State':                    stateName,
                    'Zip Code':                 this.thisProperty.zip,
                    'Bedrooms':                 this.thisProperty.bedrooms,
                    'Bathrooms':                this.thisProperty.bathrooms,
                    'Garages':                  this.thisProperty.garages,
                    'Year Built':               this.thisProperty.year_built,
                    'Living Square Footage':    this.thisProperty.living_square_footage,
                    'Lot Square Footage':       this.thisProperty.lot_square_footage,
                    'Neighborhood':             this.thisProperty.neighborhood
                };
            }
        },
        methods: {
            onEdit() {
                this.editing = true;
                this.editValues = {
                    street_address:         this.thisProperty.street_address,
                    city:                   this.thisProperty.city,
                    state_id:               this.thisProperty.state_id,
                    zip:                    this.thisProperty.zip,
                    bedrooms:               this.thisProperty.bedrooms,
                    bathrooms:              this.thisProperty.bathrooms,
                    garages:                this.thisProperty.garages,
                    year_built:             this.thisProperty.year_built,
                    living_square_footage:  this.thisProperty.living_square_footage,
                    lot_square_footage:     this.thisProperty.lot_square_footage,
                    neighborhood:           this.thisProperty.neighborhood
                }
            },
            onCancel() {
                this.editing = false;
            },
            onDelete() {
                this.$emit('propertyDeleted', this.prop.id);

                axios.delete('/api/property/' + this.prop.id)
                    .then(
                        response => console.log(response)
                    )
                    .catch(
                        error => console.log(error)
                    )
            },
            onUpdate() {
                this.editing = false;
                let stateId = this.thisProperty.state_id;
                let stateName = this.$store.state.statesList[stateId];

                this.thisProperty.street_address = this.editValues.street_address;
                this.thisProperty.city = this.editValues.city;
                this.thisProperty.state_name = stateName;
                this.thisProperty.state_id = this.editValues.state_id;
                this.thisProperty.zip = this.editValues.zip;
                this.thisProperty.bedrooms = this.editValues.bedrooms;
                this.thisProperty.bathrooms = this.editValues.bathrooms;
                this.thisProperty.garages = this.editValues.garages;
                this.thisProperty.year_built = this.editValues.year_built;
                this.thisProperty.living_square_footage = this.editValues.living_square_footage;
                this.thisProperty.lot_square_footage = this.editValues.lot_square_footage;
                this.thisProperty.neighborhood = this.editValues.neighborhood;

                axios.put(
                    '/api/property/' + this.thisProperty.id,
                    {
                        street_address: this.editValues.street_address,
                        city: this.editValues.city,
                        state_id: this.editValues.state_id,
                        zip: this.editValues.zip,
                        bedrooms: this.editValues.bedrooms,
                        bathrooms: this.editValues.bathrooms,
                        garages: this.editValues.garages,
                        year_built: this.editValues.year_built,
                        living_square_footage: this.editValues.living_square_footage,
                        lot_square_footage: this.editValues.lot_square_footage,
                        neighborhood: this.editValues.neighborhood
                    }
                );
            }
        }
    }
</script>

<style scoped>
    a {
        cursor: pointer;
    }
</style>