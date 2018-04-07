<template>
    <div>
        <properties></properties>
        <hr>
        <wholesale-exits></wholesale-exits>
        <hr>
    </div>
</template>

<script>
    import properties from '../Properties/Properties';
    import wholesaleExits from '../WholesaleExits/Exits';

    export default {
        name: "dashboard",
        components: {
            'properties': properties,
            'wholesale-exits': wholesaleExits
        }
    }
</script>

<style scoped>

</style>