<template>
  <ais-instant-search
  :search-client="searchClient"
  index-name="criminals"
  >
  <ais-search-box v-model="criminalsName" class="bg-grey-lightest border p-2 border-gray mr-4 h-10 w-full rounded-sm font-basic mt-2 mb-4 w-full" placeholder="Search criminals..."></ais-search-box>
  <ais-hits v-show="this.criminalsName.length > 0 ">
   <template
   slot="item"
   slot-scope="{ item }"
   >
   <div id="searchresults" class="h-auto max-w-3xl mx-auto w-full">
    <span class="p-4 border-b flex justify-between items-center group hover:bg-teal-100">
      <a class="block flex-1 no-underline" href="#">
        <ais-highlight
        :hit="item"
        attribute="full_name"
        />
        <p class="font-bold text-sm text-indigo-600 hover:text-indigo-500">
          <span class="mr-2 text-teal-500">Alias</span>
          <ais-highlight
          :hit="item"
          attribute="alias"
          /> 
          <span class="mr-2 text-teal-500">Contact Number</span>
          <div>
            <ais-refinement-list :limit="5"></ais-refinement-list>
          </div>
          <ais-highlight
          :hit="item"
          attribute="contact_number"
          />
        </p>
      </ais-highlight>
    </a>
    <a href="#">
      <img class="hidden md:block h-16 border-none" src="https://www.tailwindtoolbox.com/components/searchy.gif">
    </a>
  </span>   
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
      searchClient: algoliasearch(
        process.env.MIX_ALGOLIA_APP_ID,
        process.env.MIX_ALGOLIA_SEARCH
        ),
    };
  }
};
</script>