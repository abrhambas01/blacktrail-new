<!-- <template src="./CriminalView.html"></template> -->
<template></template>
<script>
import CrimesList from './CrimesList.vue';
import urlDomain from './scripts/endpoints.js';
import { publicPath, user, app } from './scripts/api.js';
import ViewActionLayout from './ViewActionLayout.vue' ;
import AdminButtons from './AdminButton.vue' ;
import UserButtons from './UserButton.vue' ;
import ChatBox from './modals/ChatBox.vue';
import _ from 'lodash';
export default {
	name: 'CriminalView',

	props : ['criminals', 'criminalId'],

	components : { 
		AdminButtons,
		ChatBox,
		UserButtons
		// CrimesList, 
	},
	data(){
		return {
			showDiv : true , 
			displayBounty : "" , 
			display_full_name : "", 
			showIfTheCurrentUserIsTheOneWhoPosted : false,
			criminalDetails : null,
			// criminalId :  $route.params.id ,
			// crimes : this.criminals.crimes
		}
	},
	methods : {
		deleteUser(id){
			this.$swal({
				title: 'Are you sure to delete this criminal?',
				text: 'All this criminal\'s information will be deleted',
				type: 'warning',
				showCancelButton: true,
				confirmButtonText: 'Yes, delete this guy',
				cancelButtonText: 'Cancel'
			}).then((result) => {
				if (result.value) {
					axios.delete(this.remove_criminal_endpoint, { params : { user_id :  id } })
					.then(response => {
						location.reload(); 
					})
					.catch(error => { 
						console.log(error);
					});
				} else if (result.dismiss === Swal.DismissReason.cancel) {
					this.$swal(
						'Cancelled',
						'This criminal wasn\'t deleted',
						'error'
						)
				}
			});
		},

		showMorePhotos(){

		},

		fetchCrimes(){
		// we have criminal_id here. -> 3
		axios.get(this.fetchCriminalsInfoEndpoint)
		.then(response => { console.log(response); })
		.catch(error => { console.log(error); });
	},

	offerBounty(){
		console.log("Offering Bounty");
	},

	showMap(){
		this.$modal.show('location-map') ; 
	},

	reportCriminalLocation(){
		this.$modal.show('report-criminal');
	},


	criminalBounty(){
		// let bounty = this.criminals.profile.bounty +" " +this.criminals.profile.currency;
		// return bounty ;

		if (this.criminals.profile.bounty){
			this.displayBounty = this.criminals.profile.bounty +" " +this.criminals.profile.currency;
		}

		this.displayBounty = "No Listed bounty / profile" ;

	},

	check_if_the_currently_logged_on_user_is_the_creator(){
		if ( user.id === this.criminalDetails.posted_by ){
			this.showIfTheCurrentUserIsTheOneWhoPosted = true ; 
		}
		else { 
			this.showIfTheCurrentUserIsTheOneWhoPosted = false; 
		}
	}

},

mounted(){
	// this.criminalDetails = this.criminals ; 
	console.log(this.criminalId);

/*
	if (this.criminals !== null ){
		this.criminalDetails = this.criminals ; 
		this.check_if_the_currently_logged_on_user_is_the_creator(); 
		if (this.criminalDetails.profile.bounty){
			this.displayBounty = this.criminalDetails.profile.bounty +" " +this.criminalDetails.profile.currency;
		}
		else {
			this.displayBounty = "No Listed bounty / profile" ;
		}

		if (this.criminalDetails.full_name !== null && typeof (this.criminalDetails.full_name) !== "undefined"){
			this.display_full_name = this.criminalDetails.full_name;
		}		
		else {
			this.display_full_name = "Unknown Criminal";
		}
	}	
	else { 
		alert("No Criminals Value"+this.criminals);
	}*/

},

computed : { 
/*
	remove_criminal_endpoint(){
		return urlDomain.destroyUserUrl; 
	},

	normalUser(){
		return this.userRole === 3 || this.userRole === 4 || this.userRole === 5 ; 
	},

	fetchCriminalsInfoEndpoint(){
		return app +'/api/v1/criminals/'+this.criminals.id;
	},
	
	userRole(){
		return user.role_id ;
	},

	defaultAvatar(){
		return app + '/assets/images/default_avatar.jpg';
	},

	avatarPath(){
		if (this.criminals.photo == "default_avatar.jpg"){
			return '/assets/images/default_avatar.jpg';
		}
		else { 
			return window.App.assetStorageCriminalsPath +"/" +this.criminals.photo;
		}
		if (this.criminalDetails.photo !== null && typeof (this.criminalDetails.photo) !== "undefined") {
			return `${window.App.assetStorageCriminalsPath}/${this.criminalDetails.photo}`;
		} else { 
			return app + `/assets/images/default_avatar.jpg`;
		}
	},
	

	criminalsDetails() {
		// _.head(this.criminalDetails) ;

		_.sortBy(this.criminals, value => {
				// console.log(value);
				return value ; 
			});

	},

	criminalInfo(criminalsInfo){
		_.sortBy(this.criminals, value => {
		// console.log(value);
		return value ; 

	});

	}*/

}

};
</script>

<style lang="scss" scoped>
#trix-toolbar-1 .trix-button-group:not(:first-child) {
	margin-left: 0vw;
}
</style>

<!-- 
Using slots
<criminal-layout>
<p slot="name" class="font-basic tracking-normal text-2xl mb-4 mt-4 font-normal text-black mr-2">
Criminal Profile of {{  criminal.full_name }} 
</p>
</criminal-layout> -->

