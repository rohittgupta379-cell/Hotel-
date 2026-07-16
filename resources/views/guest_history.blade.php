@include('layout.header')

<div class="container-fluid py-4">

    <div class="card border-0 shadow-lg search-card">
        <div class="card-body p-4">

            <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
                <div>
                    <h3 class="fw-bold mb-1">Guest Booking History</h3>
                    <p class="text-muted mb-0">Search and filter guest booking records</p>
                </div>

                <span class="badge bg-primary fs-6 px-3 py-2">
                    Total : {{ $bookings->total() ?? 0 }}
                </span>
            </div>

            <form method="GET">

                <div class="row g-3">

                    <div class="col-xl col-lg-4 col-md-6">
                        <div class="input-group custom-search">
                            <span class="input-group-text">
                                <i class="fa fa-user"></i>
                            </span>
                            <input type="text" name="guest_name" class="form-control" placeholder="Guest Name"
                                value="{{ request('guest_name') }}">
                        </div>
                    </div>

                    <div class="col-xl col-lg-4 col-md-6">
                        <div class="input-group custom-search">
                            <span class="input-group-text">
                                <i class="fa fa-phone"></i>
                            </span>
                            <input type="text" name="phone" class="form-control" placeholder="Phone Number"
                                value="{{ request('phone') }}">
                        </div>
                    </div>

                    <div class="col-xl col-lg-4 col-md-6">
                        <div class="input-group custom-search">
                            <span class="input-group-text">
                                <i class="fa fa-calendar-check"></i>
                            </span>
                            <input type="date" name="check_in" class="form-control"
                                value="{{ request('check_in') }}">
                        </div>
                    </div>

                    <div class="col-xl col-lg-4 col-md-6">
                        <div class="input-group custom-search">
                            <span class="input-group-text">
                                <i class="fa fa-calendar-times"></i>
                            </span>
                            <input type="date" name="check_out" class="form-control"
                                value="{{ request('check_out') }}">
                        </div>
                    </div>

                    <div class="col-xl col-lg-4 col-md-6">
                        <div class="input-group custom-search">
                            <span class="input-group-text">
                                <i class="fa fa-bed"></i>
                            </span>
                            <input type="text" name="room_no" class="form-control" placeholder="Room No"
                                value="{{ request('room_no') }}">
                        </div>
                    </div>

                    <div class="col-xl-auto col-lg-6 col-md-6">

                        <button class="btn btn-primary w-100 px-4 search-btn">
                            <i class="fa fa-search me-2"></i> Search
                        </button>

                    </div>

                    <div class="col-xl-auto col-lg-6 col-md-6">

                        <a href="{{ url()->current() }}" class="btn btn-light border w-100 px-4 reset-btn">
                            <i class="fa fa-refresh me-2"></i> Reset
                        </a>

                    </div>

                </div>

            </form>

            <div class="card shadow-sm mt-4">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Guest Booking List</h5>
                </div>

                <div class="card-body p-0">

                    <div class="table-responsive">

                        <table class="table table-hover align-middle mb-0">

                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Room No</th>
                                    <th>Guest</th>
                                    <th>Phone</th>
                                    <th>Guests</th>
                                    <th>Check In</th>
                                    <th>Check Out</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse($bookings as $booking)
                                    <tr>

                                        <td>{{ $booking->id }}</td>

                                        <td>
                                            {{ $booking->room->room_no ?? 'N/A' }}
                                        </td>

                                        <td>
                                            <strong>{{ $booking->primary_guest_name }}</strong>
                                        </td>

                                        <td>{{ $booking->phone }}</td>

                                        <td>{{ $booking->total_guests }}</td>

                                        <td>{{ \Carbon\Carbon::parse($booking->check_in)->format('d M Y H:i') }}</td>

                                        <td>
                                            @if ($booking->check_out)
                                                {{ \Carbon\Carbon::parse($booking->check_out)->format('d M Y H:i') }}
                                            @else
                                                -
                                            @endif
                                        </td>

                                        <td>₹{{ number_format($booking->total_amount, 2) }}</td>

                                        <td>
                                            @if ($booking->payment_status == 'paid')
                                                <span class="badge bg-success">Paid</span>
                                            @else
                                                <span class="badge bg-warning text-dark">Pending</span>
                                            @endif
                                             <span class="badge bg-danger text-dark" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#infoGuest" onclick="infoGuest({{ $booking->id }})">Info</span>
                                        </td>

                                    </tr>

                                @empty

                                    <tr>
                                        <td colspan="9" class="text-center py-5">
                                            No Booking Found
                                        </td>
                                    </tr>
                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>
            </div>

            <div class="mt-3">
                {{ $bookings->withQueryString()->links() }}
            </div>

        </div>
    </div>

</div>


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

<style>
    .search-card {
        border-radius: 18px;
    }

    .custom-search .input-group-text {
        background: #fff;
        border-right: none;
        color: #4F46E5;
        border-radius: 12px 0 0 12px;
    }

    .custom-search .form-control {
        border-left: none;
        height: 52px;
        border-radius: 0 12px 12px 0;
        box-shadow: none;
    }

    .custom-search .form-control:focus {
        border-color: #4F46E5;
        box-shadow: 0 0 0 .15rem rgba(79, 70, 229, .15);
    }

    .search-btn {
        height: 52px;
        border-radius: 12px;
        font-weight: 600;
    }

    .reset-btn {
        height: 52px;
        border-radius: 12px;
        font-weight: 600;
    }

    @media(max-width:991px) {

        .search-btn,
        .reset-btn {
            width: 100%;
        }

    }
</style>

@include('layout.footer')
<script>
    function infoGuest(id) {
        $.ajax({
            url: '/api/get-booking-info-by-booking-id/' + id,
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
