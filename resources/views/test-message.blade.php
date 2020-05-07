@extends('layouts.master')
@section('title', 'Conversation')
@section('content')

{{-- :messages="{{ $messages }}" :criminal="{{ $criminal }}" :respondent="{{ $criminal[0]->respondent }}" --}}

<test-message :respondent="{{ $criminal[0]->respondent }}" :id="{{ auth()->id() }}" :user="{{ auth()->user() }}">
</test-message>

@endsection