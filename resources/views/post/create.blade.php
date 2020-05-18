@extends('layouts.app')

@section('content')

	<h2>Crear post</h2>

	<!-- Formulario -->
    @include('post._form', ['post' => $post])

@endsection