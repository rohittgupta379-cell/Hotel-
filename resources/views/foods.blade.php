@include('layout.header')


{{-- Table  --}}
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">



          

            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">

                <div>
                    <h3 class="fw-bold mb-1">
                        <i class="fa fa-utensils text-primary me-2"></i>Food Menu
                    </h3>
                    <small class="text-muted">
                        Total Foods: {{ $foods->count() }}
                    </small>
                </div>

                <div class="d-flex gap-2">

                    <form action="{{ url('/foods') }}" method="GET">
                        <div class="input-group">

                            <span class="input-group-text bg-white">
                                <i class="fa fa-search"></i>
                            </span>

                            <input type="text" name="search" class="form-control" placeholder="Search food..."
                                value="{{ request('search') }}">

                            <button class="btn btn-primary">
                                Search
                            </button>

                        </div>
                    </form>

                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addFoodModal">
                        <i class="fa fa-plus me-2"></i>Add Food
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
                        <table class="table table-bordered table-hover text-center align-middle">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Food</th>
                                    <th>Food Category</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($foods as $food)
                                    <tr>
                                        <td>{{ $food->id }}</td>

                                        <td>
                                            @if ($food->image)
                                                <img src="{{ asset('food_images/' . $food->image) }}" width="70"
                                                    height="70" class="rounded" style="object-fit: cover;">
                                            @else
                                                <span class="text-muted">No Image</span>
                                            @endif
                                        </td>

                                        <td>{{ $food->name }}</td>

                                        <td>{{ $food->foodCategory->name ?? '-' }}</td>

                                        <td>{{ $food->description }}</td>

                                        <td>₹{{ number_format($food->price, 2) }}</td>

                                        <td>
                                            @if (strtolower($food->status) == 'available')
                                                <span class="badge bg-success">Available</span>
                                            @else
                                                <span class="badge bg-danger">Unavailable</span>
                                            @endif
                                        </td>

                                        <td>{{ $food->created_at->format('d M Y') }}</td>

                                        <td>
                                            <!-- Edit Button -->
                                            <button type="button" class="btn btn-warning btn-sm editFoodBtn"
                                                data-bs-toggle="modal" data-bs-target="#editFoodModal"
                                                data-id="{{ $food->id }}"
                                                data-category_id="{{ $food->category_id }}"
                                                data-name="{{ $food->name }}"
                                                data-description="{{ $food->description }}"
                                                data-price="{{ $food->price }}" data-status="{{ $food->status }}"
                                                data-image="{{ asset('food_images/' . $food->image) }}">

                                                <i class="fa fa-edit"></i>
                                            </button>

                                            <a href="{{ url('/delete-food/' . $food->id) }}"
                                                class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                                <i class="fa fa-trash"></i>
                                            </a>


                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center">No Food Found</td>
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



<!-- Add Food Modal -->
<div class="modal fade" id="addFoodModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Add Food</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form action="{{ url('/add-food') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-body">

                    <!-- Food Category -->
                    <div class="mb-3">
                        <label class="form-label">Food Category</label>
                        <select name="category_id" class="form-select" required>
                            <option value="">Select Category</option>

                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <!-- Food Name -->
                    <div class="mb-3">
                        <label class="form-label">Food Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Food Name"
                            required>
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" rows="4" class="form-control" placeholder="Enter Description"></textarea>
                    </div>

                    <!-- Price -->
                    <div class="mb-3">
                        <label class="form-label">Price (₹)</label>
                        <input type="number" name="price" class="form-control" placeholder="Enter Price" required>
                    </div>

                    <!-- Image -->
                    <div class="mb-3">
                        <label class="form-label">Food Image</label>
                        <input type="file" name="image" class="form-control" accept="image/*" required>
                    </div>

                    <!-- Status -->
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="1">Available</option>
                            <option value="0">Unavailable</option>
                        </select>
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>

                    <button type="submit" class="btn btn-primary">
                        Save Food
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>



<!-- Edit Food Modal -->
<div class="modal fade" id="editFoodModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Edit Food</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form id="editFoodForm" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-body">

                    <div class="mb-3">
                        <label>Food Category</label>
                        <select class="form-select" name="category_id" id="edit_category">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Food Name</label>
                        <input type="text" class="form-control" id="edit_name" name="name">
                    </div>

                    <div class="mb-3">
                        <label>Description</label>
                        <textarea class="form-control" id="edit_description" name="description"></textarea>
                    </div>

                    <div class="mb-3">
                        <label>Price</label>
                        <input type="number" class="form-control" id="edit_price" name="price">
                    </div>

                    <div class="mb-3">
                        <img id="previewImage" width="80" class="rounded border">
                    </div>

                    <div class="mb-3">
                        <label>New Image</label>
                        <input type="file" class="form-control" name="image">
                    </div>

                    <div class="mb-3">
                        <label>Status</label>
                        <select class="form-select" name="status" id="edit_status">
                            <option value="available">Available</option>
                            <option value="unavailable">Unavailable</option>
                        </select>
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>

                    <button class="btn btn-success">
                        Update Food
                    </button>
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










    $(document).ready(function() {

        $('.editFoodBtn').click(function() {

            let id = $(this).data('id');

            $('#editFoodForm').attr('action', '/update-food/' + id);

            $('#edit_category').val($(this).data('category_id'));
            $('#edit_name').val($(this).data('name'));
            $('#edit_description').val($(this).data('description'));
            $('#edit_price').val($(this).data('price'));
            $('#edit_status').val($(this).data('status'));

            $('#previewImage').attr('src', $(this).data('image'));

        });

    });
</script>
