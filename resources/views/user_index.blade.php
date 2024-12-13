@extends('layout_user')
@section("content")
<style>
    img.card-img-top {
    width: 71%;
    margin: auto;
}
</style>
<!-- Header-->
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Shop in style</h1>
            <p class="lead fw-normal text-white-50 mb-0">With LearnVern Store</p>
        </div>
    </div>
</header>
<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @foreach ($product as $item)


                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Sale badge-->
                        @if (empty($item->sale_price) and $item->stock != 0)
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale
                            </div>
                            @elseif( $item->stock = 0){
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
                                    {{"$".$item->sale_price}}
                                    @else{{$item->price}}
                                @endif
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{route('product_view',["product"=>$item->id])}}">View
                                    Product</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="d-grid gap-2 col-6 mx-auto">
                <a href="{{route('product_list')}}" class="btn btn-outline-dark">View All</a>
            </div>

        </div>
    </div>
</section>
@endsection