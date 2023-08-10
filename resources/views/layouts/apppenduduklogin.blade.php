<!--[if lte IE 9]>     <html lang="en" class="no-focus lt-ie10 lt-ie10-msg"> <![endif]-->
<!--[if gt IE 9]><!-->
<html lang="en" class="no-focus">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="icon" href="{{ asset('kota-pariaman.png') }}" />
    <title>Penduduk Desa Apar | Login</title>

    <meta name="description"
        content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework">
    <meta property="og:site_name" content="Codebase">
    <meta property="og:description"
        content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    {{-- <link rel="shortcut icon" href="{{ asset('assets/media/photos/logo.png') }} ">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/media/photos/logo.png') }} ">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/media/photos/logo.png') }} "> --}}
    <!-- END Icons -->

    <!-- Stylesheets -->

    <!-- Fonts and Codebase framework -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,400i,600,700">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" id="css-main" href="{{ asset('assets/css/codebase.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('assets/css/extensionstyle.css') }}">

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/flat.min.css"> -->
    <!-- END Stylesheets -->
    <style>
        #preloader {
            background: rgba(52, 64, 84, 0.6) url("{{ asset('assets/media/photos/Loading-state.svg') }}") no-repeat center center;
            backdrop-filter: blur(8px);
            height: 100vh;
            width: 100%;
            position: fixed;
            z-index: 1050;
        }

        #preloader:after {
            content: "Loading...";
            display: block;
            position: absolute;
            top: 64%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-family: 'Inter';
            font-style: normal;
            font-weight: 500;
            font-size: 18px;
            line-height: 28px;
            color: #F2F4F7;
        }
    </style>
    @yield('extrahead')
</head>
@yield('content')
<!-- Codebase Core JS -->
@include('sweetalert::alert')
<script src="{{ asset('assets/js/core/jquery.min.js') }} "></script>
<script src="{{ asset('assets/js/core/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/core/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('assets/js/core/jquery-scrollLock.min.js') }}"></script>
<script src="{{ asset('assets/js/core/jquery.appear.min.js') }}"></script>
<script src="{{ asset('assets/js/core/jquery.countTo.min.js') }}"></script>
<script src="{{ asset('assets/js/core/js.cookie.min.js') }}"></script>
<script src="{{ asset('assets/js/codebase.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-notify.min.js') }}"></script>

<!-- Page JS Plugins -->
<script src="{{ asset('assets/js/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/jquery-ui/jquery.ui.touch-punch.min.js') }}"></script>

<!-- Page JS Helpers (jQueryUI Plugin) -->
<script>
    jQuery(function() {
        Codebase.helpers('draggable-items');
    });

    let loader = document.getElementById("preloader");

    window.addEventListener('load', function() {
        loader.style.display = "none";
    });

    function notify(message, type, icon) {
        if (type == 'error') {
            type = 'danger'
            bgcolor = 'red'
            title = "Something went wrong!"
        } else if (type == 'success') {
            type = 'success'
            bgcolor = 'green'
            title = "Success"
        }

        if ($.isArray(message)) {
            $.each(message, function(index, value) {
                $.notify({
                    title: title,
                    message: message,
                    icon: icon,
                }, {
                    type: type,
                    z_index: 1099,
                    offset: {
                        x: 1170,
                        y: 20
                    },
                    icon_type: "class",
                    onShow: function() {
                        this.css({
                            'width': 343,
                            'height': 'auto',
                        });
                    },
                    delay: 3000,
                    template: `<div style="background-color: ${bgcolor}; color: white;" data-notify="container" class="notification alert alert-{0}" role="alert">` +
                        '<div class="row">' +
                        '<div class="col-md-2 d-flex">' +
                        '   <i data-notify="icon" class="{3} my-auto" style="font-size: 36px;"></i>' +
                        '</div>' +
                        '<div class="col-md-10 d-flex">' +
                        '   <span class="my-auto" data-notify="message" style="display: inline-block;">{2}</span>' +
                        // '   <span data-notify="title"><strong></strong></span><br>' +
                        '</div>' +
                        '</div>' +
                        '</div>'
                })
            })
        } else {
            $.notify({
                title: title,
                message: message,
                icon: icon,
            }, {
                type: type,
                z_index: 1099,
                offset: {
                    x: 1170,
                    y: 20
                },
                icon_type: "class",
                onShow: function() {
                    this.css({
                        'width': 343,
                        'height': 'auto',
                    });
                },
                delay: 3000,
                template: `<div style="background-color: ${bgcolor}; color: white;" data-notify="container" class="notification alert alert-{0}" role="alert">` +
                    '<div class="row">' +
                    '<div class="col-md-2 d-flex">' +
                    '   <i data-notify="icon" class="{3} my-auto" style="font-size: 36px;"></i>' +
                    '</div>' +
                    '<div class="col-md-10 d-flex">' +
                    '   <span class="my-auto" data-notify="message" style="display: inline-block;">{2}</span>' +
                    // '   <span data-notify="title"><strong></strong></span><br>' +
                    '</div>' +
                    '</div>' +
                    '</div>'
            })
        }
    }
</script>
@yield('extrascript')
</body>

</html>
