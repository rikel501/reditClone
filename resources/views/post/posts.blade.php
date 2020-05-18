@extends('layouts.app')

@section('content')

    @foreach($posts as $post)

        <div class="row">

        	<div class="col-md-12">

        		<h2>

                    <a href="{{ route('post_detail_path', ['id' => $post->id]) }}">{{ $post->title }}</a>

                    @if($post->createdBy(Auth::user()))

                        <small class="pull-right">
                            
                            <a href="{{ route('edit_post_path', ['id' => $post->id]) }}" class="btn btn-info">Editar</a>

                            <form action="{{ route('delete_post_path', ['post' => $post->id]) }}" method="POST">
                                
                                @csrf

                                {{ method_field('DELETE') }}

                                <button type="submit" class="btn btn-danger">Borrar</button>

                            </form>

                        </small>

                    @endif

                </h2>

        		<p>Posted {{ $post->created_at->diffForHumans() }} by <b>{{ $post->user->name }}</b></p>

        	</div>
        </div>

        <hr>

    @endforeach

    {{ $posts->render() }}

@endsection