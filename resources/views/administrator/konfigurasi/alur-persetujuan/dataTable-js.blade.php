<script>
    let modalTitle = "";
    let isActionForm = "create";
    let defaultLimitPage = 10;
    let currentPage = 1;
    let totalPage = 1;
    let defaultAscending = 0;
    let defaultSearch = '';
    let selectedApprovers = [];

    async function getListData(limit = 10, page = 1, ascending = 0, search = '') {
        loadingPage(true)
        const getDataRest = await CallAPI(
            'GET',
            `{{ route('api.administrator.konfigurasi-alur-persetujuan.list') }}`, {
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
            let display_to = currentPage < getDataRest.data.pagination.total_pages ? data.length <
                defaultLimitPage ? data.length : (defaultLimitPage * getDataRest.data.pagination.current_page) :
                totalPage;
            $('#totalPage').text(getDataRest.data.pagination.total)
            $('#countPage').text("" + display_from + " - " + display_to + "")
            let appendHtml = "";
            let index_loop = display_from;

            let groupedData = {};
            data.forEach(element => {
                if (!groupedData[element.provinsi_id]) {
                    groupedData[element.provinsi_id] = {
                        provinsi_id: element.provinsi_id,
                        provinsi: element.provinsi,
                        approvers: []
                    };
                }
                if (element.approver) {
                    groupedData[element.provinsi_id].approvers.push({
                        name: element.approver.first_name + ' ' + element.approver.last_name +
                            ' (' + element.approver.code_role + ')',
                        tier: element.tier,
                        is_finish: element.is_finish,
                        created_at: element.created_at
                    });
                }
            });

            Object.keys(groupedData).forEach(key => {
                groupedData[key].approvers.sort((a, b) => a.tier - b.tier);
            });

            Object.values(groupedData).forEach(group => {
                let createdAt = group.approvers.length > 0 ? new Date(group.approvers[0].created_at) : null;
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

                let approversHtml = group.approvers.map(approver => {
                    let photo = approver.photo ? approver.photo : 'logo-kemenhub.png';
                    let icon = approver.is_finish === 1 ? photo : 'user_circle.png';

                    return `
                        <a href="javascript:void(0)" class="avatar-image avatar-lg" data-bs-container="body" data-bs-toggle="tooltip" data-bs-placement="top" title="${approver.name}">
                            <img src="{{ asset('${icon}') }}" class="img-fluid" alt="image">
                        </a>
                    `;
                }).join('');

                appendHtml += `
                <tr>
                    <td>${index_loop}</td>
                    <td colspan="2">
                        <div class="p-3 border border-dashed rounded-3 mb-3">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="wd-50 ht-50 bg-soft-primary text-primary lh-1 d-flex align-items-center justify-content-center rounded-2 schedule-date">
                                        <span class="fs-18 fw-bold mb-1 d-block text-center"><i class="fa fa-map-location-dot fa-xl"></i></span>
                                    </div>
                                    <div class="text-dark">
                                        <h5 class="fw-bold mb-2 text-truncate-1-line">Provinsi ${group.provinsi ? group.provinsi.nama : '-'}</h5>
                                        <span class="fs-11 fw-normal text-muted text-truncate-1-line ">Dibuat pada ${formattedTime}, ${formattedDate ? formattedDate.split(',')[0] : ''}</span>
                                    </div>
                                </div>
                                <div class="img-group lh-0 ms-3 justify-content-start d-none d-sm-flex">
                                    ${approversHtml ? approversHtml : '-'}
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end" data-id="${group.provinsi_id}">
                            <button class="btn btn-info btn-md me-md-2 detail-data" type="button" title="Detail">
                                <i class="fa-solid fa-eye"></i>
                            </button>
                            <button class="btn btn-danger btn-md delete-data" type="button" title="Hapus">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>`;
                index_loop++;
            });

            if (totalPage == 0) {
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
