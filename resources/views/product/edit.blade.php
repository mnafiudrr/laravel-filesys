@extends('layouts.master')

@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Product /</span> Create</h4>

    <ul class="nav nav-pills flex-column flex-md-row mb-3">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('product.index') }}"><i class="bx bx-user me-1"></i> All</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-bell me-1"></i> Create</a>
        </li>
    </ul>


    <form method="post" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data">
        @csrf
        <div class="col-md-6">
            <div class="card mb-4">
                <h5 class="card-header">Edit product</h5>
                <div class="card-body">
                    <div class="form-floating">
                        <input type="text" name="name" class="form-control" id="floatingInput" placeholder="Narberal Gamma"
                            aria-describedby="floatingInputHelp" value="{{ $product->name }}"/>
                        <label for="floatingInput">Name</label>
                    </div>
                    <div class="form-floating">
                        <input type="number" name="price" class="form-control" id="floatingInput" placeholder="20000"
                            aria-describedby="floatingInputHelp" value="{{ $product->price }}" />
                        <label for="floatingInput">Price (Rp)</label>
                    </div>
                    <div class="form">
                        <label for="defaultFormControlInput">Category Source </label>
                        <div class="form-check form-check-inline">
                          <input
                            class="form-check-input"
                            type="radio"
                            name="category_source"
                            id="inlineRadio1"
                            value="select"
                            checked
                          />
                          <label class="form-check-label" for="inlineRadio1">Select Exist</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input
                            class="form-check-input"
                            type="radio"
                            name="category_source"
                            id="inlineRadio2"
                            value="new"
                          />
                          <label class="form-check-label" for="inlineRadio2">Add New</label>
                        </div>
                    </div>
                    <div class="mb-3">
                      <label for="formFile" class="form-label">Image</label>
                      <input class="form-control" name="image" type="file" id="formFile" type="image" />
                    </div>
                    <div class="mt-2 mb-3">
                      <select id="largeSelect" name="category_id" class="form-select form-select-lg">
                        <option>Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" 
                            @if ($category->id == $product->category_id)
                                selected
                            @endif    
                            >{{ $category->name }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-floating category_name">
                        <input type="text" name="category_name" class="form-control" id="floatingInput" placeholder="Jajanan"
                            aria-describedby="floatingInputHelp" />
                        <label for="floatingInput">Category</label>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </form>

@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $(".category_name").hide();
            $('input[type="radio"]').click(function() {

                if ($(this).attr("value") == "select") {
                    $("#largeSelect").show();
                    $(".category_name").hide();
                }
                if ($(this).attr("value") == "new") {
                    $("#largeSelect").hide();
                    $(".category_name").show();
                }
            });
        });
    </script>
    
@endsection