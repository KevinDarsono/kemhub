
@extends('layouts.master')

@section('asset_css')

@endsection


@section('page_css')

@endsection


@section('action_header')

@endsection

@section('content')

<div class="row">
    <!-- [Mini Card] start -->
    <div class="col-12">

        <!-- Proses Approval Dashboard -->
        <div class="col p-0">
            <div class="row">
            
                <div class="col-xxl-3 col-md-6">
                    <div class="card stretch stretch-full">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between mb-4">
                                <div class="d-flex gap-4 align-items-center">
                                    <div class="avatar-text avatar-lg bg-gray-200">
                                        <i class="fa-solid fa-home text-primary"></i>
                                    </div>
                                    <div>
                                        <div class="fs-4 fw-bold text-dark"><span class="counter">17/20</span></div>
                                        <h3 class="fs-13 fw-semibold text-truncate-1-line">Dinas Perhubungan Kabupaten</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="pt-4">
                                <div class="d-flex align-items-center justify-content-between">
                                    <a href="javascript:void(0);" class="fs-12 fw-medium text-muted text-truncate-1-line">Proses Approval</a>
                                    <div class="w-100 text-end">
                                        <span class="fs-12 text-dark">17 Selesai</span>
                                        <span class="fs-12 text-dark">3 Proses</span>
                                        <span class="fs-11 text-muted">(85%)</span>
                                    </div>
                                </div>
                                <div class="progress mt-2 ht-3">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 85%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="col-xxl-3 col-md-6">
                    <div class="card stretch stretch-full">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between mb-4">
                                <div class="d-flex gap-4 align-items-center">
                                    <div class="avatar-text avatar-lg bg-gray-200">
                                        <i class="fa-solid fa-home text-warning"></i>
                                    </div>
                                    <div>
                                        <div class="fs-4 fw-bold text-dark"><span class="counter">16/20</span></div>
                                        <h3 class="fs-13 fw-semibold text-truncate-1-line">Dinas Perhubungan Kota</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="pt-4">
                                <div class="d-flex align-items-center justify-content-between">
                                    <a href="javascript:void(0);" class="fs-12 fw-medium text-muted text-truncate-1-line">Proses Approval</a>
                                    <div class="w-100 text-end">
                                        <span class="fs-12 text-dark">16 Selesai</span>
                                        <span class="fs-12 text-dark">4 Proses</span>
                                        <span class="fs-11 text-muted">(80%)</span>
                                    </div>
                                </div>
                                <div class="progress mt-2 ht-3">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 80%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="col-xxl-3 col-md-6">
                    <div class="card stretch stretch-full">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between mb-4">
                                <div class="d-flex gap-4 align-items-center">
                                    <div class="avatar-text avatar-lg bg-gray-200">
                                        <i class="fa-solid fa-home text-success"></i>
                                    </div>
                                    <div>
                                        <div class="fs-4 fw-bold text-dark"><span class="counter">15</span>/<span class="counter">20</span></div>
                                        <h3 class="fs-13 fw-semibold text-truncate-1-line">Dinas Perhubungan Provinsi</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="pt-4">
                                <div class="d-flex align-items-center justify-content-between">
                                    <a href="javascript:void(0);" class="fs-12 fw-medium text-muted text-truncate-1-line">Proses Approval</a>
                                    <div class="w-100 text-end">
                                        <span class="fs-12 text-dark">15 Selesai</span>
                                        <span class="fs-12 text-dark">5 Proses</span>
                                        <span class="fs-11 text-muted">(75%)</span>
                                    </div>
                                </div>
                                <div class="progress mt-2 ht-3">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 75%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="col-xxl-3 col-md-6">
                    <div class="card stretch stretch-full">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between mb-2">
                                <div class="d-flex gap-4 align-items-center">
                                    <div class="avatar-text avatar-lg bg-gray-200">
                                        <i class="fa-solid fa-home text-danger"></i>
                                    </div>
                                    <div>
                                        <div class="fs-4 fw-bold text-dark"><span class="counter">10</span>/<span class="counter">25</span></div>
                                        <h3 class="fs-13 fw-semibold text-truncate-1-line">BPTD 
                                            <span class="fs-13 fw-semibold text-truncate-1-line">Balai Pengelola Transportasi Darat</span>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="pt-4">
                                <div class="d-flex align-items-center justify-content-between">
                                    <a href="javascript:void(0);" class="fs-12 fw-medium text-muted text-truncate-1-line"> Proses Approval </a>
                                    <div class="w-100 text-end">
                                        <span class="fs-12 text-dark">10 Selesai</span>
                                        <span class="fs-12 text-dark">15 Proses</span>
                                        <span class="fs-11 text-muted">(40%)</span>
                                    </div>
                                </div>
                                <div class="progress mt-2 ht-3">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 46%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>
        </div>


    </div>
    <!-- [Mini Card] end -->

    <!-- [Kendaraan Angkutan Overview] start -->
    <div class="col-xxl-8">
        <div class="card stretch stretch-full">
            <div class="card-header">
                <h5 class="card-title">Kendaraan Angkutan Overview</h5>
                <div class="card-header-action">
                    <div class="card-header-btn">
                        <div data-bs-toggle="tooltip" title="Collapse/Expand">
                            <a href="#" class="avatar-text avatar-xs bg-gray-300" data-bs-toggle="collapse"></a>
                        </div>
                        <div data-bs-toggle="tooltip" title="Delete">
                            <a href="#" class="avatar-text avatar-xs bg-danger" data-bs-toggle="remove"></a>
                        </div>
                        <div data-bs-toggle="tooltip" title="Refresh">
                            <a href="#" class="avatar-text avatar-xs bg-warning" data-bs-toggle="refresh"></a>
                        </div>
                        <div data-bs-toggle="tooltip" title="Maximize/Minimize">
                            <a href="#" class="avatar-text avatar-xs bg-success" data-bs-toggle="expand"></a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <a href="#" class="avatar-text avatar-sm" data-bs-toggle="dropdown" data-bs-offset="25, 25">
                            <div data-bs-toggle="tooltip" title="Options">
                                <i class="feather-more-vertical"></i>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="feather-at-sign"></i>New </a>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="feather-calendar"></i>Event </a>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="feather-bell"></i>Snoozed </a>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="feather-trash-2"></i>Deleted </a>
                            <div class="dropdown-divider"></div>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="feather-settings"></i>Settings </a>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="feather-life-buoy"></i>Tips &amp; Tricks </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body custom-card-action">
                <div id="visitors-overview-statistics-chart"></div>
            </div>
        </div>
    </div>
    <!-- [Kendaraan Angkutan Overview] end -->
    <!-- [Riwayat Approval] start -->
    <div class="col-xxl-4">
        <div class="card stretch stretch-full">
            <div class="card-header">
                <h5 class="card-title">Riwayat Approval</h5>
                <div class="card-header-action">
                    <div class="card-header-btn">
                        <div data-bs-toggle="tooltip" title="Collapse/Expand">
                            <a href="#" class="avatar-text avatar-xs bg-gray-300" data-bs-toggle="collapse"></a>
                        </div>
                        <div data-bs-toggle="tooltip" title="Delete">
                            <a href="#" class="avatar-text avatar-xs bg-danger" data-bs-toggle="remove"></a>
                        </div>
                        <div data-bs-toggle="tooltip" title="Refresh">
                            <a href="#" class="avatar-text avatar-xs bg-warning" data-bs-toggle="refresh"></a>
                        </div>
                        <div data-bs-toggle="tooltip" title="Maximize/Minimize">
                            <a href="#" class="avatar-text avatar-xs bg-success" data-bs-toggle="expand"></a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <a href="#" class="avatar-text avatar-sm" data-bs-toggle="dropdown" data-bs-offset="25, 25">
                            <div data-bs-toggle="tooltip" title="Options">
                                <i class="feather-more-vertical"></i>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="feather-at-sign"></i>New </a>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="feather-calendar"></i>Event </a>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="feather-bell"></i>Snoozed </a>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="feather-trash-2"></i>Deleted </a>
                            <div class="dropdown-divider"></div>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="feather-settings"></i>Settings </a>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="feather-life-buoy"></i>Tips &amp; Tricks </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body custom-card-action p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <tbody>
                            <tr>
                                <td>
                                    <a href="javascript:void(0);">
                                        <i class="fa-brands fa-chrome fs-16 text-primary me-2"></i>
                                        <span>Google Chrome</span>
                                    </a>
                                </td>
                                <td>
                                    <span class="text-end d-flex align-items-center m-0">
                                        <span class="me-3">90%</span>
                                        <span class="progress w-100 ht-5">
                                            <span class="progress-bar bg-success" style="width: 90%"></span>
                                        </span>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="javascript:void(0);">
                                        <i class="fa-brands fa-firefox-browser fs-16 text-warning me-2"></i>
                                        <span>Mozila Firefox</span>
                                    </a>
                                </td>
                                <td>
                                    <span class="text-end d-flex align-items-center m-0">
                                        <span class="me-3">76%</span>
                                        <span class="progress w-100 ht-5">
                                            <span class="progress-bar bg-primary" style="width: 76%"></span>
                                        </span>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="javascript:void(0);">
                                        <i class="fa-brands fa-safari fs-16 text-info me-2"></i>
                                        <span>Apple Safari</span>
                                    </a>
                                </td>
                                <td>
                                    <span class="text-end d-flex align-items-center m-0">
                                        <span class="me-3">50%</span>
                                        <span class="progress w-100 ht-5">
                                            <span class="progress-bar bg-warning" style="width: 50%"></span>
                                        </span>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="javascript:void(0);">
                                        <i class="fa-brands fa-edge fs-16 text-success me-2"></i>
                                        <span>Edge Browser</span>
                                    </a>
                                </td>
                                <td>
                                    <span class="text-end d-flex align-items-center m-0">
                                        <span class="me-3">20%</span>
                                        <span class="progress w-100 ht-5">
                                            <span class="progress-bar bg-success" style="width: 20%"></span>
                                        </span>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="javascript:void(0);">
                                        <i class="fa-brands fa-opera fs-16 text-danger me-2"></i>
                                        <span>Opera mini</span>
                                    </a>
                                </td>
                                <td>
                                    <span class="text-end d-flex align-items-center m-0">
                                        <span class="me-3">15%</span>
                                        <span class="progress w-100 ht-5">
                                            <span class="progress-bar bg-danger" style="width: 15%"></span>
                                        </span>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="javascript:void(0);">
                                        <i class="fa-brands fa-internet-explorer fs-16 text-teal me-2"></i>
                                        <span>Internet Explorer</span>
                                    </a>
                                </td>
                                <td>
                                    <span class="text-end d-flex align-items-center m-0">
                                        <span class="me-3">12%</span>
                                        <span class="progress w-100 ht-5">
                                            <span class="progress-bar bg-teal" style="width: 12%"></span>
                                        </span>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="javascript:void(0);">
                                        <i class="fa-brands fa-octopus-deploy fs-16 text-dark me-2"></i>
                                        <span>Others Browser</span>
                                    </a>
                                </td>
                                <td>
                                    <span class="text-end d-flex align-items-center m-0">
                                        <span class="me-3">6%</span>
                                        <span class="progress w-100 ht-5">
                                            <span class="progress-bar bg-dark" style="width: 6%"></span>
                                        </span>
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <a href="javascript:void(0);" class="card-footer fs-11 fw-bold text-uppercase text-center">Explore Detail</a>
        </div>
    </div>
    <!-- [Riwayat Approval] end -->
</div>

@endsection


@section('asset_js')
@endsection


@section('page_js')
<script>


    async function initPageLoad() {

    }
</script>
@endsection


