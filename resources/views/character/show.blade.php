@extends('layouts.master')

@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Character /</span> All</h4>

    <ul class="nav nav-pills flex-column flex-md-row mb-3">
        <li class="nav-item">
            <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> All</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('character.create') }}"><i class="bx bx-bell me-1"></i> Create</a>
        </li>
    </ul>

    <div class="row mb-5">
        @foreach ($character->files as $file)
            <div class="col-md-6 col-lg-4 mb-3">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $file->title ? $file->title.'-' : '' }}</h5>
                        {{-- <h6 class="card-subtitle text-muted">Support card subtitle</h6> --}}
                    </div>
                    <a href="{{ route('uploads', $file->id) }}">
                        <img class="img-fluid" src="{{ asset('assets/img/elements/13.jpg') }}" alt="Card image cap" />
                    </a>
                    <div class="card-body">
                        <p class="card-text">Bear claw sesame snaps gummies chocolate.</p>
                        <a href="javascript:void(0);" class="card-link">Card link</a>
                        <a href="javascript:void(0);" class="card-link">Another link</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection