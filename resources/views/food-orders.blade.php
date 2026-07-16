@include('layout.header')

<!-- Main Body Start -->
<div class="container-fluid">

    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">Food Orders</h3>
            <p class="text-muted mb-0">
                Manage hotel restaurant and room service orders
            </p>
        </div>
    </div>

    <!-- Filter -->
    <form method="GET" action="{{ url()->current() }}" class="row g-3 mb-4">

        <div class="col-lg-3 col-md-6">
            <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                placeholder="Search Order / Name / Phone / Room">
        </div>

        <div class="col-lg-2 col-md-6">
            <select name="payment_status" class="form-select">
                <option value="">Payment Status</option>
                <option value="Pending" {{ request('payment_status') == 'Pending' ? 'selected' : '' }}>
                    Pending
                </option>
                <option value="Paid" {{ request('payment_status') == 'Paid' ? 'selected' : '' }}>
                    Paid
                </option>
            </select>
        </div>

        <div class="col-lg-2 col-md-6">
            <select name="order_status" class="form-select">
                <option value="">Order Status</option>

                <option value="Pending" {{ request('order_status') == 'Pending' ? 'selected' : '' }}>
                    Pending
                </option>

                <option value="Preparing" {{ request('order_status') == 'Preparing' ? 'selected' : '' }}>
                    Preparing
                </option>

                <option value="Delivered" {{ request('order_status') == 'Delivered' ? 'selected' : '' }}>
                    Delivered
                </option>

                <option value="Cancelled" {{ request('order_status') == 'Cancelled' ? 'selected' : '' }}>
                    Cancelled
                </option>

            </select>
        </div>

        <div class="col-lg-2 col-md-6">
            <input type="date" name="date" value="{{ request('date') }}" class="form-control">
        </div>

        <div class="col-lg-3 col-md-12">
            <button class="btn btn-primary">
                <i class="fa fa-search"></i> Filter
            </button>

            <a href="{{ url()->current() }}" class="btn btn-secondary">
                <i class="fa fa-refresh"></i> Reset
            </a>
        </div>

    </form>

    <!-- Card -->
    <div class="card border-0 shadow rounded-4">

        <div class="card-header bg-white py-3">

            <div class="d-flex justify-content-between align-items-center">

                <h5 class="mb-0 fw-bold">
                    Food Orders
                </h5>

                <span class="badge bg-primary fs-6">
                    Total :
                    {{ $orders->total() }}
                </span>

            </div>

        </div>

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover table-bordered align-middle mb-0">

                    <thead class="table-light">

                        <tr>

                            <th>#</th>

                            <th>Order No</th>

                            <th>Food Name</th>

                            <th>Payable Amount</th>

                            <th>Customer Name</th>

                            <th>Mobile</th>

                            <th>Room No</th>

                            <th>Payment Method</th>

                            <th>Payment Status</th>

                            <th>Order Status</th>

                            <th width="260">
                                Action
                            </th>

                        </tr>

                    </thead>

                    <tbody>


                        @forelse($orders as $key => $order)
                            <tr>

                                <td>{{ $orders->firstItem() + $key }}</td>

                                <td>
                                    <strong>{{ $order->order_no }}</strong>
                                </td>

                                <td>
                                    {{ $order->food->name ?? 'N/A' }}
                                </td>

                                <td>
                                    ₹{{ number_format($order->food->price ?? 0, 2) }} x {{ $order->quantity }}
                                    =
                                    <strong>₹{{ number_format($order->total_price, 2) }}</strong>
                                </td>

                                <td>{{ $order->name }}</td>

                                <td>{{ $order->mobile }}</td>

                                <td>
                                    <span class="badge bg-secondary">
                                        {{ $order->room_no }}
                                    </span>
                                </td>

                                <td>{{ $order->payment_method }}</td>

                                <!-- Payment Status -->
                                <td>
                                    @if ($order->payment_status == 'Paid')
                                        <span class="badge bg-success">Paid</span>
                                    @else
                                        <span class="badge bg-warning text-dark">Pending</span>
                                    @endif
                                </td>

                                <!-- Order Status -->
                                <td>

                                    @if ($order->order_status == 'Pending')
                                        <span class="badge bg-secondary">Pending</span>
                                    @elseif($order->order_status == 'Preparing')
                                        <span class="badge bg-info">Preparing</span>
                                    @elseif($order->order_status == 'Delivered')
                                        <span class="badge bg-success">Delivered</span>
                                    @else
                                        <span class="badge bg-danger">Cancelled</span>
                                    @endif

                                </td>

                                <!-- Action -->
                                <td>
                                    <button class="btn btn-warning btn-sm editStatusBtn" data-bs-toggle="modal"
                                        data-bs-target="#statusModal" data-id="{{ $order->id }}"
                                        data-payment="{{ $order->payment_status }}"
                                        data-order="{{ $order->order_status }}">
                                        Update
                                    </button>
                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="13" class="text-center py-5">
                                    <h6 class="text-muted mb-0">No Food Orders Found</h6>
                                </td>
                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

        <div class="card-footer bg-white">
            {{ $orders->withQueryString()->links() }}
        </div>

    </div>

</div>

<!-- Main Body End -->


{{-- model  action --}}
<div class="modal fade" id="statusModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <form id="statusForm" method="POST">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title">Update Order Status</h5>

                    <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                    </button>
                </div>

                <div class="modal-body">

                    <div class="mb-3">
                        <label class="form-label">
                            Payment Status
                        </label>

                        <select name="payment_status"
                            id="payment_status"
                            class="form-select">

                            <option value="Pending">Pending</option>
                            <option value="Paid">Paid</option>

                        </select>
                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Order Status
                        </label>

                        <select name="order_status"
                            id="order_status"
                            class="form-select">

                            <option value="Pending">Pending</option>
                            <option value="Preparing">Preparing</option>
                            <option value="Delivered">Delivered</option>
                            <option value="Cancelled">Cancelled</option>

                        </select>

                    </div>

                </div>

                <div class="modal-footer">

                    <button class="btn btn-secondary"
                        data-bs-dismiss="modal"
                        type="button">
                        Close
                    </button>

                    <button class="btn btn-primary">
                        Update Status
                    </button>

                </div>

            </form>

        </div>
    </div>
</div>
{{-- model  action  end --}}

@include('layout.footer')



<script>
$(document).ready(function () {

    $('.editStatusBtn').click(function () {

        let id = $(this).data('id');
        let payment = $(this).data('payment');
        let order = $(this).data('order');

        $('#payment_status').val(payment);
        $('#order_status').val(order);

        $('#statusForm').attr('action', '/food-order/update-status/' + id);

    });

});
</script>