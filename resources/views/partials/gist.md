> `partials.filter.blade.php`

```php
<user-filters inline-template>	
	<form @submit.prevent="startSearch">			
			<div v-show="criminalName" class="flex w-full">
				<select placeholder="Sort By" v-model="sortBy" class="bg-grey-lightest border p-2 border-gray mr-4 h-10 w-1/2 rounded-sm font-basic mt-2 mb-4">
					<option value="1">Most Wanted</option>
					<option value="2">Last Seen</option>
					<option value="3">Sort By Bounty/Reward</option>
					{{-- <option value="3">Very Popular</option> --}}
				</select>

				<select placeholder="Country of Origin" v-model="country" class="bg-grey-lightest border p-2 border-gray mr-4 h-10 w-full rounded-sm font-basic mt-2 mb-4">
					<option>Country</option>
					@foreach ($countries as $country)
					<option value="{{  $country->id }}">{{ $country->name }}</option>
					@endforeach
				</select>
			</div>

			<p class="font-bold text-md" v-show="criminalName && !sortBy && !country">
				or
			</p>

			<div class="flex" v-show="criminalName && !sortBy && !country">
				<criminal-search :criminalsName="criminalsName" @search="setDataEmpty" >
				</criminal-search>	
			</div>
			<div class="flex text-center" style="margin-top:3px;" v-show="criminalName && sortBy && country">
				<button @click="showSearchByName" type="submit" class="bg-blue p-2 h-10 mt-2 w-3/5 text-white hover:bg-black flex">
				</svg>
				<div class="text-center flex">
					<p class="ml-4 font-bold text-center">Show Search By Name</p>
				</div>
			</button>

		</div>
	</div>
</form>
</user-filters>
```

UserFilters.vue is the .vue file of the inline template above
> UserFilters.vue

```html
<script>
import urls from './scripts/endpoints.js';
import CriminalSearch from './CriminalSearch.vue';
export default {
	name: 'UserFilters',
	
	props: ['value', 'placeholder'],
	
	components : { CriminalSearch },
	
	data(){
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
      	
      	setDataEmpty () {
      		this.sortBy = "";
      		this.country = null;
      		this.criminalsName = "";
      	},

      	showSearchByName(){
      		this.sortBy = "";
      		this.country = null;
      		this.criminalsName = "";
      		this.$emit('search');
      	},

      	updateValue: function (value) {
      		this.$emit('input', value);
      	},

      	reset() {
      		this.localvar = this.propvar;
      	},

     		// this.$emit('update:criminalsName', ' ')
  
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
					console.log(response.data);
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
```

> CriminalSearch.vue

