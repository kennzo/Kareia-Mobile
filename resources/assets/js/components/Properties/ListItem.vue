<template>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-4">
                    <label>Street Address</label>
                    <p>{{ prop.street_address }}</p>
                </div>
                <div class="col-md-4">
                    <label>City</label>
                    <p>{{ prop.city }}</p>
                </div>
                <div class="col-md-4">
                    <label>Zip</label>
                    <p>{{ prop.zip }}</p>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <!--<a @click="onEdit">Edit</a> |-->
            <a @click="onDelete">Delete</a>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: "list-item",
        props: ['prop'],
        methods: {
            onDelete() {
                this.$emit('propertyDeleted', this.prop.id);

                axios.delete('/api/property/' + this.prop.id)
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