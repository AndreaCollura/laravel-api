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
                    <th class="d-none d-md-table-cell text-center" scope="col">project title</th>
                    <th class="text-center" scope="col">git</th>
                    <th class="text-center" scope="col">date</th>
                    <th class="text-center" scope="col">type</th>
                    <th class="text-center" scope="col">repo name</th>
                    <th class="text-center" scope="col">updated</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr class="text-center">
                        <td class="text-capitalize">{{ $project->title }}</td>
                        <td><a class="text-danger-emphasis" href="{{ $project->git }}">{{ $project->git }}</a></td>
                        <td>{{ $project->date }}</td>
                        <td class="text-uppercase">{{ $project->type ? $project->type->name : 'No Type' }}</td>
                        <td>{{ $project->slug }}</td>
                        <td>{{ $project->created_at }}</td>
                        <td class=" d-flex">
                            <a href="{{ route('admin.projects.show', $project->slug) }}">
                                <i class="fa-solid fa-eye text-black px-1"></i>
                            </a>
                            <a href="{{ route('admin.projects.edit', $project->slug) }}">
                                <i class="fa-solid fa-pencil text-black px-1"></i>
                            </a>
                            <form class=" " action="{{ route('admin.projects.destroy', $project->slug) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button type='submit' class="delete-button border-0 bg-transparent "
                                    data-item-title="{{ $project->title }}">
                                    <i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="paginate">
        {{ $projects->links('vendor.pagination.bootstrap-5') }}
    </div>

    <script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">
        bkLib.onDomLoaded(nicEditors.allTextAreas);
    </script>
    @include('partials.popupdelete')
@endsection
