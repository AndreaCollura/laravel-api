@extends('layouts.admin')


@section('content')
    <div class="container my-5">
        <div class="text-end">
            <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary h-50 mt-2 text-capitalize">Back to view
                all</a>
        </div>
        <h2 class="text-capitalize mb-3">edit project {{ $project->title }}</h2>
        <form class="row g-3" action="{{ route('admin.projects.update', $project->slug) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="col-md-6">
                <div id="titleHelp" class="form-text">Edit title here</div>
                <label for="title" class="form-label"></label>

                <input type="text" class="form-control @error('title') is-invalid
                @enderror"
                    name="title" id="title" aria-describedby="titleHelp" value="{{ old('title', $project->title) }}">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-6">
                <div id="gitHelp" class="form-text">Edit git url here</div>
                <label for="git" class="form-label"></label>
                <input type="text" class="form-control @error('git') is-invalid
                @enderror" name="git"
                    id="git" aria-describedby="gitHelp" value="{{ old('git', $project->git) }}">
                @error('git')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-2">
                <div id="dateHelp" class="form-text">Edit start date here</div>
                <label for="date" class="form-label"></label>
                <input type="text" placeholder="Ex: YYYY/MM/DD"
                    class="form-control @error('date') is-invalid
                @enderror" name="date" id="date"
                    aria-describedby="dateHelp" value="{{ old('date', $project->date) }}">
                @error('date')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="col-md-3 ">

                <select name="type_id" id="type_id"
                    class="form-control mt-5 @error('type_id') is-invalid
                @enderror">
                    <option value="">Select type used</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}"
                            {{ $type->id == old('type_id', $project->type_id) ? 'selected' : '' }}>
                            {{ $type->name }}</option>
                    @endforeach
                </select>
                @error('type_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group mt-5">
                <p class="text-capitalize">edit categories of your project</p>
                @foreach ($categories as $category)
                    <div>
                        @if ($errors->any())
                            <input type="checkbox" name="categories[]" value="{{ $category->id }}" class="form-check-input"
                                {{ in_array($category->id, old('categories', [])) ? 'checked' : '' }}>
                        @else
                            <input type="checkbox" name="categories[]" value="{{ $category->id }}" class="form-check-input"
                                {{ $project->categories->contains($category) ? 'checked' : '' }}>
                        @endif
                        <label for="" class="form-check-label">{{ $category->name }}</label>
                    </div>
                @endforeach
                @error('categories')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-secondary">Edit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
        </form>
    </div>
@endsection
