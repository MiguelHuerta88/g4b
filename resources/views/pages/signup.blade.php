@extends('layouts.master')

@section('title', 'Join the many members')

@section('content')
	<div class='top-header'>
		<h2>
		Signup to Gigs for Bands
		</h2>
		<p>
			Select your appropriate membership style
		</p>
	</div>

	<div class='form col-lg-10'>
		<ul class='nav nav-tabs col-lg-5' id='form-tabs'>
			<li class='nav-item' id='artist'>
				<a class='nav-link active' href="#">Artist</a>
			</li>

			<li class='nav-item' id='manager'>
				<a class='nav-link' href="#">Manager</a>
			</li>

			<li class='nav-item' id='coordinator'>
				<a class='nav-link' href="#">Event Coordinator</a>
			</li>
		</ul>
		<div class='form-group'>
			{!! Form::open(['url' => route('signup.post'), 'id' => 'signupForm']) !!}
				@include('forms.signup-common')
				<div class='active' id='artist-form'>
					@include('forms.signup-artist', ['genres' => $genres])
				</div>

				<div class='hide' id='manager-form'>
					@include('forms.signup-manager')
				</div>

				<div class='hide' id='coordinator-form'>
					events
				</div>
			{!! Form::close() !!}
		</div>
	</div>
@endsection