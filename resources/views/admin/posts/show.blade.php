@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <h3 class="card-header">{{$post->title}}</h3>

                    <div class="card-body">
                        <div class="mb-2">
                            @if ($post->published)
                                <span class="badge badge-success py-1 px-2">Published</span>
                            @else
                                <span class="badge badge-warning py-1 px-2">Draft</span>
                            @endif
                            @if ($post->category)
                                <span class="badge badge-primary py-1 px-2">{{$post->category->name}}</span>
                            @else
                                <span class="badge badge-warning py-1 px-2">Nessuna categoria assegnata</span>
                            @endif
                        </div>
                        <div class="mb-4">
                            <div class="mb-1">
                                @if (count($post->tags))
                                    @foreach ($post->tags as $tag)
                                        <span class="badge badge-success py-1 px-2">{{$tag->name}}</span>
                                    @endforeach
                                @else
                                    <span class="badge badge-warning py-1 px-2">No tag</span>
                                @endif
                            </div>
                            <span>{{$post->content}}</span>
                        </div>
                        @if (count($post->comments) > 0)
                            <div>
                                <h3>Commenti</h3>
                                <table class="table">
                                    <tbody>
                                        @foreach ($post->comments as $comment)
                                            <tr>
                                                <th>{{$comment->content}}</th>
                                                <td>
                                                    @if(!$comment->approved)
                                                        <form action="{{route("comments.update", $comment->id)}}" method="POST">
                                                            @csrf
                                                            @method("PATCH")
                                                            <input type="hidden" name="approved" value="1">
                                                            <button type="submit" class="btn btn-primary">Approva</button>
                                                        </form>
                                                    @else
                                                        Approvato
                                                    @endif
                                                </td>
                                                <td>Cancella</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                  </table>
                            </div>
                        @endif
                        <figure class="figure">
                            <img src="{{$post->image}}" class="figure-img img-fluid rounded" alt="...">
                        </figure>
                        <div class="container p-0 d-flex flex-row mt-3">
                            <a href="{{route("posts.edit", $post->id)}}"><button type="button" class="btn btn-warning mr-3">Modifica</button></a>
                            <form action="{{route("posts.destroy", $post->id)}}" method="POST">
                                @csrf
                                @method("DELETE")
                                <a href="{{route("posts.destroy", $post->id)}}"><button type="submit" class="btn btn-danger">Elimina</button></a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection