<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Direktorat Jenderal Perhubungan Darat">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }} - {{ env('APP_NAME') }}</title>
    <!--! BEGIN: Favicon-->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.ico') }}">
    <!--! END: Favicon-->
    <!--! BEGIN: Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!--! END: Bootstrap CSS-->
    <!--! BEGIN: Vendors CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/vendors.min.css') }}">
    <link href="{{ asset('assets/vendors/css/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    @yield('asset_css')
    <!--! END: Vendors CSS-->
    <!--! BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/theme.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/loading.css') }}" />
    <script>
        document.onreadystatechange = function () {
            var state = document.readyState;
            if (state == 'complete') {
                setTimeout(function(){
                    document.getElementById('preloaderLoadingPage').style.display = 'none';
                    if(window.initPageLoad) {
                      initPageLoad();
                    }
                },100);
            }
        }
    </script>
    @yield('page_css')
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
    <!--! [Start] Navigation Manu !-->
    <!--! ============================================x==================== !-->
    @include('layouts.menu')
    <!--! ================================================================ !-->
    <!--! [End]  Navigation Manu !-->
    <!--! ================================================================ !-->
    <!--! ================================================================ !-->
    <!--! [Start] Header !-->
    <!--! ================================================================ !-->
    @include('layouts.header')
    <!--! ================================================================ !-->
    <!--! [End] Header !-->
    <!--! ================================================================ !-->
    <!--! ================================================================ !-->
    <!--! [Start] Main Content !-->
    <!--! ================================================================ !-->
    <main class="nxl-container">
        <div class="nxl-content">
            <!-- [ page-header ] start -->
            @include('layouts.page-header')
            <!-- [ page-header ] end -->
            <!-- [ Main Content ] start -->
            <div class="main-content">
                <div class="row">
                    @yield('content')
                </div>
            </div>
            <!-- [ Main Content ] end -->
        </div>
        <!-- [ Footer ] start -->
        {{-- <footer class="footer">
            <p class="fs-11 text-muted fw-medium text-uppercase mb-0 copyright">
                <span>Copyright © <b>{{ env('APP_NAME') }}</b></span>
                <script>
                    document.write(new Date().getFullYear());
                </script>
            </p>
            <div class="d-flex align-items-center gap-4">
                <a href="javascript:void(0);" class="fs-11 fw-semibold text-uppercase">Help</a>
                <a href="javascript:void(0);" class="fs-11 fw-semibold text-uppercase">Terms</a>
                <a href="javascript:void(0);" class="fs-11 fw-semibold text-uppercase">Privacy</a>
            </div>
        </footer> --}}
        <!-- [ Footer ] end -->
    </main>

    @yield('modal')
    <!--! ================================================================ !-->
    <!--! [End] Main Content !-->
    <!--! ================================================================ !-->
    <!--! Footer Script !-->
    <!--! ================================================================ !-->
    <!--! BEGIN: Vendors JS !-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/2.1.3/js.cookie.js"></script>
    <script src="{{ asset('assets/vendors/js/vendors.min.js') }}"></script>
    <!-- vendors.min.js {always must need to be top} -->
    <script src="{{ asset('assets/vendors/js/sweetalert2.min.js') }}"></script>
    @yield('asset_js')
    <!--! END: Vendors JS !-->
    <!--! BEGIN: Apps Init  !-->
    <script src="{{ asset('assets/js/common-init.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/circle-progress.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/reports-tmesheets-init.min.js') }}"></script>
    <!--! END: Apps Init !-->
    <!--! BEGIN: Theme Customizer  !-->
    <script src="{{ asset('assets/js/theme-customizer-init.min.js') }}"></script>
    <!--! END: Theme Customizer !-->
    <script src="{{ asset('assets/js/accounting.js') }}"></script>
    <script src="{{ asset('assets/js/axios.js') }}"></script>
    <script src="{{ asset('assets/js/restAPI.js') }}"></script>

    <script type="text/javascript">
        let languageIndonesian = {
            inputTooShort: function(args) {
                var remainingChars = args.minimum - args.input.length;
                return `silakan masukkan ${remainingChars} karakter atau lebih`;
            },
            noResults: function() {
                return 'Tidak ada data yang sesuai';
            },
            searching: function() {
                return 'Mencari…';
            },
        };

        function loadingPage(show) {
            if(show == true) {
                document.getElementById('preloaderLoadingPage').style.display = '';
            } else {
                document.getElementById('preloaderLoadingPage').style.display = 'none';
            }
                return;
        }

        function formatNumberToWithPoint(num) {
            return accounting.formatMoney(num, "", 0, "."); 
        }

        function formatNumberToIDR(nominal) {
            return accounting.formatMoney(nominal, "Rp ", 0, "."); 
        }

        function formatNumber(num) {
            return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
        }

        function notificationAlert(tipe, title, message) {
            swal.fire(
                title,
                message,
                tipe
            );
        }

        // table function

        async function performSearch() {
            defaultSearch = $('.search-input').val()
            defaultLimitPage = $("#limitPage").val()
            currentPage = 1;
            await initDataOnTable(defaultLimitPage, currentPage, defaultAscending, defaultSearch)
        }

        $("#menu-mini-button").click(function(){
            $(".classRoleHide").hide();
        });

        $("#menu-expend-button").click(function(){
            $(".classRoleHide").show();
        });
    
        function debounce(func, wait, immediate) {
            let timeout;
            return function() {
                let context = this,
                    args = arguments;
                let later = function() {
                    timeout = null;
                    if (!immediate) func.apply(context, args)
                };
                let callNow = immediate && !timeout;
                clearTimeout(timeout)
                timeout = setTimeout(later, wait)
                if (callNow) func.apply(context, args)
            };
        }
    
        async function manipulationDataOnTable() {
            $(document).on("change", "#limitPage", async function() {
                defaultLimitPage = $(this).val()
                currentPage = 1;
                await getListData(defaultLimitPage, currentPage, defaultAscending, defaultSearch)
                await paginationDataOnTable(defaultLimitPage)
            })
            
            $(document).on("input", ".search-input", debounce(performSearch, 500))
            await paginationDataOnTable(defaultLimitPage)
        }
    
        function paginationDataOnTable(isPageSize) {
            $('#pagination-js').pagination({
                dataSource: Array.from({
                    length: totalPage
                }, (_, i) => i + 1),
                pageSize: isPageSize,
                className: 'paginationjs-theme-blue',
                afterPreviousOnClick: function(e) {
                    currentPage = parseInt(e.currentTarget.dataset.num)
                    getListData(defaultLimitPage, currentPage, defaultAscending, defaultSearch)
                },
                afterPageOnClick: function(e) {
                    currentPage = parseInt(e.currentTarget.dataset.num)
                    getListData(defaultLimitPage, currentPage, defaultAscending, defaultSearch)
                },
                afterNextOnClick: function(e) {
                    currentPage = parseInt(e.currentTarget.dataset.num)
                    getListData(defaultLimitPage, currentPage, defaultAscending, defaultSearch)
                },
            })
        }
    
        async function initDataOnTable(defaultLimitPage, currentPage, defaultAscending, defaultSearch) {
            await getListData(defaultLimitPage, currentPage, defaultAscending, defaultSearch)
            await paginationDataOnTable(defaultLimitPage)
        }

        // end table function

    </script>

    @yield('page_js')
</body>

</html>