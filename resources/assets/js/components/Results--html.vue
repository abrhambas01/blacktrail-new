<template>
    <section class="search-results" v-show="results.length > 0">
        <div v-for="result in results" class="search-result">
            <a :href="'/' + result.slug">{{ result.title }}</a>
        </div>
    </section>
</template>
<script>
	
</script>
<style>
	
</style>