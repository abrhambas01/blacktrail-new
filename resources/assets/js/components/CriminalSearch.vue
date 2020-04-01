<template>
  <ais-instant-search
  :search-client="searchClient"
  index-name="criminals"
  > 
  <ais-search-box 
  v-model="criminalsName"
  class="bg-white border p-2 border-gray mr-4 h-10 w-full rounded-sm font-basic mt-2 mb-4 w-full" 
  placeholder="Search criminals...">
</ais-search-box>
<ais-configure 
:hits-per-page.camel="3"
/>
<ais-hits v-show="this.criminalsName.length > 0 " :escapeHTML="false">
  <template
  slot="item"
  slot-scope="{ item }"
  >
  <div id="search-content" class="z-50 w-full text text-gray-600 rounded-lg overflow-y-auto bg-white shadow-lg" style="max-height: 500px;">
    <div id="searchresults" class="h-auto max-w-3xl mx-auto">
      <span class="p-4 border-b flex justify-between items-center group hover:bg-teal-100">
        <a class="block flex-1 no-underline" :href="criminalProfile">
          <p class="font-bold text-sm text-indigo-600 hover:text-indigo-500">
            <ais-highlight
            :hit="item"
            attribute="full_name"
            highlighted-tag-name="mark"
            />

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
        <a href="https://angulartailwind.com">
          <img class="hidden md:block h-16 border-none" src="https://www.tailwindtoolbox.com/components/angular-tailwind.png"></a>
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

export default {
  data() {
    return {
      criminalsName : "",
      limitResult : 3, 
      itemData : null , 
      searchClient: algoliasearch(
        process.env.MIX_ALGOLIA_APP_ID,
        process.env.MIX_ALGOLIA_SEARCH
        ),
    };
  },

  computed : { 
    criminalProfile(){
      return  app + "/criminals/3";
    },

    avatarPhoto(){
      /*if (this.criminals.photo){
      return `${window.App.assetStorageCriminalsPath}/${this.criminals.photo}`;
    }*/
    return app + '/storage/public/default_avatar.jpg';
  },
  created(){
    console.log('itemData',itemData);
  }

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


.ais-Hits-item { width: 100%; }
</style>