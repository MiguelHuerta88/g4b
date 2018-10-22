{!! Form::open(['url' => route('signup.post'), 'id' => 'signupForm']) !!}
	@include('forms.signup-common')

	{{-- user managed here --}}

		<button type="submit" class="btn btn-primary">Create</button>
{!! Form::close() !!}