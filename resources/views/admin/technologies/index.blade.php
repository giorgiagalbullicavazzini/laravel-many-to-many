@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="fs-4 text-secondary my-4">
                Lista delle tecnologie
            </h2>
            <a href="{{ route('admin.technologies.create') }}" class="btn btn-primary">Crea Tecnologia</a>
        </div>

        @include('partials.message')
        
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($technologies as $technology)
                <tr>
                    <th scope="row">{{ $technology->id }}</th>
                    <td>{{ $technology->name }}</td>
                    <td>
                        <ul class="list-unstyled d-flex m-0 gap-1 justify-content-end">
                            <li>
                                <a href="{{ route('admin.technologies.show', $technology) }}" class="btn btn-sm btn-primary">Show</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.technologies.edit', $technology) }}" class="btn btn-sm btn-warning">Edit</a>
                            </li>
                            <li>
                                <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#technology-{{ $technology->id }}">Delete</a>
                            </li>
                        </ul>
                    </td>
                </tr>

                <div class="modal fade" id="technology-{{ $technology->id }}" tabindex="-1"  aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Attenzione</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Sei sicuro di voler cancellare la tecnologia con id <strong>{{ $technology->id }}</strong>?
                            </div>
                            <div class="modal-footer">
                                <form action="{{ route('admin.technologies.destroy', $technology) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection