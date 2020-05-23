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
							<message-conversations :messages="this.messages" 
							:selectedContact="this.respondent">
						</message-conversations>						

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
										<!-- Display name (SELECTED)  -->
										<!-- {{ this.selectedContact.display_name }} -->
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
						<!-- 	<message-input @saveMessage="saveMessage"></message-input> -->
						<div class="bg-grey-lighter px-4 py-4 flex items-center">
							<div>
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path opacity=".45" fill="#263238" d="M9.153 11.603c.795 0 1.439-.879 1.439-1.962s-.644-1.962-1.439-1.962-1.439.879-1.439 1.962.644 1.962 1.439 1.962zm-3.204 1.362c-.026-.307-.131 5.218 6.063 5.551 6.066-.25 6.066-5.551 6.066-5.551-6.078 1.416-12.129 0-12.129 0zm11.363 1.108s-.669 1.959-5.051 1.959c-3.505 0-5.388-1.164-5.607-1.959 0 0 5.912 1.055 10.658 0zM11.804 1.011C5.609 1.011.978 6.033.978 12.228s4.826 10.761 11.021 10.761S23.02 18.423 23.02 12.228c.001-6.195-5.021-11.217-11.216-11.217zM12 21.354c-5.273 0-9.381-3.886-9.381-9.159s3.942-9.548 9.215-9.548 9.548 4.275 9.548 9.548c-.001 5.272-4.109 9.159-9.382 9.159zm3.108-9.751c.795 0 1.439-.879 1.439-1.962s-.644-1.962-1.439-1.962-1.439.879-1.439 1.962.644 1.962 1.439 1.962z"></path>
								</svg>
							</div>

							<div class="flex-1 mx-4">
								<input v-model="inputMessage" @keypress.enter="saveNewMessage" placeholder="..." class="w-full border rounded px-2 py-2" type="text"/>
							</div>

							<div>
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="#263238" fill-opacity=".45" d="M11.999 14.942c2.001 0 3.531-1.53 3.531-3.531V4.35c0-2.001-1.53-3.531-3.531-3.531S8.469 2.35 8.469 4.35v7.061c0 2.001 1.53 3.531 3.53 3.531zm6.238-3.53c0 3.531-2.942 6.002-6.237 6.002s-6.237-2.471-6.237-6.002H3.761c0 4.001 3.178 7.297 7.061 7.885v3.884h2.354v-3.884c3.884-.588 7.061-3.884 7.061-7.885h-2z"></path>
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
import ContactList from './ContactList.vue';
import MessageSearch from './Messages/MessageSearch';
import MessageConversations from './Messages/MessageConversations.vue';
import Messages from './Messages/Messages.vue';
import ChatHeader from './ChatHeader.vue';
import MessageInput from './Messages/MessageInput.vue';
import endpoints from './scripts/endpoints.js';
import sanitizeHtml from 'sanitize-html';
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
		id:  [ Number ],
		criminal:  [ Object, Array] ,
		user  : [ Object, Array ],
		respondent : [ Object, Array],
	},

	data(){		
		return {
			inputMessage : "",

			privateChat: {
				selectedReceiver: null,
				isPrivateChatExpand: false,
				isSelectedReceiverTyping: false,
				hasNewMessage: false,
    isSeen: null, // null: no new message, false: a message is waiting to be seen, true: user seen message (should display "Seen at..")
    seenAt: '',
    roomId: '',
    isOnline: true,
    
    message: {
    	isLoading: false,
    	list: [],
    	currentPage: 0,
    	perPage: 0,
    	total: 0,
    	lastPage: 0,
   	newMessageArrived: 0 // number of new messages we just got (use for saving scroll position)
   },

   emojiCoordinates: {
   	x: 0,
   	y: 0
   },

   isShowEmoji: false,
   
   selectedMessage: null
},

crime_respondent : this.respondent[0],
selectedContact : this.respondent,
messages : [],
contacts : []
}
},
methods : {
	async saveMessage(inputMessage, respondent = null){
		console.log(this.inputMessage);

		try 
		{
			/*if there's no message and there's no receiver*/
			if ((!receiver && !this.inputMessage.trim().length)) {
				return ;
			}

// console.log("Something happens here");

// -> clean data before save to DB
let message = sanitizeHtml(this.inputMessage).trim();

if (!message.length) {
	return "zero value";
}

let receiver = this.respondent; 					

console.log(receiver);				

let criminal =  this.criminal;

const response = await axios.post(this.send_message_endpoint, {
	id : this.id,
	receiver : this.receiver,
	content: message,
	criminal
});

if (receiver){
	console.log("There's a receiver");

	this.privateChat.message.list.push(response.data.message);

	this.privateChat.isSeen = false 

// waiting for other to seen this message

// send message indicate that user stop typing (incase Throttle function isn't called)

Echo.private(`user.${this.privateChat.roomId}`)
.whisper('typing', {
	user: this.$root.user,
	isTyping: false
});

}		

else {
	console.log('There\'s no receiver');

//=> this.publicChat.message.list.push(response.data.message)

}

// console.log("Running Scroll To Bottom");

} catch (error) {
	console.log(error);
}

},

scrollToBottom (element, animate = true) {
	if (!element) {
		return
	}

this.$nextTick(() => { // run after Vue finishes updating the DOM
	if (animate) {
		$(element).animate(
			{ scrollTop: element.scrollHeight },
			{ duration: 'medium', easing: 'swing' }
			)
	} else {
		$(element).scrollTop(element.scrollHeight)
	}
})
},

saveNewMessage(){
	window.axios.post(this.send_message_endpoint2, {
		id : this.id,
		message : this.message
	});

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

	send_message_endpoint2(){
		return window.App.sendMessageEndpoint2 ; 
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

	let channel = Echo.private('user.' + this.id);

	channel.listen('.MessageSent', function(data){
			alert(data.message);
		// console.log(data);
	}); 

/*// Registered client on public channel to listen to MessageSent event
Echo.channel('public').listen('MessageSent', ({message}) => {
	console.log("message sent started");
	this.messages.push(message);
});
*/

}	
/*console.log("Component mounted for chat Now");			

let channel = Echo.channel('message');

channel.listen('.MessageSent', function(data){
console.l og(data);
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