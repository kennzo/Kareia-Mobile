<template>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-2">
                    <label>Property Id</label>
                    <p>{{ estimate.property_id }}</p>
                </div>
                <div class="col-md-6">
                    <label>After Repair Value (ARV)</label>
                    <p>{{ estimate.arv }}</p>
                </div>
                <div class="col-md-2">
                    <label>Estimated Repairs</label>
                    <p>{{ estimate.estimated_repairs }}</p>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <!--<router-link :to="{ name: 'showProperty', params: { id: this.property.id }}">View</router-link> |-->
            <!--<a @click="onDelete">Delete</a>-->
        </div>
    </div>
</template>

<script>
    export default {
        name: "list-item",
        props: ['estimate']
    }
</script>

<style scoped>

</style>