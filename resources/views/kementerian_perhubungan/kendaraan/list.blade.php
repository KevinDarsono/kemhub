@extends('layouts.master')

@section('asset_css')
<link rel="stylesheet" href="{{ asset('assets/css/pagination.min.css') }}">
@endsection

@section('page_css')
<style>
    .paginationjs{
        float: right !important;
    }
</style>

@section('header')

@endsection

@section('content')
<div class="card">
    <div class="mb-3 mt-1">
        <div class="row">
            <div class="mt-2 col-xl-2">
                <select name="limitPage"
                id="limitPage"
                class="form-control"
                style="margin-right: 10px;text-align: center;width: 25%">
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="30">30</option>
                </select>
            </div>
            <div class="mt-2 col-xl-2 offset-xl-8">
                <input class="form-control search-input"
                    type="search"
                    aria-label="Pencarian"
                    placeholder="Pencarian"
                    autocomplete="off"
                >
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-hover table-striped" style="width: 100%" id="tableData">
          <thead>
            <tr class="tb-head">
                <th>No</th>
                <th>Nama</th>
                <th>Kode</th>
                <th>Lat</th>
                <th>Longitude</th>
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

@section('page_js')
<script>
     let modalTitle = "";
    let isActionForm = "create";
    let defaultLimitPage = 10;
    let currentPage = 1;
    let totalPage = 1;
    let defaultAscending = 0;
    let defaultSearch = '';

    async function getListData(limit = 10, page = 1, ascending = 0, search = '') {
        loadingPage(true)
        const getDataRest = await CallAPI(
            'GET',
            `{{ route('api.master.trayek.list') }}`,
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
                appendHtml += `
                <tr>
                    <td>${index_loop}</td>S
                    <td>${element.nama?element.nama:'-'}</td>
                    <td>${element.kode?element.kode:'-'}</td>
                    <td>${element.latitude?element.latitude:'-'}</td>
                    <td>${element.longitude?element.longitude:'-'}</td>
                    <td>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end" data-id="${element.id}">
                            <button class="btn btn-info btn-sm me-md-2 detail-data" type="button" title="Detail">
                                <i class="fa-solid fa-eye"></i>
                            </button>
                            <button class="btn btn-warning btn-sm me-md-2 edit-data" type="button" title="Ubah">
                                <i class="fa-solid fa-pen"></i>
                            </button>
                            <button class="btn btn-danger btn-sm delete-data" type="button" title="Hapus">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>`;
                index_loop++;
            }
            if (totalPage==0) {
                appendHtml = `
                    <tr>
                        <th class="text-center" colspan="${$('.tb-head th').length}"> Tidak ada data. </th>
                    </tr>
                `;
                $('#countPage').text("0 - 0")
            }
            $('#tableData tbody').html(appendHtml)
        }
    }
</script>
@endsection
