@extends('layouts.master')

@section('title', 'Report the Location to this criminal')

@section('content')
<div id="chat-app">
	<!-- <Conversation :contact="selectedContact" :messages="messages"/> -->
	<div class="h-full -mt-16 h-screen overflow-hidden flex items-center justify-center" style="background: #edf2f7;">
		<div class="w-4/5">
			<div class="bg-white shadow">
				<div class="flex h-full">
					<div class="flex flex-wrap items-start content-start w-1/3 border-r border-grey-lighter h-full">
						<div class="flex flex-shrink justify-between self-start items-center w-full px-2 py-4">
							<input type="text" class="flex-auto appearance-none bg-grey-lighter text-sm rounded p-3" placeholder="Search">
	</div>							<!-- <message-inbox :contact="respondent" :messages="messages">
	</message-inbox> -->
	<section id="inbox" style="overflow-y:scroll;height:300px;">
		<ul class="flex flex-col w-full list-reset select-none">
			<!-- v-for="conversation in conversations" :class="{ 'bg-blue' : 'isActive' }"  -->
			<li class="bg-blue text-white flex flex-no-wrap items-center text-black cursor-pointer p-3">
				<img class="flex justify-center items-center flex-no-shrink w-12 h-12 bg-grey rounded-full font-semibold text-xl text-white mr-3" :src="userAvatar" alt="">
				<div class="flex-1 min-w-0">
					<div class="flex justify-between mb-1">
						<h2 class="font-semibold text-sm">
							<i class="fas fa-users fa-fw"></i>Highlighted Respondent's Name
						</h2>
						<span class="text-sm">
							<i class="fas fa-check fa-fw"></i>
							10:00
						</span>
					</div>
					<div class="text-sm truncate">
						<span>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro debitis blanditiis magnam hic, quisquam illum repellat quasi distinctio vero voluptatum.
						</span>
					</div>
				</div>
			</li>	

			<li class="bg-white text-black flex flex-no-wrap items-center text-black cursor-pointer p-3">
				<img class="flex justify-center items-center flex-no-shrink w-12 h-12 bg-grey rounded-full font-semibold text-xl text-white mr-3" :src="userAvatar" alt="">
				<div class="flex-1 min-w-0">
					<div class="flex justify-between mb-1">
						<h2 class="font-semibold text-sm">
							<i class="fas fa-users fa-fw"></i> Respondent's Name
						</h2>
						<span class="text-sm">
							<i class="fas fa-check fa-fw"></i>
							10:00
						</span>
					</div>
					<div class="text-sm truncate">
						<span>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro debitis blanditiis magnam hic, quisquam illum repellat quasi distinctio vero voluptatum.
						</span>
					</div>
				</div>
			</li>
		</ul>
	</section>
</div>
<div class="content-start flex flex-col flex-wrap items-start w-2/3"
style=" height: 121%; ">

<!-- the header of the app that contains the respondent name and status -->
<chat-header :user="user" :respondent="respondent"></chat-header>
<div class="flex flex-auto bg-no-repeat bg-center bg-cover overflow-y-auto" style="background-image: url(https://raw.githubusercontent.com/telegramdesktop/tdesktop/dev/Telegram/Resources/art/bg.jpg)">
	<div class="p-4">
		<div class="bg-green-lightest rounded-lg text-sm p-3 mb-1">
			<p>
				Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam in, aliquid cum ut similique, reiciendis provident hic mollitia totam facere aspernatur numquam consequatur sunt. Facere aliquam sapiente fugit eveniet totam!
			</p>
		</div>
		<div class="bg-green-lightest rounded-lg text-sm p-3 mb-3">
			<p>
				Lalala...
			</p>
		</div>

		<div class="bg-white rounded-lg text-sm p-3 mb-1">
			<a href="https://www.youtube.com" class="no-underline hover:underline text-blue" target="_blank">
				https://www.youtube.com
			</a>
			<div class="flex items-center mt-2">
				<blockquote class="border-l-2 border-blue pl-2">
					<p class="font-medium text-blue">Youtube</p>
					<p>
						Enjoy the videos and music you love, upload original content, and share it all with friends, family, and the world on YouTube.
					</p>
				</blockquote>
				<a href="https://www.youtube.com" target="_blank" class="flex-auto">
					<!-- <img src="{{ asset('assets/images/avatar.jpg') }}" alt=""> -->
				</a>
			</div>
		</div>
	</div>
</div>
<div class="bg-white flex flex-wrap self-end items-center w-full text-xl">
	<div class="p-2">
		<a href="#" class="no-underline text-grey hover:text-grey-dark">
			<i class="fas fa-paperclip"></i>
		</a>
	</div>
	<input type="text" class="flex-auto appearance-none text-base p-4 border-gray-lighter border-2" placeholder="Write a message...">
	<div class="p-2">
		<a href="#" class="no-underline text-grey hover:text-grey-dark px-2">
			<i class="far fa-square"></i>
		</a>
		<a href="#" class="no-underline text-grey hover:text-grey-dark px-2">
			<i class="far fa-smile"></i>
		</a>
		<a href="#" class="no-underline text-grey hover:text-grey-dark px-2">
			<i class="fas fa-microphone"></i>
		</a>
	</div>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- <ContactsList :contacts="contacts"/> -->
</div>
@endsection
