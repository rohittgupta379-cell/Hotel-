@include('layout.header')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold">
            <i class="fa fa-credit-card text-primary"></i>
            Payment Management
        </h3>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Summary Cards --}}
    <div class="row mb-4">

        <div class="col-lg-3 col-md-6">
            <div class="card shadow border-0">
                <div class="card-body text-center">
                    <h6>Total Bookings</h6>
                    <h3>{{ $totalBookings }}</h3>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card shadow border-0 bg-success text-white">
                <div class="card-body text-center">
                    <h6>Paid</h6>
                    <h3>{{ $paidBookings }}</h3>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card shadow border-0 bg-warning text-dark">
                <div class="card-body text-center">
                    <h6>Pending</h6>
                    <h3>{{ $pendingBookings }}</h3>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card shadow border-0 bg-primary text-white">
                <div class="card-body text-center">
                    <h6>Revenue</h6>
                    <h3>₹{{ number_format($totalRevenue, 2) }}</h3>
                </div>
            </div>
        </div>

    </div>

    {{-- Search Card --}}
    <div class="card shadow-sm mb-4">
        <div class="card-body">

            <form method="GET">

                <div class="row g-2">

                    <div class="col-lg-3">
                        <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                            placeholder="Search Guest / Room / Phone">
                    </div>

                    <div class="col-lg-2">
                        <select name="status" class="form-select">
                            <option value="">All Status</option>
                            <option value="Paid" {{ request('status') == 'Paid' ? 'selected' : '' }}>Paid</option>
                            <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>Pending
                            </option>
                        </select>
                    </div>

                    <div class="col-lg-2">
                        <input type="date" class="form-control" name="from_date" value="{{ request('from_date') }}">
                    </div>

                    <div class="col-lg-2">
                        <input type="date" class="form-control" name="to_date" value="{{ request('to_date') }}">
                    </div>

                    <div class="col-lg-3 d-grid gap-2 d-md-flex">

                        <button class="btn btn-primary">
                            <i class="fa fa-search"></i> Search
                        </button>

                        <a href="{{ url('/room-payment') }}" class="btn btn-secondary">
                            Reset
                        </a>

                    </div>

                </div>

            </form>

        </div>
    </div>

    {{-- Payment Table --}}
    <div class="card shadow-sm">

        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">Payment Records</h5>
        </div>

        <div class="table-responsive">

            <table class="table table-hover table-bordered align-middle mb-0">

                <thead class="table-light">

                    <tr>
                        <th>#</th>
                        <th>Room</th>
                        <th>Guest</th>
                        <th>Phone</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th width="140">Action</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($payments as $payment)
                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td>
                                <strong>{{ $payment->floorMap->room_no ?? '-' }}</strong>
                            </td>

                            <td>{{ $payment->primary_guest_name }}</td>

                            <td>{{ $payment->phone }}</td>

                            <td>{{ date('d M Y', strtotime($payment->check_in)) }}</td>

                            <td>{{ $payment->check_out ? date('d M Y', strtotime($payment->check_out)) : '-' }}</td>

                            <td class="fw-bold text-success">
                                ₹{{ number_format($payment->total_amount, 2) }}
                            </td>

                            <td>
                                @if (strtolower($payment->payment_status) == 'paid')
                                    <span class="badge bg-success">Paid</span>
                                @else
                                    <span class="badge bg-warning text-dark">Pending</span>
                                @endif
                            </td>

                            <td>
                                @if (strtolower($payment->payment_status) != 'paid')
                                    <form action="{{ route('payment.paid', $payment->id) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-success btn-sm w-100">
                                            <i class="fa fa-check"></i> Mark Paid
                                        </button>
                                    </form>
                                @else
                                    <span class="text-success fw-bold">Completed</span>
                                @endif
                            </td>
                        </tr>

                    @empty

                        <tr>

                            <td colspan="9" class="text-center py-5">

                                <h5>No Payment Records Found</h5>

                            </td>

                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

    
    <div class="mt-3">
        {{ $payments->appends(request()->query())->links() }}
    </div>

</div>

@include('layout.footer')
