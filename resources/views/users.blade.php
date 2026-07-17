@include('layout.header');


{{-- filter --}}
<div class="card shadow-sm mb-4">

    <div class="card-body">

        <form action="{{ url('users') }}" method="GET">

            <div class="row g-3">

                <div class="col-lg-4">

                    <div class="input-group">

                        <span class="input-group-text bg-white">
                            <i class="fa fa-search"></i>
                        </span>

                        <input type="text" name="search" class="form-control"
                            placeholder="Search Name, Email or Phone..." value="{{ request('search') }}">

                    </div>

                </div>

                <div class="col-lg-3">

                    <select name="role_id" class="form-select">

                        <option value="">All Roles</option>

                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}" {{ request('role_id') == $role->id ? 'selected' : '' }}>
                                {{ $role->role }}
                            </option>
                        @endforeach

                    </select>

                </div>

                <div class="col-lg-5 text-lg-end">

                    <button class="btn btn-primary">
                        <i class="fa fa-search"></i> Search
                    </button>

                    <a href="{{ url('users') }}" class="btn btn-secondary">
                        <i class="fa fa-refresh"></i> Reset
                    </a>

                    <button type="button" class="btn btn-success btn-sm shadow-sm" data-bs-toggle="modal"
                        data-bs-target="#addUserModal">
                        <i class="fa fa-user-plus me-1"></i> Add User
                    </button>
                </div>

            </div>

        </form>

    </div>

</div>
{{-- filter end --}}


{{-- table  --}}
<div class="card shadow-sm">

    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">
            <i class="fa fa-users"></i> User List
        </h5>
    </div>

    <div class="table-responsive">

        <table class="table table-bordered table-hover align-middle mb-0">

            <thead class="table-light">

                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Role</th>
                    <th width="170">Action</th>
                </tr>

            </thead>

            <tbody>

                @forelse($users as $user)
                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $user->name }}</td>

                        <td>{{ $user->email }}</td>

                        <td>{{ $user->phone }}</td>

                        <td>
                            <span class="badge bg-info">
                                {{ $user->role->role ?? '-' }}
                            </span>
                        </td>

                        <td>

                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                data-bs-target="#editUserModal" onclick="getUser({{ $user->id }})">
                                <i class="fa fa-edit"></i> Edit
                            </button>

                            <form action="" method="POST" class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm" onclick="return confirm('Delete User?')">

                                    <i class="fa fa-trash"></i> Delete

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="6" class="text-center py-4">
                            No Users Found.
                        </td>

                    </tr>
                @endforelse

            </tbody>

        </table>

    </div>

</div>


<div class="mt-3">
    {{ $users->links() }}
</div>



<!-- Add User Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-hidden="true">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <form action="{{ route('users.store') }}" method="POST">

                @csrf

                <div class="modal-header bg-success text-white">

                    <h5 class="modal-title">
                        <i class="fa fa-plus"></i> Add User
                    </h5>

                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>

                </div>

                <div class="modal-body">

                    <div class="row">

                        <!-- Name -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Name</label>

                            <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
                        </div>

                        <!-- Email -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Email</label>

                            <input type="email" name="email" class="form-control" placeholder="Enter Email"
                                required>
                        </div>

                        <!-- Phone -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Phone</label>

                            <input type="text" name="phone" class="form-control" placeholder="Enter Phone"
                                required>
                        </div>

                        <!-- Role -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Role</label>

                            <select name="role_id" class="form-select" required>

                                <option value="">Select Role</option>

                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">
                                        {{ $role->role }}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                        <!-- Password -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Password</label>

                            <input type="password" name="password" class="form-control" placeholder="Enter Password"
                                required>
                        </div>

                        <!-- Confirm Password -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Confirm Password</label>

                            <input type="password" name="password_confirmation" class="form-control"
                                placeholder="Confirm Password" required>
                        </div>

                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>

                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-save"></i> Save User
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


<!-- Edit User Modal -->
<div class="modal fade" id="editUserModal" tabindex="-1" aria-hidden="true">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <form action="/update-user" method="POST">
                @csrf
                <div class="modal-header bg-warning text-white">

                    <h5 class="modal-title">
                        <i class="fa fa-edit"></i> Edit User
                    </h5>

                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>

                </div>

                <div class="modal-body">

                    <div class="row">

                        <!-- Name -->
                        <div class="col-md-6 mb-3">
                            <label>Name</label>

                            <input type="text" name="name" class="form-control" value="" id="user_name" required>
                            <input type="hidden" name="id" id="user_id" required>
                        </div>

                        <!-- Email -->
                        <div class="col-md-6 mb-3">
                            <label>Email</label>

                            <input type="email" name="email" class="form-control" id="user_email" value="" required>
                        </div>

                        <!-- Phone -->
                        <div class="col-md-6 mb-3">
                            <label>Phone</label>

                            <input type="text" name="phone" class="form-control" id="user_phone" value="" required>
                        </div>

                        <!-- Role -->
                        <div class="col-md-6 mb-3">
                            <label>Role</label>

                            <select name="role_id" class="form-select" id="user_role_id" required>

                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">
                                        {{ $role->role }}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                        <!-- Password -->
                        <div class="col-md-6 mb-3">
                            <label>New Password</label>

                            <input type="password" name="password" class="form-control"
                                placeholder="Leave blank if no change">
                        </div>

                        <!-- Confirm Password -->
                        <div class="col-md-6 mb-3">
                            <label>Confirm Password</label>

                            <input type="password" name="password_confirmation" class="form-control"
                                placeholder="Confirm Password">
                        </div>

                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>

                    <button class="btn btn-warning">
                        <i class="fa fa-save"></i> Update User
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


@include('layout.footer');
<script>
    function getUser(id) {
        $.ajax({
            url: '/api/get-user/' + id,
            type: 'GET',
            dataType: 'json',
            success: function(result) {
                $('#user_id').val(result.id);
                $('#user_name').val(result.name);
                $('#user_email').val(result.email);
                $('#user_phone').val(result.phone);
                $('#user_role_id').val(result.role_id);
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });
    }
</script>
