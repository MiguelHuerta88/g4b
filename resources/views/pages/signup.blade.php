@extends('layouts.master')

@section('title', 'Join the many members')

@section('content')
	<div class='top-header'>
		<h2>
		Signup to Gigs for Bands
		</h2>
		<!--<p>
			Select your appropriate membership style
		</p>-->
	</div>

	<div class='form col-lg-10'>
		<div class='form-group'>
			{!! Form::open(['url' => secure_url('/signup'), 'id' => 'signupForm']) !!}
				@include('forms.signup-common')

				<div class='form-group row'>
					<label class='col-sm-10 col-form-label'>Please select profile type</label>
					<div class='col-sm-10 form-types'>
						<div class='btn btn-outline-dark' id='artist-form' data-form-id='1'>Artist</div>
						<div class='btn btn-outline-dark' id='manager-form' data-form-id='2'>Manager</div>
						<div class='btn btn-outline-dark' id='event-form' data-form-id='3'>Event Coordinator</div>
					</div>		
				</div>

				<div class='form-addition'>

				</div>
			{!! Form::close() !!}
		</div>
	</div>
@endsection