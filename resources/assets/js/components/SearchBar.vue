<template>
	<div class="flex flex-shrink justify-between self-start items-center w-full px-2 py-4">
		<div class="text-center px-2 mr-2">
			<a href="#" class="no-underline text-lg text-grey hover:text-grey-dark">
				<i class="fas fa-bars"></i>
			</a>
		</div>
		<input v-show="criminalName && !criminal.sortBy && !criminal.country" placeholder="Search by Name" type="text" v-model="criminal.name" class="bg-grey-lightest border p-2 border-gray mr-4 h-10 w-full rounded-sm font-basic mt-2 mb-4">
	</div>
</template>

<script>
export default {
	name: 'SearchBar',
	data () {
		return {

		}
	}
};
</script>

<style lang="css" scoped>
</style>