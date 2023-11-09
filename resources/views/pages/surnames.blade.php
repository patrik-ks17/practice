@extends('layouts.app')
@section('title', 'Családnevek')

@section('content')
	<h1>Családnevek</h1>
	<div class="container">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Azonosító</th>
                    <th>Családnév</th>
                    <th>Létrehozás</th>
                    <th>Műveletek</th>
                </tr>
            </thead>
            <tbody>
                @foreach($family as $name)
                    <tr>
                        <td>{{ $name->id }}</td>
                        <td>{{ $name->surname }}</td>
                        <td>{{ $name->created_at }}</td>
                        <td>
                            <form method="POST" action="/families/delete/{{ $name->id }}">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-sm btn-danger">Törlés</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mb-5">
            <form method="POST" action="/families/create">
                @csrf
                <input type="text" name="surname" value="{{ old("surname") }}" required>
                @if($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="alert alert-danger">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            <button type="submit">Hozzáad</button>
        </div>
        </form>

    </div>
@endsection
