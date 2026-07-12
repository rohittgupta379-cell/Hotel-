@include('layout.header');



<!-- row -->
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="d-flex mb-4 justify-content-between align-items-center flex-wrap">
                <div class="card-tabs mt-3 mt-sm-0 mb-xxl-0 mb-4">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#floors" role="tab">All Floors
                                ({{ count($floors ?? []) }})</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#rooms" role="tab">All Room
                                ({{ count($rooms ?? []) }})</a>
                        </li>
                    </ul>
                </div>
                <div class="table-search">
                    <div class="input-group search-area mb-xxl-0 mb-4">
                        <input type="text" class="form-control" placeholder="Search here">
                        <span class="input-group-text"><a href="javascript:void(0)"><i
                                    class="flaticon-381-search-2"></i></a></span>
                    </div>
                </div>
                <div>

                    <a href="javascript:void(0);" class="btn btn-primary mb-xxl-0 mb-4 radius-btn"
                        data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="far fa-file-word me-2"></i>Add
                        Floors</a>
                    <a href="javascript:void(0);" class="btn btn-primary mb-xxl-0 mb-4 radius-btn"
                        data-bs-toggle="modal" data-bs-target="#roomModal"><i class="far fa-file-word me-2"></i>Add
                        Rooms</a>
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-pane active show" id="floors">
                    <div class="table-responsive">
                        <table
                            class="table card-table check-data  display mb-4 dataTablesCard booking-table room-list-tbl table-responsive-lg "
                            id="guestTable-floors">
                            <thead>
                                <tr>
                                    <th class="bg-none">
                                        <div class="form-check style-1">
                                            <input class="form-check-input checkAll" type="checkbox" value="">
                                        </div>
                                    </th>
                                    <th>Sno</th>
                                    <th>Name</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($floors as $index => $floor)
                                    <tr>
                                        <td>
                                            <div class="form-check style-1">
                                                <input class="form-check-input" type="checkbox" value="">
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="fs-16">{{ ++$index }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="fs-16">{{ $floor->name }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="fs-16">{{ $floor->created_at }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="dropdown dropstart">
                                                <a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z"
                                                            stroke="#262626" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path
                                                            d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z"
                                                            stroke="#262626" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path
                                                            d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z"
                                                            stroke="#262626" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" data-bs-toggle="modal"
                                                        data-bs-target="#editModal"
                                                        onclick="editFloor({{ $floor->id }},'{{ $floor->name }}')">Edit</a>
                                                    <a class="dropdown-item"
                                                        onclick="deleteFloor({{ $floor->id }})">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-pane" id="rooms">
                    <div class="table-responsive">
                        <table
                            class="table card-table check-data  display mb-4 dataTablesCard booking-table room-list-tbl table-responsive-lg "
                            id="guestTable-floors">
                            <thead>
                                <tr>
                                    <th class="bg-none">
                                        <div class="form-check style-1">
                                            <input class="form-check-input checkAll" type="checkbox" value="">
                                        </div>
                                    </th>
                                    <th>Sno</th>
                                    <th>Name</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rooms as $index => $room)
                                    <tr>
                                        <td>
                                            <div class="form-check style-1">
                                                <input class="form-check-input" type="checkbox" value="">
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="fs-16">{{ ++$index }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="fs-16">{{ $room->name }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="fs-16">{{ $room->created_at }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="dropdown dropstart">
                                                <a href="javascript:void(0);" class="btn-link"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z"
                                                            stroke="#262626" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path
                                                            d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z"
                                                            stroke="#262626" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path
                                                            d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z"
                                                            stroke="#262626" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"
                                                        onclick="editRoom({{ $room->id }},'{{ $room->name }}')" data-bs-toggle="modal" data-bs-target="#editRoomModal">Edit</a>
                                                    <a class="dropdown-item"
                                                        onclick="deleteroom({{ $room->id }})">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Floor</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/add-floor" method="post">
                    @csrf

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="mb-3">
                                <label for="" class="form-label">Floor Name</label>
                                <input type="text" class="form-control" name="name"
                                    placeholder="First Floor, Ground Floor,etc">
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
</div>

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editModalLabel">Update Floor</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/update-floor" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="mb-3">
                                <label class="form-label">Floor Name</label>
                                <input type="text" class="form-control" id="floor_name" name="name"
                                    placeholder="First Floor, Ground Floor,etc">
                                <input type="hidden" name="id" id="floor_id">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="roomModal" tabindex="-1" aria-labelledby="roomModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="roomModalLabel">Update Rooms</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="/add-rooms" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="mb-3">
                                <label for="" class="form-label">Room Name</label>
                                <input type="text" name="name" class="form-control"
                                    placeholder="e.g., Deluxe, Standard, Suite">
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

<!-- Modal -->
<div class="modal fade" id="editRoomModal" tabindex="-1" aria-labelledby="editRoomModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editRoomModalLabel">Update Room</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/update-room" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="mb-3">
                                <label class="form-label">Room Name</label>
                                <input type="text" class="form-control" id="room_name" name="name"
                                    placeholder="">
                                <input type="hidden" name="id" id="room_id">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



@include('layout.footer');
<script>
    function editFloor(id, name) {
        $('#floor_id').val(id);
        $('#floor_name').val(name);
    }

    function deleteFloor(id) {
        if (confirm("Are you sure you want to delete this floor?")) {
            window.location.href = '/delete-floor/' + id;
        }
    }




     function editRoom(id, name) {
        $('#room_id').val(id);
        $('#room_name').val(name);
    }


     function deleteroom(id) {
        if (confirm("Are you sure you want to delete this room?")) {
            window.location.href = '/delete-room/' + id;
        }
    }
</script>
