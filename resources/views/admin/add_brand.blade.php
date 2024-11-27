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
</head>

<body class="sb-nav-fixed">
    <div class="container-fluid">
        <!-- Start col -->
        <div class="album py-5" style="height:150vh;margin-top: -5%;margin-bottom: -8%;">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="card border-success" style="max-width: 65rem;padding: 2%;">
                    <div>
                        <h2> User Add</h2>
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
                        <form method="POST" action="{{route("brands.store")}}" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="fname" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="fname" name="name"
                                        placeholder="Enter your name" required="">
                                </div>

                            </div>
                            <div class="col">
                                <label for="address" class="form-label">Address</label>
                                <textarea class="form-control" id="address" rows="3" name="address"
                                    placeholder="address" required=""></textarea>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <label for="profile" class="form-label">img</label><br>
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