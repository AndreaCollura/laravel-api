@extends('layouts.admin')


@section('content')
    <div class="container my-5">
        <div class="text-end">
            <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary h-50 mt-2 text-capitalize">Back to view
                all</a>
        </div>
        <h2 class="text-capitalize mb-3">add new project</h2>
        <form class="row g-3" action="{{ route('admin.projects.store') }} " method="POST">
            @csrf

            <div class="col-md-6">
                <div id="titleHelp" class="form-text">Edit title here</div>
                <label for="title" class="form-label"></label>

                <input type="text" class="form-control @error('title') is-invalid
                @enderror"
                    name="title" id="title" aria-describedby="titleHelp">
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
                    id="git" aria-describedby="gitHelp">
                @error('git')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>


            {{-- class="form-control @error('type') is-invalid
                @enderror" --}}

            <div class="col-md-2">
                <div id="dateHelp" class="form-text">Edit start date here</div>
                <label for="date" class="form-label"></label>
                <input type="text" placeholder="Ex: YYYY/MM/DD"
                    class="form-control @error('date') is-invalid
                @enderror" name="date" id="date"
                    aria-describedby="dateHelp">
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
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach

                </select>
                @error('type_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group mt-5">
                <p class="text-capitalize">add some categories to your project</p>
                @foreach ($categories as $category)
                    <div>
                        <input type="checkbox" name="categories[]" value="{{ $category->id }}" class="form-check-input"
                            {{ in_array($category->id, old('categories', [])) ? 'checked' : '' }}>
                        <label for="" class="form-check-label">{{ $category->name }}</label>
                    </div>
                @endforeach
                @error('tags')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-secondary">Create</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
        </form>
    </div>
@endsection
