@include('layout.header');


<div class="card shadow-sm mb-4">
    <div class="card-body">

        <form method="GET">

            <div class="row g-2">

                <div class="col-md-3">
                    <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                        placeholder="Search Title...">
                </div>

                <div class="col-md-2">
                    <select name="type" class="form-select">
                        <option value="">All Types</option>
                        <option value="Food" {{ request('type') == 'Food' ? 'selected' : '' }}>Food</option>
                        <option value="Salary" {{ request('type') == 'Salary' ? 'selected' : '' }}>Salary</option>
                        <option value="Electricity" {{ request('type') == 'Electricity' ? 'selected' : '' }}>Electricity
                        </option>
                        <option value="Maintenance" {{ request('type') == 'Maintenance' ? 'selected' : '' }}>Maintenance
                        </option>
                        <option value="Other" {{ request('type') == 'Other' ? 'selected' : '' }}>Other</option>
                    </select>
                </div>

                <div class="col-md-2">
                    <input type="date" name="from_date" value="{{ request('from_date') }}" class="form-control">
                </div>

                <div class="col-md-2">
                    <input type="date" name="to_date" value="{{ request('to_date') }}" class="form-control">
                </div>

                <div class="col-lg-3 col-md-12">
                    <div class="d-flex flex-wrap gap-2">

                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-search"></i> Search
                        </button>

                        <a href="{{ route('expenses.index') }}" class="btn btn-secondary">
                            <i class="fa fa-refresh"></i> Reset
                        </a>

                        <a href="#" class="btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#addExpenseModal">
                            <i class="fa fa-plus"></i> Add Expense
                        </a>

                    </div>
                </div>




            </div>

        </form>

    </div>
</div>



<div class="card shadow-sm">

    <div class="card-header bg-dark text-white">
        <h5 class="mb-0">Expense List</h5>
    </div>

    <div class="table-responsive">

        <table class="table table-bordered table-hover align-middle">

            <thead class="table-light">

                <tr>

                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Type</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Action</th>

                </tr>

            </thead>

            <tbody>

                @forelse($expenses as $expense)
                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $expense->title }}</td>

                        <td>{{ $expense->description }}</td>

                        <td>
                            <span class="badge bg-info">
                                {{ $expense->type }}
                            </span>
                        </td>

                        <td class="fw-bold text-success">
                            ₹{{ number_format($expense->amount, 2) }}
                        </td>

                        <td>
                            {{ date('d M Y', strtotime($expense->date)) }}
                        </td>

                        <td>

                           

                            <form action="{{ route('expenses.destroy', $expense->id) }}" method="POST"
                                class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm" onclick="return confirm('Delete Expense?')">

                                    Delete

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="7" class="text-center">
                            No Expense Found
                        </td>

                    </tr>
                @endforelse

            </tbody>

        </table>

    </div>

</div>

<div class="mt-3">
    {{ $expenses->appends(request()->query())->links() }}
</div>






<!-- Add Expense Modal -->
<div class="modal fade" id="addExpenseModal" tabindex="-1" aria-hidden="true">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <form action="{{ route('expense.store') }}" method="POST">

                @csrf

                <div class="modal-header bg-success text-white">

                    <h5 class="modal-title">
                        <i class="fa fa-plus-circle"></i> Add Expense
                    </h5>

                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>

                </div>

                <div class="modal-body">

                    <div class="row">

                        <!-- Title -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>

                        <!-- Type -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Type</label>

                            <select name="type" class="form-select" required>
                                <option value="">Select Type</option>
                                <option>Food</option>
                                <option>Salary</option>
                                <option>Electricity</option>
                                <option>Maintenance</option>
                                <option>Laundry</option>
                                <option>Other</option>
                            </select>

                        </div>

                        <!-- Description -->
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control" rows="3"></textarea>
                        </div>

                        <!-- Amount -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Amount</label>
                            <input type="number" step="0.01" name="amount" class="form-control" required>
                        </div>

                        <!-- Date -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Date</label>
                            <input type="date" name="date" class="form-control" required>
                        </div>

                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>

                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-save"></i> Save Expense
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>






@include('layout.footer');
