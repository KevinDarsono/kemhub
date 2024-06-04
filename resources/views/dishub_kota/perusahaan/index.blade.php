
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
                <th>Nama Perusahaan</th>
                <th>NIB</th>
                <!-- <th>Alamat</th> -->
                <!-- <th>Provinsi</th> -->
                <!-- <th>Kota</th> -->
                <th>Nama Pimpinan</th>
                <th>Email</th>
                <th>No Telp Perusahaan</th>
                <!-- <th>No Telp PJ</th> -->
                <!-- <th>NPWP</th> -->
                <!-- <th>Jenis Angkutan</th> -->
                <!-- <th>No SK Izin Penyelenggaraan</th> -->
                <!-- <th>Tgl SK Terbit</th> -->
                <!-- <th>Tgl SK Expired</th> -->
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
                                <label for="">Provinsi <sup>
                                        <font color="red">*</font>
                                    </sup></label>
                                <select class="form-control" name="provinsi_id" id="input_provinsi_id"></select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="">Kabupaten/Kota <sup>
                                        <font color="red">*</font>
                                    </sup></label>
                                <select class="form-control" name="kota_id" id="input_kota_id"></select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="">Nama Perusahaan <sup>
                                        <font color="red">*</font>
                                    </sup></label>
                                <input type="text" class="form-control" name="nama" id="input_nama" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="">NIB <sup>
                                        <font color="red">*</font>
                                    </sup></label>
                                <input type="text" class="form-control" name="nib" id="input_nib" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="">Nama Pimpinan <sup>
                                        <font color="red">*</font>
                                    </sup></label>
                                <input type="text" class="form-control" name="nama_pimpinan" id="input_nama_pimpinan" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="">Email <sup>
                                        <font color="red">*</font>
                                    </sup></label>
                                <input type="text" class="form-control" name="email" id="input_email" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="">No Telp Perusahaan <sup>
                                        <font color="red">*</font>
                                    </sup></label>
                                <input type="text" class="form-control" name="no_telpon_perusahaan" id="input_no_telpon_perusahaan" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="">No Telp Penanggung Jawab <sup>
                                        <font color="red">*</font>
                                    </sup></label>
                                <input type="text" class="form-control" name="no_telpon_penanggung_jawab" id="input_no_telpon_penanggung_jawab" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="">NPWP <sup>
                                        <font color="red">*</font>
                                    </sup></label>
                                <input type="text" class="form-control" name="nomor_npwp" id="input_nomor_npwp" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="">No SK Izin Penyelenggaraan <sup>
                                        <font color="red">*</font>
                                    </sup></label>
                                <input type="text" class="form-control" name="no_sk_izin_penyelenggaraan" id="input_no_sk_izin_penyelenggaraan" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="">Tgl SK Terbit <sup>
                                        <font color="red">*</font>
                                    </sup></label>
                                <input type="date" class="form-control" name="tanggal_sk_terbit" id="input_tanggal_sk_terbit" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="">Tgl SK Expired <sup>
                                        <font color="red">*</font>
                                    </sup></label>
                                <input type="date" class="form-control" name="tanggal_sk_expired" id="input_tanggal_sk_expired" required />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="">Alamat <sup>
                                        <font color="red">*</font>
                                    </sup></label>
                                <textarea class="form-control" name="alamat" id="input_alamat" required></textarea>
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

    async function getListData(limit = 10, page = 1, ascending = 0, search = '') {
        loadingPage(true)
        const getDataRest = await CallAPI(
            'GET',
            `{{ route('api.dishub-kota.master.perusahaan.list') }}`, 
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
                    <td>${element.user.first_name ? element.user.first_name : '-'}</td>
                    <td>${element.nama ? element.nama : '-'}</td>
                    <td>${element.nib ? element.nib : '-'}</td>
                    <td>${element.nama_pimpinan ? element.nama_pimpinan : '-'}</td>
                    <td>${element.email ? element.email : '-'}</td>
                    <td>${element.no_telpon_perusahaan ? element.no_telpon_perusahaan : '-'}</td>
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
                `{{ route('api.dishub-kota.master.perusahaan.find') }}`, 
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
                        <th>Nama Perusahaan</th>
                        <td>: ${data.nama?data.nama:'-'}</td>
                    </tr>
                    <tr>
                        <th>NIB</th>
                        <td>: ${data.nib?data.nib:'-'}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>: ${data.alamat?data.alamat:'-'}</td>
                    </tr>
                    <tr>
                        <th>Provinsi</th>
                        <td>: ${data.provinsi_id?data.provinsi_id:'-'}</td>
                    </tr>
                    <tr>
                        <th>Kota</th>
                        <td>: ${data.kota_id?data.kota_id:'-'}</td>
                    </tr>
                    <tr>
                        <th>Nama Pimpinan</th>
                        <td>: ${data.nama_pimpinan?data.nama_pimpinan:'-'}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>: ${data.email?data.email:'-'}</td>
                    </tr>
                    <tr>
                        <th>No Telp Perusahaan</th>
                        <td>: ${data.no_telpon_perusahaan?data.no_telpon_perusahaan:'-'}</td>
                    </tr>
                    <tr>
                        <th>No Telp PJ</th>
                        <td>: ${data.no_telpon_penanggung_jawab?data.no_telpon_penanggung_jawab:'-'}</td>
                    </tr>
                    <tr>
                        <th>NPWP</th>
                        <td>: ${data.nomor_npwp?data.nomor_npwp:'-'}</td>
                    </tr>
                    <tr>
                        <th>No SK Izin Penyelenggaraan</th>
                        <td>: ${data.no_sk_izin_penyelenggaraan?data.no_sk_izin_penyelenggaraan:'-'}</td>
                    </tr>
                    <tr>
                        <th>Tgl SK Terbit</th>
                        <td>: ${data.tanggal_sk_terbit?data.tanggal_sk_terbit:'-'}</td>
                    </tr>
                    <tr>
                        <th>Tgl SK Expired</th>
                        <td>: ${data.tanggal_sk_expired?data.tanggal_sk_expired:'-'}</td>
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
                `{{ route('api.dishub-kota.master.perusahaan.find') }}`, 
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
                $('#input_nama').val(data.nama)
                $('#input_nib').val(data.nib)
                $('#input_alamat').val(data.alamat)
                
                let input_provinsi_id = new Option(data.provinsi.nama, data.provinsi.id, true, true);
                $("#input_provinsi_id").append(input_provinsi_id).trigger('change');
                let input_kota_id = new Option(data.kota.nama, data.kota.id, true, true);
                $("#input_kota_id").append(input_kota_id).trigger('change');

                $('#input_provinsi_id').val(data.provinsi_id)
                $('#input_kota_id').val(data.kota_id)
                $('#input_nama_pimpinan').val(data.nama_pimpinan)
                $('#input_email').val(data.email)
                $('#input_no_telpon_perusahaan').val(data.no_telpon_perusahaan)
                $('#input_no_telpon_penanggung_jawab').val(data.no_telpon_penanggung_jawab)
                $('#input_nomor_npwp').val(data.nomor_npwp)
                $('#input_no_sk_izin_penyelenggaraan').val(data.no_sk_izin_penyelenggaraan)
                $('#input_tanggal_sk_terbit').val(moment(data.tanggal_sk_terbit).format("YYYY-MM-DD"))
                $('#input_tanggal_sk_expired').val(moment(data.tanggal_sk_expired).format("YYYY-MM-DD"))
                
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
                        `{{ route('api.dishub-kota.master.perusahaan.destroy') }}`, 
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
            let url = `{{ route('api.dishub-kota.master.perusahaan.create') }}`
            if (isActionForm == "update") {
                data["id"] = $("#inputId").val()
                url = `{{ route('api.dishub-kota.master.perusahaan.update') }}`
                method      = "PUT"
            }
            data["nama"] = $("#input_nama").val()
            data["nib"] = $("#input_nib").val()
            data["alamat"] = $("#input_alamat").val()
            data["provinsi_id"] = $("#input_provinsi_id").val()
            data["kota_id"] = $("#input_kota_id").val()
            data["nama_pimpinan"] = $("#input_nama_pimpinan").val()
            data["email"] = $("#input_email").val()
            data["no_telpon_perusahaan"] = $("#input_no_telpon_perusahaan").val()
            data["no_telpon_penanggung_jawab"] = $("#input_no_telpon_penanggung_jawab").val()
            data["nomor_npwp"] = $("#input_nomor_npwp").val()
            data["no_sk_izin_penyelenggaraan"] = $("#input_no_sk_izin_penyelenggaraan").val()
            data["tanggal_sk_terbit"] = $("#input_tanggal_sk_terbit").val()
            data["tanggal_sk_expired"] = $("#input_tanggal_sk_expired").val()

            const postDataRest = await CallAPI(
                method,
                url, 
                data
            ).then(function(response) {
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
                        // id_country: 1,
                    }
                    return query;
                },
                processResults: function(res) {
                    let data = res.data
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.nama,
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
            await showSelectList('#input_provinsi_id', `{{ route('api.dishub-kota.master.provinsi.list') }}`),
            await showSelectList('#input_kota_id', `{{ route('api.dishub-kota.master.kota.list') }}`),
            await addData(),
            await detailData(),
            await editData(),
            await deleteData(),
            await submitData()
        ])
    }
</script>
@endsection


