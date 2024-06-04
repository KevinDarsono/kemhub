@extends('layouts.master')

@section('asset_css')
<link rel="stylesheet" href="{{ asset('assets/css/pagination.min.css') }}">
@endsection


@section('page_css')
<style>
    .paginationjs {
        float: right !important;
    }
</style>
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
            <input class="form-control search-input"
                type="search"
                aria-label="Pencarian"
                placeholder="Pencarian"
                autocomplete="off"
            >
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
<div class="col-xxl-12">
    <div class="card stretch stretch-full">
        <div class="card-header">
            <h5 class="card-title">List perusahaan</h5>
            <div class="card-header-action">
                <div class="card-header-btn">
                    <div data-bs-toggle="tooltip" title="" data-bs-original-title="Maximize/Minimize">
                        <a href="javascript:void(0);" class="avatar-text avatar-xs bg-success" data-bs-toggle="expand"> </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body custom-card-action p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0" id="tableData">
                    <thead>
                        <tr class="border-b tb-head">
                            <th>#</th>
                            <th>Nama</th>
                            <th>Provinsi</th>
                            <th>Kota</th>
                            <th>Tanggal SK terbit</th>
                            <th>Tanggal SK Expired</th>
                            <th>Dibuat oleh</th>
                            <th>Tanggal dibuat</th>
                            <th class="text-end">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="9">
                                <center>Loading data...</center>
                            </td>
                        </tr>
                        {{-- data table --}}
                    </tbody>
                </table>
            </div>
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
</div>
@endsection


@section('asset_js')
<script src="{{ asset('assets/js/paginationjs/pagination.min.js') }}"></script>

@endsection


@section('page_js')
<script>
let modalTitle = "";
let defaultLimitPage = 10;
let currentPage = 1;
let totalPage = 1;
let defaultAscending = 0;
let defaultSearch = '';

async function getListData(limit = 10, page = 1, ascending = 0, search = '') {
        loadingPage(true)
        const getDataRest = await CallAPI(
            'GET',
            `{{ route('api.nasional.perusahaan.list') }}`, 
            {
                page: page,
                limit: limit,
                ascending: ascending,
                search: search
            }
        ).then(function(response) {
            return response;
        }).catch(function(error) {
            loadingPage(false)
            let resp = error.response;
            notificationAlert('info', 'Pemberitahuan', resp.data.message)
            return resp;
        })

        if (getDataRest.status == 200) {
            loadingPage(false)
            totalPage = getDataRest.data.pagination.total;
            let data = getDataRest.data.data;
            let display_from = ((defaultLimitPage * getDataRest.data.pagination.current_page) + 1) -
                defaultLimitPage;
            let display_to = currentPage < getDataRest.data.pagination.total_pages ? data.length < defaultLimitPage ? data.length : (defaultLimitPage * getDataRest.data.pagination.current_page) : totalPage;
            $('#totalPage').text(getDataRest.data.pagination.total)
            $('#countPage').text("" + display_from + " - " + display_to + "")
            let appendHtml = "";
            let index_loop = display_from;
            for (let index = 0; index < data.length; index++) {
                let element = data[index];
                appendHtml += `<tr>
                            <td>1</td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="avatar-image">
                                        <img src="{{ asset('building.png') }}" class="img-fluid">
                                    </div>
                                    <a href="javascript:void(0);" style="cursor: auto;">
                                        <span class="d-block" style="font-size: 12px;">${element.nama}</span>
                                        <span class="fs-12 d-block fw-normal text-muted">NIB ${element.nib}</span>
                                    </a>
                                </div>
                            </td>
                            <td>${element.provinsi.nama}</td>
                            <td>${element.kota.nama}</td>
                            <td>${element.tanggal_sk_terbit}</td>
                            <td>${element.tanggal_sk_expired}</td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="avatar-image">
                                        <img src="{{ asset('user_circle.png') }}" class="img-fluid">
                                    </div>
                                    <a href="javascript:void(0);" style="cursor: auto;">
                                        <span class="d-block" style="font-size: 12px;">${element.user.first_name} ${element.user.last_name}</span>
                                        <span class="fs-12 d-block fw-normal text-muted">${element.user.name_role}</span>
                                        <span class="fs-12 d-block fw-normal text-muted">${element.user.provinsi.nama} - ${element.user.kota.nama}</span>
                                    </a>
                                </div>
                            </td>
                            <td>${element.created_at}</td>
                            <td>
                                <div class="hstack gap-2 justify-content-end">
                                    <a href="leads-view.html" class="avatar-text avatar-md">
                                        <i class="feather feather-eye"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>`;
                index_loop++;
            }
            if (totalPage==0) {
                appendHtml = `
                    <tr>
                        <td class="text-center" colspan="${$('.tb-head th').length}"><center>Data tidak ditemukan.</center></td>
                    </tr>
                `;
                $('#countPage').text("0 - 0")
            }
            $('#tableData tbody').html(appendHtml)
        }
    }


    async function initPageLoad() {
        await Promise.all([
            await initDataOnTable(defaultLimitPage, currentPage, defaultAscending, defaultSearch),
            await manipulationDataOnTable()
        ])

    }
</script>
@endsection

