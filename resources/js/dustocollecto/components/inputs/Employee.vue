<template>
	<div class="field">
		<p class="control">
			<input class="input is-primary" type="text" id="employee" placeholder="Employee Barcode..." v-model="form.employeecode" >
		</p>
		<p class="control">
			<span class="help is-danger" 
				v-if="form.errors.has('employee')" 
				v-text="form.errors.get('employee')"></span>
		</p>
	</div>
</template>

<script>
	export default {

		props: ['form'],
	}
</script>
