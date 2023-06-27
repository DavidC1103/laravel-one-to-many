@extends('layouts.admin')

@section('content')

<div class="p-5">
    <div class="d-flex align-items-center justify-content-center">
        <h3 class="text-center mt-3">{{ $project->name }}</h3>
        <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-warning mx-2"><i
            class="fa-solid fa-pencil fa-lg"></i></a>
    </div>

    <div class="container d-flex flex-column align-items-center">
        <h4><span class="text-primary">Start Date:</span> {{ $project->start_date }}</h5>
        <h4><span class="text-primary">End Date:</span> {{ $project->end_date }}</h5>
        <h4><span class="text-primary">Type:</span> <span class="badge text-bg-info text-uppercase">{{ $project->type?->name ?? 'undefined' }}</span></td></h5>
        <p>{!! $project->description !!}</p>
    </div>
</div>
@endsection
