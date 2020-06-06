<template>
	<div class="bg-grey-lighter flex-1 overflow-auto">
		<div class="px-4 flex items-center bg-grey-lightest cursor-pointer mb-1">
			<div>
				<img class="h-12 w-12 rounded-full" :src="currentUserAvatar"/>
			</div>
			<div class="ml-4 flex-1 border-b border-grey-lighter py-4">
				<div class="flex items-bottom justify-between">
					<p class="text-grey-darkest">
						{{ this.selectedContact.display_name }}
					</p>
					<p class="text-xs text-grey-darkest">
						12:45 pm
					</p>
				</div>
				<p class="text-grey-dark mt-1 text-sm">
					<!-- Get Andrés on this movie ASAP! -->
					{{ this.message.message }}
				</p>
			</div>
		</div>
		<div v-for="message in messages"></div>
	</div>
</template>
<script>
import endpoints from '../scripts/endpoints.js';

export default {

	props : ['selectedContact','messages','user'],
	computed : { 
		currentUserAvatar(){	
			if(this.selectedContact.avatar === "default_avatar.jpg"){
				return endpoints.urlDomain +"/assets/images/default_avatar.jpg"   ;
			} 
			else { 
				return endpoints.urlDomain +"/storage/" +this.selectedContact.avatar ;	
			}
		}
	},

	data(){

		return { 
			message : this.messages	,
			properAvatar : ""
		}

	},

	methods : { 
	}
}
</script>