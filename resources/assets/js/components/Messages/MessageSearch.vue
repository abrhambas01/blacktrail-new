<template>
	<div class="p-2 bg-grey-lighter">
		<input type="text" v-model="message" class="w-full p-4 bg-grey-lightest text-md" placeholder="Search or start new chat"/>
	</div>
</template>
<script>
export default { 
	data(){
		return { 
			message : ""
		}
	}
};
</script>
