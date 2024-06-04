
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
        <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
            <a href="javascript:void(0)" id="addData" class="btn btn-primary successAlertMessage">
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
                <select name="limitPage"
                    id="limitPage"
                    class="form-control"
                    style="margin-right: 10px;text-align: center;width: 25%;">
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

    <div class="table-responsive-md">
        <table class="table table-hover table-striped" style="width: 100%" id="tableData">
          <thead>
            <tr class="tb-head">
              <th>No</th>
              <th>Kode</th>
              <th>Nama</th>
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

<form>
    <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="formModalLabel">Form Kota</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <input type="hidden" name="id" id="inputId" />
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="">Kode Kota<sup>
                                        <font color="red">*</font>
                                    </sup></label>
                                <input type="text" class="form-control" name="kode_kota" id="inputKodeKota" required />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="">Nama <sup>
                                        <font color="red">*</font>
                                    </sup></label>
                                <input type="text" class="form-control" name="nama_kota" id="inputNamaKota" required />
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection


@section('asset_js')
<script src="{{ asset('assets/js/paginationjs/pagination.min.js') }}"></script>
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
            `{{ route('api.administrator.master.kota.list') }}`, {
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
                    <td>${index_loop}</td>
                    <td><b>${element.kode_administratif}</b></td>
                    <td>${element.nama}</td>
                    <td>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end" data-id="${element.id}">
                            <button class="btn btn-warning btn-sm me-md-2 edit-data" type="button">
                                <i class="fa-solid fa-eye"></i> Ubah
                            </button>
                            <button class="btn btn-danger btn-sm delete-data" type="button">
                                <i class="fa-solid fa-trash"></i> Hapus
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

    async function initPageLoad() {
        await Promise.all([
            await initDataOnTable(defaultLimitPage, currentPage, defaultAscending, defaultSearch),
            await manipulationDataOnTable()
        ])
    }
</script>
@endsection


