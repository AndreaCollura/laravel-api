@extends('layouts.admin')

@section('content')
    <div class="wrapper w-100 d-flex">
        <section id="main-content" class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="row">
                        <div class="col-12">
                            <div class="card my-4">
                                <div class="card-header d-flex justify-content-between">
                                    <h2 class="fs-2 fw-semibold">Recent Projects</h2>
                                    <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">view all</a>
                                </div>
                                <div class="card-body">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr class="text-capitalize">
                                                <th scope="col">Title project</th>
                                                <th class="d-none d-md-table-cell" scope="col">start date</th>
                                                <th class="text-center" scope="col">git</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($projects as $project)
                                                <tr>
                                                    <td>
                                                        <span>{{ $project->title }}</span>
                                                    </td>
                                                    <td class="d-none d-md-table-cell">{{ $project->date }}</td>
                                                    <td class="d-none d-md-table-cell">{{ $project->git }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card my-4">
                                <div class="card-header ">
                                    <h2 class="text-uppercase fs-3 fw-semibold">.....</h2>
                                </div>
                                <div class="card-body">
                                    <div class="accordion accordion-flush" id="accordionFlushExample">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="flush-headingOne">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                                    aria-expanded="false" aria-controls="flush-collapseOne">
                                                    ..............
                                                </button>
                                            </h2>
                                            <div id="flush-collapseOne" class="accordion-collapse collapse"
                                                aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body">..............</div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="flush-headingTwo">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo"
                                                    aria-expanded="false" aria-controls="flush-collapseTwo">
                                                    ..............
                                                </button>
                                            </h2>
                                            <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                                aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body">..............</div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="flush-headingThree">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#flush-collapseThree"
                                                    aria-expanded="false" aria-controls="flush-collapseThree">
                                                    ..............
                                                </button>
                                            </h2>
                                            <div id="flush-collapseThree" class="accordion-collapse collapse"
                                                aria-labelledby="flush-headingThree"
                                                data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body">..............</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="card my-4">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between">
                                        <h2 class="fs-3 fw-semibold">Types</h2>
                                        <a href="{{ route('admin.types.index') }}" class="btn btn-secondary">view
                                            all</a>
                                    </div>


                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">

                                                </label>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">

                                                </label>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">

                                                </label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <div class="card">
                                        <img src="" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">..............</h5>
                                            <p class="card-text">..............</p>
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">..............</li>
                                            <li class="list-group-item">..............</li>
                                            <li class="list-group-item">..............</li>
                                        </ul>
                                        <div class="card-body">
                                            <a href="#" class="card-link">..............</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        </main>
    </div>
@endsection
