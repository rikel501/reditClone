@extends('layouts.app')

@section('content')

    <div class="row">

    	<div class="col-md-12">

    		<h2>{{ $post->title }}</h2>

            <p>{{ $post->description }}</p>

            <p>Posted {{ $post->created_at->diffForHumans() }}</p>

    	</div>
    </div>

	@guest
	@else

	    <hr>

	    <div class="row">
		    	
	    	<div class="col-md-12">

	    		<form action="{{ route('comment_post_path', ['post' => $post->id]) }}" method="POST">

	    			@csrf
	    		
		    		<div class="form-group">
		    			
		    			<label for="comment">Comentario</label>

		    			<textarea rows="5" name="comment" class="form-control"></textarea>

		    		</div>

		    		<div>
		    			
		    			<button type="submit" class="btn btn-primary">Comentar</button>

		    		</div>

	    		</form>

	    	</div>

	    </div>

    @endguest

	@foreach($post->comments as $comment)

		<div class="row">
    	
			<div class="col-md-12">

				<div class="well">
					
					{{ $comment->text }} - {{ $comment->user->name }} - {{ $comment->created_at->diffForHumans() }}

				</div>

			</div>

		</div>

	@endforeach

@endsection