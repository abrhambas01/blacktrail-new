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