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
			setTimeout(() => this.messageIsAvailable = false, 5000);
		}
	},
	mounted(){
		this.hideAfterSeconds();
	},
/*watch : { 
message(){

}
}*/
};
</script>