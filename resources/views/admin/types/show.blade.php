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


            <h3 class="mb-4">all project that use <span class="text-warning text-uppercase">{{ $type->name }}</span>
            </h3>
            @foreach ($projects as $project)
                <p>{{ $project->title }}</p>
            @endforeach

        </div>


    </div>
@endsection
