<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <button class="btn btn-primary" @click="onGetProperties">Get Properties</button>
                    </div>

                    <div class="panel-body">
                        <list-item
                            v-for="(value, key) in properties" :key="key"
                            :property="value"
                            @propertyDeleted="onPropertyDeleted($event)">
                        </list-item>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import listItem from './ListItem';
    import axios from 'axios';

    export default {
        name: "properties",
        data() {
            return {
                properties: []
            }
        },
        methods: {
            onGetProperties() {
                axios.get('/api/property')
                    .then(
                        response => {
                            console.log(response);
                            this.$store.state.properties = response.data.properties;
                            this.properties = this.$store.state.properties;
                        }
                    )
                    .catch(
                        error => console.log(error)
                    );
            },
            onPropertyDeleted(id) {
                const position = this.properties.findIndex(
                    (element) => {
                    return element.id === id;
                });
                this.properties.splice(position, 1);
            }
        },
        components: {
            'listItem': listItem
        }
    }
</script>

<style scoped>

</style>