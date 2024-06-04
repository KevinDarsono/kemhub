<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Direktorat Jenderal Perhubungan Darat">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }} - {{ env('APP_NAME') }}</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.ico') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/vendors.min.css') }}">
    <link href="{{ asset('assets/vendors/css/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/theme.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/loading.css') }}" />
    <script>
        document.onreadystatechange = function () {
            var state = document.readyState;
            if (state == 'complete') {
                setTimeout(function(){
                  document.getElementById('preloaderLoadingPage').style.display = 'none';
                },100);
            }
        }
    </script>
</head>

<body>
    {{-- loading page --}}
    <div id="preloaderLoadingPage">
        <div class="sk-three-bounce">
          <div class="centerpreloader">
            <div class="ui-loading"></div>
            <center><h6 style="color: white;">Loading...</h6></center>
          </div>
        </div>
    </div>
    {{-- end loading page --}}
    <!--! ================================================================ !-->
    <!--! [Start] Main Content !-->
    <!--! ================================================================ !-->
    <main class="auth-cover-wrapper">
        <div class="auth-cover-content-inner">
            <div class="auth-cover-content-wrapper" style="background-color: #2c3782">
                <div class="auth-img">
                    <img src="logo-kemenhub.png" class="img-fluid">
                </div>
            </div>
        </div>
        <div class="auth-cover-sidebar-inner">
            <div class="auth-cover-card-wrapper">
                <div class="auth-cover-card p-sm-5">
                    <div class="mb-1">
                        <img src="{{ asset('logo_with_name.png') }}" class="img-fluid">
                    </div>
                    <center>
                        <h2 class="fs-20 fw-bolder mb-2">{{ env('APP_NAME') }}</h2>
                    </center>
                    <div class="w-100 mt-3 pt-2">
                        <div class="mb-4">
                            <input type="email" class="form-control" placeholder="Masukkan email" id="email" autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" placeholder="Masukkan kata sandi" id="password">
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="rememberMe">
                                    <label class="custom-control-label c-pointer" for="rememberMe">Ingat saya</label>
                                </div>
                            </div>
                            <div>
                                <a href="javascript:void(0)" class="fs-11 text-primary">Lupa kata sandi?</a>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button type="button" onclick="submitLogin()" class="btn btn-lg btn-primary w-100">MASUK</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="{{ asset('assets/vendors/js/vendors.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/js/common-init.min.js') }}"></script>
    <script src="{{ asset('assets/js/theme-customizer-init.min.js') }}"></script>
    <script src="{{ asset('assets/js/axios.js') }}"></script>
    <script src="{{ asset('assets/js/restAPI.js') }}"></script>
    <script>
        document.getElementById('email').addEventListener('keydown', (event) => {
          if (event.key === 'Enter') {
            submitLogin();
          }
        });

        document.getElementById('password').addEventListener('keydown', (event) => {
          if (event.key === 'Enter') {
            submitLogin();
          }
        });

        function loadingPage(show) {
            if(show == true) {
              document.getElementById('preloaderLoadingPage').style.display = '';
            } else {
              document.getElementById('preloaderLoadingPage').style.display = 'none';
            }
            return;
        }

        function notificationAlert(tipe, title, message) {
            swal.fire(
                title,
                message,
                tipe
            );
        }

        async function submitLogin() {
            loadingPage(true);
            const getDataRest = await CallAPI(
            'POST',
            '{{ route('api.auth.login') }}',
            {
                email : $('#email').val(),
                password : $('#password').val()
            }
            ).then(function (response) {
                return response;
            }).catch(function (error) {
                loadingPage(false);
                let resp = error.response;
                notificationAlert('info','Informasi',resp.data.message);
                return resp;
            });
            if(getDataRest.status == 200) {
                let rest_data = getDataRest.data.data;
                localStorage.setItem('rest_data', JSON.stringify(rest_data));
                setTimeout(function(){
                    window.location.href = rest_data.route_redirect
                },500);
            }
        }

    </script>
</body>

</html>