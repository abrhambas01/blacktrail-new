<template>
    <section class="search">
        <search-box v-model="query" placeholder="Search for a tutorial" :show-results.sync="showResults"></search-box>
        <div class="relative" v-show="showResults">
            <search-results :query="query"></search-results>
        </div>
    </section>
</template>

<script>
    import SearchBox from './SearchBox'
    import SearchResults from './Results'
    export default {
      data() {
        return {
          query: '',
          showResults: true
        };
      },
      components: {
        SearchBox,
        SearchResults
      }
    }
</script>