<template>
    <div class="container">
        <div class="columns">
            <div class="column is-half">
                <nav class="panel">
                    <div class="panel-heading">
                        Dust Collection Scan
                    </div>
            		<div class="panel-block">
                        <form @keydown="form.errors.clear()"> 
                        	<div class="columns">
								<div class="column">
                            		<employee v-bind:form="form" @keyup.enter.native="getEmployeeInfo"></employee>
                            		<weight v-bind:form="form" @keyup.enter.native="tab"></weight>
                        		</div>
                        		<div class="column" v-if="employeeName">
                    				<div v-if="employeeName">{{ employeeName }}</div>
	                        	</div>
    			        	</div>
                        </form >
                    </div>
                    <div class="panel-block media">
                        <figure class="media-left">
                        	<save-button @saveButton="onSubmit"></save-button>
                    	</figure>
                        <figure class="media-left">
                            <reset-button @resetButton="resetForm"></reset-button>
                        </figure>
                        <figure class="media-right">
                            <div v-if="count > 0">Submitted Count: {{ count }}</div>
                        </figure>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</template>

<script>

    import Employee from './components/inputs/Employee.vue';
    import Weight from './components/inputs/Weight.vue';
    import ResetButton from './components/buttons/ResetButton.vue';
    import SaveButton from './components/buttons/SaveButton.vue';

    export default {
        components: { Employee, Weight, ResetButton, SaveButton },

        data() {
            return {
                statuses: [],
                count: 0,
                employeeName: '',
                form: new Form({ 
                    employeecode: '',
                    weight: '',
                }),
            }
        },

        mounted() {
            document.getElementsByClassName('input')[0].focus();
        },

        methods: {
            onSubmit() {
            	console.log('posting: ' + '/api/dustcollect/scan/in?employee=' + this.form.employeecode );
                this.form.post('/api/dustcollect/scan/in?employee=' + this.form.employeecode
                	+ '&weight=' + this.form.weight)
                .then(req => {
                	console.log(req);
                    if (req.scan == "OK") {
                        this.count++;
                        this.form.resetAll();
                        this.employeeName = '';
                        document.getElementsByClassName('input')[0].focus();
                    }
                    else
                    {
                        this.form.onFail({employeecode: ["Employee dust collection was not saved!"]});
                        // pop up a modal here?
                    }
                });
            },

            tab() {
                var inputs = document.getElementsByClassName('input');
                for (var i = 0; i < inputs.length; i++) {
                    if (document.activeElement.id == inputs[i].id && i+1 < inputs.length ) {
                        inputs[i+1].focus();
                        break;   
                    }
                }
            },

            resetForm() {
                this.count = 0;
                this.employeeName = '';
                this.form.resetAll();
                document.getElementsByClassName('input')[0].focus();
            },

            getEmployeeInfo() {
                return axios.get('/api/employees/badge/' + this.form.employeecode)
                    .then(req => {
                    	console.log(req);
                        if (req.data.length > 0) {
                            this.employeeName = req.data[0].firstname + ' ' + req.data[0].lastname;
                            this.tab();
                        }
                        else
                        {
                            this.employeeName = "Employee not found!";
                            this.form.reset();
                            document.getElementsByClassName('input')[0].focus();
                        }
                    });
            },

        }
    }
</script>