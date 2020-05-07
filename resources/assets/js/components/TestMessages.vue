 <template>
	<div class="h-full w-full mt-6 h-screen overflow-hidden" style="background: #edf2f7;">
		<div>
			<div class="h-32" style="background-color: #449388"></div>
			<div class="container mx-auto" style="margin-top: -128px;">
				<div class="py-6 h-screen">
					<div class="flex border border-grey rounded shadow-lg h-full">
						<div class="w-1/3 border flex flex-col">
							<div class="py-2 px-3 bg-grey-lighter flex flex-row justify-between items-center">
								<div>
									<img class="w-10 h-10 rounded-full"/>
								</div>
								<div class="flex">
									<div>
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="#727A7E" d="M12 20.664a9.163 9.163 0 0 1-6.521-2.702.977.977 0 0 1 1.381-1.381 7.269 7.269 0 0 0 10.024.244.977.977 0 0 1 1.313 1.445A9.192 9.192 0 0 1 12 20.664zm7.965-6.112a.977.977 0 0 1-.944-1.229 7.26 7.26 0 0 0-4.8-8.804.977.977 0 0 1 .594-1.86 9.212 9.212 0 0 1 6.092 11.169.976.976 0 0 1-.942.724zm-16.025-.39a.977.977 0 0 1-.953-.769 9.21 9.21 0 0 1 6.626-10.86.975.975 0 1 1 .52 1.882l-.015.004a7.259 7.259 0 0 0-5.223 8.558.978.978 0 0 1-.955 1.185z">
										</path>
									</svg>
								</div>
								<div class="ml-4">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path opacity=".55" fill="#263238" d="M19.005 3.175H4.674C3.642 3.175 3 3.789 3 4.821V21.02l3.544-3.514h12.461c1.033 0 2.064-1.06 2.064-2.093V4.821c-.001-1.032-1.032-1.646-2.064-1.646zm-4.989 9.869H7.041V11.1h6.975v1.944zm3-4H7.041V7.1h9.975v1.944z"></path></svg>
								</div>
								<div class="ml-4">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="#263238" fill-opacity=".6" d="M12 7a2 2 0 1 0-.001-4.001A2 2 0 0 0 12 7zm0 2a2 2 0 1 0-.001 3.999A2 2 0 0 0 12 9zm0 6a2 2 0 1 0-.001 3.999A2 2 0 0 0 12 15z"></path></svg>
								</div>
							</div>
						</div>

						<!-- Search Bar for message-->
						<div class="p-2 bg-grey-lighter">
							<input type="text" v-model="searchQuery" class="w-full p-4 bg-grey-lightest text-md" placeholder="Search or start new chat"/>
						</div>

						<div class="bg-grey-lighter flex-1 overflow-auto">
							<div class="px-4 flex items-center bg-grey-lightest cursor-pointer mb-1">
								<div>
									<img class="h-12 w-12 rounded-full" :src="defaultAvatar"/>
								</div>
								<div class="ml-4 flex-1 border-b border-grey-lighter py-4">
									<div class="flex items-bottom justify-between">
										<p class="text-grey-darkest">
											Selected Contact
										</p>
										<p class="text-xs text-grey-darkest">
											10:30pm
										</p>
									</div>
									<p class="text-grey-dark mt-1 text-sm">
										<!-- Get Andrés on this movie ASAP! -->
										This is a message.
									</p>
								</div>
							</div>
						</div>				
					</div>
					<!-- Right -->
					<div class="w-2/3 border flex flex-col">
						<!-- Header -->
						<div class="py-2 px-3 bg-grey-lighter flex flex-row justify-between items-center">
							
							<div class="flex items-center">
								<div>
									<img class="w-10 h-10 rounded-full" :src="defaultAvatar"/>
								</div>

								<div class="ml-4">
									<p class="text-grey-darkest">
										Selected Contact : display name
									</p>
									<p class="text-grey-darker text-xs mt-1">
										Responding to Criminal : 
									</p>
								</div>
							</div>

							<div class="flex">
								<div class="ml-6">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="#263238" fill-opacity=".6" d="M12 7a2 2 0 1 0-.001-4.001A2 2 0 0 0 12 7zm0 2a2 2 0 1 0-.001 3.999A2 2 0 0 0 12 9zm0 6a2 2 0 1 0-.001 3.999A2 2 0 0 0 12 15z"></path></svg>
								</div>
							</div>
						</div>
						<div class="flex-1 overflow-auto" style="background-color: #DAD3CC">
							<div class="py-2 px-3">
								<div class="flex justify-center mb-2">
									<div class="rounded py-2 px-4" style="background-color: #DDECF2">
										<p class="text-sm uppercase">
											February 2, 2020 
										</p>
									</div>
								</div>

								<div class="flex justify-center mb-4">
									<div class="rounded py-2 px-4" style="background-color: #FCF4CB">
										<p class="text-xs">
											Messages to this chat and calls are now secured with end-to-end encryption. Tap for more info.
										</p>
									</div>
								</div>

								<!-- <message-history></message-history>	 -->

								<div class="flex mb-2">
									<div class="rounded py-2 px-3" style="background-color: #F2F2F2">
										<p class="text-sm text-teal">
											Sylverter Stallone
										</p>
										<p class="text-sm mt-1">
											Hi everyone! Glad you could join! I am making a new movie.
										</p>
										<p class="text-right text-xs text-grey-dark mt-1">
											12:45 pm
										</p>
									</div>
								</div>

								<div class="flex justify-end mb-2">
									<div class="rounded py-2 px-3" style="background-color: #E2F7CB">
										<p class="text-sm mt-1">
											Hi guys.
										</p>
										<p class="text-right text-xs text-grey-dark mt-1">
											12:45 pm
										</p>
									</div>
								</div>

								<div class="flex justify-end mb-2">
									<div class="rounded py-2 px-3" style="background-color: #E2F7CB">
										<p class="text-sm mt-1">
											Count me in
										</p>
										<p class="text-right text-xs text-grey-dark mt-1">
											12:45 pm
										</p>
									</div>
								</div>
							</div>
						</div>

						<div class="bg-grey-lighter px-4 py-4 flex items-center">
							<div>
								<svg xmlns="http://www.w3.org/2000/	svg" viewBox="0 0 24 24" width="24" height="24"><path opacity=".45" fill="#263238" d="M9.153 11.603c.795 0 1.439-.879 1.439-1.962s-.644-1.962-1.439-1.962-1.439.879-1.439 1.962.644 1.962 1.439 1.962zm-3.204 1.362c-.026-.307-.131 5.218 6.063 5.551 6.066-.25 6.066-5.551 6.066-5.551-6.078 1.416-12.129 0-12.129 0zm11.363 1.108s-.669 1.959-5.051 1.959c-3.505 0-5.388-1.164-5.607-1.959 0 0 5.912 1.055 10.658 0zM11.804 1.011C5.609 1.011.978 6.033.978 12.228s4.826 10.761 11.021 10.761S23.02 18.423 23.02 12.228c.001-6.195-5.021-11.217-11.216-11.217zM12 21.354c-5.273 0-9.381-3.886-9.381-9.159s3.942-9.548 9.215-9.548 9.548 4.275 9.548 9.548c-.001 5.272-4.109 9.159-9.382 9.159zm3.108-9.751c.795 0 1.439-.879 1.439-1.962s-.644-1.962-1.439-1.962-1.439.879-1.439 1.962.644 1.962 1.439 1.962z">
								</path>
							</svg>
						</div>

						<div class="flex-1 mx-4">
							<input @keyup.ctrl.enter="pingUser" v-model="message" placeholder="Type your message, press ctrl/cmd + shift to send a message" class="w-full border rounded px-2 py-2" type="text"/>
						</div>
						<div>
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="#263238" fill-opacity=".45" d="M11.999 14.942c2.001 0 3.531-1.53 3.531-3.531V4.35c0-2.001-1.53-3.531-3.531-3.531S8.469 2.35 8.469 4.35v7.061c0 2.001 1.53 3.531 3.53 3.531zm6.238-3.53c0 3.531-2.942 6.002-6.237 6.002s-6.237-2.471-6.237-6.002H3.761c0 4.001 3.178 7.297 7.061 7.885v3.884h2.354v-3.884c3.884-.588 7.061-3.884 7.061-7.885h-2z"></path></svg>
						</div>	
						<div>
							<svg @click="pingUser" class="h-8 w-8 text-grey-darkest fillCurrent" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/>
							</svg>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</template>
<script>
import endpoints from './scripts/endpoints.js';
export default { 
	name : 'TestMessages',
	props : ['user','id','respondent'],
	data(){
		return {
			userId : null  ,
			searchQuery : null , 
			message : ""
		}
	}, 	

	mounted(){
		console.log('Component Mounted');  
		
		let channel = Echo.private('user.' + this.id);
		
		channel.listen('.MessageSent', function(data){
			// console.log(data.user.message);
			alert(data.message);
		});  
		

		// Registered client on public channel to listen to MessageSent event
		Echo.channel('public').listen('MessageSent', ({message}) => {
			console.log("message sent started");
			this.messages.push(message);
		});
		
	},

	computed : {
		defaultAvatar(){
			// return 'lorem.jpg';
			if (this.respondent.avatar == "default_avatar.jpg"){
				return endpoints.urlDomain +"/assets/images/" +this.respondent.avatar ; 
			} 
			return endpoints.urlDomain +"/storage/" +this.respondent.avatar;
		}
	},

	methods : { 
		pingUser(){
			window.axios.post("/send", { 
				id : this.id,
				message : this.message 
			}).then(response => {
				console.log(response.data);
			}).catch(error => {
				console.log(error);
			});
		}	
	}
};
</script>
<style>

</style>