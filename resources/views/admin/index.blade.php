@extends('layouts.app')

@section('title', 'Gestione post')

@section('content')
    <div class="container">
        <a class="nav-link btn btn-success" href="{{ route('admin.posts.create') }}">Crea Post</a>
    </div>
    <div class="container">
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
                                <a href="{{route('admin.posts.show', ['post' => $post->id])}}" class="fas fa-eye btn" style="font-size: 25px; color: #8bd3dd;"></a>

                                <a href="{{route('admin.posts.edit', ['post' => $post->id])}}" class="fas fa-edit text-warning mx-2 btn" style="font-size: 25px"></a>
                                
                                <form action="{{route('admin.posts.destroy', ['post' => $post->id])}}" method="POST" onsubmit="return confirm('Vuoi cancellare definitivamente il post?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn fas fa-trash-alt text-danger" style="font-size: 25px"></button>
                                </form>
                            </td>
                            
                        </tr>
                    @endforeach
            </tbody>

        </table>
    </div>
@endsection