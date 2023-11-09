@extends('layouts.app')
@section('title', 'Nevek')

@section('content')
	<h1>Nevek</h1>
	<div class="container">
		<table class="table-striped table-hover table">
			<thead>
				<tr>
					<th>Azonosító</th>
					<th>Családnév</th>
					<th>Keresztnév</th>
					<th>Létrehozás</th>
					@auth
						<th>Műveletek</th>
					@endauth
				</tr>
			</thead>
			<tbody>
				@foreach ($names as $name)
					<tr>
						<td>{{ $name->id }}</td>
						@empty($name->family)
							<td><strong>Nincs adat</strong></td>
						@else
							<td>{{ $name->family->surname }}</td>
						@endempty
						<td>{{ $name->name }}</td>
						<td>{{ $name->created_at }}</td>
						@auth
							<td>
								<form method="POST"
									action="/names/delete/{{ $name->id }}">
									@csrf
									@method('DELETE')
									<button class="btn btn-sm btn-danger">Törlés</button>
								</form>
							</td>
						@endauth

					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	@auth
		<div class="mb-5">
			<form class="flex-column d-inline-flex"
				method="POST"
				action="/names/create">
				@csrf
				<label for="family">Családnév:</label>
				<select class="m-2"
					name="family_id">
					@foreach ($family as $surname)
						<option value="{{ $surname->id }}">{{ $surname->surname }}</option>
					@endforeach
				</select>
				<label for="name">Keresztnév</label>
				<input class="m-2"
					name="name"
					type="text"
					value="{{ old('name') }}"
					required>
				@if ($errors->any())
					<ul>
						@foreach ($errors->all() as $error)
							<li class="alert alert-danger">{{ $error }}</li>
						@endforeach
					</ul>
				@endif
				<button type="submit">Hozzáad</button>
			</form>
		</div>
	@endauth
@endsection
