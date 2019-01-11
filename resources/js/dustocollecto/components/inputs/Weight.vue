<template>
	<div class="field">
		<p class="control">
			<input class="input is-primary" type="text" id="weight" placeholder="Weight (DWT)..." v-model="form.weight">
			<span class="help is-danger" 
			v-if="form.errors.has('weight')" 
			v-text="form.errors.get('weight')"></span>
		</p>
	</div>
</template>

<script>
	export default {

		props: ['form'],
		
	}
</script>
