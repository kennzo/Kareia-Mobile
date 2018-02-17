<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Example Component</div>

                    <div class="panel-body">
                        <form @submit.prevent="onSubmitted">
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-lg-4 control-label" for="street_address">Street Address</label>
                                    <div class="col-lg-8">
                                        <input
                                                type="text"
                                                id="street_address"
                                                class="form-control"
                                                v-model="street_address">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-4 control-label" for="city">City</label>
                                    <div class="col-lg-8">
                                        <input
                                                type="text"
                                                id="city"
                                                class="form-control"
                                                v-model="city">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-4 control-label" for="state">State</label>
                                    <div class="col-lg-8">
                                        <input
                                                type="text"
                                                id="state"
                                                class="form-control"
                                                v-model="state_id">
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
    export default {
        data() {
            return {
                street_address: ''
            }
        },
        methods: {
            onSubmitted() {
                alert("Submitted the property!");
            }
        }
    }
</script>

<style scoped>

</style>