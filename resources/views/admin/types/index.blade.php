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
                    <th class="d-none d-md-table-cell text-center" scope="col">id</th>
                    <th class="text-center" scope="col">type</th>
                    <th class="text-center" scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($types as $type)
                    <tr class="text-center">
                        <td class="text-capitalize">{{ $type->id }}</td>
                        <td class="text-uppercase">{{ $type->name }}</td>
                        <td class=" d-flex">
                            <a href="{{ route('admin.types.show', $type->id) }}">
                                <i class="fa-solid fa-eye text-black px-1"></i>
                            </a>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
