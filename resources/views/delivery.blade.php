@extends('layouts.app')

@section('content')

<div class="card">
	<deliveries-list :deliveries="{{ $deliveries }}"></deliveries-list>
</div>		

@endsection
