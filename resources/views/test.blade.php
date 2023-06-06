<head>
    <title>Laravel 9 Toastr Notification Example - Websolutionstuff</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	 {{-- Toster Lisk --}}
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <h1>hi</h1>
     {{-- Toster JS --}}
     <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>


        toastr.success("Hello");
        // @if(Session::has('message'))
        //     toastr.options =
        //     {
        //         "closeButton" : true,
        //         "progressBar" : true
        //     }
        //             toastr.success("{{ session('message') }}");
        //     @endif

        //     @if(Session::has('error'))
        //     toastr.options =
        //     {
        //         "closeButton" : true,
        //         "progressBar" : true
        //     }
        //             toastr.error("{{ session('error') }}");
        //     @endif

        //     @if(Session::has('info'))
        //     toastr.options =
        //     {
        //         "closeButton" : true,
        //         "progressBar" : true
        //     }
        //             toastr.info("{{ session('info') }}");
        //     @endif

        //     @if(Session::has('warning'))
        //     toastr.options =
        //     {
        //         "closeButton" : true,
        //         "progressBar" : true
        //     }
        //             toastr.warning("{{ session('warning') }}");
        //     @endif
    </script>
</body>
