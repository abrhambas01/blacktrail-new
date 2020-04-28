@extends('layouts.master')

@section('title', 'Criminal Profile')

@section('content')

@php
use Carbon\Carbon;
@endphp

<criminal-profile inline-template>
	<div class="init-row w-full ">
		<section class="item ml-2 font-basic" id="pageView">
			<div class="shadow-md bg-white p-2 mt-4">
				<div class="">
					<div class="ml-4">	
						<div class="flex inline-block">
							<p class="w-full font-basic ml-2 tracking-normal text-2xl mb-4 mt-4 font-normal text-black mr-2">
								Criminal Profile of {{ $criminal->full_name }} 
							</p>
							<div class="bg-green-dark rounded-full h-8 w-8 flex items-center justify-center text-white">1
							</div>
						</div>

							<div class="text-center">
								<div id="avatar" class="inline-block mb-6 w-full">
									@if(\Storage::disk('public')->exists('criminals/'.$criminal->photo))
									<img class="h-36 w-50 border-orange border-2" src="{{ asset('storage/criminals/' . $criminal->photo)  }}">

									@else		

									<img class="h-36 w-45 rounded-full border-orange border-2" 
									src="{{ asset('/assets/images/default_avatar.jpg') }}">
									{{-- 	<img src="{{ asset('storage/images/'.'default_avatar.jpg') }}" class="h-50 w-50 rounded-full border-orange border-2"> --}}
									@endif






									<p class="font-normal font-display mt-2 text-black text-3xl">{{ $criminal->full_name }} aka <em class="font-bold"> {{  $criminal->alias }}</em></p>
									<p class="font-bold mt-2 text-black text-2xl">Bounty:</p>
									@if ($criminal->profile()->exists())
									<p class="font-bold mt-2 text-orange text-2xl">{{  is_null($criminal->profile->bounty) ? 'Bounty not added yet' : $criminal->profile->bounty ." " .$criminal->profile->currency}}</p>
									@endif

									@if(auth()->user()->id === $criminal->posted_by)

									<button class="hover:bg-blue-darker hover:text-white bg-blue rounded-full w-1/2 mt-4 h-12 mb-4 ">
										<a href="{{ route('admin.criminals.edit',$criminal->id) }}" class="text-white hover:text-blue-lighter">
											Edit Profile
										</a>
									</button>

									@endif

									@if(!auth()->user()->isAdmin())
									<button class="hover:bg-blue-darker hover:text-white bg-blue rounded-full w-1/2 mt-4 h-12 ">
										<a class="text-white hover:text-blue-lighter" href="{{ route('messages.send',[$criminal->respondent->username, $criminal->id]) }}">
											Report Location
										</a>
									</button>
									@endif
								</div>
							</div>

							<div class="init-row w-full">
								<div class="item w-1/2" id="basic-profile-section">
									<div class="row mb-3">
										<p class="text-md text-normal mr-4">First Name : <em class="font-bold roman">{{ $criminal->first_name }}</em></p>
									</div>

									<div class="row mb-3">
										<p class="text-md text-normal mr-4">Middle Name : <em class="font-bold roman">{{ $criminal->middle_name }}</em></p>
									</div>

									<div class="row mb-3">
										<p class="text-md text-normal mr-4">Last Name : <em class="font-bold roman">{{ $criminal->last_name }}</em></p>
									</div>

									<div class="row mb-3">
										<p class="text-md text-normal mr-4">Status : <em class="font-bold roman">{{  $criminal->status == 1 ? 'At Large' : 'Captured' }}</em></p>
									</div>

									@if ($criminal->profile()->exists())

									<div class="row mb-3">
										<p class="text-md text-normal mr-4">Age : <em class="font-bold roman">{{  $criminal->profile->age }}</em></p>
									</div>

									<div class="row mb-3">
										<p class="text-md text-normal mr-4">Country of Origin : <em class="font-bold roman">{{  $criminal->country->name }}</em></p>
									</div>

									<div class="row mb-3">
										<p class="text-md text-normal mr-4">Country Last seen : <em class="font-bold roman">{{  $criminal->profile->country_last_seen }}</em></p>
									</div>


									<div class="row mb-3">
										<p class="text-md text-normal mr-4">Last seen at : <em class="font-bold roman">{{  $criminal->profile->last_seen }}</em></p>
									</div>


									<div class="row mb-3">
										<p class="text-md text-normal mr-4">Birthdate : <em class="font-bold roman">
											{{ \Carbon\Carbon::parse($criminal->profile->birthdate)->format('d-m-Y i') }}
										</em>
									</p>
								</div>
							</div>

							<div class="item" id="crimes-section">
								<div class="row mb-3">
									<p class="text-md text-normal mr-4">Eye Color : <em class="font-bold roman">{{ ucwords($criminal->profile->eye_color) }}</em></p>
								</div>

								<div class="row mb-3">
									<p class="text-md text-normal mr-4">Weight	: <em class="font-bold roman">{{ ucwords($criminal->profile->weight_in_kilos) }}</em>
									</p>
								</div>
								<div class="row mb-3">
									<p class="text-md text-normal mr-4">Contact Number : <em class="font-bold roman">{{ $criminal->contact_number  }}</em></p>
								</div>

								<div class="row mb-3">
									<p class="text-md text-normal mr-4">Body Frame : <em class="font-bold roman">{{ ucwords($criminal->profile->body_frame ) }}</em></p>
								</div>

								<div class="row mb-3">
									<p class="text-md text-normal mr-4">Height:<em class="font-bold roman">{{ ucwords($criminal->profile->height_in_feet_and_inches) }}</em></p>
								</div>
								@else
							
								<div class="row mb-3">
									<h3>There was no profile listed for this criminal now.
									</h3>
								</div>

								@endif

								<div class="row mb-3">
									<p class="text-md text-normal mr-4">Respondent's Name <em class="font-bold roman">{{ ucwords($criminal->respondent->display_name) }}</em>
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="item col ml-2 font-basic h-full" id="pageView">
			<div class="shadow-md bg-white p-4 mt-4">
				<div class="">	
					<div class="ml-4">	
						<p class="font-basic ml-2 tracking-normal text-2xl mb-4 mt-4 font-normal text-black mr-2">
							Listed Crimes
						</p>

						<div class="text-center">
							<div id="avatar" class="inline-block mb-6 w-full" >
								<p class="font-normal font-display mt-2 text-black text-3xl"><em>Listed Crimes</em></p>
							</div>
						</div>

						<div class="init-row w-full">
							<div class="item w-1/2" id="basic-profile-section">
								@forelse ($criminal->crimes as $crime)
								<p class="font-normal text-md"><em class="font-bold text-xl roman">{{ $crime->criminal_offense }}</em> - {{  $crime->pivot->crime_description }}</p>
								@empty
								<p>No crimes were listed..</p>
								@endforelse
							</div>
						</div>
					</div>
				</div>
			</div>

			@if($criminal->profile()->exists())
			<div class="shadow-md bg-white p-4 mt-4">
				<div class="">	
					<div class="ml-4">	
						<div v-html="`{{ $criminal->profile->complete_description }}`" class="font-basic ml-2 tracking-normal  mb-4 mt-4 font-normal mr-2">
						</div>
					</div>
				</div>
			</div>
			@endif
		</section>
{{-- 
		<div class="flex">
			<p>Show the Crimes for a crimnal</p>
			<p>Also the photos</p>
		</div> --}}

	</div>
</criminal-profile>
@stop
