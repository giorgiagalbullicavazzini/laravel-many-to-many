@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="fs-4 text-secondary my-4">
            {{ $technology->name }}
        </h2>
        <ul>
            @foreach ($technology->projects as $project)
                <li><a href="{{ route('admin.projects.show', $project) }}">{{ $project->title }}</a></li>
            @endforeach
        </ul>
        <hr>
        <a href="{{ route('admin.technologies.edit', $technology) }}" class="btn btn-sm btn-warning">Edit</a>

    </div>
@endsection