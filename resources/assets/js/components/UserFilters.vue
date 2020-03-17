<script>
export default {
	name: 'UserFilters',
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
		hideSearchByName(){
			console.log("ok");
			this.criminal.sortBy = "";
			this.criminal.country =  null;
		},

		reset() {
			this.localvar = this.propvar;
		},

		showSearchByNameTextBox(){
			// this.criminalName && !criminal.sortBy && !criminal.country
		},

		changeFilterAdmin(event){
			var value = event.target.value;
			this.criminal.sortBy = value ;
			if (this.sortBy === 1){
				window.location.href = 'admin/criminals/followed';
			}
		},

		criminalSearch(){

		}


	}
};
</script>

<style lang="scss" scoped>
</style>