@extends('layouts.master')	

@section('title', 'Be a bounty hunter now, Earn money by finding wanted criminals in your area')

@section('content')

<div id="search-content" class="z-50 w-full text text-gray-600 rounded-lg overflow-y-auto bg-white shadow-lg" style="max-height: 500px;">
<div id="searchresults" class="h-auto max-w-3xl mx-auto">
	<span class="p-4 border-b flex justify-between items-center group hover:bg-teal-100">
		<a class="block flex-1 no-underline" href="https://angulartailwind.com">
			<p class="font-bold text-sm text-indigo-600 hover:text-indigo-500">
				<span class="mr-2 text-teal-500">Component</span>Angular Tailwind
				<span class="text-indigo-300 font-normal">
					by Angular Tailwind
					<svg class="inline-block pl-2  h-4 fill-current text-brand" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
						<path d="M9.26 13a2 2 0 0 1 .01-2.01A3 3 0 0 0 9 5H5a3 3 0 0 0 0 6h.08a6.06 6.06 0 0 0 0 2H5A5 5 0 0 1 5 3h4a5 5 0 0 1 .26 10zm1.48-6a2 2 0 0 1-.01 2.01A3 3 0 0 0 11 15h4a3 3 0 0 0 0-6h-.08a6.06 6.06 0 0 0 0-2H15a5 5 0 0 1 0 10h-4a5 5 0 0 1-.26-10z"></path>
					</svg>
				</span>
			</p>
			<p class="hidden md:block text-xs text-teal-600">https://angulartailwind.com</p>
			<p class="text-sm py-1">Reusable and customisable components built with Angular and Tailwind CSS</p>
		</a>
		<a href="https://angulartailwind.com"><img class="hidden md:block h-16 border-none" src="https://www.tailwindtoolbox.com/components/angular-tailwind.png"></a>
	</span>
	<span class="p-4 border-b flex justify-between items-center group hover:bg-teal-100">
		<a class="block flex-1 no-underline" href="https://github.com/Oddstronaut/gatsby-starter-tailwind">
			<p class="font-bold text-sm text-indigo-600 hover:text-indigo-500">
				<span class="mr-2 text-teal-500">Template</span>Gatsby Starter Template
				<span class="text-indigo-300 font-normal">
					by Taylor Bryant / @Oddstronaut
					<svg class="inline-block pl-2  h-4 fill-current text-brand" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
						<path d="M9.26 13a2 2 0 0 1 .01-2.01A3 3 0 0 0 9 5H5a3 3 0 0 0 0 6h.08a6.06 6.06 0 0 0 0 2H5A5 5 0 0 1 5 3h4a5 5 0 0 1 .26 10zm1.48-6a2 2 0 0 1-.01 2.01A3 3 0 0 0 11 15h4a3 3 0 0 0 0-6h-.08a6.06 6.06 0 0 0 0-2H15a5 5 0 0 1 0 10h-4a5 5 0 0 1-.26-10z"></path>
					</svg>
				</span>
			</p>
			<p class="hidden md:block text-xs text-teal-600">https://github.com/Oddstronaut/gatsby-starter-tailwind</p>
			<p class="text-sm py-1">A Gatsby.js starter project template using Tailwind CSS</p>
		</a>
		<a href="https://github.com/Oddstronaut/gatsby-starter-tailwind"><img class="hidden md:block h-16 border-none" src="https://www.tailwindtoolbox.com/templates/gatsby-tailwind.png"></a>
	</span>
	<span class="p-4 border-b flex justify-between items-center group hover:bg-teal-100">
		<a class="block flex-1 no-underline" href="https://github.com/Oddstronaut/tailwind-next">
			<p class="font-bold text-sm text-indigo-600 hover:text-indigo-500">
				<span class="mr-2 text-teal-500">Template</span>Gatsby Starter Template
				<span class="text-indigo-300 font-normal">
					by Taylor Bryant / @Oddstronaut
					<svg class="inline-block pl-2  h-4 fill-current text-brand" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
						<path d="M9.26 13a2 2 0 0 1 .01-2.01A3 3 0 0 0 9 5H5a3 3 0 0 0 0 6h.08a6.06 6.06 0 0 0 0 2H5A5 5 0 0 1 5 3h4a5 5 0 0 1 .26 10zm1.48-6a2 2 0 0 1-.01 2.01A3 3 0 0 0 11 15h4a3 3 0 0 0 0-6h-.08a6.06 6.06 0 0 0 0-2H15a5 5 0 0 1 0 10h-4a5 5 0 0 1-.26-10z"></path>
					</svg>
				</span>
			</p>
			<p class="hidden md:block text-xs text-teal-600">https://github.com/Oddstronaut/tailwind-next</p>
			<p class="text-sm py-1">A Next.js starter template using Tailwind CSS</p>
		</a>
		<a href="https://github.com/Oddstronaut/tailwind-next"><img class="hidden md:block h-16 border-none" src="https://www.tailwindtoolbox.com/templates/nextjs-tailwind.png"></a>
	</span>
	<span class="p-4 border-b flex justify-between items-center group hover:bg-teal-100">
		<a class="block flex-1 no-underline" href="https://www.github.com/tailwindcss/custom-forms">
			<p class="font-bold text-sm text-indigo-600 hover:text-indigo-500">
				<span class="mr-2 text-teal-500">Component</span>Custom Forms
				<span class="text-indigo-300 font-normal">
					by Adam Wathan
					<svg class="inline-block pl-2  h-4 fill-current text-brand" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
						<path d="M9.26 13a2 2 0 0 1 .01-2.01A3 3 0 0 0 9 5H5a3 3 0 0 0 0 6h.08a6.06 6.06 0 0 0 0 2H5A5 5 0 0 1 5 3h4a5 5 0 0 1 .26 10zm1.48-6a2 2 0 0 1-.01 2.01A3 3 0 0 0 11 15h4a3 3 0 0 0 0-6h-.08a6.06 6.06 0 0 0 0-2H15a5 5 0 0 1 0 10h-4a5 5 0 0 1-.26-10z"></path>
					</svg>
				</span>
			</p>
			<p class="hidden md:block text-xs text-teal-600">https://www.github.com/tailwindcss/custom-forms</p>
			<p class="text-sm py-1">A better base for styling form elements with Tailwind CSS</p>
		</a>
		<a href="https://www.github.com/tailwindcss/custom-forms"><img class="hidden md:block h-16 border-none" src="https://www.tailwindtoolbox.com/components/custom-forms.png"></a>
	</span>
</div>
<!-- No search results message-->
<div id="nosearchresults" class="hidden flex pb-6 px-6 bg-white">
	<svg class="fill-current text-indigo-600 h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
		<path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"></path>
	</svg>
	<span class="ml-4 font-bold"> Oops, no search results!!!1</span>
</div>
<!-- / No search results -->
@endsection



