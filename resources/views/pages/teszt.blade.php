@extends('layouts.app')
@section('title', 'teszt projekt')

@section('content')
	<div class="jumbotron">
		<h1>{{ $randomName }}{{-- {{ Date('Y-m-d H:i:s') }} --}}</h1>
		<p class="lead">Ez az első demo route-unk!</p>
		<a class="btn btn-lg btn-primary"
			href="https://google.com">Google</a>
	</div>
@endsection
