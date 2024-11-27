@extends('admin.admin_layout')
@section('section')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - LearnVern Store Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"
        crossorigin="anonymous"></script>
        <style>
           
        img#brand_img {
            border: 1px black;
            border-radius: 50px;
            color: black;
            width: 80px;
            height: 80px;
        }
   
        </style>
</head>

<body class="sb-nav-fixed">
    <div class="container-fluid">
        <!-- Start col -->
        <div class="album py-5" style="height:150vh;margin-top: -5%;margin-bottom: -8%;">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="card border-success" style="max-width: 65rem;padding: 2%;">
                    <div>
                        <h2> Edit brand</h2>
                        <a href="{{route("user_list")}}" class="float-end btn btn-outline-dark"
                            style="margin-top: -5%;">Home</a>
                    </div>

                    <!-- @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>
                                        {{ $error }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                    @endif -->

                    <hr>
                    <div class="card-body">
                        <form method="POST" action="{{route('brands.update',$data->id)}}" enctype="multipart/form-data">
                           @csrf
                           @method('PUT')
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="fname" class="form-label"></label>
                                    <input type="text" class="form-control" id="fname" name="name"
                                        placeholder="Enter your name" required="" value="{{$data->name}}">
                                </div>

                            </div>
                            <div class="col">
                                <label for="address" class="form-label"></label>
                                <textarea class="form-control" id="address" rows="3" name="address"
                                    placeholder="address" required="">{{$data->description}}</textarea>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                <img src="{{ asset('imgs/' . $data->img)}}" alt="" id="brand_img"><br>
                                    <label for="profile" class="form-label">img uplod</label><br>
                                    <input type="file" class="form-control-file" name="img" id="profile">
                                </div>
                            </div>
                            <br>
                            <div class="mb-3">
                                <input type="submit" name="regist" id="regist" value="Register"
                                    class="btn btn-outline-success">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection