@extends('base')

@section('main')

<div class="row">
	<div class="col-sm-8 offset-sm-2">
			<h1 class="display-3">Adicione um Contato</h1>

	<div>
		@if($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div><br>
		@endif

	<form action="{{ route('contacts.store') }}" method="post">
		@csrf
		<div class="form-group">
			<label for="first_name">First Name:</label>
			<input type="text" class="form-control" name="first_name"  maxlength="20">
		</div>
		<div class="form-group">
			<label for="datanasc">Data Nascimento:</label>
			<input type="date" class="form-control" name="datanasc" maxlength="20">
        </div>
        <div class="form-group">
			<label for="last_name">Last Name:</label>
			<input type="text" class="form-control" name="last_name" maxlength="20">
		</div>
		<div class="form-group">
			<label for="email">Email</label>
			<input type="text" class="form-control" name="email" maxlength="50">
		</div>
		<div class="form-group">
			<label for="city">City:</label>
			<input type="text" class="form-control" name="city" maxlength="20">
		</div>
		<div class="form-group">
			<label for="country">Country</label>
			<input type="text" class="form-control" name="country" maxlength="20">
		</div>
		<div class="form-group">
			<label for="job_title">Job Title</label>
			<input type="text" class="form-control" name="job_title" maxlength="10">
        </div>
        <div class="form-group">
			<label for="description">Description</label>
			<input type="text" class="form-control" name="description" maxlength="10">
        </div>
        <div class="form-group">
			<label for="anotrab">Ano Tabalhado</label>
			<input type="text" class="form-control" name="anotrab" maxlength="50">
		</div>

		<button type="submit" class="btn btn-primary-outline">Add contact</button>
	</form>


	</div>


	</div>




</div>
@endsection
