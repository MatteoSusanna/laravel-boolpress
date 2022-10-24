@extends('layouts.app')

@section('title', 'Gestione post')

@section('content')
    <div class="container">
        @if (count($posts))
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">image</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Category</th>
                    <th scope="col">Tag</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <th scope="row">{{$post->id}}</th>
                                <td>
                                    <div class="card" style="width: 5rem;">
                                        @if ($post->cover)
                                            <img src="{{asset('storage/' . $post->cover)}}">
                                        @else
                                            <h6>immagine non è presente</h6>
                                        @endif
                                    </div>
                                </td>
                                <td>{{$post->name}}</td>
                                <td>{{$post->slug}}</td>
                                <td>{{($post->category)?$post->category->name:'-'}}</td>
                                <td>
                                    @foreach ($post->tags as $tag)
                                        - {{$tag->name}}
                                    @endforeach
                                </td>
                                <td class="d-flex">
                                    
                                    <a href="{{route('admin.restore', ['post' => $post->id])}}" class="btn fa-solid fa-window-restore" style="font-size: 25px; color: #86C552;"></a>

                                    <form action="{{route('admin.forceDestroy', ['post' => $post->id])}}" method="POST" onsubmit="return confirm('Vuoi cancellare definitivamente il post?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn fas fa-trash-alt text-danger" style="font-size: 25px"></button>
                                    </form>
                                </td>                            
                            </tr>
                        @endforeach
                </tbody>

            </table>
        @else
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">IL CESTINO E' VUOTO</th>
                </tr>
            </thead>
        </table>

        @endif
    </div>
@endsection