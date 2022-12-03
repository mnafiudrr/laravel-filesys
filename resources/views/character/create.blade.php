@extends('layouts.master')

@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Character /</span> All</h4>

    <ul class="nav nav-pills flex-column flex-md-row mb-3">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('character.index') }}"><i class="bx bx-user me-1"></i> All</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-bell me-1"></i> Create</a>
        </li>
    </ul>


    <form method="post" action="{{ route('character.store') }}">
        @csrf
        <div class="col-md-6">
            <div class="card mb-4">
                <h5 class="card-header">Create new character</h5>
                <div class="card-body">
                    <div class="form-floating">
                        <input type="text" name="name" class="form-control" id="floatingInput" placeholder="Narberal Gamma"
                            aria-describedby="floatingInputHelp" />
                        <label for="floatingInput">Name</label>
                        {{-- <div id="floatingInputHelp" class="form-text">
                            We'll never share your details with anyone else.
                        </div> --}}
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Primary</button>
                </div>
            </div>
        </div>
    </form>

@endsection
