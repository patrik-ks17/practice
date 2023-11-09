@extends('layouts.app')
@section('title', 'Családnevek')

@section('content')
	<h1>Családnevek</h1>
	<div class="container">
		<table class="table-striped table-hover table">
			<thead>
				<tr>
					<th>Azonosító</th>
					<th>Családnév</th>
					<th>Létrehozás</th>
					@auth
                        <th>Műveletek</th>
                    @endauth
				</tr>
			</thead>
			<tbody>
				@foreach ($family as $name)
					<tr>
						<td>{{ $name->id }}</td>
						<td>{{ $name->surname }}</td>
						<td>{{ $name->created_at }}</td>
						@auth
							<td>
								<form method="POST"
									action="/families/delete/{{ $name->id }}">
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
			<form method="POST"
				action="/families/create">
				@csrf
				<input name="surname"
					type="text"
					value="{{ old('surname') }}"
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
