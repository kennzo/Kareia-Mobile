<template>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <label>Street Address</label>
                    <p>{{ property.street_address }}</p>
                </div>
                <div class="col-md-2">
                    <label>City</label>
                    <p>{{ property.city }}</p>
                </div>
                <div class="col-md-2">
                    <label>State</label>
                    <p>{{ this.$store.state.statesList[property.state_id] }}</p>
                </div>
                <div class="col-md-2">
                    <label>Zip</label>
                    <p>{{ property.zip }}</p>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <router-link :to="{ name: 'showProperty', params: { id: this.property.id }}">View</router-link> |
            <a @click="onDelete">Delete</a>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: "list-item",
        props: ['property'],
        methods: {
            onDelete() {
                this.$emit('propertyDeleted', this.property.id);

                axios.delete('/api/property/' + this.property.id)
                .then(
                    response => console.log(response)
                )
                .catch(
                    error => console.log(error)
                )
            }
        }
    }
</script>

<style scoped>

</style>