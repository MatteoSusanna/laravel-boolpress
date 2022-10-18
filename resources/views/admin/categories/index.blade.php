@extends('layouts.app')

@section('title', 'Gestione post')

@section('content')
    <div class="container">
        <a class="nav-link btn btn-success" href="{{ route('admin.categories.create') }}">Crea Categoria</a>
    </div>
    <div class="container">
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Slug</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <th scope="row">{{$category->id}}</th>
                            <td>{{$category->name}}</td>
                            <td>{{$category->slug}}</td>
                            <td class="d-flex">
                                <a href="{{route('admin.categories.show', ['category' => $category->id])}}" class="fas fa-eye btn" style="font-size: 25px; color:#8bd3dd;"></a>
                                <a href="{{route('admin.categories.edit', ['category' => $category->id])}}" class="fas fa-edit text-warning mx-2 btn" style="font-size: 25px"></a>

                                <form action="{{route('admin.categories.destroy', ['category' => $category->id])}}" method="POST" onsubmit="return confirm('Vuoi cancellare definitivamente il post?');">
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