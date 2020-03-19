<template>
    <section class="search-results" v-show="results.length > 0">
        <div v-for="result in results" class="search-result">
            <a :href="'/' + result.slug">{{ result.title }}</a>
        </div>
    </section>
</template>

<style lang="scss">
.search-results {
    position: absolute;
    top: 0;
    background: #FFF;
    border: 1px solid #dae4e9;
    width: 100%;
    max-height: 20rem;
    overflow-y: scroll;
    > div {
        margin-bottom: 0.5rem;
        text-align: left;
        &:hover {
            background-color: #F1F5F8;
        }
        a {
            display: block;
            padding: 1rem;
        }
    }
}
</style>

<script>
  import axios from 'axios'
    export default {
      props: ['query'],
      data() {
        return {
          results: []
        };
      },
      watch: {
        query () {
          this.getSearchResults();
        }
      },
      methods: {
        getSearchResults () {
          if(this.query === '' && this.query.length < 3) {
            this.results = []
            return false
          }
          axios.get( '/search?q=' + this.query )
            .then(response => {
              this.results = response.data.data
            });
        }
      }
    }
</script>