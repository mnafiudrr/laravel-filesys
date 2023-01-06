@extends('layouts.master')

@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Products /</span> All</h4>

    <ul class="nav nav-pills flex-column flex-md-row mb-3">
        <li class="nav-item">
            <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> All</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('product.create') }}"><i class="bx bx-bell me-1"></i> Create</a>
        </li>
    </ul>

    <div class="row mb-5" id="listProduct">
        @foreach ($products as $product)
            <div class="col-md-6 col-lg-4 mb-3 product">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <h6 class="card-subtitle text-muted">Rp {{ number_format($product->price, '0', ',', '.') }}</h6>
                    </div>
                    <a href="{{ route('product.show', $product->id) }}">
                        @if ($product->image)
                            <img class="img-fluid" src="{{ url($product->image) }}" alt="{{ $product->name }}" />
                        @else
                            <img class="img-fluid" src="{{ asset('assets/img/elements/13.jpg') }}" alt="Card image cap" />
                        @endif
                    </a>
                    <div class="card-body">
                        <p class="card-text">{{ $product->categories[0]->name }}</p>
                        <a href="javascript:void(0);" class="card-link">Show</a>
                        @auth
                        <a href="javascript:void(0);" class="card-link">Edit</a>
                        <a href="{{ route('product.destroy', $product->id) }}" class="card-link link-danger">Delete</a>
                        @endauth
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {

            $('#main-search').on('keyup',function (){
                filter(this.value);
            });

        });



        function filter(value) {
            var input, filter, cards, cardContainer, h5, title, i;
            
            // input   = document.getElementById("myFilter");
            filter  = value.toUpperCase();
            cardContainer = document.getElementById("listProduct");
            cards   = cardContainer.getElementsByClassName("product");
            
            for (i = 0; i < cards.length; i++) {
                title = cards[i].querySelector(".card .card-body h5.card-title");
                // console.log(title);
                if (title.innerText.toUpperCase().indexOf(filter) > -1) {
                    cards[i].style.display = "";
                } else {
                    cards[i].style.display = "none";
                }
            }
        }
    </script>
@endsection
