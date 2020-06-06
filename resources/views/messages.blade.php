@extends('layouts.master')

@section('title', 'Conversation')

@section('content')

<chat-app :id="{{ auth()->id() }}" :messages="{{ $messages }}" :criminal="{{ $criminal }}" :respondent="{{ $criminal[0]->respondent }}" :user="{{ auth()->user() }}">
</chat-app>

 @endsection