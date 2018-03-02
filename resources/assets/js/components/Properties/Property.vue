<template>
    <div class="panel panel-default">
        <div class="panel-body">
            <!-- todo: Add property information here -->
            <p>{{ prop.street_address }}</p>
        </div>
        <div class="panel-footer">
            <a href="" @click="onUpdate">Save</a> |
            <a href="" @click="onCancel">Cancel</a>
        </div>
        <div class="panel-footer">
            <a href="" @click="onEdit">Edit</a> |
            <a href="" @click="onDelete">Delete</a>
        </div>
    </div>
</template>

<script>
    export default {
        name: "property",
        props: ['prop']
    }
</script>

<style scoped>

</style>