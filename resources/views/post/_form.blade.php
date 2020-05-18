@if($post->exists)

	<form action="{{ route('update_post_path', ['post' => $post->id]) }}" method="post">

		{{ method_field('PUT') }}

@else

	<form action="{{ route('store_post_path') }}" method="post" accept-charset="utf-8">

@endif

	@csrf

	<!-- input Titulo -->
	<div class="form-group">
		
		<label for="title">Titulo:</label>

		@if($post->exists)

			<input type="text" name="title" class="form-control" value="{{ $post->title }}"/>

		@else

			<input type="text" name="title" class="form-control" value="{{ old('title') }}"/>

		@endif

	</div>

	<!-- textarea Descripcion -->
	<div class="form-group">
		
		<label for="description">Descripcion:</label>

		@if($post->exists)

			<textarea rows="5" name="description" class="form-control">{{ $post->description }}</textarea>

		@else

			<textarea rows="5" name="description" class="form-control">{{ old('description') }}</textarea>

		@endif

	</div>

	<!-- input URL -->
	<div class="form-group">
		
		<label for="url">URL:</label>

		@if($post->exists)

			<input type="text" name="url" class="form-control" value="{{ $post->url }}"/>

		@else

			<input type="text" name="url" class="form-control" value="{{ old('url') }}"/>

		@endif


	</div>

	@if($post->exists)

		<!-- boton editar -->
		<div class="form-group">
			
			<button type="submit" class="btn btn-primary">Guardar</button>

		</div>

	@else

		<!-- boton crear -->
		<div class="form-group">
			
			<button type="submit" class="btn btn-primary">Crear</button>

		</div>

	@endif

</form>