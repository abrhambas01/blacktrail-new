@extends('layouts.master')

@section('title', 'Conversation')

@section('content')
	<chat-app :respondent="{{ $criminal[0]->respondent }}" :user="{{ auth()->user() }}" ></chat-app>
@endsection