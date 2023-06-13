@extends('layouts.admin')

@section('content')
    <div class="text-end">
        <a href="{{ route('admin.projects.create') }}" class="btn btn-secondary h-50 mt-5 me-5">Create new post</a>
    </div>
    <div class="container">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <table class="table">
            <thead>
                <tr class="text-capitalize">
                    <th class="text-center" scope="col">id</th>
                    <th class="d-none d-md-table-cell text-center" scope="col">category</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr class="text-center">
                        <td class="text-capitalize">{{ $category->id }}</td>
                        <td class="text-uppercase">{{ $category->name }}</td>
                        <td class=" d-flex">
                            <a href="{{ route('admin.types.show', $category->slug) }}">
                                <i class="fa-solid fa-eye text-black px-1"></i>
                            </a>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
