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

							<!-- Search Bar for message-->
							<message-search></message-search>
							<message-conversations :messages="this.messages" :selectedContact="this.respondent"></message-conversations>						
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
											Responding to Criminal: {{ this.criminal[0].full_name }}
										</p>
									</div>
								</div>

								<div class="flex">
									<div class="ml-6">
										<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="#263238" fill-opacity=".6" d="M12 7a2 2 0 1 0-.001-4.001A2 2 0 0 0 12 7zm0 2a2 2 0 1 0-.001 3.999A2 2 0 0 0 12 9zm0 6a2 2 0 1 0-.001 3.999A2 2 0 0 0 12 15z"></path></svg>
									</div>
								</div>
							</div>
							<messages></messages>
							<message-input @pressedEnter="add"></message-input>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>
<script>
// import ContactList from './ContactList.vue';
import MessageSearch from './Messages/MessageSearch';
import MessageConversations from './Messages/MessageConversations.vue';
import Messages from './Messages/Messages.vue';
import ChatHeader from './ChatHeader.vue';
import MessageInput from './Messages/MessageInput.vue';
import endpoints from './scripts/endpoints.js';
// import ContactList from './ContactList.vue';
export default {
	components : {
		Messages,
		MessageInput, 
		MessageSearch, 
		MessageConversations, 
		ChatHeader 
	},
	props : { 
		criminal : { 
			type : Array,
			required : true
		},
/*		messages : { 
			type : Array, 
			required : true 
		},*/
		user : {
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
			contacts : []
		}
	},

	methods : {
		saveNewMessage(message){
			axios.post(this.send_message_endpoint, {
			})
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

sockets : { 
	connect(){
		console.log("Socket connected");
	},
	customEmit(val){
		console.log(val);
	}
},

computed : { 
		defaultAvatar(){
			if (this.respondent.avatar == "default_avatar.jpg"){
				return endpoints.urlDomain +"/assets/images/" +this.respondent.avatar ; 
			} 

			return endpoints.urlDomain +"/storage/" +this.respondent.avatar;
		},

		send_message_endpoint(){
			return window.App.sendMessageEndpoint ; 
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
		console.log('Component mounted.');

		let channel = Echo.channel('public');

		channel.listen('.MessageSent', function(data){
			console.log(data);
		});

// Registered client on public channel to listen to MessageSent event
		Echo.channel('public').listen('MessageSent', ({message}) => {
			console.log("message sent started");
			this.messages.push(message);
		});

	}	
/*console.log("Component mounted for chat Now");			

let channel = Echo.channel('message');

channel.listen('.MessageSent', function(data){
console.log(data);
});*/
// Echo.private(`messages${this.user.id}`)
// .listen('NewMessage', (e) => {
// 	this.handleIncoming();
// });

/*	axios.get("/contacts")
.then(response => {
console.log(response.data);
}).catch(error => {
console.log(error);
});*/

};
</script>