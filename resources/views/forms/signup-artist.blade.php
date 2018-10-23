@extends('layouts.master')

@section('title', 'Artist Form')

@section('content')

	<div class='top-header'>
		<h2>
			Artist
		</h2>
	</div>
	<div class='form col-lg-10'>
		<div class='form-group'>
			{!! Form::open(['url' => secure_url('/signup/artist'), 'id' => 'signupForm']) !!}
			@include('forms.signup-common')

			<div class='form-group row'>
				<label for='artist-name' class="col-sm-2 col-form-label">Artist Name*</label>
				<div class='col-sm-6' id='artist_name'>
					<input class='form-control @if($errors->has('artist_name'))error @endif' type='text' name='artist_name' placeholder="Enter Artist Name" value="{{ old('artist_name') }}"/>
					@if($errors->has('artist_name'))
						<div class="error-message">{{ $errors->first('artist_name') }}</div>
					@endif
				</div>
			</div>

			<div class='form-group row'>
				<label for='hometown' class='col-sm-2 col-form-label'>Hometown</label>
				<div class='col col-sm-3'>
					<input type='text' class='form-control @if($errors->has('hometown'))error @endif' id='hometown' placeholder="Enter hometown" name='hometown' value="{{ old('hometown') }}">
					@if($errors->has('hometown'))
						<div class="error-message">{{ $errors->first('hometown') }}</div>
					@endif
				</div>
				<label for='state' class='col-sm-1 col-form-label'>State</label>
				<div class='col col-sm-2'>
					<input type='text' class='form-control @if($errors->has('state'))error @endif' id='state' placeholder="Enter state" name='state' value="{{ old('state') }}">
					@if($errors->has('state'))
						<div class="error-message">{{ $errors->first('state') }}</div>
					@endif
				</div>
			</div>

			@if(isset($genres))
				<div class='form-group row'>
					<label for='genre_id' class='col-sm-2 col-form-label'>Genre*</label>
					<div class='col-sm-6'>
						<select class="form-control @if($errors->has('genre_id'))error @endif" name='genre_id' id='genre-select'>
							@foreach($genres as $id => $genre)
								<option value="{{ $id }}">{{ $genre->name }}</option>
							@endforeach
						</select>
						@if($errors->has('genre_id'))
							<div class="error-message">{{ $errors->first('genre_id') }}</div>
						@endif
					</div>
				</div>
				<div class='form-group row hide' id='other'>
					<label for='other-input' class="col-sm-2 col-form-label">Other</label>
					<div class='col-sm-6' id='other-input'>
						<input class='form-control @if($errors->has('other'))error @endif' type='text' name='other' placeholder="Enter other genre" value="{{ old('other') }}" />
						@if($errors->has('other'))
							<div class="error-message">{{ $errors->first('other') }}</div>
						@endif
					</div>
				</div>
			@endif

			{{-- artist have user_type_id = 1 --}}
			<input type='hidden' name='user_type_id' value="1"/>
			<button type="submit" class="btn btn-primary">Create</button>
			{!! Form::close() !!}
		</div>
	</div>
@endsection