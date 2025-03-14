<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title></title>

    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />

    <!-- List CSS-->
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/core.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/widget.css">
    <link rel="stylesheet" href="css/marque.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/carousel.css">
    <link rel="stylesheet" href="css/preview.css">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-brown-500">

    @include('partials.header')

    <div class="container-fluid px-4 border-bottom mb-4 bg-light">
        @yield('title')
    </div>

    {{-- Start Content --}}
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-lg-8 mb-4">
                @yield('content')
            </div>

            {{-- Start Widget --}}
            <div class="col-lg-4">
                @include('partials.widgetSearch')
                @include('partials.widgetSchedule')
                @include('partials.widgetVideo')
            </div>
            {{-- End Widget --}}

        </div>
    </div>
    {{-- End Content --}}

    @include('partials.footer')


    {{-- js --}}
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="{{ asset('js/time.js') }}"></script>
    <script src="js/scripts.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#button-search').click(function(){
                var query = $('#search-input').val().trim();
                if(query !== ''){
                    $.ajax({
                        url: '{{ route("search") }}', // Gunakan URL rute pencarian yang telah Anda buat
                        method: 'GET',
                        data: {query: query},
                        success: function(response){
                            $('#search-results').html(response);
                        },
                        error: function(xhr){
                            console.log(xhr.responseText);
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>
