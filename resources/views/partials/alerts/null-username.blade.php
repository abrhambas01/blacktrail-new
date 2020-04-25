<flash-message inline-template>      
	<div v-show="messageIsAvailable" id="messageSuccess" class="bg-green-theme p-4 w-full flex justify-between flashMessage">
		<p class="text-white font-semibold text-md font-sans">It seems like you don't have username associated with your account, You can add your own username by clicking on the avatar and go to profile</p>
		<svg @click="hideAlert()" class="fill-current text-white h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 8.586L2.929 1.515 1.515 2.929 8.586 10l-7.071 7.071 1.414 1.414L10 11.414l7.071 7.071 1.414-1.414L11.414 10l7.071-7.071-1.414-1.414L10 8.586z"/>
		</svg>
	</div>
</flash-message>