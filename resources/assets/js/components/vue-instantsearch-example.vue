<section>
    <ais-index app-id="{{ config('scout.algolia.id') }}"
               api-key="{{ config('scout.algolia.search') }}"
               index-name="posts_index">

        <div class="relative">
            <ais-input placeholder="Search for tutorials..."></ais-input>
            <ais-results>
                <template scope="{ result }">
                    <div>
                        <h4><a :href="result.slug">@{{ result.title }}</a></h4>
                        <p><a :href="result.slug">@{{ result.excerpt }}</a></p>
                    </div>
                </template>
                <ais-powered-by slot="footer" />
            </ais-results>
        </div>
    </ais-index>
</section>