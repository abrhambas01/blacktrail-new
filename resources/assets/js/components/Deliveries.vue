<template>
	<ul class="list-group list-group-flush">
		<li class="list-group-item" v-for="d in deliveries">
			{{ d.delivery_code }}
			<a @click.prevent="sendNotification()" class="btn btn-success text-white" href="#">Send a Notification</a>
		</li> 			
	</ul>	
</template>

<script> 
export default {
	props : ['deliveries'],
	methods :  {
		sendNotification(){
			// window.Echo.			
			console.log("some shit happens");	
		}
	}
	/*data(){
		return {	 
			delivery : this.deliveries
		}
	}*/
};	
</script>
<style>
</style>