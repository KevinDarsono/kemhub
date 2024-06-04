
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
                <th class="d-none">Trayek</th>
                <th>Nama</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Keterangan</th>
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

<form id="form-data">
    <div class="modal fade" id="modalData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalDataLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalDataLabel">Form Provinsi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <input type="hidden" name="id" id="inputId" />
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3 d-none">
                                <label for="">Trayek <sup>
                                        <font color="red">*</font>
                                    </sup></label>
                                <input type="text" class="form-control" name="trayek_id" id="input_trayek_id" required />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="">Nama <sup>
                                        <font color="red">*</font>
                                    </sup></label>
                                <input type="text" class="form-control" name="nama" id="input_nama" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="">Latitude <sup>
                                        <font color="red">*</font>
                                    </sup></label>
                                <input type="text" class="form-control" name="latitude" id="input_latitude" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="">Longitude <sup>
                                        <font color="red">*</font>
                                    </sup></label>
                                <input type="text" class="form-control" name="longitude" id="input_longitude" required />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="">Keterangan <sup>
                                        <font color="red">*</font>
                                    </sup></label>
                                <textarea class="form-control" name="keterangan" id="input_keterangan" required></textarea>
                            </div>
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


@endsection

@section('modal')
<!-- Modal Detail -->
<div class="modal fade" id="modalDetail" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalDetailLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalDetailLabel">Detail Perusahaan</h1>
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
            `{{ route('api.dishub-kab.master.trayek.list') }}`, 
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
                    <td>${index_loop}</td>
                    <td class="d-none">${element.user_id_input?element.user_id_input:'-'}</td>
                    <td class="d-none">${element.trayek_id?element.trayek_id:'-'}</td>
                    <td>${element.nama?element.nama:'-'}</td>
                    <td>${element.latitude?element.latitude:'-'}</td>
                    <td>${element.longitude?element.longitude:'-'}</td>
                    <td>${element.keterangan?element.keterangan:'-'}</td>
                    <td>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end" data-id="${element.id}">
                            <button class="btn btn-info btn-sm me-md-2 detail-data" type="button" title="Detail">
                                <i class="fa-solid fa-eye"></i>
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

    async function detailData() {
        $(document).on("click", ".detail-data", async function() {
            loadingPage(true)
            modalTitle = "Detail Data {{ $title }}";
            isActionForm = "detail";

            let id = $(this).parent().attr("data-id")
            
            $(".modal-title").html(modalTitle)

            const getDataRest = await CallAPI(
                'GET',
                `{{ route('api.dishub-kab.master.trayek.find') }}`, 
                {
                    id: id
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
                $("form").find("input, select, textarea").val("").prop("checked", false)
                    .trigger("change")
                $(".modal-title").html(modalTitle)
                $("#modalDetail").appendTo("body").modal("show")

                let data = getDataRest.data.data;

                let domHtml = `
                    <tr class="d-none">
                        <th>Trayek</th>
                        <td>: ${data.trayek_id?data.trayek_id:'-'}</td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td>: ${data.nama?data.nama:'-'}</td>
                    </tr>
                    <tr>
                        <th>Latitude</th>
                        <td>: ${data.latitude?data.latitude:'-'}</td>
                    </tr>
                    <tr>
                        <th>Longitude</th>
                        <td>: ${data.longitude?data.longitude:'-'}</td>
                    </tr>
                    <tr>
                        <th>Keterangan</th>
                        <td>: ${data.keterangan?data.keterangan:'-'}</td>
                    </tr>
                `

                $("#tableDetail").html(domHtml);
            }
        })
    }

    async function initPageLoad() {
        await Promise.all([
            await initDataOnTable(defaultLimitPage, currentPage, defaultAscending, defaultSearch),
            await manipulationDataOnTable(),
            await detailData(),
        ])
    }
</script>
@endsection


