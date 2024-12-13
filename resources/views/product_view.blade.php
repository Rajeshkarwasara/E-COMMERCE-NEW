@extends('layout_user')
@section("content")

<style>
    .hide {
        height: 15vh;
    }
    .col-md-6 {
    width: 34%;
    margin-left: 50px;
}
</style>
<section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="{{asset('products/' . $singleproduct->image)}}"
                    alt="Product Image" /></div>
            <div class="col-md-6">
                <div class="small mb-1">{{ $singleproduct->product_code }}</div>
                <h1 class="display-5 fw-bolder">{{ $singleproduct->name  }}</h1>
                <div class="fs-5 mb-5">
                    @if(empty($product->sale_price))
                        <span class="text-decoration-line-through">₹{{ $singleproduct->price }}</span>
                        <span>{{ '₹' . $singleproduct->sale_price }}</span>
                    @else
                        <span>{{ '₹' . $singleproduct->price }}</span>
                    @endif
                </div>
                <p class="lead">{{ $singleproduct->description }}</p>
                <div class="d-flex">
                    <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1"
                        style="max-width: 3rem" />
                    <button class="btn btn-outline-dark flex-shrink-0" type="button">
                        <i class="bi-cart-fill me-1"></i>
                        Add to Cart
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="hide"></div>
<div class="container px-5 px-lg-5 mt-4">
    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
        @foreach ($product as $item)


            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Sale badge-->
                    @if (empty($item->sale_price) and $item->stock != 0)
                        <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale
                        </div>
                    @elseif($item->stock = 0){
                        <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">out of stoke
                            }
                    @endif

                        <!-- Product image-->
                        <img class="card-img-top" src="{{asset('products/' . $item->image) }}" alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">{{$item->name}}</h5>
                                <!-- Product price-->
                                @if (empty($item->sale_price))
                                    <span class="text-muted text-decoration-line-through">{{"$" . $item->price}}</span>
                                    {{"$" . $item->sale_price}}
                                @else{{$item->price}}
                                @endif
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto"
                                    href="{{route('product_view', ["product" => $item->id])}}">View
                                    Product</a></div>
                        </div>
                    </div>
                </div>
        @endforeach
           
            <nav aria-label="pagination ">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>

        </div>
    </div>
    </section>

    @endsection