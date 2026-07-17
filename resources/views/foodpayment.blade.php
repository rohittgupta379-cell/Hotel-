@include('layout.header')

<div class="container-fluid">

    {{-- Page Title --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold">
            <i class="fa fa-cutlery text-primary"></i>
            Food Bill Management
        </h3>
    </div>

    {{-- Success Message --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Dashboard Cards --}}
    <div class="row mb-4">

        <div class="col-lg-2 col-md-6 mb-3">
            <div class="card shadow border-0">
                <div class="card-body text-center">
                    <h6>Total Orders</h6>
                    <h3>{{ $totalOrders }}</h3>
                </div>
            </div>
        </div>

        <div class="col-lg-2 col-md-6 mb-3">
            <div class="card bg-success text-white shadow border-0">
                <div class="card-body text-center">
                    <h6>Paid</h6>
                    <h3>{{ $paidOrders }}</h3>
                </div>
            </div>
        </div>

        <div class="col-lg-2 col-md-6 mb-3">
            <div class="card bg-warning shadow border-0">
                <div class="card-body text-center">
                    <h6>Pending</h6>
                    <h3>{{ $pendingOrders }}</h3>
                </div>
            </div>
        </div>

        <div class="col-lg-2 col-md-6 mb-3">
            <div class="card bg-info text-white shadow border-0">
                <div class="card-body text-center">
                    <h6>Delivered</h6>
                    <h3>{{ $deliveredOrders }}</h3>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-12 mb-3">
            <div class="card bg-primary text-white shadow border-0">
                <div class="card-body text-center">
                    <h6>Total Revenue</h6>
                    <h3>₹{{ number_format($totalRevenue, 2) }}</h3>
                </div>
            </div>
        </div>

    </div>

    {{-- Search Filter --}}
    <div class="card shadow-sm mb-4">

        <div class="card-body">

            <form method="GET">

                <div class="row g-2">

                    <div class="col-lg-3">
                        <input type="text" class="form-control" name="search" value="{{ request('search') }}"
                            placeholder="Search Order / Name / Room">
                    </div>

                    <div class="col-lg-2">
                        <select class="form-select" name="payment_status">

                            <option value="">Payment Status</option>

                            <option value="Paid" {{ request('payment_status') == 'Paid' ? 'selected' : '' }}>
                                Paid
                            </option>

                            <option value="Pending" {{ request('payment_status') == 'Pending' ? 'selected' : '' }}>
                                Pending
                            </option>

                        </select>
                    </div>

                    <div class="col-lg-2">
                        <select class="form-select" name="order_status">

                            <option value="">Order Status</option>

                            <option value="Delivered" {{ request('order_status') == 'Delivered' ? 'selected' : '' }}>
                                Delivered
                            </option>

                            <option value="Pending" {{ request('order_status') == 'Pending' ? 'selected' : '' }}>
                                Pending
                            </option>

                        </select>
                    </div>

                    <div class="col-lg-2">
                        <input type="date" class="form-control" name="from_date" value="{{ request('from_date') }}">
                    </div>

                    <div class="col-lg-2">
                        <input type="date" class="form-control" name="to_date" value="{{ request('to_date') }}">
                    </div>

                    <div class="col-lg-1 d-grid">
                        <button class="btn btn-primary">
                            Search
                        </button>
                    </div>

                </div>

            </form>

        </div>

    </div>

    {{-- Table --}}
    <div class="card shadow-sm">

        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">Food Bills</h5>
        </div>

        <div class="table-responsive">

            <table class="table table-bordered table-hover align-middle mb-0">

                <thead class="table-light">

                    <tr>

                        <th>#</th>
                        <th>Order No</th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Room</th>
                        <th>Qty</th>
                        <th>Amount</th>
                        <th>Payment</th>
                        <th>Order</th>
                        <th>Date</th>
                        <th width="220">Action</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($bills as $bill)
                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td>
                                <strong>{{ $bill->order_no }}</strong>
                            </td>

                            <td>{{ $bill->name }}</td>

                            <td>{{ $bill->mobile }}</td>

                            <td>{{ $bill->room_no }}</td>

                            <td>{{ $bill->quantity }}</td>

                            <td class="fw-bold text-success">
                                ₹{{ number_format($bill->total_price, 2) }}
                            </td>

                            <td>

                                @if ($bill->payment_status == 'Paid')
                                    <span class="badge bg-success">
                                        Paid
                                    </span>
                                @else
                                    <span class="badge bg-warning text-dark">
                                        Pending
                                    </span>
                                @endif

                            </td>

                            <td>

                                @if ($bill->order_status == 'Delivered')
                                    <span class="badge bg-primary">
                                        Delivered
                                    </span>
                                @else
                                    <span class="badge bg-secondary">
                                        {{ $bill->order_status }}
                                    </span>
                                @endif

                            </td>

                            <td>
                                {{ date('d M Y', strtotime($bill->created_at)) }}
                            </td>

                            <td>

                                <div class="d-flex gap-1">

                                    @if ($bill->payment_status != 'Paid')
                                        <form action="{{ route('food.bill.paid', $bill->id) }}" method="POST">

                                            @csrf

                                            <button class="btn btn-success btn-sm">

                                                Paid

                                            </button>

                                        </form>
                                    @endif

                                    @if ($bill->order_status != 'Delivered')
                                        <form action="{{ route('food.bill.delivered', $bill->id) }}" method="POST">

                                            @csrf

                                            <button class="btn btn-info btn-sm">

                                                Deliver

                                            </button>

                                        </form>
                                    @endif

                                    <form action="{{ route('food.bill.delete', $bill->id) }}" method="POST"
                                        onsubmit="return confirm('Delete this bill?')">

                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger btn-sm">

                                            Delete

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="11" class="text-center py-5">

                                <h5>No Food Bills Found</h5>

                            </td>

                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

    <div class="mt-3">

        {{ $bills->appends(request()->query())->links() }}

    </div>

</div>

@include('layout.footer')
