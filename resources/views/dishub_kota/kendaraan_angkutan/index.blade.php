
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
</style>
@endsection


@section('action_header')
<div class="page-header-right ms-auto">
    <div class="page-header-right-items">
        <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
            <a href="javascript:void(0)" id="add-data" class="btn btn-primary">
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
                <th>Approval</th>
                <th>Perusahaan</th>
                <th>Kendaraan</th>
                <th>Masa Berlaku Kps</th>
                <th>Masa Berlaku Uji Berkala</th>
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
                    <h1 class="modal-title fs-5" id="modalDataLabel">Form</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="inputId" />
                    <div class="row">
                        <input type="hidden" id="input_provinsi_id" value="{{Auth::user()->provinsi_id}}" />
                        <input type="hidden" id="input_kota_id" value="{{Auth::user()->kota_id}}" />
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="">Perusahaan <sup>
                                        <font color="red">*</font>
                                    </sup></label>
                                <select class="form-control" name="perusahaan_id" id="input_perusahaan_id" required></select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="">Jenis Angkutan <sup>
                                        <font color="red">*</font>
                                    </sup></label>
                                <select class="form-control" name="jenis_angkutan_id" id="input_jenis_angkutan_id" required></select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="">Trayek <sup>
                                        <font color="red">*</font>
                                    </sup></label>
                                <select class="form-control" name="trayek_id" id="input_trayek_id" required></select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="">Rute Trayek <sup>
                                        <font color="red">*</font>
                                    </sup></label>
                                <select class="form-control" name="rute_trayek_id" id="input_rute_trayek_id" required></select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="">Jenis Layanan <sup>
                                        <font color="red">*</font>
                                    </sup></label>
                                <select class="form-control" name="jenis_layanan_id" id="input_jenis_layanan_id" required></select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="">Kendaraan <sup>
                                        <font color="red">*</font>
                                    </sup></label>
                                <select class="form-control" name="kendaraan_id" id="input_kendaraan_id" required></select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="">Masa Berlaku Kps <sup>
                                        <font color="red">*</font>
                                    </sup></label>
                                <input type="date" class="form-control" name="masa_berlaku_kps" id="input_masa_berlaku_kps" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="">Masa Berlaku Uji Berkala <sup>
                                        <font color="red">*</font>
                                    </sup></label>
                                <input type="date" class="form-control" name="masa_berlaku_uji_berkala" id="input_masa_berlaku_uji_berkala" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="">Nomor Uji Berkala <sup>
                                        <font color="red">*</font>
                                    </sup></label>
                                <input type="text" class="form-control" name="nomor_uji_berkala" id="input_nomor_uji_berkala" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="">Nomor Srut <sup>
                                        <font color="red">*</font>
                                    </sup></label>
                                <input type="text" class="form-control" name="nomor_srut" id="input_nomor_srut" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="">Nomor Kartu Pengawas KPS <sup>
                                        <font color="red">*</font>
                                    </sup></label>
                                <input type="text" class="form-control" name="nomor_kartu_pengawas_kps" id="input_nomor_kartu_pengawas_kps" required />
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
        <h1 class="modal-title fs-5" id="modalDetailLabel">Detail Kendaran Angkutan</h1>
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

    let provinsi_id = '{{ Auth::user()->provinsi_id }}'
    let kota_id = '{{ Auth::user()->kota_id }}'

    async function getListData(limit = 10, page = 1, ascending = 0, search = '') {
        loadingPage(true)
        const getDataRest = await CallAPI(
            'GET',
            `{{ route('api.dishub-kota.kendaraan-angkutan.list') }}`, 
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
                    <td>${element.user_id_input}</td>
                    <td>${element.is_approve}</td>
                    <td>${element.perusahaan_id}</td>
                    <td>${element.kendaraan_id}</td>
                    <td>${element.masa_berlaku_kps}</td>
                    <td>${element.masa_berlaku_uji_berkala}</td>
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

    // Action

    function addData() {
        $(document).on("click", "#add-data", function() {
            modalTitle = "Tambah Data {{ $title }}";
            isActionForm = "create";
            $("form").trigger('reset')
            $("form").find("input, select, textarea").val("").prop("checked", true).trigger("change")
            $(".modal-title").html(modalTitle)
            $("#modalData").modal("show")
            $('#input_provinsi_id').val(provinsi_id)
            $('#input_kota_id').val(kota_id)
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
                `{{ route('api.dishub-kota.kendaraan-angkutan.find') }}`, 
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
                        <td>: ${data.user.first_name} (${data.user.name_role})</td>
                    </tr>
                    <tr>
                        <th>Approval</th>
                        <td>: ${data.is_approve==0?'Menunggu Approval':'Approved'}</td>
                    </tr>
                    <tr>
                        <th>Perusahaan</th>
                        <td>: ${data.perusahaan.nama}</td>
                    </tr>
                    <tr>
                        <th>Jenis Angkutan</th>
                        <td>: ${data.jenis_angkutan.nama}</td>
                    </tr>
                    <tr>
                        <th>Jenis Layanan</th>
                        <td>: ${data.jenis_layanan.nama}</td>
                    </tr>
                    <tr>
                        <th>Trayek</th>
                        <td>: ${data.trayek.nama}</td>
                    </tr>
                    <tr>
                        <th>Rute Trayek</th>
                        <td>: ${data.rute_trayek.nama}</td>
                    </tr>
                    <tr>
                        <th>Kendaraan</th>
                        <td>: ${data.kendaraan.nomor_kendaraan}</td>
                    </tr>
                    <tr>
                        <th>Masa Berlaku Kps</th>
                        <td>: ${data.masa_berlaku_kps}</td>
                    </tr>
                    <tr>
                        <th>Masa Berlaku Uji Berkala</th>
                        <td>: ${data.masa_berlaku_uji_berkala}</td>
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
                
                `

                $("#tableDetail").html(domHtml);
            }
        })
    }

    async function editData() {
        $(document).on("click", ".edit-data", async function() {
            loadingPage(true)
            modalTitle = "Ubah Data {{ $title }}";
            isActionForm = "update";

            let id = $(this).parent().attr("data-id")
            $(".modal-title").html(modalTitle)

            const getDataRest = await CallAPI(
                'GET',
                `{{ route('api.dishub-kota.kendaraan-angkutan.find') }}`, 
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
                
                $('#input_provinsi_id').val(data.provinsi_id)
                $('#input_kota_id').val(data.kota_id)

                let input_perusahaan_id = new Option(data.perusahaan.nama, data.perusahaan.id, true, true);
                $("#input_perusahaan_id").append(input_perusahaan_id).trigger('change');
                let input_jenis_angkutan_id = new Option(data.jenis_angkutan.nama, data.jenis_angkutan.id, true, true);
                $("#input_jenis_angkutan_id").append(input_jenis_angkutan_id).trigger('change');
                let input_trayek_id = new Option(data.trayek.nama, data.trayek.id, true, true);
                $("#input_trayek_id").append(input_trayek_id).trigger('change');
                let input_rute_trayek_id = new Option(data.rute_trayek.nama, data.rute_trayek.id, true, true);
                $("#input_rute_trayek_id").append(input_rute_trayek_id).trigger('change');
                let input_jenis_layanan_id = new Option(data.jenis_layanan.nama, data.jenis_layanan.id, true, true);
                $("#input_jenis_layanan_id").append(input_jenis_layanan_id).trigger('change');
                let input_kendaraan_id = new Option(data.kendaraan.nomor_kendaraan, data.kendaraan.id, true, true);
                $("#input_kendaraan_id").append(input_kendaraan_id).trigger('change');


                $("#input_masa_berlaku_kps").val(data.masa_berlaku_kps)
                $("#input_masa_berlaku_uji_berkala").val(data.masa_berlaku_uji_berkala)
                $("#input_nomor_uji_berkala").val(data.nomor_uji_berkala)
                $("#input_nomor_srut").val(data.nomor_srut)
                $("#input_nomor_kartu_pengawas_kps").val(data.nomor_kartu_pengawas_kps)

            }
        })
    }

    async function deleteData() {
        $(document).on("click", ".delete-data", async function() {
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
                        `{{ route('api.dishub-kota.kendaraan-angkutan.destroy') }}`, 
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
            console.log('test submit')
            e.preventDefault()
            loadingPage(true)
            const data = {}
            let method = "POST"
            let url = `{{ route('api.dishub-kota.kendaraan-angkutan.create') }}`
            if (isActionForm == "update") {
                url = `{{ route('api.dishub-kota.kendaraan-angkutan.update') }}`
                data["id"] = $("#inputId").val()
                method      = "PUT"
            }
            data["perusahaan_id"] = $("#input_perusahaan_id").val()
            data["jenis_angkutan_id"] = $("#input_jenis_angkutan_id").val()
            data["trayek_id"] = $("#input_trayek_id").val()
            data["rute_trayek_id"] = $("#input_rute_trayek_id").val()
            data["jenis_layanan_id"] = $("#input_jenis_layanan_id").val()
            data["kendaraan_id"] = $("#input_kendaraan_id").val()
            data["masa_berlaku_kps"] = $("#input_masa_berlaku_kps").val()
            data["masa_berlaku_uji_berkala"] = $("#input_masa_berlaku_uji_berkala").val()
            data["nomor_uji_berkala"] = $("#input_nomor_uji_berkala").val()
            data["nomor_srut"] = $("#input_nomor_srut").val()
            data["nomor_kartu_pengawas_kps"] = $("#input_nomor_kartu_pengawas_kps").val()

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

    async function showSelectList(id, isUrl) {
        await $(`${id}`).select2({
            language: languageIndonesian,
            dropdownParent: $('#modalData'),
            ajax: {
                url: isUrl,
                dataType: 'json',
                delay: 500,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: function(params) {
                    let query = {
                        search: params.term,
                        page: 1,
                        limit: 30,
                        ascending: 1,
                    }
                    return query;
                },
                processResults: function(res) {
                    let data = res.data
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: id=='#input_kendaraan_id'? item.nomor_kendaraan : item.nama,
                                id: item.id
                            }
                        })
                    };
                },
            },
            allowClear: true,
            placeholder: ''
        });
    }

    async function initPageLoad() {
        await Promise.all([
            await initDataOnTable(defaultLimitPage, currentPage, defaultAscending, defaultSearch),
            await manipulationDataOnTable(),

            // await showSelectList('#input_provinsi_id', `{{ route('api.dishub-kota.master.provinsi.list') }}`),
            // await showSelectList('#input_kota_id', `{{ route('api.dishub-kota.master.kota.list') }}`),

            await showSelectList('#input_perusahaan_id', `{{ route('api.dishub-kota.master.perusahaan.list') }}`),
            await showSelectList('#input_jenis_angkutan_id', `{{ route('api.dishub-kota.master.jenis-angkutan.list') }}`),

            await showSelectList('#input_trayek_id', `{{ route('api.dishub-kota.master.trayek.list') }}`),
            await showSelectList('#input_rute_trayek_id', `{{ route('api.dishub-kota.master.rute-trayek.list') }}`),
            await showSelectList('#input_jenis_layanan_id', `{{ route('api.dishub-kota.master.jenis-layanan.list') }}`),
            await showSelectList('#input_kendaraan_id', `{{ route('api.dishub-kota.master.kendaraan.list') }}`),

            await addData(),
            await detailData(),
            await editData(),
            await deleteData(),
            await submitData()
        ])
    }
</script>
@endsection


