<template>
    <div>
        <example-component></example-component>
        <new-property></new-property>
    </div>
</template>

<script>
    import Vue from "vue";

    import ExampleComponent from './ExampleComponent';
    import NewProperty from './Properties/New-Property';
    import Form_States from './Location/Form-States';

    Vue.component('example-component', ExampleComponent);
    Vue.component('new-property', NewProperty);
    Vue.component('form-states', Form_States);


    export default {
        data() {
            return {

            }
        }
    }
</script>

<style scoped>

</style>