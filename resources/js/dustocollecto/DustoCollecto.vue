<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Dust Collection</div>
                    <div class="card-body">
                        <validate-employees></validate-employees>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import ValidateEmployees from './components/ValidateEmployees.vue';

    export default {
        components: { ValidateEmployees },

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
