<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="{{ asset('admin/img/TAX-IT-BD-Logo.png') }}" >

    <!-- Bootstrap CSS -->
    @stack('custom-css')
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300&family=Manrope:wght@300&display=swap" rel="stylesheet">

    <!-- Font Awsome -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />
    <!-- Custom style CSS for Body -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{asset('admin/css/sami_toast.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/css/style_admin.css') }}">


    <title>Tax-it BD-Admin panel </title>
</head>

<body>
    <div class="container-fluid container-parent">

        @include('include.sami_toast')
        @include('include.side_manu')
        <section class="my-container pt-0">
            @include('include.header')
            <section class="p-4 pt-0">
                @yield('content')
            </section>
        </section>

    </div>


    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('admin/js/sami_main.js')}}"></script>
    <!-- custom js -->
    <script>
        var menu_btn = document.querySelector("#menu-btn")
        var sidebar = document.querySelector("#sidebar")
        // var sidebar_shade = document.querySelector("#sidebar_shade")
        // console.log(sidebar_shade)
        var container = document.querySelector(".my-container")
        menu_btn.addEventListener("click", () => {
            sidebar.classList.toggle("active-nav")
            // sidebar_shade.classList.toggle("active-shadow")
            container.classList.toggle("active-cont")
        })
    </script>



    <script>
        $(document).cus_toast_auto({
            cus_toast_time: 3000,
            cus_toast_top: "50px",
        });
    </script>

    @stack('custom-scripts')

</body>


</html>
