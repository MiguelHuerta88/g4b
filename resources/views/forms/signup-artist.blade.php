{!! Form::open(['url' => route('signup.post'), 'id' => 'signupForm']) !!}
	@include('forms.signup-common')

	<div class='form-group row'>
		<label for='artist-name' class="col-sm-2 col-form-label">Artist Name*</label>
		<div class='col-sm-6' id='artist_name'>
			<input class='form-control' type='text' name='artist_name' placeholder="Enter Artist Name" />
		</div>
	</div>

	<div class='form-group row'>
		<label for='hometown' class='col-sm-2 col-form-label'>Hometown</label>
		<div class='col col-sm-3'>
			<input type='text' class='form-control' id='hometown' placeholder="Enter hometown" name='hometown'>
		</div>
		<label for='state' class='col-sm-1 col-form-label'>State</label>
		<div class='col col-sm-2'>
			<input type='text' class='form-control' id='state' placeholder="Enter state" name='state'>
		</div>
	</div>

	@if(isset($genres))
	<div class='form-group row'>
		<label for='genre' class='col-sm-2 col-form-label'>Genre*</label>
		<div class='col-sm-6'>
			<select class="form-control" name='genre' id='genre-select'>
			@foreach($genres as $id => $genre)
				<option value="{{ $id }}">{{ $genre->name }}</option>
			@endforeach
			</select>
		</div>
	</div>
	<div class='form-group row hide' id='other'>
		<label for='other-input' class="col-sm-2 col-form-label">Other</label>
		<div class='col-sm-6' id='other-input'>
			<input class='form-control' type='text' name='other' placeholder="Enter other genre" />
		</div>
	</div>
	@endif

	<button type="submit" class="btn btn-primary">Create</button>
{!! Form::close() !!}
