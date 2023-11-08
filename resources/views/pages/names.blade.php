@extends('layouts.app')

@section('content')
	<h1>Nevek</h1>
	<div class="container">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Azonosító</th>
                    <th>Név</th>
                    <th>Létrehozás</th>
                </tr>
            </thead>
            <tbody>
                @foreach($names as $name)
                    <tr>
                        <td>{{ $name->id }}</td>
                        <td>{{ $name->name }}</td>
                        <td>{{ $name->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            <form method="POST" action="/names/create">
                @csrf
                <input type="text" name="name" required>
            <button type="submit">Hozzáad</button>
        </div>
        </form>

    </div>
@endsection
