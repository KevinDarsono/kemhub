<script>
    function addData() {
        $(document).on("click", "#add-data", function() {
            $('#inputId').val("");
            $('#input_provinsi_id').val(null).trigger('change');
            $('#input_approver_user_id').empty().trigger('change');
            $('#selected-approver-list').empty();
            selectedApprovers = [];

            modalTitle = "Tambah Data {{ $title }}";
            isActionForm = "create";
            $(".modal-title").html(modalTitle)
            $("#modalData").modal("show")
        })
    }

    async function detailData() {
        await $(document).on("click", ".detail-data", async function() {
            loadingPage(true);
            modalTitle = "Detail Data {{ $title }}";
            isActionForm = "detail";

            let provinsi_id = $(this).closest('div').attr("data-id");

            $(".modal-title").html(modalTitle);

            const getDataRest = await CallAPI(
                'GET',
                `{{ route('api.administrator.konfigurasi-alur-persetujuan.find-province') }}`, {
                    provinsi_id: provinsi_id
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
                $(".modal-title").html(modalTitle);
                $("#modalDetail").appendTo("body").modal("show");

                let data = getDataRest.data.data;

                let groupedData = {};
                data.forEach(item => {
                    if (!groupedData[item.provinsi_id]) {
                        groupedData[item.provinsi_id] = [];
                    }
                    groupedData[item.provinsi_id].push(item);
                });

                let domHtml = '';
                Object.values(groupedData).forEach(group => {
                    group.sort((a, b) => b.tier - a.tier);
                    let createdAt = group.length > 0 ? new Date(group[0].created_at) : null;
                    let formattedTime = '';
                    let formattedDate = '';

                    if (createdAt) {
                        formattedTime = createdAt.toLocaleTimeString();
                        let options = {
                            day: '2-digit',
                            month: 'long',
                            year: 'numeric'
                        };
                        formattedDate = createdAt.toLocaleDateString('id', options);
                    }

                    let approversHtml = group.map((approver, index) => {
                        let count = index + 1;
                        let iconFontSize = 20;
                        let photo = approver.photo ? approver.photo :
                            'logo-kemenhub.png';
                        let icon = approver.is_finish === 1 ? photo : 'user_circle.png';
                        let img = approver.is_finish === 1 ?
                            `<a href="javascript:void(0)" class="avatar-image avatar-lg" data-bs-container="body" data-bs-toggle="tooltip" data-bs-placement="top" title="${approver.name}">
                                        <img src="{{ asset('${icon}') }}" class="img-fluid" alt="image">
                                    </a>` :
                            `<i class="fa fa-up-long text-center"></i><br><a href="javascript:void(0)" class="avatar-image avatar-md text-center ms-2" data-bs-container="body" data-bs-toggle="tooltip" data-bs-placement="top" title="${approver.name}">
                                        <img src="{{ asset('${icon}') }}" class="img-fluid" alt="image">
                                    </a>`;
                        return `
                            <div class="d-flex mb-2">
                                <div class="col-md-1 col-sm-1 col-xs-1 col-lg-1 text-center">
                                    ${img}
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6 ms-3 text-start">
                                    <p class="mb-1" style="font-size: 16px">
                                        ${approver.approver.first_name} ${approver.approver.last_name}
                                    </p>
                                    <p>
                                        (${approver.approver.code_role})
                                    </p>
                                </div>
                                <div class="col-md-2 col-sm-2 col-xs-2 col-lg-2 text-center align-center"><hr></div>
                                <div class="col-md-3 col-sm-3 col-xs-3 col-lg-3 text-center"><span style="font-size: 14px">${count}</span></div>
                            </div>
                        `;
                    }).join('');

                    domHtml += `
                        <div class="mb-1">
                            <div class="d-flex mb-2">
                                <div class="col-md-1 col-sm-1 col-xs-1 col-lg-1 text-center">
                                    <h6>
                                        <i class="fa fa-map-location-dot fa-2xl text-primary" style="font-size: 40px"></i>
                                    </h6>
                                </div>
                                <div class="col-md-8 col-sm-8 col-xs-8 col-lg-8"></i><h5 style="font-size: 20px" class="ms-3">Provinsi ${group[0].provinsi.nama ? group[0].provinsi.nama : '-'}</h5></div>
                                <div class="col-md-3 col-sm-3 col-xs-3 col-lg-3 text-center"><h5 style="font-size: 20px">Tier Approver</h5></div>
                            </div>
                                ${approversHtml ? approversHtml : '-'}
                            <hr>
                            <div class="d-flex mb-2">
                                <div class="col-md-1 text-center">
                                    <i class="fa fa-calendar-plus fa-2xl text-primary"></i>
                                </div>
                                <div class="col-md-11 text-start">
                                    <span>
                                        Dibuat pada
                                        <br>
                                        Pukul ${formattedTime}, ${formattedDate}
                                    </span>
                                </div>
                            </div>
                        </div>
                    `;
                });
                $("#tableDetail").html(domHtml);
            }
        });
    }

    async function editData() {
        $(document).on("click", ".edit-data", async function() {
            loadingPage(true)
            modalTitle = "Ubah Data {{ $title }}";
            isActionForm = "update";

            let provinsi_id = $(this).closest('div').attr("data-id");
            $(".modal-title").html(modalTitle)

            const getDataRest = await CallAPI(
                'GET',
                `{{ route('api.administrator.konfigurasi-alur-persetujuan.find-province') }}`, {
                    provinsi_id: provinsi_id
                }
            ).then(function(response) {
                return response;
            }).catch(function(error) {
                loadingPage(false)
                let resp = error.response;
                notificationAlert('info', 'Pemberitahuan', resp.data.message)
                return resp;
            })

            if (getDataRest && getDataRest.data) {
                loadingPage(false)
                $("form").find("input, select, textarea").val("").prop("checked", false).trigger(
                    "change")
                $(".modal-title").html(modalTitle)
                $("#modalData").modal("show")

                let data = getDataRest.data.data;
                let approversGroupedByProvinsi = {};

                data.forEach(item => {
                    if (!approversGroupedByProvinsi[item.provinsi.id]) {
                        approversGroupedByProvinsi[item.provinsi.id] = {
                            provinsi: item.provinsi,
                            approvers: []
                        };
                    }
                    approversGroupedByProvinsi[item.provinsi.id].approvers.push(item.approver);
                });

                let provinsi = approversGroupedByProvinsi[provinsi_id].provinsi;
                let provinsiOption = new Option(provinsi.nama, provinsi.id, true, true);
                $('#inputId').val(provinsi.id);
                $('#input_provinsi_id').append(provinsiOption).trigger('change');

                $('#selected-approver-list').empty();
                selectedApprovers = [];

                approversGroupedByProvinsi[provinsi_id].approvers.forEach(approver => {
                    let bptd =
                        `${approver.first_name} ${approver.last_name} (${approver.code_role})`;
                    selectedApprovers.push(approver.id);
                    addListItem(approver.id, bptd);
                });

                updateTierNumbers();
            } else {
                console.error("Error fetching data for editing");
            }
        });
    }

    async function deleteData() {
        $(document).on("click", ".delete-data", async function() {
            isActionForm = "delete";
            let provinsi_id = $(this).closest('div').attr("data-id");
            swal.fire({
                title: "Pemberitahuan" + provinsi_id,
                text: "Anda tidak akan dapat mengembalikannya!",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Ya, Hapus!",
                cancelButtonText: "Tidak, Batal!",
                reverseButtons: true
            }).then(async (result) => {
                if (result.value) {
                    const postDataRest = await CallAPI(
                        'DELETE',
                        `{{ route('api.administrator.konfigurasi-alur-persetujuan.destroy') }}`, {
                            "provinsi_id": provinsi_id
                        }
                    ).then(function(response) {
                        return response;
                    }).catch(function(error) {
                        loadingPage(false)
                        let resp = error.response;
                        notificationAlert('info', 'Pemberitahuan', resp.data
                            .message)
                        return resp;
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
            e.preventDefault();
            loadingPage(true);
            const data = {};
            let method = "POST";
            let url = `{{ route('api.administrator.konfigurasi-alur-persetujuan.create') }}`;
            data["provinsi_id"] = $('#input_provinsi_id').val();
            let idApprover = [];
            if (isActionForm == "update") {
                url = `{{ route('api.administrator.konfigurasi-alur-persetujuan.update') }}`;
                method = "PUT";
                $('#selected-approver-list div.drag-handle').each(function() {
                    idApprover.push($(this).data(
                        'id'));
                });
                data["id"] = idApprover;
            }

            let selectedUserIds = [];
            $('#selected-approver-list div.drag-handle').each(function() {
                selectedUserIds.push($(this).data('id'));
            });
            data["approver_user_id"] = selectedUserIds;

            const postDataRest = await CallAPI(method, url, data).then(function(response) {
                return response;
            }).catch(function(error) {
                loadingPage(false);
                let resp = error.response;
                notificationAlert('info', 'Pemberitahuan', resp.data.message);
                return resp;
            });

            if (postDataRest.status == 200) {
                loadingPage(false);
                await initDataOnTable(defaultLimitPage, currentPage, defaultAscending, defaultSearch);
                notificationAlert('success', 'Pemberitahuan', postDataRest.data.message);
                $(this).trigger("reset");
                $("#modalData").modal("hide");
            }
        });
    }

    async function showSelectListProvinsi(id, isUrl) {
        await $(`${id}`).select2({
            language: languageIndonesian,
            dropdownParent: $('#modalData'),
            ajax: {
                url: isUrl,
                dataType: 'json',
                delay: 500,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('conwtent')
                },
                data: function(params) {
                    let query = {
                        search: params.term,
                        page: 1,
                        limit: 30,
                        ascending: 1,

                    };
                    return query;
                },
                processResults: function(res) {
                    let data = res.data;
                    let filteredData = $.map(data, function(item) {
                        return {
                            text: item.nama,
                            id: item.id
                        };
                    });
                    return {
                        results: filteredData
                    };
                },
            },
            allowClear: true,
            placeholder: 'Pilih Provinsi'
        });
    }

    async function showSelectList(id, isUrl, extendParams = {}) {
        await $(id).select2({
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
                        ...extendParams
                    };
                    return query;
                },
                processResults: function(res) {
                    let data = res.data;
                    let constantRole = '{{ App\Constants\Roles::BPTD }}'
                    let filteredData = $.map(data.filter(item => item.code_role === constantRole),
                        function(item) {
                            return {
                                text: item.first_name + ' ' + item.last_name +
                                    ` (${item.code_role})`,
                                id: item.id
                            };
                        });

                    filteredData = filteredData.filter(item => !selectedApprovers.includes(item.id));

                    return {
                        results: filteredData
                    };
                }
            },
            allowClear: true,
            placeholder: 'Pilih Approver'
        });
    }

    async function addListItem(userId, userName) {
        let listItem = `
                <div data-id="${userId}" class="drag-handle mb-2 mt-2">
                    <div class="d-flex">
                        <div class="col-md-1 col-sm-1 col-xs-1 text-center">
                            <span class="tier-number"></span>
                        </div>
                        <div class="col-md-10 col-sm-10 col-xs-10">
                            <span class="user-name">${userName}</span>
                        </div>
                        <div class="col-md-1 col-sm-1 col-xs-1 text-center">
                            <button type="button" style="width: 100%" class="btn btn-danger btn-sm remove-user fa fa-trash-alt"></button>
                        </div>
                    </div>
                </div>`;
        await $('#selected-approver-list').append(listItem);
        provinsiSelected = true;
        await $('#input_provinsi_id').trigger('select2:select');
    }

    async function updateTierNumbers() {
        await $('#selected-approver-list div.drag-handle').each(function(index) {
            $(this).find('.tier-number').text(index + 1 + '.');
            $(this).find('.user-name').find('.approver-terakhir').remove();
            if (index === $('#selected-approver-list div.drag-handle').length -
                1) {
                $(this).find('.user-name').append(
                    '<span class="ms-4 text-white bg-primary bg-gradient mb-2 mt-2 approver-terakhir"><i class="fa fa-circle-info fa-xs ms-2"></i><small class="me-2"> Approver Terakhir</small></span>'
                );
            }
        });
    }

    async function renderData() {
        await $(document).ready(function() {
            new Sortable(document.getElementById('selected-approver-list'), {
                handle: '.drag-handle',
                animation: 150,
                onEnd: function() {
                    updateTierNumbers();
                }
            });

            let provinsiSelected = false;

            $('#input_provinsi_id').on('select2:select', async function(e) {
                provinsiSelected = true;
                let id = e.params.data.id;
                let provinsiId = await getProvinsiIdFromProvinsi(id);

                await showSelectList('#input_approver_user_id',
                    `{{ route('api.administrator.user-management.list') }}`, {
                        provinsi_id: provinsiId
                    });

                if ($('#input_approver_user_id').val()) {
                    $('#input_provinsi_id').prop('disabled', true);
                } else {
                    $('#input_provinsi_id').prop('disabled', false);
                }
            });

            $('#input_approver_user_id').on('select2:unselect', async function(e) {
                if (!provinsiSelected) {
                    $('#input_provinsi_id').prop('disabled', false);
                }
            });

            $(document).ready(function() {
                $('#input_approver_user_id').select2();
                $('#add-approver-btn').click(function(event) {
                    event.preventDefault();

                    if (!provinsiSelected) {
                        alert('Dimohon isi Provinsi terlebih dahulu.');
                        return;
                    }

                    let selectedData = $('#input_approver_user_id').select2(
                        'data')[0];
                    if (!selectedData || !selectedData.id) {
                        alert('Please select an approver first.');
                        return;
                    }

                    let userId = selectedData.id;
                    let userName = selectedData.text;
                    addListItem(userId, userName);
                    updateTierNumbers();

                    selectedApprovers.push(userId);

                    $('#input_approver_user_id').val(null).trigger('change');
                });
            });

            $(document).on('click', '.remove-user', function() {
                let userId = $(this).closest('.drag-handle').data('id');
                $(this).closest('.drag-handle').remove();

                selectedApprovers = selectedApprovers.filter(id => id !== userId);

                updateTierNumbers();
            });

            async function getProvinsiIdFromProvinsi(id) {
                let provinsiId;
                await $.ajax({
                    url: `{{ route('api.administrator.master.provinsi.list') }}`,
                    type: 'GET',
                    data: {
                        id: provinsiId
                    },
                    success: function(response) {
                        let provinsi = response.data.find(item => item.id ===
                            provinsiId);
                        provinsiId = id;
                    }
                });
                return provinsiId;
            }
        });
    }

    async function initPageLoad() {
        await Promise.all([
            await initDataOnTable(defaultLimitPage, currentPage, defaultAscending, defaultSearch),
            await manipulationDataOnTable(),
            await showSelectListProvinsi('#input_provinsi_id',
                `{{ route('api.administrator.master.provinsi.list') }}`),
            await addData(),
            await detailData(),
            await editData(),
            await deleteData(),
            await submitData(),
        ]).then(async () => {
            await renderData();
        });
    }
</script>
