@extends('layouts.app')

@section('content')

	<h2>Editar post</h2>

	<!-- Formulario -->
    @include('post._form', ['post' => $post])

@endsection