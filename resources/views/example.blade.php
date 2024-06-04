@extends('layouts.master')

@section('asset_css')

@endsection


@section('page_css')

@endsection


@section('action_header')
<div class="page-header-right ms-auto">
    <div class="page-header-right-items">
        <div class="d-flex d-md-none">
            <a href="javascript:void(0)" class="page-header-right-close-toggle">
                <i class="feather-arrow-left me-2"></i>
                <span>Back</span>
            </a>
        </div>
        <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
            <div class="dropdown filter-dropdown">
                <a class="btn btn-light-brand" data-bs-toggle="dropdown" data-bs-offset="0, 10" data-bs-auto-close="outside">
                    <i class="feather-filter me-2"></i>
                    <span>Filter</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <div class="dropdown-item">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="Role" checked="checked">
                            <label class="custom-control-label c-pointer" for="Role">Role</label>
                        </div>
                    </div>
                    <div class="dropdown-item">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="Team" checked="checked">
                            <label class="custom-control-label c-pointer" for="Team">Team</label>
                        </div>
                    </div>
                    <div class="dropdown-item">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="Email" checked="checked">
                            <label class="custom-control-label c-pointer" for="Email">Email</label>
                        </div>
                    </div>
                    <div class="dropdown-item">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="Member" checked="checked">
                            <label class="custom-control-label c-pointer" for="Member">Member</label>
                        </div>
                    </div>
                    <div class="dropdown-item">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="Recommendation" checked="checked">
                            <label class="custom-control-label c-pointer" for="Recommendation">Recommendation</label>
                        </div>
                    </div>
                    <div class="dropdown-divider"></div>
                    <a href="javascript:void(0);" class="dropdown-item">
                        <i class="feather-plus me-3"></i>
                        <span>Create New</span>
                    </a>
                    <a href="javascript:void(0);" class="dropdown-item">
                        <i class="feather-filter me-3"></i>
                        <span>Manage Filter</span>
                    </a>
                </div>
            </div>
            <a href="javascript:void(0);" class="btn btn-primary">
                <i class="feather-plus me-2"></i>
                <span>Add Widgets</span>
            </a>
        </div>
    </div>
    <div class="d-md-none d-flex align-items-center">
        <a href="javascript:void(0)" class="page-header-right-open-toggle">
            <i class="feather-align-right fs-20"></i>
        </a>
    </div>
</div>
@endsection

@section('content')

@endsection


@section('asset_js')

@endsection


@section('page_js')
<script>


    async function initPageLoad() {

    }
</script>
@endsection

