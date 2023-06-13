@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <div class="text-end">
            <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary h-50 mt-2 text-capitalize">Back to view
                all</a>
        </div>

        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="text-capitalize fw-semibold">
            <h1>{{ $project->title }}</h1>
            <a href="{{ $project->git }}" class="btn btn-secondary my-4">See GIT!</a>
            <p>Started : {{ $project->date }}</p>
            <p>Type of framework and language used : <span
                    class="text-warning text-uppercase">{{ $project->type ? $project->type->name : 'No Type' }}</span>
            </p>
            @if ($project->categories && count($project->categories) > 0)
                <div>
                    @foreach ($project->categories as $category)
                        <a href="{{ route('admin.categories.show', $category->slug) }}"
                            class="badge rounded-pill text-bg-info">{{ $category->name }}</a>
                    @endforeach
                </div>
            @endif
        </div>


    </div>
@endsection
