<template>
    <div>
        <new-property></new-property>
    </div>
</template>

<script>
    import Vue from "vue";
    import axios from "axios";

    import NewProperty from './Properties/New-Property';
    import Form_States from './Location/Form-States';

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