@include('layout.header');



<!-- row -->
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
                                        <td>
                                            <a href="{{ url('delete-room-map', $map->id) }}"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this room?')">
                                                Delete
                                            </a>
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

<!-- Modal -->
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



@include('layout.footer');
