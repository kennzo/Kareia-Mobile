<template>
    <div v-if="display_text">
        <div class="row">
            <label :class="label_class">{{ label_text }}</label>
            <p :class="display_class">{{ display_text }}</p>
        </div>
    </div>
</template>

<script>
    export default {
        name: "show-property-field",
        props: [
            'label_class',
            'label_text',
            'display_class',
            'display_text'
        ]
    }
</script>

<style scoped>

</style>