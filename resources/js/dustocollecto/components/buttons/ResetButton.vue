<template>
	<div>
		<div class="field">
			<label class="label"></label>
			<p class="control">
				<button class="button is-primary" @click="reset">Reset</button>
			</p>
		</div>  
	</div>
</template>

<script>
	export default {

		methods: {
			reset() {
				this.$emit('resetButton');
			}
		}
	}
</script>
