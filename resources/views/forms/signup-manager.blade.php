@extends('layouts.master')

@section('title', 'Manager Form')

@section('content')

	<div class='top-header'>
		<h2>
			Manager
		</h2>
	</div>
	<div class='form col-lg-10'>
		<div class='form-group'>
			{!! Form::open(['url' => secure_url('/signup/manager'), 'id' => 'signupForm']) !!}
			@include('forms.signup-common')

			{{-- user managed here --}}
			<div class='form-group row'>
				<label class="col-lg-3 col-form-label">Do you manage any artist</label>
				<div class='col-sm-6'>
					<button type="button" class="btn btn-secondary" id='btn-manage'>Yes</button>
				</div>
			</div>

			<div class='div_manged-users hide'>
				<div class='form-group row'>
					<label class='col-lg-3 col-form-label'>Enter artist/band name</label>
					<div class='col-lg-4'>
						<input type='text' class='form-control ui-widget' id='artist-autocomplete'/>
					</div>
				</div>

				<div class='selected-users'>

				</div>
			</div>
			{{-- manager have user_type_id = 2 --}}
			<input type='hidden' name='user_type_id' value="2"/>
			<button type="submit" class="btn btn-primary">Create</button>
		</div>
	</div>
@endsection