```html
<template>
  <ais-instant-search
  :search-client="searchClient"
  index-name="criminals"
  >
  <ais-search-box 
  value="criminalName"
  v-model="criminalName"
  placeholder="Search criminals by name"
  :class-names="{
  'ais-SearchBox-form' : 'mySearchBoxInput'
}">
<span slot-scope="{ currentRefinement, isSearchStalled, refine }">
  <input
  class="absolute bg-grey-lighter -ml-2 h-8 w-full -mt-3 "
  type="search"
  v-model="currentRefinement"
  @input="refine($event.currentTarget.value)"
  >
  <span :hidden="!isSearchStalled">Loading...</span>
</span>
</ais-search-box>

<ais-configure 
:hits-per-page.camel="3"
/>  
<ais-hits v-show="criminalName.length > 0 " :escapeHTML="false">
  <template
  slot="item"
  slot-scope="{ item }"
  >
  <div id="search-content" class="z-50 w-full text text-gray-600 rounded-lg overflow-y-auto bg-white shadow-lg" style="max-height: 500px;">
    <div id="searchresults" class="h-auto max-w-3xl mx-auto">
      <span class="p-4 border-b flex justify-between items-center group hover:bg-teal-100">
        <a class="block flex-1 no-underline" :href="`/criminals/`+item.id">
          <p class="font-bold text-sm text-indigo-600 hover:text-indigo-500">
            <h3 class="underline">
              <ais-highlight
              :hit="item"
              attribute="full_name"
              highlighted-tag-name="mark"
              />
            </h3>

            <p class="font-bold text-sm text-indigo-600 hover:text-indigo-500 mt-2">
             <span class="text-xl text-teal-500">aka</span>
             <span class="mr-2 text-teal-500"></span>
             <ais-highlight
             :hit="item" 
             attribute="alias"
             /> 
             <span class="text-indigo-300 font-normal">
              from  
              <ais-highlight
              :hit="item" 
              attribute="country"
              /> 

              <svg class="inline-block pl-2  h-4 fill-current text-brand" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M9.26 13a2 2 0 0 1 .01-2.01A3 3 0 0 0 9 5H5a3 3 0 0 0 0 6h.08a6.06 6.06 0 0 0 0 2H5A5 5 0 0 1 5 3h4a5 5 0 0 1 .26 10zm1.48-6a2 2 0 0 1-.01 2.01A3 3 0 0 0 11 15h4a3 3 0 0 0 0-6h-.08a6.06 6.06 0 0 0 0-2H15a5 5 0 0 1 0 10h-4a5 5 0 0 1-.26-10z"></path>
              </svg>
            </span>
          </p>
          <p class="hidden md:block text-xs text-teal-600">
            Contact this Number : 
            <ais-highlight
            :hit="item"
            attribute="contact_number"
            />
          </p>
        </a>
        <a :href="`/criminals/`+item.id">
          <img class="hidden md:block h-16 border-none" :src="`/storage/criminals/`+item.photo">
        </a>
      </span> 
    </div>
    <!-- No search results message-->
            <!-- <div id="nosearchresults" class="hidden flex pb-6 px-6 bg-white">
            <svg class="fill-current text-indigo-600 h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"></path>
            </svg>
            <span class="ml-4 font-bold"> Oops, no search results!!!1</span>
          </div> -->
        </div>
      </template>
    </ais-hits>
  </ais-instant-search>
</template>
<script>
import algoliasearch from 'algoliasearch/lite';
import app from "./scripts/api.js";
export default {
  props : ['criminalsName'],
  data() {
    return {
      criminalName : this.criminalsName, 
      limitResult : 3 , 
      itemData : null , 
      searchClient: algoliasearch(
        process.env.MIX_ALGOLIA_APP_ID,
        process.env.MIX_ALGOLIA_SEARCH
        ),
    };
  },

  methods : { 
  },
  computed : {
    criminalProfile(id){
      return app.app;
    },

    avatarPhoto(){
      if (this.criminals.photo){
        return `${window.App.assetStorageCriminalsPath}/${this.criminals.photo}`;
      }
      return app + '/storage/public/default_avatar.jpg';
    }

    
  },
  watch : { 
    criminal_name(oldVal,newVal){
      if(oldVal !== newVal) {
        this.criminalName = newVal;
      }
    }
  },
  mounted(){
    this.criminalName = this.criminalsName; 
  } 
};
</script>
<style>
body,
h1 {
  margin: 0;
  padding: 0;
}

body {
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica,
  Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
}

.header {
  display: flex;
  align-items: center;
  min-height: 50px;
  padding: 0.5rem 1rem;
  background-image: linear-gradient(to right, #4dba87, #2f9088);
  color: #fff;
  margin-bottom: 1rem;
}

.header a {
  color: #fff;
  text-decoration: none;
}

.header-title {
  font-size: 1.2rem;
  font-weight: normal;
}

.header-title::after {
  content: " ▸ ";
  padding: 0 0.5rem;
}

.header-subtitle {
  font-size: 1.2rem;
}

.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 1rem;
}

.search-panel {
  display: flex;
}

.search-panel__filters {
  flex: 1;
}

.search-panel__results {
  flex: 3;
}

.searchbox {
  margin-bottom: 2rem;
}

.pagination {
  margin: 2rem auto;
  text-align: center;
}

img {
  max-width: 100%;
}
em { 
  @apply .bg-blue .p-1 .text-white ; 
}

.ais-SearchBox-input {
  @apply p-4 mr-4 h-10 w-full rounded-sm font-basic mt-2 mb-4 w-full;
}
.mySearchBox {


}

.mySearchBoxForm { 

}

.mySearchBoxInput {
  @apply p-4 mr-4 h-10  rounded-sm font-basic mt-2 mb-4 w-1/2;
}

.ais-Hits-item { width: 100%; }
.ais-InstantSearch { @apply .w-full }

</style>
```

I want 2 show the `criminal-search` component, a search box everytime I click the 
> `Show search by Name` button
 & hide the searchbox everytime I selected one in two option in the option box and show the `Show search by name button` & reset the previous input i put there.. ! 
 