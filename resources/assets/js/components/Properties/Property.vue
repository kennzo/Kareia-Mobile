<template>
    <div class="panel panel-default">
        <div v-if="!editing">
            <div class="panel-body">
                <div class="row">
                    <label class="col-lg-4 control-label" for="street_address">Street Address</label>
                    <p class="col-lg-8">{{ prop.street_address }}</p>
                </div>
                <div class="row">
                    <label class="col-lg-4 control-label" for="city">City</label>
                    <p class="col-lg-8">{{ prop.city }}</p>
                </div>
                <div class="row">
                    <label class="col-lg-4 control-label" for="zip">Zip</label>
                    <p class="col-lg-8">{{ prop.zip }}</p>
                </div>
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
    export default {
        name: "property",
        props: ['prop'],
        data() {
            return {
                editing: false,
                editValues: {
                    street_address: this.prop.street_address,
                    city: this.prop.city,
                    zip: this.prop.zip
                }
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
            }
        }
    }
</script>

<style scoped>
    a {
        cursor: pointer;
    }
</style>