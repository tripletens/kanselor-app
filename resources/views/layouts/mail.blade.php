<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ config('app.name', 'App') }} - Dashboard</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    @toastr_css
</head>

<body>
    <div class="container d-flex justify-content-center">
        <div class="mx-auto">
            <img src="{{asset('images/logo.png')}}" style="height:100px;width:auto; display:flex; justify-content:center;" alt="Kaneslor Logo">
        </div>
    </div>
    @yield('content')

    <div class="col-md-3">
        <div class="contact-info">
            <div class="footer-heading">
                <h4>Contact Information</h4>
            </div>
            <p><i class="fa fa-map-marker"></i> Lakeview Estate, Amuwo Odofin, Lagos, Nigeria</p>
            <ul>
                <li><span>Phone:</span><a href="tel:+2348023622171">+234 802 362 2171</a></li>
                <li><span>Email:</span><a href="mailto:admin@kaneslor.com">admin@kaneslor.com</a></li>
            </ul>
        </div>
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>

</html>