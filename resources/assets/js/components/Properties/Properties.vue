<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <button class="btn btn-primary" @click="onGetProperties">Get Properties</button>
                    </div>

                    <div class="panel-body">
                        <property
                            v-for="(value, key) in properties" :key="key"
                            :prop="value"
                            @propertyDeleted="onPropertyDeleted($event)">
                        </property>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import property from './Property';
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
                            this.properties = response.data.properties;
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
            'property': property
        }
    }
</script>

<style scoped>

</style>