<template>
	<div>
		<div class="field">
			<label class="label"></label>
			<p class="control">
				<button class="button is-primary" @click="save">Save</button>
			</p>
		</div>  
	</div>
</template>

<script>
	export default {

		methods: {
			save() {
				this.$emit('saveButton');
			}
		}

	}
</script>