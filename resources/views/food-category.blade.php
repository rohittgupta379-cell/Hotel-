@include('layout.header')


{{-- Table  --}}
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">

            <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">


                <div class="food-header">
                    <h3 class="mb-0 fw-bold food-title">
                        Food <span>Category</span>
                    </h3>
                </div>

                <style>
                    .food-header {
                        background: #ffffff;
                        padding: 18px 25px;
                        border-radius: 12px;
                        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
                        display: inline-block;
                    }

                    .food-title {
                        font-size: 28px;
                        letter-spacing: .5px;
                        margin: 0;
                    }

                    .food-title span {
                        background: linear-gradient(45deg, #ff7b00, #ffb703);
                        -webkit-background-clip: text;
                        -webkit-text-fill-color: transparent;
                    }
                </style>

                <div class="d-flex gap-2">

                    <!-- Laravel Search -->
                    <form action="{{ url('/food-menu') }}" method="GET">

                        <div class="input-group" style="width:300px;">

                            <input type="text" name="search" class="form-control" placeholder="Search Food..."
                                value="{{ request('search') }}">

                            <button class="btn btn-primary" type="submit">
                                <i class="fa fa-search"></i> Search
                            </button>

                        </div>

                    </form>


                    <!-- Add Food Category Button -->
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addFoodModal">

                        <i class="fa fa-plus me-2"></i>Add Food Category

                    </button>

                </div>

            </div>

            <!-- Food List -->
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Food List</h4>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover text-center">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Food Category</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($foods as $food)
                                    <tr>
                                        <td>{{ $food->id }}</td>
                                        <td>{{ $food->name }}</td>
                                        <td>{{ $food->created_at->format('d M Y') }}</td>

                                        <td>
                                            <!-- Edit Button -->
                                            <button type="button" class="btn btn-sm btn-primary editFoodBtn"
                                                data-id="{{ $food->id }}" data-name="{{ $food->name }}"
                                                data-bs-toggle="modal" data-bs-target="#editFoodModal">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <!-- Delete Button -->
                                            <a href="{{ url('/delete-food/' . $food->id) }}"
                                                class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this food?')">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">No Food Found</td>
                                    </tr>
                                @endforelse
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
{{-- table end --}}


<!-- Add Food Category Modal -->
<div class="modal fade" id="addFoodModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Add Food Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form action="{{ url('/add-food') }}" method="POST">
                @csrf

                <div class="modal-body">

                    <div class="mb-3">
                        <label class="form-label">Food Category</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Food Category"
                            required>
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Food</button>
                </div>

            </form>

        </div>
    </div>
</div>



<!-- Edit Food Modal -->
<div class="modal fade" id="editFoodModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Edit Food</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form id="editFoodForm" method="POST">
                @csrf

                <div class="modal-body">

                    <div class="mb-3">
                        <label class="form-label">Food Category</label>
                        <input type="text" id="editFoodName" name="name" class="form-control" required>
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Update Food</button>
                </div>

            </form>

        </div>
    </div>
</div>
@include('layout.footer')


<script>
    document.addEventListener("DOMContentLoaded", function() {

        document.querySelectorAll(".editFoodBtn").forEach(function(button) {

            button.addEventListener("click", function() {

                let id = this.dataset.id;
                let name = this.dataset.name;

                document.getElementById("editFoodName").value = name;
                document.getElementById("editFoodForm").action = "/update-food/" + id;

            });

        });

    });
</script>
