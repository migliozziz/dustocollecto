<template>
    <div class="container">
        <div class="columns">
            <div class="column is-half">
                <nav class="panel">
                    <div class="panel-heading">
                        Employees
                    </div>
                    <div class="panel-block">
                        <div class="columns">
                            <div class="column">
                                <div><strong>Need to Collect</strong></div>
                                <ol>
                                    <li v-for="e in collectable" :key="e.id">{{ e.firstname }} {{ e.lastname }}</li>
                                </ol>
                            </div>
                            <div class="column">
                                <div><strong>Collected</strong></div>
                                <ol>
                                    <li v-for="e in collected" :key="e.id">{{ e.firstname }} {{ e.lastname }}</li>
                                </ol>
                            </div>
                        </div>
                        
                    </div>
                </nav>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        data() {
            return {
                collectable: [],
                collected: Object
            }
        },

        mounted() {
            axios.all([ this.getCollectable(), this.getCollected() ]);
        },

        methods: {
            getCollectable() {
                axios.get('/api/dustcollect/collectable')
                .then(req => {
                    for (let i = 0; i < req.data.length; i++) {
                        this.collectable.push(req.data[i]);
                    }
                });
            },

            getCollected() {
                axios.get('/api/dustcollect/collected')
                .then(req => {
                    this.collected = req.data;
                });
            }

        }
    }
</script>