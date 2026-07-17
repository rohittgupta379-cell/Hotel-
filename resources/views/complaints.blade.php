@include('layout.header')

<!-- Main Body Start -->
<div class="container-fluid">

    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="fw-bold mb-1">Complaints</h3>
            <p class="text-muted mb-0">
                Manage guest complaints and issues
            </p>
        </div>



        <div>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addComplaintModal">
                Add Complaint
            </button>
        </div>

    </div>
    @php
        $complaintTypes = [
            'Room Cleaning',
            'Food Quality',
            'Room Service',
            'Maintenance',
            'Staff Behaviour',
            'Billing Issue',
            'Noise Issue',
            'Other',
        ];
    @endphp



    <!-- Complaint Table -->
    <div class="card-tabs mb-5">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link {{ request('complaint_type') == '' ? 'active' : '' }}"
                    href="{{ url('/complaints') }}">
                    📋 All
                </a>
            </li>


            <!-- Complaint Types -->
            @foreach ($complaintTypes as $type)
                <li class="nav-item">

                    <a class="nav-link {{ request('complaint_type') == $type ? 'active' : '' }}"
                        href="{{ url('/complaints?complaint_type=' . urlencode($type)) }}">

                        {{ $type }}

                    </a>

                </li>
            @endforeach


        </ul>
    </div>
    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-light">

                        <tr>
                            <th>#</th>
                            <th>Room No</th>
                            <th>Complaint Type</th>
                            <th>Complaint</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>

                    </thead>


                    <tbody>

                        @forelse($complaints as $key=>$complaint)
                            <tr>

                                <td>
                                    {{ $key + 1 }}
                                </td>


                                <td>
                                    {{ $complaint->floorMap->room_no ?? 'N/A' }}
                                </td>


                                <td>
                                    {{ $complaint->complaint_type }}
                                </td>


                                <td>
                                    {{ $complaint->complaint }}
                                </td>


                                <td>

                                    @if ($complaint->status == 'Pending')
                                        <span class="badge bg-warning text-dark">
                                            Pending
                                        </span>
                                    @elseif($complaint->status == 'In Progress')
                                        <span class="badge bg-info">
                                            In Progress
                                        </span>
                                    @elseif($complaint->status == 'Resolved')
                                        <span class="badge bg-success">
                                            Resolved
                                        </span>
                                    @else
                                        <span class="badge bg-secondary">
                                            Closed
                                        </span>
                                    @endif

                                </td>


                                <td>

                                    <button class="btn btn-sm btn-warning updateComplaintBtn" data-bs-toggle="modal"
                                        data-bs-target="#updateComplaintModal" data-id="{{ $complaint->id }}"
                                        data-room="{{ $complaint->floorMap->room_no ?? 'N/A' }}"
                                        data-type="{{ $complaint->complaint_type }}"
                                        data-complaint="{{ $complaint->complaint }}"
                                        data-status="{{ $complaint->status }}">

                                        Update

                                    </button>

                                    <form action="{{ route('complaints.delete', $complaint->id) }}" method="POST"
                                        class="d-inline">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this complaint?')">

                                            Delete

                                        </button>

                                    </form>

                                </td>


                            </tr>

                        @empty

                            <tr>
                                <td colspan="6" class="text-center">
                                    No Complaint Found
                                </td>
                            </tr>
                        @endforelse


                    </tbody>

                </table>


            </div>


        </div>

    </div>


</div>
<!-- Main Body End -->





<!-- Add Complaint Modal -->
<div class="modal fade" id="addComplaintModal" tabindex="-1">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content rounded-4 shadow">

            <form action="{{ url('complaints-store') }}" method="POST">

                @csrf

                <!-- Header -->
                <div class="modal-header">

                    <h5 class="modal-title fw-bold">
                        <i class="fa fa-exclamation-circle"></i>
                        Add Complaint
                    </h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>

                </div>


                <!-- Body -->
                <div class="modal-body">


                    <!-- Room No -->
                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Room No
                        </label>

                        <select name="room_id" class="form-select" required>

                            <option value="">
                                Select Room
                            </option>

                            @foreach ($rooms as $room)
                                <option value="{{ $room->id }}">
                                    Room No - {{ $room->room_no }}
                                </option>
                            @endforeach

                        </select>

                    </div>



                    <!-- Complaint Type -->
                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Complaint Type
                        </label>

                        <select name="complaint_type" class="form-select" required>
                            <option value="">
                                Select Complaint Type
                            </option>

                            <option value="Room Cleaning">
                                Room Cleaning
                            </option>

                            <option value="Food Quality">
                                Food Quality
                            </option>

                            <option value="Room Service">
                                Room Service
                            </option>

                            <option value="Maintenance">
                                Maintenance
                            </option>

                            <option value="Staff Behaviour">
                                Staff Behaviour
                            </option>

                            <option value="Other">
                                Other
                            </option>

                        </select>

                    </div>



                    <!-- Complaint -->
                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Complaint Details
                        </label>

                        <textarea name="complaint" class="form-control" rows="4" placeholder="Enter complaint details..." required></textarea>

                    </div>



                    <!-- Status -->
                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Status
                        </label>

                        <select name="status" class="form-select">

                            <option value="Pending">
                                Pending
                            </option>

                            <option value="In Progress">
                                In Progress
                            </option>

                            <option value="Resolved">
                                Resolved
                            </option>

                            <option value="Closed">
                                Closed
                            </option>

                        </select>

                    </div>


                </div>



                <!-- Footer -->
                <div class="modal-footer">

                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                        Cancel
                    </button>


                    <button type="submit" class="btn btn-primary">
                        Save Complaint
                    </button>

                </div>


            </form>


        </div>

    </div>

</div>



<!-- edit Complaint Modal -->
<div class="modal fade" id="updateComplaintModal" tabindex="-1">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <form id="updateComplaintForm" method="POST">

                @csrf

                <div class="modal-header">

                    <h5 class="modal-title fw-bold">
                        Update Complaint
                    </h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>

                </div>


                <div class="modal-body">


                    <!-- Room No -->
                    <div class="mb-3">

                        <label class="form-label">
                            Room No
                        </label>

                        <input type="text" id="room_no" class="form-control" readonly>

                    </div>



                    <!-- Complaint Type -->
                    <div class="mb-3">

                        <label class="form-label">
                            Complaint Type
                        </label>

                        <input type="text" id="complaint_type" class="form-control" readonly>

                    </div>



                    <!-- Complaint -->
                    <div class="mb-3">

                        <label class="form-label">
                            Complaint
                        </label>

                        <textarea id="complaint" class="form-control" rows="3" readonly></textarea>

                    </div>



                    <!-- Status -->
                    <div class="mb-3">

                        <label class="form-label">
                            Status
                        </label>

                        <select name="status" id="complaint_status" class="form-select">

                            <option value="Pending">
                                Pending
                            </option>

                            <option value="In Progress">
                                In Progress
                            </option>

                            <option value="Resolved">
                                Resolved
                            </option>

                            <option value="Closed">
                                Closed
                            </option>

                        </select>

                    </div>


                </div>


                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>


                    <button type="submit" class="btn btn-primary">
                        Update
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@include('layout.footer')



<script>
    $('.updateComplaintBtn').click(function() {

        let id = $(this).data('id');

        $('#room_no').val($(this).data('room'));
        $('#complaint_type').val($(this).data('type'));
        $('#complaint').val($(this).data('complaint'));
        $('#complaint_status').val($(this).data('status'));


        $('#updateComplaintForm')
            .attr('action', '/complaints/update-status/' + id);

    });
</script>
