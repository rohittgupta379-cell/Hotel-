@include('layout.header');



<!-- row  body-->
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="d-flex mb-4 justify-content-between align-items-center flex-wrap">
                <div class="card-tabs mt-3 mt-sm-0 mb-xxl-0 mb-4">
                    <ul class="nav nav-tabs">
                        @foreach ($floors as $key => $floor)
                            <li class="nav-item">
                                <a class="nav-link {{ $key == 0 ? 'active' : '' }}" data-bs-toggle="tab"
                                    href="#floor{{ $floor->id }}">
                                    {{ $floor->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="table-search">
                    <div class="input-group search-area mb-xxl-0 mb-4">
                        <input type="text" class="form-control" placeholder="Search here">
                        <span class="input-group-text"><a href="javascript:void(0)"><i
                                    class="flaticon-381-search-2"></i></a></span>
                    </div>
                </div>
                <a href="javascript:void(0);" class="btn btn-primary mb-xxl-0 mb-4 radius-btn" data-bs-toggle="modal"
                    data-bs-target="#exampleModal"><i class="far fa-file-word me-2"></i>Add Room Map</a>
            </div>
            <div class="tab-content">

                @foreach ($floors as $key => $floor)
                    <div class="tab-pane fade {{ $key == 0 ? 'show active' : '' }}" id="floor{{ $floor->id }}">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Sno</th>

                                    <th>Room No</th>
                                    <th>Room Type</th>
                                    <th>Bed</th>
                                    <th>Room Feature</th>
                                    <th>Available</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($floor->floorMaps as $index => $map)
                                    <tr>
                                        <td>{{ ++$index }}</td>

                                        <td>{{ $map->room_no }}</td>
                                        <td>{{ $map->room->name }} ({{ $map->room->room_type }})</td>
                                        <td>{{ $map->room->bed_type }}</td>
                                        <td>{{ $map->room->feature }}</td>
                                        <td> <span
                                                class="text-{{ $map->is_available ? 'success' : 'danger' }}">{{ $map->is_available ? 'Available' : 'Not Available' }}</span>
                                        </td>
                                        <td>
                                            <a href="{{ url('delete-room-map', $map->id) }}"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this room?')">
                                                Delete
                                            </a>

                                            @if ($map->is_available)
                                                <button type="button" class="btn btn-warning btn-sm"
                                                    data-bs-toggle="modal" data-bs-target="#checkInModal"
                                                    onclick="booking({{ $map->id }})">
                                                    Check In
                                                </button>
                                            @else
                                                <a href="{{ url('check-out', $map->id) }}"
                                                    class="btn btn-success btn-sm me-1"
                                                    onclick="return confirm('Are you sure you want to clock out this room?')">
                                                    Check Out
                                                </a>

                                                <button type="button" class="btn btn-primary btn-sm"
                                                    data-bs-toggle="modal" data-bs-target="#addGuest"
                                                    onclick="addGuest({{ $map->id }})">
                                                    Add Guest
                                                </button>

                                                <button type="button" class="btn btn-info btn-sm"
                                                    data-bs-toggle="modal" data-bs-target="#infoGuest"
                                                    onclick="infoGuest({{ $map->id }})">
                                                    Guest Info
                                                </button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>

                    </div>
                @endforeach

            </div>
        </div>
    </div>
</div>

<!--**********************************
            Content body end
        ***********************************-->

<!-- Modal add map room -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Map</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="/add-map" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="mb-3">
                                <label for="" class="form-label">Select Floor</label>
                                <select name="floor_id" class="form-control">
                                    <option value="">Select Floor</option>
                                    @foreach ($floors as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="mb-3">
                                <label for="" class="form-label">Select Room</label>
                                <select name="room_id" class="form-control">
                                    <option value="">Select Room</option>
                                    @foreach ($rooms as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="mb-3">
                                <label for="" class="form-label">Room No * (Comma Sprated also)</label>
                                <input type="text" name="room_no" placeholder="101,102,........." class="form-control" required>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
{{-- end add map room --}}

<!-- Modal check in  -->
<div class="modal fade" id="checkInModal" tabindex="-1" aria-labelledby="checkInModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="checkInModalLabel">Guest Check In</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="/check-in" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Primary Guest</label>
                                <input type="text" name="primary_guest_name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Total Guest</label>
                                <input type="number" name="total_guests" class="form-control" required>
                                <input type="hidden" name="floor_map_id" id="floor_map_id">
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Phone</label>
                                <input type="number" name="phone" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Payment Status</label>
                                <select name="payment_status" class="form-control">
                                    <option value="">Select Status</option>
                                    <option value="pending">Pending</option>
                                    <option value="paid">Paid</option>
                                    <option value="failed">Failed</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Total Payment</label>
                                <input type="number" name="total_amount" class="form-control" required>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
{{-- end add check in --}}

<!-- Modal check in  -->
<div class="modal fade" id="addGuest" tabindex="-1" aria-labelledby="addGuestLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addGuestLabel">Add Guest</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="/add-guests" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Guest Name</label>
                                <input type="text" name="guest_name" class="form-control" required>
                                <input type="hidden" name="floor_map_id" id="guest_floor_map_id" required>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Age</label>
                                <input type="number" name="age" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Document Type</label>
                                <select name="id_type" class="form-control" required>
                                    <option value="">Select Document</option>
                                    <option value="aadhar_car">Aadhar Card</option>
                                    <option value="pan_card">Pan Card</option>
                                    <option value="voter_card">Voter Card</option>
                                    <option value="dl">DL</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Document No.</label>
                                <input type="text" name="id_no" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Document Front.</label>
                                <input type="file" name="front" class="form-control">
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Document Back.</label>
                                <input type="file" name="back" class="form-control">
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
{{-- end add check in --}}

<!-- Modal guest info -->
<div class="modal fade" id="infoGuest" tabindex="-1" aria-labelledby="infoGuestLable" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="infoGuestLable">Guest Info</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            </div>
        </div>
    </div>
</div>
{{-- end guest info --}}







@include('layout.footer');
<script>
    function booking(id) {
        $('#floor_map_id').val(id);
    }

    function addGuest(id) {
        $('#guest_floor_map_id').val(id);
    }


    function infoGuest(id) {
        $.ajax({
            url: '/api/get-booking-info/' + id,
            type: 'GET',
            dataType: 'json',
            success: function(result) {

                let booking = result.booking;
                let room = result.room;

                let html = `
                <h5 class="mb-3">Booking Information</h5>

                <table class="table table-bordered">
                    <tr>
                        <th>Room No</th>
                        <td>${room.room_no}</td>
                    </tr>
                    <tr>
                        <th>Primary Guest</th>
                        <td>${booking.primary_guest_name}</td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td>${booking.phone ?? '-'}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>${booking.email ?? '-'}</td>
                    </tr>
                    <tr>
                        <th>Check In</th>
                        <td>${booking.check_in}</td>
                    </tr>
                    <tr>
                        <th>Total Guests</th>
                        <td>${booking.total_guests}</td>
                    </tr>
                    <tr>
                        <th>Payment</th>
                        <td>${booking.payment_status}</td>
                    </tr>
                    <tr>
                        <th>Total Amount</th>
                        <td>₹ ${booking.total_amount}</td>
                    </tr>
                </table>

                <h5 class="mt-4 mb-3">Guest List</h5>
            `;

                booking.guests.forEach(function(guest, index) {

                    html += `
                    <div class="card mb-3">
                        <div class="card-header">
                            Guest ${index + 1}
                        </div>

                        <div class="card-body">

                            <p><strong>Name :</strong> ${guest.name}</p>

                            <p><strong>Age :</strong> ${guest.age}</p>

                            <p><strong>ID Type :</strong> ${guest.id_type}</p>

                            <p><strong>ID Number :</strong> ${guest.id_number}</p>

                            <div class="row">
                                <div class="col-md-6">
                                    <strong>Front</strong><br>
                                    <img src="/guest_ids/${guest.id_image_front}"
                                         class="img-fluid img-thumbnail">
                                </div>

                                <div class="col-md-6">
                                    <strong>Back</strong><br>
                                    <img src="/guest_ids/${guest.id_image_back}"
                                         class="img-fluid img-thumbnail">
                                </div>
                            </div>

                        </div>
                    </div>
                `;
                });

                $('#infoGuest .modal-body').html(html);

                $('#infoGuest').modal('show');
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });
    }
</script>
