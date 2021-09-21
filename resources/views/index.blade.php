<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Upload Excel</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css" />
    <!-----BOOTSTRAP CSS------>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
</head>

<body>
    <div class="container">
        <div class="row">
            <!----Errors----->
            @if (session('errors'))
                <div>{{ session('errors') }}</div>
            @endif
            <!----SUCCESS----->
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                        <use xlink:href="#check-circle-fill" />
                    </svg>
                    <strong>Mensaje:</strong>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="col-md-6 mx-auto py-4">
                <h3 class="text text-info text-center">Subida de archivos en formato excel</h3>
                <!----FORMS--->
                <form action="{{ route('uploadFile') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <input type="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"
                            name="customer" class="form-control" id="inputGroupFile04"
                            aria-describedby="inputGroupFileAddon04" aria-label="Upload" />
                        <button class="btn btn-outline-success" type="submit" id="inputGroupFileAddon04">Subir</button>
                    </div>
                </form>
            </div>
        </div>
        <!----SEND EMAIL------>
        @if (empty(session('products')))
            <div class="row">
                <div class="col-md-12">
                    <p class="text text-danger text-center">No hay producto registrado no se envia reporte</p>
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-md-8 mx-auto py-3">
                    <h4 class="text-center">Esto son los productos registrados en el Log Products </h4>
                    @include('email')
                </div>
            </div>
        @endif
    </div>
    </div>
    <!---------JQUERY------->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-----JS--------->
    <script src="{{ asset('js/validateXlsx.js') }}"></script>
    <!-----BOOTSTRAP SCRIPTS------>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>
