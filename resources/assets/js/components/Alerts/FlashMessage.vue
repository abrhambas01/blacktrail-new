<script>
export default {
	props : ['message'],
	data(){
		return { 
			messageIsAvailable : true
		}	
	},
	methods : {
		hideAfterSeconds(){
			setTimeout(() => this.messageIsAvailable = false, 10000);
		},
		hideAlert(){
			this.messageIsAvailable = false; 
		}
	},
	mounted(){
		this.hideAfterSeconds();
	},
	watch : { 

		message(){

		}

	}
};
</script>