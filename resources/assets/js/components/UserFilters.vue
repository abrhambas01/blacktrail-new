<script>
import urls from './scripts/endpoints.js';
import CriminalSearch from './CriminalSearch.vue';
export default {
	name: 'UserFilters',
	props: ['value', 'placeholder'],
	components : { CriminalSearch },
	data () {
		return {	
			criminalName : true,
			sortBy: "",
			country: null,
			criminalsName : "",
			state: "",
			group : { 
				name : "",
				country : "",
			}
		}
	},	
	computed : {
		search_criminals_endpoint(){
			return urls.urlForSearchingCriminals;
		}
	},	


	watch: { 
          criminalsName : function(newVal, oldVal) { // watch it
          	console.log('Prop changed: ', newVal, ' | was: ', oldVal)
          }
      },

      mounted(){
      	console.log(urls);
      },

      methods : { 
      	updateValue: function (value) {
      		this.$emit('input', value)
      	},

      	reset() {
      		this.localvar = this.propvar;
      	},

      	showSearchByName(){
      		this.sortBy = "";
      		this.country = null;
      		this.criminalsName = "";
      		// this.$emit('update:criminalsName','');
      		this.$refs.criminalSearchComponent.reset('');
      	},

      	changeFilterAdmin(event){
      		var value = event.target.value;
      		this.sortBy = value ;
      		if (this.sortBy === 1){
      			window.location.href = 'admin/criminals/followed';
      		}
      	},

      	startSearch(){
      		/*if both select boxes are selected then we resort to choosing */
      		if ( this.sortBy != null  && this.country != null){	

				// console.log("Criminal country is used not the criminal name. So we ");

						axios.get(this.search_criminals_endpoint, { 
							sortBy : this.sortBy,
							country : this.country 
						}).then(response => { 
							console.log("Response Data",response.data);
						}).catch(error => {
							console.log(error);
						});

			}
			else {
				this.showSearchByName();
			}
		},

		signalChange: function(evt){

			console.log(evt);

		},
		refresh({ data }) {
			this.dataSet = data.activities;
			this.items = data.activities.data;
			this.$refs.timeline.scrollIntoView();
		},

		url(page) {
			let url = urls.urlForSearchingCriminals + `/api/v1/search-criminals/?=${this.criminal}`;
		},

		searchCriminals(){	
			console.log("Start Searching");
		}	
	}
};
</script>

<style lang="scss" scoped>
</style>