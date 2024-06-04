
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
                <th>Approval</th>
                <th>Nama Perusahaan</th>
                <th>Nomor Kendaraan</th>
                <th>Masa Berlaku Kps</th>
                <th>Masa Berlaku Uji Berkala</th>
                <th>Dibuat</th>
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

<!-- Modal Detail -->
<div class="modal fade" id="modalDetail" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalDetailLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalDetailLabel">Detail Kendaran Angkutan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table table-hover table-striped" id="tableDetail"></table>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="button" class="btn btn-success approve-data">Setujui</button>
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
    let modalTitle = ""
    let isActionForm = "create"
    let defaultLimitPage = 10
    let currentPage = 1
    let totalPage = 1
    let defaultAscending = 0
    let defaultSearch = ''

    async function getListData(limit = 10, page = 1, ascending = 0, search = '') {
        loadingPage(true)
        const getDataRest = await CallAPI(
            'GET',
            `{{ route('api.bptd.persetujuan.list') }}`, 
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
            let resp = error.response
            notificationAlert('info', 'Pemberitahuan', resp.data.message)
            return resp
        })

        if (getDataRest.status == 200) {
            loadingPage(false)
            totalPage = getDataRest.data.pagination.total
            let data = getDataRest.data.data
            let display_from = ((defaultLimitPage * getDataRest.data.pagination.current_page) + 1) -
                defaultLimitPage
            let display_to = currentPage < getDataRest.data.pagination.total_pages ? data.length < defaultLimitPage ? data.length : (defaultLimitPage * getDataRest.data.pagination.current_page) : totalPage
            $('#totalPage').text(getDataRest.data.pagination.total)
            $('#countPage').text("" + display_from + " - " + display_to + "")
            let appendHtml = ""
            let index_loop = display_from
            data.map(function(data, index) {
                let element = data
                let isApprove = `<div class="badge bg-soft-warning text-warning">Menunggu</div>`
                let hideRejection = ""
                let iconView  = `check`
                let iconViewBg = `success`
                if (element.is_approve==0) {
                    isApprove = `<div class="badge bg-soft-danger text-danger">Ditolak</div>`
                    hideRejection = "d-none"
                    iconView  = `eye`
                    iconViewBg = `warning`
                }
                if (element.is_approve==1) {
                    isApprove = `<div class="badge bg-soft-success text-success">Disetujui</div>`
                    hideRejection = "d-none"
                    iconView  = `eye`
                    iconViewBg = `info`
                }
                appendHtml += `
                <tr>
                    <td>${index_loop}</td>
                    <td>
                        ${element.kendaraan_angkutan.user.first_name}
                        <b>(${element.kendaraan_angkutan.user.name_role})</b>
                    </td>
                    <td>${isApprove}</td>
                    <td>${element.kendaraan_angkutan.perusahaan.nama}</td>
                    <td>${element.kendaraan_angkutan.kendaraan.nomor_kendaraan}</td>
                    <td>${moment(element.masa_berlaku_kps).format("MM-DD-YYYY")}</td>
                    <td>${moment(element.masa_berlaku_uji_berkala).format("MM-DD-YYYY")}</td>
                    <td>${moment(element.kendaraan_angkutan.created_at).format("MM-DD-YYYY HH:MM:ss")}</td>
                    <td>
                        <div class="hstack gap-2 justify-content-end" data-id="${element.kendaraan_angkutan.id}" data-ref-id="${element.id}">
                            <a href="javascript:void(0)" class="avatar-text avatar-md bg-${iconViewBg} text-white detail-data" title="Detail">
                                <i class="fa-solid fa-${iconView}"></i>
                            </a>
                            <a href="javascript:void(0)" class="avatar-text avatar-md bg-danger text-white ${hideRejection} reject-data" title="Tolak"
                                data-id="${element.id}"
                            >
                                <i class="fa-solid fa-xmark"></i>
                            </a>
                        </div>
                    </td>
                </tr>`
                index_loop++
            })
            if (totalPage==0) {
                appendHtml = `
                    <tr>
                        <th class="text-center" colspan="${$('.tb-head th').length}"> Tidak ada data. </th>
                    </tr>
                `
                $('#countPage').text("0 - 0")
            }
            $('#tableData tbody').html(appendHtml)
        }
    }

    // Action

    async function detailData() {
        $(document).on("click", ".detail-data", async function() {
            loadingPage(true)
            modalTitle = "Detail Data {{ $title }}"
            isActionForm = "detail"

            let id = $(this).parent().attr("data-id")
            let idRef = $(this).parent().attr("data-ref-id")
            
            $(".modal-title").html(modalTitle)

            const getDataRest = await CallAPI(
                'GET',
                `{{ route('api.bptd.kendaraan-angkutan.find') }}`, 
                {
                    id: id
                }
            ).then(function(response) {
                return response
            }).catch(function(error) {
                loadingPage(false)
                let resp = error.response
                notificationAlert('info', 'Pemberitahuan', resp.data.message)
                return resp
            })

            if (getDataRest.status == 200) {
                loadingPage(false)
                $("form").find("input, select, textarea").val("").prop("checked", false)
                    .trigger("change")
                $(".modal-title").html(modalTitle)
                $("#modalDetail").appendTo("body").modal("show")

                let data = getDataRest.data.data
                let isApprove = "Menunggu"
                let isHide = ""
                if (data.is_approve==0) {
                    isApprove   = "Ditolak"
                    isHide      = "d-none"
                }
                if (data.is_approve==1) {
                    isApprove   = "Disetujui"
                    isHide      = "d-none"
                }

                let domHtml = `
                    <tr>
                        <th>User Input</th>
                        <td>: ${data.user.first_name} (${data.user.name_role})</td>
                    </tr>
                    <tr>
                        <th>Approval</th>
                        <td>: ${isApprove}</td>
                    </tr>
                    <tr>
                        <th>Nama Perusahaan</th>
                        <td>: ${data.perusahaan.nama}</td>
                    </tr>
                    <tr>
                        <th>Jenis Angkutan</th>
                        <td>: ${data.jenis_angkutan.nama}</td>
                    </tr>
                    <tr>
                        <th>Jenis Pelayanan</th>
                        <td>: ${data.jenis_layanan.nama}</td>
                    </tr>
                    <tr>
                        <th>Kode Trayek</th>
                        <td>: ${data.trayek.kode}</td>
                    </tr>
                    <tr>
                        <th>Trayek Kendaraan</th>
                        <td>: ${data.trayek.nama}</td>
                    </tr>
                    <tr>
                        <th>Rute Trayek</th>
                        <td>: ${data.rute_trayek.nama}</td>
                    </tr>
                    <tr>
                        <th>Nomor Kendaraan</th>
                        <td>: ${data.kendaraan.nomor_kendaraan}</td>
                    </tr>
                    <tr>
                        <th>Seat</th>
                        <td>: ${data.kendaraan.seat}</td>
                    </tr>
                    <tr>
                        <th>Merek</th>
                        <td>: ${data.kendaraan.merek}</td>
                    </tr>
                    <tr>
                        <th>Nomor Rangka</th>
                        <td>: ${data.kendaraan.nomor_rangka}</td>
                    </tr>
                    <tr>
                        <th>Nomor Mesin</th>
                        <td>: ${data.kendaraan.nomor_mesin}</td>
                    </tr>
                    <tr>
                        <th>Nomor Uji Berkala</th>
                        <td>: ${data.nomor_uji_berkala}</td>
                    </tr>
                    <tr>
                        <th>Nomor Srut</th>
                        <td>: ${data.nomor_srut}</td>
                    </tr>
                    <tr>
                        <th>Nomor Kartu Pengawas KPS</th>
                        <td>: ${data.nomor_kartu_pengawas_kps}</td>
                    </tr>
                    <tr>
                        <th>Masa Berlaku Kps</th>
                        <td>: ${moment(data.masa_berlaku_kps).format("MM-DD-YYYY")}</td>
                    </tr>
                    <tr>
                        <th>Masa Berlaku Uji Berkala</th>
                        <td>: ${moment(data.masa_berlaku_uji_berkala).format("MM-DD-YYYY")}</td>
                    </tr>
                    <tr>
                        <th>Dibuat</th>
                        <td>: ${moment(data.created_at).format("MM-DD-YYYY HH:MM:ss")}</td>
                    </tr>
                    
                `
                $(".approve-data").attr("data-id", idRef)
                $(".approve-data").addClass(isHide)
                $("#tableDetail").html(domHtml)
            }
        })
    }

    async function rejectAction() {
        $(document).on("click", ".reject-data", function() {
            let idRef = $(this).attr("data-id")
            Swal.fire({
                title: "Apakah anda akan menolak data ini?",
                text: "",
                icon: "warning",
                input: "textarea",
                inputAttributes: {
                  autocapitalize: "off",
                  required: true
                },
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Tolak!",
                cancelButtonText: "Batal",
                preConfirm: () => {
                    const inputValue = Swal.getInput().value;
                    if (!inputValue) {
                        Swal.showValidationMessage('Harap isi alasan penolakan.');
                        return false; // Prevent the modal from closing
                    }
                    return inputValue;
                }
            }).then(async (result) => {
                let notes = result.value!=''?result.value:null
                if (notes!=null) {
                    await approvalFetchAction(idRef, false, notes)
                }
            })
        })
    }

    async function approveAction() {
        $(document).on("click", ".approve-data", function() {
            let idRef = $(this).attr("data-id")
            Swal.fire({
                title: "Apakah anda akan menyetujui data ini?",
                text: "",
                icon: "info",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Setujui!",
                cancelButtonText: "Batal"
            }).then(async (result) => {
                let notes = result.value!=''?result.value:null
                if (notes!=null) {
                    await approvalFetchAction(idRef, true, null)
                }
            })
        })
    }

    async function approvalFetchAction(isId, isApprove=true, isNotes=null) {
        loadingPage(true)
        const getDataRest = await CallAPI(
            'POST',
            `{{ route('api.bptd.persetujuan.setujui') }}`, 
            {
                id: isId,
                is_approve: isApprove,
                catatan: isNotes
            }
        ).then(function(response) {
            return response
        }).catch(function(error) {
            loadingPage(false)
            let resp = error.response
            notificationAlert('info', 'Pemberitahuan', resp.data.message)
            return resp
        })

        if (getDataRest.status==200) {
            loadingPage(false)
            notificationAlert('success', 'Pemberitahuan', `Data berhasil di${isApprove?'setujui':'tolak'}!`)
            await initDataOnTable(defaultLimitPage, currentPage, defaultAscending, defaultSearch)
            await manipulationDataOnTable()
            $("#modalDetail").modal("hide")
        }
    }

    async function initPageLoad() {
        await Promise.all([
            await initDataOnTable(defaultLimitPage, currentPage, defaultAscending, defaultSearch),
            await manipulationDataOnTable(),
            await detailData(),
            await rejectAction(),
            await approveAction(),
        ])
    }
</script>
@endsection


