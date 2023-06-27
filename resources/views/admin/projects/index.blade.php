@extends('layouts.admin')

@section('content')
    <h3 class="text-center mt-3">Projects</h3>
    <div class="container d-flex flex-column align-items-center">

        @if (session('deleted'))
            <div class="alert alert-success" role="alert">
                {{ session('deleted') }}
            </div>
        @endif

        <table class="table table-striped table-hover w-100 dc-table">
            <thead>
                <tr>
                    <th scope="col" class="text-center">
                        <a class="text-black text-decoration-none"
                            href="{{ route('admin.orderBy', ['direction' => $direction]) }}">
                            <span>ID</span>
                            @if ($direction === 'asc')
                                <i class="fa-solid fa-chevron-up fa-xs"></i>
                            @else
                                <i class="fa-solid fa-chevron-down fa-xs"></i>
                            @endif
                        </a>
                    </th>
                    <th scope="col">Name</th>
                    <th scope="col" class="text-center">Type</th>
                    <th scope="col" class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td class="text-center">{{ $project->id }}</td>
                        <td>{{ $project->name }}</td>
                        <td class="text-center"><span class="badge text-bg-success text-uppercase">{{ $project->type?->name ?? 'undefined' }}</span></td>
                        <td class="text-center">
                            <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-primary">Show</a>
                            <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-warning">Edit</a>
                            <form action="{{route('admin.projects.destroy', $project->id)}}" method="POST" class="d-inline" onsubmit="return confirm('Sei sicuro di voler cancellare {{$project->name}}?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger"><a href="{{route('admin.projects.destroy', $project->id)}}">Delete</a></button>
                              </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
