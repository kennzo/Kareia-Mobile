<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-8">Latest Wholesale Exits</div>
                            <div class="col-md-4">
                                <button class="btn btn-primary" @click="onGetWholesaleExits">Refresh</button>
                                <router-link :to="{ name: 'newWholesale'}">
                                    <button class="btn btn-primary">New Exit</button>
                                </router-link>
                            </div>
                        </div>
                    </div>

                    <div class="panel-body">
                        <wholesale-list-item
                                v-for="(value, key) in estimates" :key="key"
                                :estimate="value"
                        >
                        </wholesale-list-item>
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
    import WholesaleListItem from "./ListItem";
    import axios from 'axios';

    export default {
        name: "exits",
        data: function () {
            return {
                estimates: []
            }
        },
        methods: {
            onGetWholesaleExits() {
                console.log("Get Wholesale Exits");
                axios.get('/api/wholesale')
                    .then(
                        response => {
                            console.log(response);
                            this.$store.state.wholesaleExits = response.data.estimates;
                            this.estimates = this.$store.state.wholesaleExits;
                        }
                    )
                    .catch(
                        error => console.log(error)
                    );
            }
        },
        components: {
            'wholesale-list-item': WholesaleListItem
        }
    }
</script>

<style scoped>

</style>