<template>
	<div class="h-full mt-6 h-screen overflow-hidden" style="background: #edf2f7;">
		<div>
			<div class="w-full h-32" style="background-color: #449388"></div>
			<div class="container mx-auto" style="margin-top: -128px;">
				<div class="py-6 h-screen">
					<div class="flex border border-grey rounded shadow-lg h-full">
						<div class="w-1/3 border flex flex-col">
							<div class="py-2 px-3 bg-grey-lighter flex flex-row justify-between items-center">
								<div>
									<img class="w-10 h-10 rounded-full" :src="currentUserAvatar"/>
								</div>
								
								<div class="flex">
									<div>
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="#727A7E" d="M12 20.664a9.163 9.163 0 0 1-6.521-2.702.977.977 0 0 1 1.381-1.381 7.269 7.269 0 0 0 10.024.244.977.977 0 0 1 1.313 1.445A9.192 9.192 0 0 1 12 20.664zm7.965-6.112a.977.977 0 0 1-.944-1.229 7.26 7.26 0 0 0-4.8-8.804.977.977 0 0 1 .594-1.86 9.212 9.212 0 0 1 6.092 11.169.976.976 0 0 1-.942.724zm-16.025-.39a.977.977 0 0 1-.953-.769 9.21 9.21 0 0 1 6.626-10.86.975.975 0 1 1 .52 1.882l-.015.004a7.259 7.259 0 0 0-5.223 8.558.978.978 0 0 1-.955 1.185z"></path></svg>
									</div>
									<div class="ml-4">
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path opacity=".55" fill="#263238" d="M19.005 3.175H4.674C3.642 3.175 3 3.789 3 4.821V21.02l3.544-3.514h12.461c1.033 0 2.064-1.06 2.064-2.093V4.821c-.001-1.032-1.032-1.646-2.064-1.646zm-4.989 9.869H7.041V11.1h6.975v1.944zm3-4H7.041V7.1h9.975v1.944z"></path></svg>
									</div>
									<div class="ml-4">
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="#263238" fill-opacity=".6" d="M12 7a2 2 0 1 0-.001-4.001A2 2 0 0 0 12 7zm0 2a2 2 0 1 0-.001 3.999A2 2 0 0 0 12 9zm0 6a2 2 0 1 0-.001 3.999A2 2 0 0 0 12 15z"></path></svg>
									</div>
								</div>
							</div>
							
							<!-- Search -->
							<div class="py-2 px-2 bg-grey-lightest">
								<input type="text" class="w-full px-2 py-2 text-sm" placeholder="Search or start new chat"/>
							</div>
							
							<!-- Contacts -->
							<div class="bg-grey-lighter flex-1 overflow-auto">
								<div class="px-3 flex items-center bg-grey-light cursor-pointer">
									<div>
										<img class="h-12 w-12 rounded-full"
										:src="currentUserAvatar"/>
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
											Get Andrés on this movie ASAP!
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
											{{ this.selectedContact.display_name }}
											
										</p>
										<p class="text-grey-darker text-xs mt-1">
											Responding to : Taylor Swift
										</p>
									</div>
								</div>
								
								<div class="flex">
									<div class="ml-6">
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="#263238" fill-opacity=".6" d="M12 7a2 2 0 1 0-.001-4.001A2 2 0 0 0 12 7zm0 2a2 2 0 1 0-.001 3.999A2 2 0 0 0 12 9zm0 6a2 2 0 1 0-.001 3.999A2 2 0 0 0 12 15z"></path></svg>
									</div>
								</div>
							</div>
							
							<!-- Messages -->
							<div class="flex-1 overflow-auto" style="background-color: #DAD3CC">
								<div class="py-2 px-3">
									
									<div class="flex justify-center mb-2">
										<div class="rounded py-2 px-4" style="background-color: #DDECF2">
											<p class="text-sm uppercase">
												February 20, 2018
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
									
									<div class="flex mb-2">
										<div class="rounded py-2 px-3" style="background-color: #F2F2F2">
											<p class="text-sm text-purple">
												Tom Cruise
											</p>
											<p class="text-sm mt-1">
												Hi all! I have one question for the movie
											</p>
											<p class="text-right text-xs text-grey-dark mt-1">
												12:45 pm
											</p>
										</div>
									</div>
									
									<div class="flex mb-2">
										<div class="rounded py-2 px-3" style="background-color: #F2F2F2">
											<p class="text-sm text-orange">
												Harrison Ford
											</p>
											<p class="text-sm mt-1">
												Again?
											</p>
											<p class="text-right text-xs text-grey-dark mt-1">
												12:45 pm
											</p>
										</div>
									</div>
									
									<div class="flex mb-2">
										<div class="rounded py-2 px-3" style="background-color: #F2F2F2">
											<p class="text-sm text-orange">
												Russell Crowe
											</p>
											<p class="text-sm mt-1">
												Is Andrés coming for this one?
											</p>
											<p class="text-right text-xs text-grey-dark mt-1">
												12:45 pm
											</p>
										</div>
									</div>
									
									<div class="flex mb-2">
										<div class="rounded py-2 px-3" style="background-color: #F2F2F2">
											<p class="text-sm text-teal">
												Sylverter Stallone
											</p>
											<p class="text-sm mt-1">
												He is. Just invited him to join.
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
									
									<div class="flex mb-2">
										<div class="rounded py-2 px-3" style="background-color: #F2F2F2">
											<p class="text-sm text-purple">
												Tom Cruise
											</p>
											<p class="text-sm mt-1">
												Get Andrés on this movie ASAP!
											</p>
											<p class="text-right text-xs text-grey-dark mt-1">
												12:45 pm
											</p>
										</div>
									</div>
									
								</div>
							</div>
							
							<!-- Input -->
							<div class="bg-grey-lighter px-4 py-4 flex items-center">
								<div>
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path opacity=".45" fill="#263238" d="M9.153 11.603c.795 0 1.439-.879 1.439-1.962s-.644-1.962-1.439-1.962-1.439.879-1.439 1.962.644 1.962 1.439 1.962zm-3.204 1.362c-.026-.307-.131 5.218 6.063 5.551 6.066-.25 6.066-5.551 6.066-5.551-6.078 1.416-12.129 0-12.129 0zm11.363 1.108s-.669 1.959-5.051 1.959c-3.505 0-5.388-1.164-5.607-1.959 0 0 5.912 1.055 10.658 0zM11.804 1.011C5.609 1.011.978 6.033.978 12.228s4.826 10.761 11.021 10.761S23.02 18.423 23.02 12.228c.001-6.195-5.021-11.217-11.216-11.217zM12 21.354c-5.273 0-9.381-3.886-9.381-9.159s3.942-9.548 9.215-9.548 9.548 4.275 9.548 9.548c-.001 5.272-4.109 9.159-9.382 9.159zm3.108-9.751c.795 0 1.439-.879 1.439-1.962s-.644-1.962-1.439-1.962-1.439.879-1.439 1.962.644 1.962 1.439 1.962z"></path></svg>
								</div>
								<div class="flex-1 mx-4">
									<input class="w-full border rounded px-2 py-2" type="text"/>
								</div>
								<div>
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="#263238" fill-opacity=".45" d="M11.999 14.942c2.001 0 3.531-1.53 3.531-3.531V4.35c0-2.001-1.53-3.531-3.531-3.531S8.469 2.35 8.469 4.35v7.061c0 2.001 1.53 3.531 3.53 3.531zm6.238-3.53c0 3.531-2.942 6.002-6.237 6.002s-6.237-2.471-6.237-6.002H3.761c0 4.001 3.178 7.297 7.061 7.885v3.884h2.354v-3.884c3.884-.588 7.061-3.884 7.061-7.885h-2z"></path></svg>
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
// import ContactList from './ContactList.vue';
import SearchMessages from './SearchMessages.vue';
import MessageInbox from './MessageInbox.vue';
import ChatHeader from './ChatHeader.vue';
import MessageComposer from './MessageComposer.vue';
import endpoints from './scripts/endpoints.js';
// import ContactList from './ContactList.vue';
export default {
	components : { MessageComposer, SearchMessages, MessageInbox,  ChatHeader },
	props : { 
		user  : {
			type : Object,
			required : true
		},
		respondent : {
			type : Object, 
			required : true
		}
	},
	data(){
		return { 	
			selectedContact : this.respondent,
			// crime_respondent : this.respondent[0],
			messages : [],
			contacts : [],
		}
	},
	methods : {
		saveNewMessage(message){
			this.messages.push(message);
		},
		
		startConversationWith(contact){
			this.updateUnreadCount(contact, true)
			axios.get(`/conversation/${contact.id}`)
			.then(response => {
				this.messages = response.data ; 
				this.selectedContact = contact ; 
			})		
		},


		updateUnreadCount(contact,reset){
			this.contacts = this.contacts.map((single) => {
				if (single.id !== contact.id){
					return id ; 
				}
				if ( reset )
					single.unread = 0 ; 
				else 
					single.unread += 1 ; 
				return single ; 
			})
		}
		
	},
	computed : { 
		defaultAvatar(){	
			return endpoints.urlDomain +"/assets/images/" +this.respondent.avatar ; 
		},
		currentUserAvatar(){	
			if(this.user.avatar === "default_avatar.jpg") {
				return endpoints.urlDomain +"/assets/images/" +this.user.avatar ; 
			} 
			else { 
				return endpoints.urlDomain +"/assets/images/" +this.user.avatar ; 
			}
		}
	},

	mounted(){
		Echo.private(`messages${this.user.id}`)
		.listen('NewMessage', (e) => {
			this.handleIncoming();
		});

	/*	axios.get("/contacts")
		.then(response => {
			console.log(response.data);
		}).catch(error => {
			console.log(error);
		});*/
		
		console.log('Component mounted.')
	},
};
</script>