
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
            <a href="javascript:void(0)" id="add-data" class="btn btn-primary d-none">
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
                <th>User Input</th>
                <th>Nomor Kendaraan</th>
                <th>Seat</th>
                <th>Merek</th>
                <th>Nomor Rangka</th>
                <th>Nomor Mesin</th>
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
                            <div class="form-group mb-3">
                                <label for="">Nomor Kendaraan <sup>
                                        <font color="red">*</font>
                                    </sup></label>
                                <input type="text" class="form-control" name="nomor_kendaraan" id="input_nomor_kendaraan" required />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="">Seat <sup>
                                        <font color="red">*</font>
                                    </sup></label>
                                <input type="text" class="form-control" name="seat" id="input_seat" required />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="">Merek <sup>
                                        <font color="red">*</font>
                                    </sup></label>
                                <input type="text" class="form-control" name="merek" id="input_merek" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="">Nomor Rangka <sup>
                                        <font color="red">*</font>
                                    </sup></label>
                                <input type="text" class="form-control" name="nomor_rangka" id="input_nomor_rangka" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="">Nomor Mesin <sup>
                                        <font color="red">*</font>
                                    </sup></label>
                                <input type="text" class="form-control" name="nomor_mesin" id="input_nomor_mesin" required />
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
            `{{ route('api.bptd.master.kendaraan.list') }}`, 
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
                    <td>${element.user.first_name?element.user.first_name:'-'}</td>
                    <td>${element.nomor_kendaraan?element.nomor_kendaraan:'-'}</td>
                    <td>${element.seat?element.seat:'-'}</td>
                    <td>${element.merek?element.merek:'-'}</td>
                    <td>${element.nomor_rangka?element.nomor_rangka:'-'}</td>
                    <td>${element.nomor_mesin?element.nomor_mesin:'-'}</td>
                    <td>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end" data-id="${element.id}">
                            <button class="btn btn-info btn-sm me-md-2 detail-data" type="button" title="Detail">
                                <i class="fa-solid fa-eye"></i>
                            </button>
                            <button class="btn btn-warning btn-sm me-md-2 edit-data d-none" type="button" title="Ubah">
                                <i class="fa-solid fa-pen"></i>
                            </button>
                            <button class="btn btn-danger btn-sm delete-data d-none" type="button" title="Hapus">
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

    // Action

    function addData() {
        $(document).on("click", "#add-data", function() {
            modalTitle = "Tambah Data {{ $title }}";
            isActionForm = "create";
            $("form").trigger('reset')
            $("form").find("input, select, textarea").val("").prop("checked", true).trigger("change")
            $(".modal-title").html(modalTitle)
            $("#modalData").modal("show")
        })
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
                `{{ route('api.bptd.master.kendaraan.find') }}`, 
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
                    <tr>
                        <th>User Input</th>
                        <td>: ${data.user.first_name?data.user.first_name:'-'} (${data.user.name_role?data.user.name_role:'-'})</td>
                    </tr>
                    <tr>
                        <th>Nomor Kendaraan</th>
                        <td>: ${data.nomor_kendaraan?data.nomor_kendaraan:'-'}</td>
                    </tr>
                    <tr>
                        <th>Seat</th>
                        <td>: ${data.seat?data.seat:'-'}</td>
                    </tr>
                    <tr>
                        <th>Merek</th>
                        <td>: ${data.merek?data.merek:'-'}</td>
                    </tr>
                    <tr>
                        <th>Nomor Rangka</th>
                        <td>: ${data.nomor_rangka?data.nomor_rangka:'-'}</td>
                    </tr>
                    <tr>
                        <th>Nomor Mesin</th>
                        <td>: ${data.nomor_mesin?data.nomor_mesin:'-'}</td>
                    </tr>
                `

                $("#tableDetail").html(domHtml);
            }
        })
    }

    async function editData() {
        $(document).on("click", ".edit-data d-none", async function() {
            loadingPage(true)
            modalTitle = "Ubah Data {{ $title }}";
            isActionForm = "update";

            let id = $(this).parent().attr("data-id")
            $(".modal-title").html(modalTitle)

            const getDataRest = await CallAPI(
                'GET',
                `{{ route('api.bptd.master.kendaraan.find') }}`, 
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
                $("#modalData").modal("show")

                let data = getDataRest.data.data;
                $('#inputId').val(data.id)
                $('#input_nomor_kendaraan').val(data.nomor_kendaraan)
                $('#input_seat').val(data.seat)
                $('#input_merek').val(data.merek)
                $('#input_nomor_rangka').val(data.nomor_rangka)
                $('#input_nomor_mesin').val(data.nomor_mesin)
                
            }
        })
    }

    async function deleteData() {
        $(document).on("click", ".delete-data d-none", async function() {
            isActionForm = "delete";
            let id = $(this).parent().attr("data-id")
            swal.fire({
                title: "Pemberitahuan",
                text: "Anda tidak akan dapat mengembalikannya!",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Ya, Hapus!",
                cancelButtonText: "Tidak, Batal!",
                reverseButtons: true
            }).then(async (result) => {
                if (result) {
                    const postDataRest = await CallAPI(
                        'DELETE',
                        `{{ route('api.bptd.master.kendaraan.list') }}`, 
                        {
                            "id": id
                        }
                    ).then(function(response) {
                        return response;
                    }).catch(function(error) {
                        loadingPage(false)
                        let resp = error.response;
                        notificationAlert('info','Pemberitahuan',resp.data.message)
                        return resp
                    })
                    if(postDataRest.status == 200) {
                        loadingPage(false)
                        await initDataOnTable(defaultLimitPage, currentPage, defaultAscending, defaultSearch)
                        notificationAlert('success','Pemberitahuan', postDataRest.data.message)
                    }
                } else {
                    notificationAlert('info','Pemberitahuan', "Data Anda aman :)")
                }
            }).catch(swal.noop)
        })
    }

    async function submitData() {
        $(document).on("submit", "#form-data", async function(e) {
            e.preventDefault()
            loadingPage(true)
            const data = {}
            let method = "POST"
            let url = `{{ route('api.bptd.master.kendaraan.list') }}`
            if (isActionForm == "update") {
                url = `{{ route('api.bptd.master.kendaraan.list') }}`
                data["id"] = $("#inputId").val()
                method      = "PUT"
            }
            data["nomor_kendaraan"] = $('#input_nomor_kendaraan').val()
            data["seat"] = $('#input_seat').val()
            data["merek"] = $('#input_merek').val()
            data["nomor_rangka"] = $('#input_nomor_rangka').val()
            data["nomor_mesin"] = $('#input_nomor_mesin').val()

            const postDataRest = await CallAPI(method, url, data).then(function(response) {
                return response
            }).catch(function(error) {
                loadingPage(false)
                let resp = error.response
                notificationAlert('info', 'Pemberitahuan', resp.data.message)
                return resp
            })

            if (postDataRest.status == 200) {
                loadingPage(false)
                await initDataOnTable(defaultLimitPage, currentPage, defaultAscending, defaultSearch)
                notificationAlert('success', 'Pemberitahuan', postDataRest.data.message)
                $(this).trigger("reset")
                $("#modalData").modal("hide")
            }
        })
    }

    async function initPageLoad() {
        await Promise.all([
            await initDataOnTable(defaultLimitPage, currentPage, defaultAscending, defaultSearch),
            await manipulationDataOnTable(),
            await addData(),
            await detailData(),
            await editData(),
            await deleteData(),
            await submitData()
        ])
    }
</script>
@endsection


