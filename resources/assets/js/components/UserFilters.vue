<script>
import urls from './scripts/endpoints.js';
import CriminalSearch from './CriminalSearch.vue';
export default {
	name: 'UserFilters',
	components : { CriminalSearch },
	props: ['value', 'placeholder'],
	data () {
		return {	
			criminalName : true , 
			criminal :{ 
				sortBy: "",
				country: null,
				name : "",
				state: ""
			},
			group : { 
				name : "",
				country : "",
			}
		}
	},
	methods : { 
		updateValue: function (value) {
			this.$emit('input', value)
		},

		reset() {
			this.localvar = this.propvar;
		},

		showSearchByName(){
		// trying to reset the value of the criminal object values..
		this.criminal.sortBy = "";
		this.criminal.country = null;
		this.criminal.name = "";

	},

	changeFilterAdmin(event){
		var value = event.target.value;
		this.criminal.sortBy = value ;
		if (this.sortBy === 1){
			window.location.href = 'admin/criminals/followed';
		}
	},

	startSearch(){
		if ( this.criminal.sortBy != null  && this.criminal.country != null){
			console.log("Please Choose one ");
		}
		else { 
			console.log("Please Redirect ");
		}
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
		// console.log("Start Searching");
		window.location.replace("/found-criminals");
	}	
}
};
</script>

<style lang="scss" scoped>
</style>