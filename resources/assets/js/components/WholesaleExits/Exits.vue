<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-8">Wholesale Exits</div>
                            <div class="col-md-4">
                                <button class="btn btn-primary" @click="onGetWholesaleExits">Refresh</button>
                                <router-link :to="{ name: 'newWholesale'}">
                                    <button class="btn btn-primary">New Exit</button>
                                </router-link>
                            </div>
                        </div>
                    </div>

                    <div class="panel-body">
                        <!--<list-item-->
                                <!--v-for="(value, key) in properties" :key="key"-->
                                <!--:property="value"-->
                                <!--@propertyDeleted="onPropertyDeleted($event)">-->
                        <!--</list-item>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "exits",
        methods: {
            onGetWholesaleExits() {
                console.log("Get Wholesale Exits");
            }
        }
    }
</script>

<style scoped>

</style>