@extends('layouts.master')

@section('asset_css')
    <link rel="stylesheet" href="{{ asset('assets/css/pagination.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}">
@endsection


@section('page_css')
    <style>
        .paginationjs {
            float: right !important;
        }

        .form-check-input.is-finish-toggle {
            width: 3rem;
            height: 1.5rem;
            background-color: red;
            border: 1px solid #dc3545;
            transition: background-color 0.3s ease;
        }

        .form-check-input.is-finish-toggle:checked {
            background-color: green;
            border-color: #28a745;
        }

        .selected-approver-list {
            list-style: none;
            padding: 0;
        }

        .selected-approver-list .drag-handle {
            padding: 10px;
            margin: 5px 0;
            background: #f1f1f1;
            border: 1px solid #ccc;
        }

        .selected-approver-list .drag-handle {
            cursor: move;
        }

        .btn:hover {
            filter: brightness(70%);
            transition: filter 0.3s ease;
        }
    </style>
@endsection


@section('action_header')
    <div class="page-header-right ms-auto">
        <div class="page-header-right-items">
            <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                <a href="javascript:void(0)" id="add-data" class="btn btn-primary" data-bs-trigger="hover" title=""
                    data-bs-original-title="Marianne Audrey">
                    <i class="feather-plus me-2"></i>
                    <span>Tambah Data</span>
                </a>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="card">

        <div class="mb-3 mt-1">
            <div class="row">
                <div class="mt-2 col-xl-2">
                    <select name="limitPage" id="limitPage" class="form-control"
                        style="margin-right: 10px;text-align: center;width: 25%">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                    </select>
                </div>
                <div class="mt-2 col-xl-2 offset-xl-8">
                    <input class="form-control search-input" type="search" aria-label="Pencarian" placeholder="Pencarian"
                        autocomplete="off">
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-striped" style="width: 100%" id="tableData">
                <thead>
                    <tr class="tb-head">
                        <th>No</th>
                        <th><span class="ms-3">Provinsi</span></th>
                        <th class="text-end"><span class="me-3">Approver</span></th>
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>

        <div class="p-2 d-flex">
            <div class="p-2 d-flex align-content-end flex-wrap">
                <label for="descriptionLimitPage">Menampilkan <span id="countPage">0</span>
                    dari <span id="totalPage">0</span> data</label>
            </div>
            <div class="ms-auto p-2">
                <div id="pagination-js"></div>
            </div>
        </div>

    </div>
@endsection

@section('modal')
    <form id="form-data">
        <div class="modal fade" id="modalData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="modalDataLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modalDataLabel">Form Approval</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="inputId" />
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="">Provinsi <sup>
                                            <font color="red">*</font>
                                        </sup></label>
                                    <select class="form-control" name="provinsi_id" id="input_provinsi_id"></select>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group mb-3">
                                    <label for="">Approver <sup>
                                            <font color="red">*</font>
                                        </sup></label>
                                    <div class="input-group">
                                        <select class="form-control" name="approver_user_id[]"
                                            id="input_approver_user_id"></select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group mb-3 mt-4">
                                    <button type="button" style="width: 100%" class="btn btn-success btn-md add-approver"
                                        id="add-approver-btn"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <span class="alert-approver"></span>
                            </div>
                            <div class="col-md-12">
                                <div class="selected-approver-list" id="selected-approver-list"></div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>


    <!-- Modal Detail -->
    <div class="modal fade" id="modalDetail" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="modalDetailLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalDetailLabel">Detail Konfigurasi Persetujuan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-hover table-striped" id="tableDetail"></table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('asset_js')
    <script src="{{ asset('assets/js/paginationjs/pagination.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/sortable.min.js') }}"></script>
@endsection


@section('page_js')
    {{-- Datatable --}}
    @include('administrator.konfigurasi.alur-persetujuan.dataTable-js')

    {{-- Action --}}
    @include('administrator.konfigurasi.alur-persetujuan.crud-js')
@endsection
