@extends('layouts.admin')

@section('content')
    <div class="bg-dark text-white">
        <div class="container d-flex align-items-center justify-content-between">
            <h1 class="">Portfolio</h1>
            <a name="" id="" class="btn btn-primary" href="{{ route('admin.projects.create') }}"
                role="button">Nuovo Progetto</a>

        </div>

    </div>
    <div class="container py-5">
        <h3>Lista Progetti:</h3>
        <div class="table-responsive">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Cover Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">Url Site</th>
                        <th scope="col">Url Source Code</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($projects as $project)
                        <tr class="">
                            <td scope="row">{{ $project->id }}</td>
                            <td><img src="{{ $project->title }}" alt=""></td>
                            <td>{{ $project->title }}</td>
                            <td>{{ $project->url_site }}</td>
                            <td>{{ $project->url_source_code }}</td>
                            <td><a href="{{ route('admin.projects.show', $project) }}">Show</a> / <a
                                    href="{{ route('admin.projects.update', $project) }}">Edit</a>
                                / <a href="{{ route('admin.projects.destroy', $project) }}">delete</a></td>
                        </tr>
                    @empty
                        <p>Chiedo scusa ma non ci sono progetti al momento</p>
                    @endforelse

                </tbody>
            </table>
        </div>

    </div>
@endsection
