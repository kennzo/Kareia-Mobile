<template>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-4">
                    <label>Street Address</label>
                    <p>{{ property.street_address }}</p>
                </div>
                <div class="col-md-4">
                    <label>City</label>
                    <p>{{ property.city }}</p>
                </div>
                <div class="col-md-4">
                    <label>Zip</label>
                    <p>{{ property.zip }}</p>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <!--<a @click="onEdit">Edit</a> |-->
            <router-link to="/show" :prop="property">Edit</router-link> |
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