<script>
export default {
	props : ['id'],
	
	name : 'CheckIfTheAdminChatIsAvailable',
	
	data(){
		return { 
			userId : null , 
			message : ""
		}
	},

	mounted(){		
		let channel = Echo.private('user.' + this.id);
		
		channel.listen('.MessageSent', function(data){
			alert(data.message);
		}); 
	}	

};
</script>	