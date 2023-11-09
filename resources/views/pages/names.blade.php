@extends('layouts.app')
@section('title', 'Nevek')

@section('content')
	<h1>Nevek</h1>
	<div class="container">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Azonosító</th>
                    <th>Családnév</th>
                    <th>Keresztnév</th>
                    <th>Létrehozás</th>
                    <th>Műveletek</th>
                </tr>
            </thead>
            <tbody>
                @foreach($names as $name)
                    <tr>
                        <td>{{ $name->id }}</td>
                        @empty($name->family)
                            <td><strong>Nincs adat</strong></td>
                        @else
                            <td>{{ $name->family->surname }}</td>
                        @endempty
                        <td>{{ $name->name }}</td>
                        <td>{{ $name->created_at }}</td>
                        <td>
                            <form method="POST" action="/names/delete/{{ $name->id }}">
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
            <form method="POST" action="/names/create" class="flex-column d-inline-flex">
                @csrf
                <label for="family">Családnév:</label>
                <select name="family_id" class="m-2">
                    @foreach ($family as $surname)
                        <option value="{{ $surname->id }}">{{ $surname->surname }}</option>
                    @endforeach
                </select>
                <label for="name">Keresztnév</label>
                <input type="text" name="name" class="m-2" value="{{ old("name") }}" required>
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
