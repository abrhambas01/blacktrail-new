<user-filters inline-template>	
	<form @submit.prevent="startSearch">
		<div class="bg-white mb-4 w-full mt-4 px-4 py-4 rounded-sm">
			<h3 class="font-basic text-2xl mt-2 mb-4">Search for Criminals Below.</h3>
			<div class="flex">	
				<label class="mt-6 text-md font-bold mr-24" for="sortBy">Sort By</label>
				<label class="mt-6 text-md font-bold ml-16" for="country">Country</label>
			</div>
			
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


			<p class="font-bold mb-2 text-md" v-show="criminalName && !sortBy && !country">
				Or Search by Name
			</p>

			<div class="mt-4 flex" v-show="criminalName && !sortBy && !country">
				<criminal-search ref="criminalSearchComponent" :criminalsname.sync="criminalsName"></criminal-search>	
			</div>

			<div class="flex text-center mt-8">
				<button @click="startSearch" class="bg-blue p-2 h-10 mt-2 w-3/5 text-white hover:bg-black flex mr-2">
					<svg xmlns="http://www.w3.org/2000/svg" class="text-center fill-current text-white h-4 w-6 mt-8" viewBox="0 0 20 20"><path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"/>
					</svg>
					<div class="text-center flex">
						<p class="ml-4 font-bold text-center">Start Searching</p>
					</div>
				</button>	
			</div>

			<div class="flex text-center" style="margin-top:3px;" v-show="criminalName && sortBy && country">
				<button @click="showSearchByName" type="submit" class="bg-blue p-2 h-10 mt-2 w-3/5 text-white hover:bg-black flex">
					<svg class="text-center fill-current text-white h-4 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M528 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h480c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zm0 400H303.2c.9-4.5.8 3.6.8-22.4 0-31.8-30.1-57.6-67.2-57.6-10.8 0-18.7 8-44.8 8-26.9 0-33.4-8-44.8-8-37.1 0-67.2 25.8-67.2 57.6 0 26-.2 17.9.8 22.4H48V144h480v288zm-168-80h112c4.4 0 8-3.6 8-8v-16c0-4.4-3.6-8-8-8H360c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8zm0-64h112c4.4 0 8-3.6 8-8v-16c0-4.4-3.6-8-8-8H360c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8zm0-64h112c4.4 0 8-3.6 8-8v-16c0-4.4-3.6-8-8-8H360c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8zm-168 96c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64z"/>
					</svg>
				</svg>
				<div class="text-center flex">
					<p class="ml-4 font-bold text-center">Show Search By Name</p>
				</div>
			</button>
		</div>
	</div>
</form>

</user-filters>
