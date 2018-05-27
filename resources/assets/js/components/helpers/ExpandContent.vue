<template>
<div>
    <b-modal>
      Hello From Modal!
    </b-modal>
</div>
</template>

<script>
    export default {
        props:['content'],
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
