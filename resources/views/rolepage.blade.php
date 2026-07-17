@include('layout.header')

<div class="container-fluid">

    {{-- Header --}}
    <div class="row align-items-center mb-4">

        <div class="col-md-4">
            <h3 class="fw-bold mb-0">
                <i class="fa fa-users"></i> Role Management
            </h3>
        </div>

        <div class="col-md-8">

            <form method="GET">

                <div class="row g-2">

                    <div class="col-md-5">
                        <input type="text" name="search" class="form-control" placeholder="Search Role..."
                            value="{{ request('search') }}">
                    </div>

                    <div class="col-md-7 d-flex gap-2 justify-content-md-end">

                        <button class="btn btn-primary">
                            <i class="fa fa-search"></i> Search
                        </button>

                        <a href="{{ url('role') }}" class="btn btn-secondary">
                            <i class="fa fa-refresh"></i> Reset
                        </a>

                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#addRoleModal">
                            <i class="fa fa-plus"></i> Add Role
                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>


</div>




<!-- Table -->
<div class="card shadow">   

    <div class="card-header">
        <h5 class="mb-0">Role List</h5>
    </div>

    <div class="table-responsive">

        <table class="table table-bordered table-hover mb-0">

            <thead class="table-dark">

                <tr>
                    <th>#</th>
                    <th>Role</th>
                    <th>Created At</th>
                    <th width="180">Action</th>
                </tr>

            </thead>

            <tbody>

                @forelse($roles as $role)
                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $role->role }}</td>

                        <td>{{ $role->created_at->format('d M Y') }}</td>

                        <td>

                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                data-bs-target="#editRoleModal{{ $role->id }}">
                                <i class="fa fa-edit"></i> 
                            </button>

                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm" onclick="return confirm('Delete Role?')"> <i class="fa fa-trash"></i>

                                    

                                </button>

                            </form>

                        </td>

                    </tr>




                    {{-- edit modal  --}}

                    <div class="modal fade" id="editRoleModal{{ $role->id }}" tabindex="-1">

                        <div class="modal-dialog">

                            <div class="modal-content">

                                <form action="{{ route('roles.update', $role->id) }}" method="POST">

                                    @csrf
                                    @method('PUT')

                                    <div class="modal-header bg-warning">

                                        <h5 class="modal-title">
                                            <i class="fa fa-edit"></i> Edit Role
                                        </h5>

                                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                                        </button>

                                    </div>

                                    <div class="modal-body">

                                        <div class="mb-3">

                                            <label class="form-label">Role Name</label>

                                            <input type="text" name="role" class="form-control"
                                                value="{{ $role->role }}" required>

                                        </div>

                                    </div>

                                    <div class="modal-footer">

                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                            Close
                                        </button>

                                        <button type="submit" class="btn btn-warning">

                                            <i class="fa fa-save"></i>
                                            Update Role

                                        </button>

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                @empty

                    <tr>
                        <td colspan="4" class="text-center">
                            No Role Found
                        </td>
                    </tr>
                @endforelse

            </tbody>

        </table>

    </div>

</div>



<div class="mt-3">
    {{ $roles->links() }}
</div>

</div>


<!-- Add Role Modal -->
<div class="modal fade" id="addRoleModal">

    <div class="modal-dialog">

        <div class="modal-content">

            <form action="{{ route('roles.store') }}" method="POST">

                @csrf

                <div class="modal-header bg-primary text-white">

                    <h5>Add Role</h5>

                    <button class="btn-close" data-bs-dismiss="modal"></button>

                </div>

                <div class="modal-body">

                    <label>Role Name</label>

                    <input type="text" name="role" class="form-control" placeholder="Enter Role" required>

                </div>

                <div class="modal-footer">

                    <button class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>

                    <button class="btn btn-primary">
                        Save
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>



@include('layout.footer')
