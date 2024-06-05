@extends('layouts.master')

@section('asset_css')
    <link rel="stylesheet" href="{{ asset('assets/css/pagination.min.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
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
                        <th>User</th>
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
                        <h1 class="modal-title fs-5" id="modalDataLabel">Form Group User</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="inputId" />
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="">
                                        User
                                        <small class="text-danger">
                                            *
                                        </small>
                                    </label>
                                    <select class="form-control" name="user_id" id="input_user_id">

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="">Parent User <sup>
                                            <font color="red">*</font>
                                        </sup></label>
                                    <select class="form-control" name="parent_user_id[]" id="input_parent_user_id"
                                        multiple></select>
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
                    <h1 class="modal-title fs-5" id="modalDetailLabel">Detail Grup Pengguna</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped" style="width: 100%" id="tableDetail"></table>
                        <table class="table table-hover table-striped" style="width: 100%" id="tableDetailList">
                            <thead>
                                <tr class="tb-head">
                                    <th>No</th>
                                    <th>User</th>
                                    <th class="text-end">Aksi</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
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
        let userManagementListRoute = `{{ route('api.administrator.user-management.list') }}`;


        async function getListData(limit = 10, page = 1, ascending = 0, search = '') {
            loadingPage(true);
            const getDataRest = await CallAPI(
                'GET',
                `{{ route('api.administrator.pengelolaan-grup-pengguna.list') }}`, {
                    page: page,
                    limit: limit,
                    ascending: ascending,
                    search: search
                }
            ).then(function(response) {
                return response;
            }).catch(function(error) {
                loadingPage(false);
                let resp = error.response;
                notificationAlert('info', 'Pemberitahuan', resp.data.message);
                return resp;
            });

            if (getDataRest.status == 200) {
                loadingPage(false);
                totalPage = getDataRest.data.pagination.total;
                let data = getDataRest.data.data;
                let display_from = ((defaultLimitPage * getDataRest.data.pagination.current_page) + 1) -
                    defaultLimitPage;
                let display_to = currentPage < getDataRest.data.pagination.total_pages ? data.length <
                    defaultLimitPage ? data.length : (defaultLimitPage * getDataRest.data.pagination.current_page) :
                    totalPage;
                $('#totalPage').text(getDataRest.data.pagination.total);
                $('#countPage').text("" + display_from + " - " + display_to + "");
                let appendHtml = "";
                let index_loop = display_from;
                let displayedUserIds = new Set(); // Untuk melacak user_id yang sudah ditampilkan

                for (let index = 0; index < data.length; index++) {
                    let element = data[index];

                    // Hanya tampilkan baris untuk user_id yang belum ditampilkan
                    if (!displayedUserIds.has(element.user.id)) {
                        appendHtml += `
                    <tr>
                        <td>${index_loop}</td>
                        <td>${element.user.name_role ? element.user.name_role : '-'}</td>

                        <td>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end" data-id="${element.user_id}">
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
                        // Tambahkan user_id ke set yang sudah ditampilkan
                        displayedUserIds.add(element.user.id);
                        index_loop++;
                    }
                }
                if (totalPage == 0) {
                    appendHtml = `
                <tr>
                    <th class="text-center" colspan="${$('.tb-head th').length}"> Tidak ada data. </th>
                </tr>
            `;
                    $('#countPage').text("0 - 0");
                }
                $('#tableData tbody').html(appendHtml);
            }
        }

        // Action
        function addData() {
            $(document).on("click", "#add-data", function() {
                modalTitle = "Tambah Data {{ $title }}";
                isActionForm = "create";
                $("form").trigger('reset');
                $("form").find("select").val("").prop("checked", true).trigger("change");
                $(".modal-title").html(modalTitle);
                $("#modalData").modal("show");

            });
        }

        // async function detailData() {
        //     $(document).on("click", ".detail-data", async function() {
        //         loadingPage(true)
        //         modalTitle = "Detail Data {{ $title }}";
        //         isActionForm = "detail";

        //         let id = $(this).parent().attr("data-id")

        //         $(".modal-title").html(modalTitle)

        //         const getDataRest = await CallAPI(
        //             'GET',
        //             `{{ route('api.administrator.pengelolaan-grup-pengguna.find') }}`, {
        //                 id: id
        //             }
        //         ).then(function(response) {
        //             return response;
        //         }).catch(function(error) {
        //             loadingPage(false)
        //             let resp = error.response;
        //             notificationAlert('info', 'Pemberitahuan', resp.data.message)
        //             return resp;
        //         })

        //         if (getDataRest.status == 200) {
        //             loadingPage(false)
        //             $("form").find("input, select, textarea").val("").prop("checked", false)
        //                 .trigger("change")
        //             $(".modal-title").html(modalTitle)
        //             $("#modalDetail").appendTo("body").modal("show")

        //             let data = getDataRest.data.data;

        //             console.log(data)

        //             let domHtml = `
    //             <tr>
    //                 <th>User Input</th>
    //                 <td>: ${data.user.name_role?data.user.name_role:'-'}</td>

    //             </tr>

    //              `
        //              let listData = `
    //              <tr>
    //                 <td>${data.parent_user.name_role?data.parent_user.name_role:'-'}</td>
    //                 <td>
    //                     <div class="d-grid gap-2 d-md-flex justify-content-md-end" data-id="${data.user.id}">
    //                         <button class="btn btn-danger btn-sm delete-data" type="button" title="Hapus">
    //                             <i class="fa-solid fa-trash"></i>
    //                         </button>
    //                     </div>
    //                 </td>
    //             </tr>
    //              `
        //             // list table
        //             $("#tableDetail").html(domHtml);
        //             $("#tableDetailList tbody").html(listData);




        //         }
        //     })
        // }
        async function detailData() {
            $(document).on("click", ".detail-data", async function() {
                loadingPage(true); // Show loading indicator
                modalTitle = "Detail Data {{ $title }}";
                isActionForm = "detail";

                let id = $(this).parent().attr("data-id");

                $(".modal-title").html(modalTitle);

                const getDataRest = await CallAPI(
                    'GET',
                    `{{ route('api.administrator.pengelolaan-grup-pengguna.find') }}`, {
                        id: id
                    }
                ).then(function(response) {
                    return response;
                }).catch(function(error) {
                    loadingPage(false); // Hide loading indicator
                    let resp = error.response;
                    notificationAlert('info', 'Pemberitahuan', resp.data
                        .message); // Show error notification
                    return resp;
                });

                if (getDataRest.data.status_code == 200) {
                    loadingPage(false); // Hide loading indicator
                    $("form").find("input, select, textarea").val("").prop("checked", false).trigger(
                        "change"); // Reset form

                    $(".modal-title").html(modalTitle);
                    $("#modalDetail").appendTo("body").modal("show"); // Show modal

                    let data = getDataRest.data.data;

                    let domHtml = `
                <tr>
                  <th>User Input</th>

                </tr>`;

                    $("#tableDetail").html(domHtml);
                    let processedUserIds = [];

                    let listData = "";
                    console.log(data);
                    for (let i = 0; i < data.length; i++) {
                        let element = data[i];

                        // if (!processedUserIds.includes(element.user.id)) {
                            listData += `
                            <tr>
                                <td>${i + 1}.</td>
                                <td> ${element.parent_user.name_role ? element.parent_user.name_role : '-'}</td>
                                <td>
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end" data-id="${element.user.id}">
                                        <button class="btn btn-danger btn-sm delete-data" type="button" title="Hapus">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>`;
                            processedUserIds.push(element.user.id); // Add processed user ID to the array
                        // }
                    }

                    $("#tableDetailList tbody").html(listData); // Set list data with unique user IDs
                }
            });
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
                    `{{ route('api.administrator.pengelolaan-grup-pengguna.find') }}`, {
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
                    $("form").find("select").val("").prop("checked", false)
                        .trigger("change")
                    $(".modal-title").html(modalTitle)
                    $("#modalData").modal("show")

                    let data = getDataRest.data.data;

                    $('#inputId').val(data.id)
                    // if (authRole == constantRole) {
                    //     let input_provinsi_id = new Option(data.provinsi.nama, data.provinsi.id, true, true);
                    //     $("#input_provinsi_id").append(input_provinsi_id).trigger('change');
                    //     let input_kota_id = new Option(data.kota.nama, data.kota.id, true, true);
                    //     $("#input_kota_id").append(input_kota_id).trigger('change');
                    // } else {
                    //     $('#input_provinsi_id').val(data.provinsi_id)
                    //     $('#input_kota_id').val(data.kota_id)
                    // }


                    // let input_user_id = new Option(data.user.name_role, data.user.id, true, true);

                    // $("#input_user_id").append(input_user_id).trigger('change');
                    // let input_parent_user_id = new Option(data.parent_user.nama_role, data.parent_user.id,
                    //     true, true);
                    // $("#input_parent_user_id").append(input_parent_user_id).trigger('change');
                    // let input_trayek_id = new Option(data.trayek.nama, data.trayek.id, true, true);
                    // $("#input_trayek_id").append(input_trayek_id).trigger('change');
                    // let input_rute_trayek_id = new Option(data.rute_trayek.nama, data.rute_trayek.id, true, true);
                    // $("#input_rute_trayek_id").append(input_rute_trayek_id).trigger('change');
                    // let input_jenis_layanan_id = new Option(data.jenis_layanan.nama, data.jenis_layanan.id, true, true);
                    // $("#input_jenis_layanan_id").append(input_jenis_layanan_id).trigger('change');
                    // let input_kendaraan_id = new Option(data.kendaraan.nomor_kendaraan, data.kendaraan.id, true, true);
                    // $("#input_kendaraan_id").append(input_kendaraan_id).trigger('change');


                    // $("#input_masa_berlaku_kps").val(data.masa_berlaku_kps)
                    // $("#input_masa_berlaku_uji_berkala").val(data.masa_berlaku_uji_berkala)
                    // $("#input_nomor_uji_berkala").val(data.nomor_uji_berkala)
                    // $("#input_nomor_srut").val(data.nomor_srut)
                    // $("#input_nomor_kartu_pengawas_kps").val(data.nomor_kartu_pengawas_kps)

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
                            `{{ route('api.administrator.pengelolaan-grup-pengguna.destroy') }}`, {
                                "id": id
                            }
                        ).then(function(response) {
                            return response;
                        }).catch(function(error) {
                            loadingPage(false)
                            let resp = error.response;
                            notificationAlert('info', 'Pemberitahuan', resp.data
                                .message)
                            return resp
                        })
                        if (postDataRest.status == 200) {
                            loadingPage(false)
                            await initDataOnTable(defaultLimitPage, currentPage,
                                defaultAscending, defaultSearch)
                            notificationAlert('success', 'Pemberitahuan', postDataRest.data
                                .message)
                        }
                    } else {
                        notificationAlert('info', 'Pemberitahuan', "Data Anda aman :)")
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
                let url = `{{ route('api.administrator.pengelolaan-grup-pengguna.create') }}`
                if (isActionForm == "update") {
                    url = `{{ route('api.administrator.pengelolaan-grup-pengguna.update') }}`
                    data["id"] = $("#inputId").val()
                    method = "PUT"
                }
                data["user_id"] = $("#input_user_id").val()
                data["parent_user_id"] = $("#input_parent_user_id").val()

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
                                    text: item.name_role,
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
                await addData(),
                await detailData(),
                await editData(),
                await deleteData(),
                await submitData(),

            ])
            showSelectList('#input_user_id', userManagementListRoute)
            showSelectList('#input_parent_user_id', userManagementListRoute)
        }
    </script>
@endsection
