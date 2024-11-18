<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link href='{{asset("https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css")}}' rel="stylesheet" />
    <link href='{{asset("css/styles.css")}}' rel="stylesheet" />
    <script src='{{asset("https://use.fontawesome.com/releases/v6.3.0/js/all.js")}}' crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            @include("admin.sidebar")
        </div>
        <div id="layoutSidenav_content">
            @include("admin.admin_heder")
      
        
            @yield('section')
            @include("admin.layout_footer")
        </div>

       
       
    </div>
    

    @include("admin.footer")
</body>

</html>