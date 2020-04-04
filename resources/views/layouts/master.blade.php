<!DOCTYPE html> 
<html lang="{{ app()->getLocale() }}"> 
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}"> 
  <meta name="viewport" content="width=SITE_MIN_WIDTH, initial-scale=1, maximum-scale=1"> 
  <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title> 
  <link rel="icon" href="{{  asset('assets/images/group_avatar.jpg') }}" type="image/x-icon">
  <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">
  <link href="{{ asset('css/app.css')}}" rel="stylesheet" data-turbolinks-track="true"> 
  <link rel="stylesheet" href="{{ asset('css/animate.css') }}">   
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
  <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
  <script>  
    window.App = @include("partials.stubs.global-vars") 
  </script>      
  <style>
    .ais-Hits-item{ width: 100%; }
  </style>
  @yield('styles') 
</head>
<body class="h-full bg-grey-lighter-2 tracking-normal font-basic"> 
  <div id="app">
    <div class="m-auto">
      @if(session()->has('activated_flash'))
     <flash-message inline-template>      
      <div v-show="messageIsAvailable" id="messageSuccess" class="bg-green-theme p-4 w-full flex justify-between flashMessage">
        <p class="text-white font-semibold text-md font-sans">{{ trans('flash.logout_success') }}</p>
        <svg @click="hideAlert()" class="fill-current text-white h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 8.586L2.929 1.515 1.515 2.929 8.586 10l-7.071 7.071 1.414 1.414L10 11.414l7.071 7.071 1.414-1.414L11.414 10l7.071-7.071-1.414-1.414L10 8.586z"/>
        </svg>
      </div>
    </flash-message>
    @endif 

      @if(session()->has('flash'))
        <flash-message inline-template>      
          <div v-show="messageIsAvailable" id="messageSuccess" class="bg-green-theme p-4 w-full flex justify-between flashMessage">
            <p class="text-white font-semibold text-md font-sans">{{ trans('flash.logout_success') }}</p>
            <svg @click="hideAlert()" class="fill-current text-white h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 8.586L2.929 1.515 1.515 2.929 8.586 10l-7.071 7.071 1.414 1.414L10 11.414l7.071 7.071 1.414-1.414L11.414 10l7.071-7.071-1.414-1.414L10 8.586z"/>
            </svg>
          </div>
        </flash-message>
      @endif 

      @if(session()->has('confirmation_success_message'))
        <flash-message inline-template>      
          <div v-show="messageIsAvailable" id="confirmationSuccess" class="flashMessage bg-green-theme p-4 w-full flex justify-between ">
            <p class="text-white font-semibold text-md font-sans">{{ trans('flash.confirmation_success') }}
            </p>
            <svg @click="hideAlert()" class="fill-current text-white h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 8.586L2.929 1.515 1.515 2.929 8.586 10l-7.071 7.071 1.414 1.414L10 11.414l7.071 7.071 1.414-1.414L11.414 10l7.071-7.071-1.414-1.414L10 8.586z"/>
            </svg>
          </div>
        </flash-message>
      @endif

      @if(session()->has('flash-message'))
      {{-- this piece of code doesn't work  --}}
      {{-- <flash-message message="{{ session('flash-message' ) }}"></flash-message> --}}

      <flash-message inline-template>      
        <div v-show="messageIsAvailable" id="logoutSuccess" class="bg-green-theme p-4 w-full flex justify-between flashMessage">
          <p class="text-white font-semibold text-md font-sans">{{ session('flash-message' ) }}
          </p>
          <svg @click="hideAlert()" class="fill-current text-white h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 8.586L2.929 1.515 1.515 2.929 8.586 10l-7.071 7.071 1.414 1.414L10 11.414l7.071 7.071 1.414-1.414L11.414 10l7.071-7.071-1.414-1.414L10 8.586z"/>
          </svg>
        </div>
      </flash-message>
      @endif

      <app-header inline-template>
        @include('partials.main-header')
      </app-header>

      <main class="flex m-auto">
        @if (auth()->check())            
          @include('partials.sidebar')
        @endif        
          @yield("content")
      </main>
    </div>
  </div>

  <script data-turbolinks-suppress-warning src="{{ mix('js/app.js') }}"></script>
  <script data-turbolinks-suppress-warning src="{{ asset('js/jquery.min.js') }}"></script>
  <script>
   $(document).ready(function(){
     $(".flashMessage").hide().slideDown().delay(3000).fadeOut();
     console.log("ok");
   });
 </script>
 @yield("scripts")
</body>
</html> 