@extends('admin.admin_layout')
@section('section')


<main class="p-5">
    <div class="container-fluid px-4">
        <h1 class="mt-4">Products</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="">Products List</a></li>
            <li class="breadcrumb-item active">Products</li>
        </ol>
        <div class="">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Add Product
            </div>
            <div class="card-body">

                <div class="album py-5" style="height:120vh;margin-top: -15%;margin-bottom: -15%;">
                    <div class="row h-100 justify-content-center align-items-center">
                        <div class="card border-success" style="max-width: 75rem;padding: 2%;">

                            <div class="card-body">
                                <form method="POST" action="{{route('product.update',$data->id)}}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row mb-3">
                                        <div class="col">
                                            <label for="name" class="form-label">Product Name</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Titan Watch" required="" value="{{$data->name}}">
                                        </div>
                                        <div class="col">
                                            <label for="price" class="form-label">Price</label>
                                            <input type="text" class="form-control" id="price" name="price"
                                                placeholder="15000" required="" value="{{$data->price}}">
                                        </div>
                                        <div class="col">
                                            <label for="sale_price" class="form-label">Sale Price</label>
                                            <input type="text" class="form-control" id="sale_price" name="sale_price"
                                                placeholder="10000" value="{{$data->sale_price}}">
                                        </div>
                                        <div class="col">
                                            <label for="color" class="form-label">Color</label>
                                            <input type="text" class="form-control" id="color" name="color"
                                                placeholder="Rose Gold" required="" value="{{$data->color}}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col">
                                            <label for="brand_id" class="form-label">Brand</label>
                                            <select class="form-select" id="brand_id"
                                                aria-label="Default select example" required="" name="brand_name">
                                                <option selected disabled>{{$data->brand_name}}</option>



                                            </select>
                                        </div>
                                        <div class="col">
                                            <label for="product_code" class="form-label">Product Code</label>
                                            <input type="text" class="form-control" id="product_code"
                                                name="product_code" placeholder="LV-123" required=""
                                                value="{{$data->product_code}}">
                                        </div>
                                        <div class="col">
                                            <label for="gender" class="form-label">Gender</label><br>
                                            <input type="radio" id="gender" name="gender" 
                                                value="male"{{$data->gender == 'male' ? 'checked' : ''}}>&nbsp;&nbsp;Male&nbsp;&nbsp;
                                            <input type="radio" id="gender" name="gender"
                                            value="female"{{$data->gender == 'female' ? 'checked' : ''}}>&nbsp;&nbsp;Female
                                            <input type="radio" id="gender" name="gender"
                                            value="children"{{$data->gender == 'children' ? 'checked' : ''}}>&nbsp;&nbsp;Children
                                            <input type="radio" id="gender" name="gender" value="unisex"{{$data->gender == 'unisex' ? 'checked' : ''}}>&nbsp;&nbsp;Unisex
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-3">
                                            <label for="function" class="form-label">Function</label>
                                            <select class="form-select" id="function"
                                                aria-label="Default select example" required="" name="function">
                                                <option selected disabled>{{$data->function}}</option>
                                                @foreach(\Illuminate\Support\Facades\Config::get('return_function') as $value)
                                                    <option value="{{ $value }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-3">
                                            <label for="stock" class="form-label">Stock</label>
                                            <input type="number" class="form-control" id="stock" name="stock"
                                                placeholder="100" required="" value="{{$data->stock}}">
                                        </div>
                                        <div class="col">
                                            <label for="description" class="form-label">Description</label>
                                            <textarea class="form-control" id="description" rows="3" name="description"
                                                placeholder="description" required="">{{$data->description}}</textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col">
                                            <img src="{{asset('products/' . $data->image)}}" alt="" id="product_imge">
                                            <label for="image" class="form-label">Image</label><br>
                                            <input type="file" class="form-control-file" name="image" id="image">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="mb-3">
                                        <input type="submit" name="add_product" id="add_product" value="Add Product"
                                            class="btn btn-outline-success">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>



@endsection