@include('layout.header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.css"
    integrity="sha512-9tISBnhZjiw7MV4a1gbemtB9tmPcoJ7ahj8QWIc0daBCdvlKjEA48oLlo6zALYm3037tPYYulT0YQyJIJJoyMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- Main Body Start -->
<div class="container-fluid">

    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="fw-bold mb-1">Authentication</h3>
            <p class="text-muted mb-0">
                Manage auth and page access for user
            </p>
        </div>
    </div>

    <div class="card border-0 shadow-sm rounded-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div
                            class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3 pe-0  ps-0">
                            <h4 class="header-title">Pages List</h4>
                            <div class="d-flex my-xl-auto right-content align-items-center flex-wrap row-gap-3">
                                <div class="dropdown">
                                    <select id="role_id" class="form-select">
                                        <option value="">Select Role</option>
                                        @foreach ($roles as $item)
                                            <option value="{{ $item->id }}">{{ $item->role }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <table id="" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>Sno.</th>
                                    <th>Page Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($pages as $item)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>
                                            {{ $item->name }}
                                        </td>
                                        <td>
                                            <input data-id="{{ $item->id }}" data-slug="{{ $item->slug }}"
                                                class="toggle_btn_page" type="checkbox" data-on="Allow"
                                                data-off="Not Allow" data-toggle="toggle" data-onstyle="success"
                                                data-offstyle="danger">
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div> <!-- end row-->
    </div>
</div>
<!-- Main Body End -->


@include('layout.footer')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"
    integrity="sha512-F636MAkMAhtTplahL9F6KmTfxTmYcAcjcCkyu0f0voT3N/6vzAuJ4Num55a0gEJ+hRLHhdz3vDvZpf6kqgEa5w=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    var flag = 1;
    $(document).ready(function() {
        $('#role_id').change(() => {
            var role_id = $('#role_id').val();
            flag = 0;
            if (role_id != '') {
                $.ajax({
                    url: '/api/authentication/' + role_id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        $('.toggle_btn_page').each(function() {
                            var page_id = $(this).data('id');
                            var hasAccess = response.some(page => page.id ===
                                page_id && page.access === 1);
                            $(this).prop('checked', hasAccess).change();
                        });

                        notyf.success("Permissions loaded successfully.");
                        flag = 1;
                    },
                    error: function(xhr, status, error) {
                        var errorMessage = xhr.responseJSON ? xhr.responseJSON.message :
                            "Something went wrong.";
                        notyf.error(errorMessage);
                        flag = 1;
                    }
                });
            } else {
                $('.toggle_btn_page').each(function() {
                    var hasAccess = 0;
                    $(this).prop('checked', hasAccess).change();
                });
                flag = 1;
            }
        });

    });


    $('.toggle_btn_page').on('change', function() {
        var role_id = $('#role_id').val();

        if (flag == 1) {
            if (role_id == '') {
                $(this).prop('checked', false);
                notyf.error('Select Role First.');
                return;
            }

            var dataId = $(this).data('id');
            if ($(this).prop('checked')) {
                $.ajax({
                    url: '/api/giveAccessPage/' + role_id,
                    type: 'POST',
                    data: {
                        page_id: dataId,
                        role_id: {{ auth()->user()->role_id }},
                    },
                    dataType: 'json',
                    success: function(response) {
                        $('#toggle-trigger').prop('checked', false).change()
                        notyf.success(response.message);
                    },
                    error: function(xhr, status, error) {
                        var errorMessage = xhr.responseJSON ? xhr.responseJSON.message :
                            "Something went wrong.";
                        notyf.error(errorMessage);
                    }
                });
            } else {
                $.ajax({
                    url: '/api/denyAccessPage/' + role_id,
                    type: 'POST',
                    data: {
                        role_id: {{ auth()->user()->role_id }},
                        page_id: dataId,
                    },
                    dataType: 'json',
                    success: function(response) {
                        $('#toggle-trigger').prop('checked', true).change()
                        notyf.success(response.message);
                    },
                    error: function(xhr, status, error) {
                        var errorMessage = xhr.responseJSON ? xhr.responseJSON.message :
                            "Something went wrong.";
                        notyf.error(errorMessage);
                    }
                });
            }
        }
    });
</script>
