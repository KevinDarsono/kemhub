
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
        <div class="card stretch stretch-full">
            <div class="card-body">
                <div class="hstack justify-content-between mb-4 pb-">
                    <div>
                        <h5 class="mb-1">Kendaraan Angkutan </h5>
                        <span class="fs-12 text-muted">Laporan Kendaraan Angkutan</span>
                    </div>
                    <a href="javascript:void(0);" class="btn btn-light-brand">View Alls</a>
                </div>
                <div class="row">
                    <div class="col-xxl-2 col-lg-4 col-md-6">
                        <div class="card stretch stretch-full border border-dashed border-gray-5">
                            <div class="card-body rounded-3 text-center">
                                <i class="bi bi-envelope fs-3 text-primary"></i>
                                <div class="fs-4 fw-bolder text-dark mt-3 mb-1">50,545</div>
                                <p class="fs-12 fw-medium text-muted text-spacing-1 mb-0 text-truncate-1-line">Total Email</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-2 col-lg-4 col-md-6">
                        <div class="card stretch stretch-full border border-dashed border-gray-5">
                            <div class="card-body rounded-3 text-center">
                                <i class="bi bi-envelope-plus fs-3 text-warning"></i>
                                <div class="fs-4 fw-bolder text-dark mt-3 mb-1">25,000</div>
                                <p class="fs-12 fw-medium text-muted text-spacing-1 mb-0 text-truncate-1-line">Email Sent</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-2 col-lg-4 col-md-6">
                        <div class="card stretch stretch-full border border-dashed border-gray-5">
                            <div class="card-body rounded-3 text-center">
                                <i class="bi bi-envelope-check fs-3 text-success"></i>
                                <div class="fs-4 fw-bolder text-dark mt-3 mb-1">20,354</div>
                                <p class="fs-12 fw-medium text-muted text-spacing-1 mb-0 text-truncate-1-line">Emails Delivered</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-2 col-lg-4 col-md-6">
                        <div class="card stretch stretch-full border border-dashed border-gray-5">
                            <div class="card-body rounded-3 text-center">
                                <i class="bi bi-envelope-open fs-3 text-indigo"></i>
                                <div class="fs-4 fw-bolder text-dark mt-3 mb-1">12,422</div>
                                <p class="fs-12 fw-medium text-muted text-spacing-1 mb-0 text-truncate-1-line">Emails Opened</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-2 col-lg-4 col-md-6">
                        <div class="card stretch stretch-full border border-dashed border-gray-5">
                            <div class="card-body rounded-3 text-center">
                                <i class="bi bi-envelope-heart fs-3 text-teal"></i>
                                <div class="fs-4 fw-bolder text-dark mt-3 mb-1">6,248</div>
                                <p class="fs-12 fw-medium text-muted text-spacing-1 mb-0 text-truncate-1-line">Emails Clicked</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-2 col-lg-4 col-md-6">
                        <div class="card stretch stretch-full border border-dashed border-gray-5">
                            <div class="card-body rounded-3 text-center">
                                <i class="bi bi-envelope-slash fs-3 text-danger"></i>
                                <div class="fs-4 fw-bolder text-dark mt-3 mb-1">2,047</div>
                                <p class="fs-12 fw-medium text-muted text-spacing-1 mb-0 text-truncate-1-line">Emails Bounce</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [Mini Card] end -->
    <!-- [Visitors Overview] start -->
    <div class="col-xxl-8">
        <div class="card stretch stretch-full">
            <div class="card-header">
                <h5 class="card-title">Visitors Overview</h5>
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
    <!-- [Visitors Overview] end -->
    <!-- [Browser States] start -->
    <div class="col-xxl-4">
        <div class="card stretch stretch-full">
            <div class="card-header">
                <h5 class="card-title">Browser States</h5>
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
            <a href="javascript:void(0);" class="card-footer fs-11 fw-bold text-uppercase text-center">Explore Details</a>
        </div>
    </div>
    <!-- [Browser States] end -->
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


