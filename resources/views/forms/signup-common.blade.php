<div class='form-group row'>
	<label for='first_name' class='col-lg-2 col-form-label'>First Name*</label>
	<div class='col-lg-6'>
		<input class="form-control @if($errors->has('first_name'))error @endif" type='text' id='first_name' placeholder="Enter first name" name='first_name' value="{{ old('first_name') }}">
		@if($errors->has('first_name'))
			<div class="error-message">{{ $errors->first('first_name') }}</div>
		@endif
	</div>
</div>

<div class='form-group row'>
	<label for='last_name' class='col-lg-2 col-form-label'>Last Name*</label>
	<div class='col-lg-6'>
		<input class="form-control @if($errors->has('last_name'))error @endif" type='text' id='last_name' placeholder="Enter last name" name='last_name' value="{{ old('last_name') }}">
		@if($errors->has('last_name'))
			<div class="error-message">{{ $errors->first('last_name') }}</div>
		@endif
	</div>
</div>

<div class='form-group row'>
	<label for='email' class='col-lg-2 col-form-label'>Email*</label>
	<div class='col-lg-6'>
		<input class="form-control @if($errors->has('email'))error @endif" type='email' id='email' placeholder="Enter email" name='email' value="{{ old('email') }}">
		@if($errors->has('email'))
			<div class="error-message">{{ $errors->first('email') }}</div>
		@endif
	</div>
</div>

<div class='form-group row'>
	<label for='username' class='col-lg-2 col-form-label'>Username*</label>
	<div class='col-lg-6'>
		<input class="form-control @if($errors->has('username'))error @endif" type='text' id='username' placeholder="Enter username" name='username' value="{{ old('username') }}">
		@if($errors->has('username'))
			<div class="error-message">{{ $errors->first('username') }}</div>
		@endif
	</div>
</div>

<div class='form-group row'>
	<label for='password' class='col-lg-2 col-form-label'>Password*</label>
	<div class='col-lg-6'>
		<input class="form-control @if($errors->has('password'))error @endif" type='password' id='password' placeholder="Enter password" name='password' value="{{ old('password') }}">
		@if($errors->has('password'))
			<div class="error-message">{{ $errors->first('password') }}</div>
		@endif
	</div>
</div>

<div class='form-group row'>
	<label for='password' class='col-lg-2 col-form-label'>Password Confirm*</label>
	<div class='col-lg-6'>
		<input class="form-control @if($errors->has('password'))error @endif" type='password' id='password_confirmation' placeholder="Confirm password" name='password_confirmation' value="{{ old('password') }}">
		@if($errors->has('password'))
			<div class="error-message">{{ $errors->first('password') }}</div>
		@endif
	</div>
</div>