<template>
    <div class="panel panel-default">
        <div v-if="!editing">
            <div class="panel-body">
                <show-property-field
                    v-for="(value, key) in prop" :key="key"
                    v-if="ignoreFields.indexOf(key) < 0"
                    label_class="col-lg-4"
                    :label_text="key"
                    display_class="col-lg-8"
                    :display_text="value"
                ></show-property-field>
                <!--<div class="row">-->
                    <!--<label class="col-lg-4 control-label">Street Address</label>-->
                    <!--<p class="col-lg-8">{{ prop.street_address }}</p>-->
                <!--</div>-->
                <!--<div class="row">-->
                    <!--<label class="col-lg-4 control-label">City</label>-->
                    <!--<p class="col-lg-8">{{ prop.city }}</p>-->
                <!--</div>-->
                <!--<div class="row">-->
                    <!--<label class="col-lg-4 control-label">Zip</label>-->
                    <!--<p class="col-lg-8">{{ prop.zip }}</p>-->
                <!--</div>-->
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
            </div>
            <div class="panel-footer">
                <a @click="onUpdate">Save</a> |
                <a @click="onCancel">Cancel</a>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    import ShowPropertyField from "./ShowPropertyField";

    export default {
        components: {ShowPropertyField},
        name: "property",
        props: ['prop'],
        data() {
            return {
                editing: false,
                editValues: {
                    street_address: this.prop.street_address,
                    city: this.prop.city,
                    zip: this.prop.zip
                },
                ignoreFields: [
                    'id',
                    'user_id',
                    'created_at',
                    'updated_at',
                    'deleted_at'
                ]
            }
        },
        methods: {
            onEdit() {
                this.editing = true;
                this.editValues = {
                    street_address: this.prop.street_address,
                    city: this.prop.city,
                    zip: this.prop.zip
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

                this.prop.street_address = this.editValues.street_address;
                this.prop.city = this.editValues.city;
                this.prop.zip = this.editValues.zip;

                axios.put(
                    '/api/property/' + this.prop.id,
                    {
                        street_address: this.editValues.street_address,
                        city: this.editValues.city,
                        zip: this.editValues.zip
                    }
                )
            }
        }
    }
</script>

<style scoped>
    a {
        cursor: pointer;
    }
</style>