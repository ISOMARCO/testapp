<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->
<head>
    <base href="../../../" />
    <title>Manage Fields</title>
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="" />
    <meta property="og:url" content="https://keenthemes.com/metronic" />
    <meta property="og:site_name" content="Metronic by Keenthemes" />
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    <link rel="shortcut icon" href="{{asset('assets/media/logos/favicon.ico')}}" />
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.8/sweetalert2.min.css">
    <!--end::Global Stylesheets Bundle-->
    <script>// Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }</script>
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body" class="app-blank">
<!--begin::Theme mode setup on page load-->
<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
<!--end::Theme mode setup on page load-->
<!--begin::Root-->
<div class="d-flex flex-column flex-root" id="kt_app_root">
    <!--begin::Authentication - Sign-in -->
    <div class="d-flex flex-column flex-lg-row flex-column-fluid">
        <!--begin::Body-->
        @yield('content')
        <!--end::Body-->
        <!--begin::Aside-->
        @include('Backend.sections.auth.aside')
        <!--end::Aside-->
    </div>
    <!--end::Authentication - Sign-in-->
</div>
<!--end::Root-->
<!--begin::Javascript-->
<script>var hostUrl = "assets/";</script>
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.8/sweetalert2.all.min.js"></script>
<!--end::Global Javascript Bundle-->
<!--end::Javascript-->
<script>
    $(document).ready(function(){
        let progressIconClassName = 'fas fa-spinner fa-spin fa-lg';
        $(document).on("click", "#kt_sign_in_submit", function(){
            $.ajax({
                type: "post",
                url: "{{route('Backend.auth.loginRequest')}}",
                data: $(".form").serialize(),
                dataType: "json",
                beforeSend: function()
                {
                    $("#kt_sign_in_submit i").show();
                    $("input, button").prop("disabled", true);
                },
                success: function(e)
                {
                    Swal.fire({
                        title: '',
                        text: e.message,
                        icon: 'success'
                    }).then(function(){
                        window.location.href = e.redirect;
                    });
                    setTimeout(function(){
                        window.location.href = e.redirect;
                    }, 5000);
                },
                error: function(x)
                {
                    var errorResponse = x.responseJSON || x.responseText;
                    if(errorResponse.type === 'validation_error')
                    {
                        $.each(Object.entries(errorResponse.message), function (index, value) {
                            $("#" + value[0] + "-error").html("<li>" + value[1] + "</li>");
                        });
                    }
                    else if(errorResponse.type === 'auth_error')
                    {
                        Swal.fire({
                            title: '',
                            text: errorResponse.message,
                            icon: 'error'
                        });
                    }
                    else
                    {
                        Swal.fire({
                            title: '',
                            text: 'Bilinməyən xəta baş verdi. Zəhmət olmasa yenidən cəhd edin.',
                            icon: 'error'
                        });
                    }
                    $("input, button").prop("disabled", false);
                },
               complete: function()
               {
                     $("#kt_sign_in_submit i").hide();
                        $("input, button").prop("disabled", false);
               }
            });
        });
    });
</script>
</body>
<!--end::Body-->
</html>
