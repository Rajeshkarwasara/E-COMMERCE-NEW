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
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Brands</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Users</li>
            </ol>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    All brand
                    <a href="{{route('brands.create')}}" class="btn btn-outline-primary btn-sm float-end"> + Add
                        User</a>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($data as $item)
                                <tr>
                                    <td>{{$item->name}}</td>
                                    <td><img src="{{ asset('imgs/' . $item->img)}}" alt="" id="brand_img"></td>
                                    <td>
                                        <a href="{{route('brands.edit', $item->id)}}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('brands.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <!-- Override POST method with DELETE for resourceful route -->
                                            <button type="submit"
                                                class="btn btn-sm btn-{{ $item->status == 'inactive' ? 'success' : 'danger' }}"
                                                onclick="return confirm('Are you sure you want to {{ $item->status == 'inactive' ? 'activate' : 'deactivate' }} this brand?')">
                                                {{ $item->status == 'inactive' ? 'Activate' : 'Deactivate' }}
                                            </button>
                                        </form>



                                    </td>
                                </tr>

                            @endforeach











                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>
</body>

</html>
@endsection