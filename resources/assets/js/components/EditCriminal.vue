<template src="./templates/UpdateCriminal.html"></template>
<script>
import VueTrix from "vue-trix";
import api from "./scripts/api.js";
import urls from "./scripts/endpoints.js";
import Places from 'vue-places';
import datepicker from 'vuejs-datepicker';
import _ from "lodash"; 	

export default {
	props : {
		crimes:  [ Object, Array],
		criminal:  [ Object, Array] ,
		admins : [ Object, Array],
		countries: [ Object, Array],
		body_types: [ Object, Array]
	},

	components : { 
		'VueTrix' : VueTrix,
		'places' : Places, 
		datepicker 
	},

	data(){
		return {
			openDate : new Date('December 17, 1995 03:24:00'),
			inlinePicker : true, 
			input: {	
				crimes : this.criminal.crimes 
			},
			criminalCrimes : this.criminal.crimes,
			newCrimes : [],
			crimesList : [],
			send_attachment_endpoint : urls.url_for_saving_photos ,			
			isLoading : null,
			datepickerClass : ['hover:bg-grey-lightest','bg-grey-lighter','w-full','mb-2','p-2', 'leading-normal'], 			
			country : this.criminal.country_id,	
			form : {		
				id :null , 
				avatar : this.criminalAvatar,	
				birthplace : null ,
				full_name :null  ,
				alias :null ,
				first_name :null ,
				posted_by :null ,
				middle_name :null ,
				last_name : 	null ,
				contact_number :null ,
				contact_person : null  , 
				status :         null, 
				last_seen : null,
				birthdate : null,
				eye_color : null,
				weight : null,
				height : null,
				country_of_origin : null,
				avatar : null,
				complete_description : null,
				height_in_cm : null,
				body_frame : null,
				currency : null,
				bounty : null,
				maxFiles: 1,
				uploadUrl: urls.urlSaveCriminal,
				attachments : [],
				country_id : 4 , 
			},

			posted_by : this.criminal.posted_by,

			max_files: { // total # of files allowed to be uploaded
				type: Number,
				required: false,
				default: 10
			}
		}
	},	

	methods : {
		
		handleTrixInit(file){
			console.log("file",file);
		},
		/*
		customFormatter(date) {
			return moment(date).format('MMMM Do YYYY, h:mm:ss a');
		},*/

		/*
		removeCrime(input,index){
			console.log(input);
			// axios.delete(this.remove_crime_endpoint)
		},*/

		uploadAttachment(file,progressCallback,successCallback){
			if(!file){
				return;
			}

			const _this = this;
			console.log('uploading!');
			let formData = new FormData();
			formData.append('file', file);
			formData.append('attachable_type','App\CriminalInfo');
			formData.append('field','complete_description');
			axios.post(this.send_attachment_endpoint, formData, {
				headers: {
					'Content-Type': 'multipart/form-data',
				},
				onUploadProgress: (progressEvent) => {
					const totalLength = progressEvent.lengthComputable
					? progressEvent.total
					: progressEvent.target.getResponseHeader('content-length') ||
					progressEvent.target.getResponseHeader('x-decompressed-content-length');
					console.log('onUploadProgress', totalLength);
					if (totalLength !== null) {
						const progressData = Math.round((progressEvent.loaded * 100) / totalLength);
						progressCallback(progressData);
					}
				},
			}).then((response) => {
				progressCallback(100);
					// this bit is not axios way of doing it so I provided a value so it wont keep the loading bar
					let attachment = response.data;
					const attributes = {
						url: attachment.url,
						href: attachment.url +"?content-disposition=attachment"
					};
					successCallback(attributes);
				}).catch((error) => {
					console.log('FAILURE!!', error);
				});
				this.requesting = false;
			},
			/*Updating a profile.*/
			updateProfile(){
				this.$swal('Wait for sometime. The page will just refresh by its own');

				if ( this.criminalCrimes.length > 0 || this.newCrimes.length > 0){

					setTimeout(() => {
						this.isLoading = false;
						this.requesting = true;
						this.creating = true;
						this.resetting = false;	
						axios.put(this.endpoint, {
							id : this.criminal.id,
							form : this.form,
							criminalCrimes : this.criminalCrimes,
							newCrimes : this.newCrimes
						}).then(response => {
							console.log(response.data);	
							
		// window.location.replace("/admin/criminals/"+this.criminal.id);

						}).catch((error) => {

							console.log("error",error.response.status);

							if (error.response.status === 422)
							{
								Vue.swal("Please fill all the fields required correctly or you could check if currency is correct");
							}

							else if (error.response.status === 406) { 	
								alert(error.response.data.message);
							}

							// // console.log("500 fallback is ok");
							// alert();
							// // Vue.swal('Ok!',);
							// this.$swal(error.response.message);
							// alert(error.message);									
						});
						this.requesting = false;
						this.creating = false;
					}, 1000);
				}
				else { 

					this.$swal('You cannot proceed if you don\'t add Crimes for this Criminal now');
				
				}
			},
			updateUserRoute(){
				return `/`;
			},

			onAvatarChange(e){
				let files = e.target.files || e.dataTransfer.files;
				if (!files.length)
					return;
				this.createImage(files[0]);
			},
		/*	async setData(file) {
				const formData = new FormData();
				formData.append('type', file.type);
				formData.append('file', await this.fileToBlob(file.location)); // filereader image object which can be sent to the server
				formData.append('name', file.new_name);
				formData.append('url', file.location);

				return formData;
			},*/

			createImage(file){
				let reader = new FileReader();				
				let vm = this;
				vm.form.avatar = file;
				reader.onload = (e) => {
					vm.form.avatar = e.target.result;
				};
				reader.readAsDataURL(file);
			},

			mountAvatar(e){
				let files = this.form.avatar;
				if (!files.length)
					return;
				this.createImage(files[0]);
			},

			isEmpty(obj) {
				return !obj || Object.keys(obj).length === 0;
			},

			addNewCrime(){
				this.newCrimes.push({ crime_id: 1, crime_description : "" });
			},

			removeCrime(index) {
				this.criminalCrimes.splice(index,1);
			},	
			removeNewCrime(index) {
				this.newCrimes.splice(index,1);
			},	

	/*	 	
	this.inputs.push({
	criminal_offense_id: Math.random().toFixed(2),
	criminal_offense_description: this.form.complete_description
})*/
		// this.inputs.push({ criminal_offense_id: 1, criminal_offense_description : "" });

		updateCriminal(){
			setTimeout(() => {
				this.isLoading = false;
				this.requesting = true;
				this.creating = true;
				this.resetting = false;	
				axios.post(this.endpoint,{
					form : this.form,
					crimes : this.input
				}).then(response => {
					if ( response.status === 200){
						alert("Successfully Registered This Criminal");
						this.resetForm();
					}
					else {
						alert("We encounter some errors while adding that criminal");
					}
				}).catch((error) => {
					console.error((error));
					alert("We encounter some errors while adding that criminal, try to check your inputs");
				});
				this.requesting = false;
				this.creating = false;
			}, 1000);
		},

		getInputValue(obj, key) {
			const inputValue = document.getElementById(obj + "_" + key).value;
			if (inputValue.length > 0) {
				this.$set(this.form.obj, key, inputValue);
			} else {
				this.$delete(this.form.obj, key);
			}
		},

		handleAttachmentAdd(event){
			console.log("Description: "+this.form.complete_description);

			console.log(event);
			if(this.requesting || this.creating || this.resetting){
				event.preventDefault();
				return false;
			}

			const attachment = event.attachment;

			if(!attachment.file){
				return;
			}

			this.requesting = true;

			this.uploadAttachment(attachment.file, setProgress, setAttributes);

			function setProgress(progress) {
				attachment.setUploadProgress(progress)
			}

			function setAttributes(attributes) {
				attachment.setAttributes(attributes)
			}

		/*var attachment = event.attachment;
		console.log(attachment);
		if (attachment.file){		
			const data = attachment;
			const config = {
				onUploadProgress: progressEvent => {
					var progress = progressEvent.loaded / progressEvent.total * 100;
					attachment.setUploadProgress(progress);
				}
			}

			axios.post(this.send_attachment_endpoint,data,config)
			.then((response) => {
				console.log("Response is:");
				console.log(response);
				if (response.status === 201) {
					setTimeout(function() {
						var url = response.data;
						attachment.setAttributes({ url: url, href: url });
					}, 30)
				}
				console.log(response.data);
			}).catch(error => console.log(error));
				attachment.setUploadProgress(10);
				setTimeout(function(e) {
					console.log("Set TimeOut:");
					console.log(e);
					// var url = xhr.responseText;
					// return attachment.setAttributes({ url: url, href: url });
				}, 30)
		}
		else { 
			return response("No file uploaded here",401);
		}*/

	}, 

/*async handleAttachmentAdd(evt){
let file = evt.attachment.file
let form = new FormData()
form.append('Content-Type', file.type)
form.append('image', file)
const resp = await this.$store.dispatch('imageUpload', form)
evt.attachment.setUploadProgress(100)
console.log(resp)
evt.attachment.setAttributes({
	url: resp.data.url,
	href: resp.data.url
})
},*/

handleEditorChange(file){
	console.log('file',file);
},

handleAttachmentRemove(file){

	// console.log(file);
	// console.log("Trying to delete",file);
	let url = file.attachment.attachment.attributes.values.url.split("/").pop();
	
	console.log(url);

	axios.delete(this.remove_attachment_endpoint + `${url}`).then(response => {
		console.log(response);
	}).catch(error => {
		console.log(error);
	});

},
},
computed : { 
	usedDate(){
		// return this.
		// return 
	},
	
	criminalAvatar(){
		if (this.criminal.photo == "default_avatar.jpg"){
			return urls.urlDomain + `/assets/images/default_avatar.jpg`;
		}
		else { 		
			return `${window.App.assetStorageCriminalsPath}/${this.criminal.photo}`;
		}
	},

	endpoint(){
		return urls.urlUpdateCriminal +"/" +this.criminal.id; 
	},

	remove_attachment_endpoint(){
		return api.app + '/api/v1/attachments/' ;
	},	
	crimeTypes(){
		return this.crimes 
	}
},

mounted(){
	if (this.criminal.profile !== null){
		alert("No profile was listed for this criminal, please create one for this criminal");
	}

	if(this.criminal){
		this.form.id = this.criminal.id ;
		this.form.full_name = this.criminal.full_name ,
		this.form.first_name = this.criminal.first_name,
		this.form.alias = this.criminal.alias,
		this.form.posted_by = this.criminal.posted_by,
		this.form.middle_name = this.criminal.middle_name,
		this.form.last_name = 	 this.criminal.last_name,
		this.form.contact_number = this.criminal.contact_number,
		this.form.contact_person = this.criminal.contact_person, 
		this.form.status =  this.criminal.status
		/*if there's a profile found*/
		if(this.criminal.profile){	
			this.form.complete_description = _.unescape(this.criminal.profile.complete_description),	
			this.form.last_seen = this.criminal.profile.last_seen,
			this.form.birthdate = this.criminal.profile.birthdate,
			this.form.birthplace = this.criminal.profile.birthplace,
			this.form.eye_color = this.criminal.profile.eye_color,
			this.form.weight = this.criminal.profile.weight_in_kilos,			
			this.form.height = this.criminal.profile.height_in_feet_and_inches,
			this.form.country_of_origin = this.criminal.profile.country_of_origin,
			this.form.avatar = this.criminalAvatar,
			/*	this.form.complete_description = this.criminal.profile.complete_description,*/
			this.form.height_in_cm = this.criminal.profile.height_in_feet_and_inches,
			this.form.maxFiles = 1,
			this.form.body_frame = this.criminal.profile.body_frame,
			this.form.currency = this.criminal.profile.currency,
			this.form.bounty = this.criminal.profile.bounty

		}
		else { 
			this.form.last_seen = this.criminal.profile.last_seen,
			this.form.birthdate = this.criminal.profile.birthdate,
			this.form.birthplace = this.criminal.profile.birthplace,
			this.form.eye_color = this.criminal.profile.eye_color,
			this.form.weight = this.criminal.profile.weight_in_kilos,
			this.form.height = this.criminal.profile.	height_in_feet_and_inches,
			this.form.country_of_origin = this.criminal.profile.country_of_origin,
			this.form.avatar = this.criminalAvatar,
			this.form.complete_description = this.criminal.profile.complete_description,
			this.form.height_in_cm = this.criminal.profile.height_in_feet_and_inches,
			this.form.maxFiles = 1,
			this.form.body_frame = this.criminal.profile.body_frame,
			this.form.currency = this.criminal.profile.currency,
			this.form.bounty = this.criminal.profile.bounty
		}
	}
}
};
</script>

<style>
.trix-content {
	height: 500px;
	overflow-y: auto;
}
/*.vue_component__upload--image
.upload_image_form__thumbnails
.upload_image_form__thumbnail [&.bad-size, &.uploaded]
.img [&.show, &:hover]
span*/
</style>

