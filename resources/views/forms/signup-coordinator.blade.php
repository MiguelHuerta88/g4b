@extends('layouts.master')

@section('title', 'Artist Form')

@section('content')

	<div class='top-header'>
		<h2>
			Coodrinator
		</h2>
	</div>
	<div class='form col-lg-10'>
		<div class='form-group'>
			{!! Form::open(['url' => secure_url('/signup/coordinator'), 'id' => 'signupForm']) !!}
			@include('forms.signup-common')

			{{-- coordinators have user_type_id = 1 --}}
			<input type='hidden' name='user_type_id' value="3"/>
			<button type="submit" class="btn btn-primary">Create</button>
			{!! Form::close() !!}
		</div>
	</div>
@endsection