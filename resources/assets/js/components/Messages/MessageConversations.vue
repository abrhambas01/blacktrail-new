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
	</div>
</template>
<script>
import endpoints from '../scripts/endpoints.js';
export default {
	props : ['selectedContact','messages'],
	data(){
		return { 
			message : this.messages
		}
	},
	computed : { 
		currentUserAvatar(){	
			if(this.user.avatar === "default_avatar.jpg") {
				return endpoints.urlDomain +"/assets/images/" +this.user.avatar ; 
			} 
			else { 
				return endpoints.urlDomain +"/assets/images/" +this.user.avatar ; 
			}
		}
	}
};
</script>