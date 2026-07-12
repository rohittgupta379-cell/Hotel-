@include('layout.header');


<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="d-flex mb-4 justify-content-between align-items-center flex-wrap">
                    <div class="card-tabs mt-3 mt-sm-0 mb-xxl-0 mb-4">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#All" role="tab">All Room
                                    (457)</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#Pending" role="tab">Available Room
                                    (234)</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#Booked" role="tab">Booked (125)</a>
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
                    <a href="javascript:void(0);" class="btn btn-primary mb-xxl-0 mb-4 radius-btn"
                        data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                            class="far fa-file-word me-2"></i>Generate Report</a>
                </div>
                <div class="tab-content">
                    <div class="tab-pane active show" id="All">
                        <div class="table-responsive">
                            <table
                                class="table card-table check-data  display mb-4 dataTablesCard booking-table room-list-tbl table-responsive-lg "
                                id="guestTable-all">
                                <thead>
                                    <tr>
                                        <th class="bg-none">
                                            <div class="form-check style-1">
                                                <input class="form-check-input checkAll" type="checkbox" value="">
                                            </div>
                                        </th>
                                        <th>Room Name</th>
                                        <th>Bed Type</th>
                                        <th>Room Floor</th>
                                        <th>Room Facility</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-check style-1">
                                                <input class="form-check-input" type="checkbox" value="">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="guest-bx">
                                                <img class="me-3" src="images/hotel/pic11.jpg" alt="">
                                                <div>
                                                    <span class="text-primary">#0005</span>
                                                    <h4 class="mb-0 mt-1"><a class="text-black"
                                                            href="guest-detail.html">Queen A-0001</a></h4>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="fs-16">Single Bed</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="fs-16">Floor G-05</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>

                                                <span class="fs-16">AC, Shower, Double Bed, Towel, Bathup,<br> Coffee
                                                    Set, LED TV, Wifi</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="d-block text-success">Available</span>
                                                <span class="fs-14">Oct 24th - 26th</span>
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
                                                    <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check style-1">
                                                <input class="form-check-input" type="checkbox" value="">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="guest-bx">
                                                <img class="me-3" src="images/hotel/pic22.jpg" alt="">
                                                <div>
                                                    <span class="text-primary">#00011</span>
                                                    <h4 class="mb-0 mt-1"><a class="text-black"
                                                            href="guest-detail.html">Queen A-00011</a></h4>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="fs-16">Double Bed</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="fs-16">Floor G-11</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>

                                                <span class="fs-16">AC, Shower, Double Bed, Towel, Bathup,<br> Coffee
                                                    Set, LED TV, Wifi</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="text-danger d-block">Booked</span>
                                                <span class="fs-14 ">Oct 01th - 26th</span>
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
                                                    <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check style-1">
                                                <input class="form-check-input" type="checkbox" value="">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="guest-bx">
                                                <img class="me-3" src="images/hotel/pic33.jpg" alt="">
                                                <div>
                                                    <span class="text-primary">#00012</span>
                                                    <h4 class="mb-0 mt-1"><a class="text-black"
                                                            href="guest-detail.html">Queen A-00012</a></h4>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="fs-16">Single Bed</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="fs-16">Floor G-12</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>

                                                <span class="fs-16">AC, Shower, Single Bed, Towel, Bathup,<br> Coffee
                                                    Set, LED TV, Wifi</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="text-success d-block">Available</span>
                                                <span class="fs-14 ">Oct 02th - 26th</span>
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
                                                    <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check style-1">
                                                <input class="form-check-input" type="checkbox" value="">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="guest-bx">
                                                <img class="me-3" src="images/hotel/pic11.jpg" alt="">
                                                <div>
                                                    <span class="text-primary">#00013</span>
                                                    <h4 class="mb-0 mt-1"><a class="text-black"
                                                            href="guest-detail.html">Queen A-00013</a></h4>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="fs-16">Double Bed</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="fs-16">Floor G-13</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="fs-16">AC, Shower, Single Bed, Towel, Bathup,<br> Coffee
                                                    Set, LED TV, Wifi</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="text-danger d-block">Booked</span>
                                                <span class="fs-14 ">Oct 03th - 26th</span>
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
                                                    <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check style-1">
                                                <input class="form-check-input" type="checkbox" value="">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="guest-bx">
                                                <div id="carouselExampleControls" class="carousel slide me-3"
                                                    data-bs-ride="carousel">
                                                    <div class="carousel-inner">
                                                        <div class="carousel-item active">
                                                            <img src="images/hotel/pic11.jpg" class="d-block w-100"
                                                                alt="...">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img src="images/hotel/pic22.jpg" class="d-block w-100"
                                                                alt="...">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img src="images/hotel/pic33.jpg" class="d-block w-100"
                                                                alt="...">
                                                        </div>
                                                    </div>
                                                    <button class="carousel-control-prev" type="button"
                                                        data-bs-target="#carouselExampleControls"
                                                        data-bs-slide="prev">
                                                        <i class="fas fa-chevron-left text-black"></i>
                                                    </button>
                                                    <button class="carousel-control-next" type="button"
                                                        data-bs-target="#carouselExampleControls"
                                                        data-bs-slide="next">
                                                        <i class="fas fa-chevron-right text-black"></i>
                                                    </button>
                                                </div>
                                                <div>
                                                    <span class="text-primary">#00014</span>
                                                    <h4 class="mb-0 mt-1"><a class="text-black"
                                                            href="guest-detail.html">Deluxe B-00014</a></h4>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="fs-16">Single Bed</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="fs-16">Floor G-05</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>

                                                <span class="fs-16">AC, Shower, Double Bed, Towel, Bathup,<br> Coffee
                                                    Set, LED TV, Wifi</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="text-success">Available</span>

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
                                                    <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane" id="Pending">
                        <div class="table-responsive">
                            <table
                                class="table card-table check-data  display mb-4 dataTablesCard booking-table room-list-tbl table-responsive-lg"
                                id="guestTable-all-1">
                                <thead>
                                    <tr>
                                        <th class="bg-none">
                                            <div class="form-check style-1">
                                                <input class="form-check-input checkAll" type="checkbox"
                                                    value="">
                                            </div>
                                        </th>
                                        <th>Room Name</th>
                                        <th>Bed Type</th>
                                        <th>Room Floor</th>
                                        <th>Room Facility</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-check style-1">
                                                <input class="form-check-input" type="checkbox" value="">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="guest-bx">
                                                <img class="me-3" src="images/hotel/pic11.jpg" alt="">
                                                <div>
                                                    <span class="text-primary">#00015</span>
                                                    <h4 class="mb-0 mt-1"><a class="text-black"
                                                            href="guest-detail.html">Queen A-00015</a></h4>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="fs-16">Single Bed</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="fs-16">Floor G-15</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>

                                                <span class="fs-16">AC, Shower, Double Bed, Towel, Bathup,<br> Coffee
                                                    Set, LED TV, Wifi</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="d-block text-success">Available</span>
                                                <span class="fs-14">Oct 05th - 26th</span>
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
                                                    <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check style-1">
                                                <input class="form-check-input" type="checkbox" value="">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="guest-bx">
                                                <img class="me-3" src="images/hotel/pic22.jpg" alt="">
                                                <div>
                                                    <span class="text-primary">#00016</span>
                                                    <h4 class="mb-0 mt-1"><a class="text-black"
                                                            href="guest-detail.html">Queen A-00016</a></h4>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="fs-16">Double Bed</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="fs-16">Floor G-16</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>

                                                <span class="fs-16">AC, Shower, Double Bed, Towel, Bathup,<br> Coffee
                                                    Set, LED TV, Wifi</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="text-danger d-block">Booked</span>
                                                <span class="fs-14 ">Oct 16th - 26th</span>
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
                                                    <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check style-1">
                                                <input class="form-check-input" type="checkbox" value="">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="guest-bx">
                                                <img class="me-3" src="images/hotel/pic33.jpg" alt="">
                                                <div>
                                                    <span class="text-primary">#00017</span>
                                                    <h4 class="mb-0 mt-1"><a class="text-black"
                                                            href="guest-detail.html">Queen A-00017</a></h4>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="fs-16">Double Bed</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="fs-16">Floor G-17</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>

                                                <span class="fs-16">AC, Shower, Double Bed, Towel, Bathup,<br> Coffee
                                                    Set, LED TV, Wifi</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="text-success d-block">Available</span>
                                                <span class="fs-14 ">Oct 17th - 26th</span>
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
                                                    <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check style-1">
                                                <input class="form-check-input" type="checkbox" value="">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="guest-bx">
                                                <img class="me-3" src="images/hotel/pic11.jpg" alt="">
                                                <div>
                                                    <span class="text-primary">#00018</span>
                                                    <h4 class="mb-0 mt-1"><a class="text-black"
                                                            href="guest-detail.html">Queen A-00018</a></h4>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="fs-16">Double Bed</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="fs-16">Floor G-18</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="fs-16">AC, Shower, Double Bed, Towel, Bathup,<br> Coffee
                                                    Set, LED TV, Wifi</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="text-danger d-block">Booked</span>
                                                <span class="fs-14 ">Oct 18th - 26th</span>
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
                                                    <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check style-1">
                                                <input class="form-check-input" type="checkbox" value="">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="guest-bx">
                                                <div id="carouselExampleControls-1" class="carousel slide me-3"
                                                    data-bs-ride="carousel">
                                                    <div class="carousel-inner">
                                                        <div class="carousel-item active">
                                                            <img src="images/hotel/pic11.jpg" class="d-block w-100"
                                                                alt="...">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img src="images/hotel/pic22.jpg" class="d-block w-100"
                                                                alt="...">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img src="images/hotel/pic33.jpg" class="d-block w-100"
                                                                alt="...">
                                                        </div>
                                                    </div>
                                                    <button class="carousel-control-prev" type="button"
                                                        data-bs-target="#carouselExampleControls-1"
                                                        data-bs-slide="prev">
                                                        <i class="fas fa-chevron-left text-black"></i>
                                                    </button>
                                                    <button class="carousel-control-next" type="button"
                                                        data-bs-target="#carouselExampleControls-1"
                                                        data-bs-slide="next">
                                                        <i class="fas fa-chevron-right text-black"></i>
                                                    </button>
                                                </div>
                                                <div>
                                                    <span class="text-primary">#00019</span>
                                                    <h4 class="mb-0 mt-1"><a class="text-black"
                                                            href="guest-detail.html">Deluxe B-00019</a></h4>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="fs-16">Double Bed</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="fs-16">Floor G-19</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>

                                                <span class="fs-16">AC, Shower, Double Bed, Towel, Bathup,<br> Coffee
                                                    Set, LED TV, Wifi</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="text-success">Available</span>

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
                                                    <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane" id="Booked">
                        <div class="table-responsive">
                            <table
                                class="table card-table check-data  display mb-4 dataTablesCard booking-table room-list-tbl table-responsive-lg"
                                id="guestTable-all-2">
                                <thead>
                                    <tr>
                                        <th class="bg-none">
                                            <div class="form-check style-1">
                                                <input class="form-check-input checkAll" type="checkbox"
                                                    value="">
                                            </div>
                                        </th>
                                        <th>Room Name</th>
                                        <th>Bed Type</th>
                                        <th>Room Floor</th>
                                        <th>Room Facility</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-check style-1">
                                                <input class="form-check-input" type="checkbox" value="">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="guest-bx">
                                                <img class="me-3" src="images/hotel/pic11.jpg" alt="">
                                                <div>
                                                    <span class="text-primary">#00028</span>
                                                    <h4 class="mb-0 mt-1"><a class="text-black"
                                                            href="guest-detail.html">Queen A-00028</a></h4>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="fs-16">Single Bed</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="fs-16">Floor G-05</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>

                                                <span class="fs-16">AC, Shower, Double Bed, Towel, Bathup,<br> Coffee
                                                    Set, LED TV, Wifi</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="d-block text-danger">Booked</span>
                                                <span class="fs-14">Oct 28th - 26th</span>
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
                                                    <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check style-1">
                                                <input class="form-check-input" type="checkbox" value="">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="guest-bx">
                                                <img class="me-3" src="images/hotel/pic22.jpg" alt="">
                                                <div>
                                                    <span class="text-primary">#00029</span>
                                                    <h4 class="mb-0 mt-1"><a class="text-black"
                                                            href="guest-detail.html">Queen A-00029</a></h4>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="fs-16">Single Bed</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="fs-16">Floor G-29</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>

                                                <span class="fs-16">AC, Shower, Single Bed, Towel, Bathup,<br> Coffee
                                                    Set, LED TV, Wifi</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="text-success d-block">Available</span>
                                                <span class="fs-14 ">Oct 29th - 27th</span>
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
                                                    <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check style-1">
                                                <input class="form-check-input" type="checkbox" value="">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="guest-bx">
                                                <img class="me-3" src="images/hotel/pic33.jpg" alt="">
                                                <div>
                                                    <span class="text-primary">#0030</span>
                                                    <h4 class="mb-0 mt-1"><a class="text-black"
                                                            href="guest-detail.html">Queen A-00030</a></h4>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="fs-16">Double Bed</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="fs-16">Floor G-30</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>

                                                <span class="fs-16">AC, Shower, Double Bed, Towel, Bathup,<br> Coffee
                                                    Set, LED TV, Wifi</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="text-danger d-block">Booked</span>
                                                <span class="fs-14 ">Oct 19th - 26th</span>
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
                                                    <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check style-1">
                                                <input class="form-check-input" type="checkbox" value="">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="guest-bx">
                                                <img class="me-3" src="images/hotel/pic11.jpg" alt="">
                                                <div>
                                                    <span class="text-primary">#00040</span>
                                                    <h4 class="mb-0 mt-1"><a class="text-black"
                                                            href="guest-detail.html">Queen A-00040</a></h4>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="fs-16">Single Bed</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="fs-16">Floor G-040</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="fs-16">AC, Shower, Single Bed, Towel, Bathup,<br> Coffee
                                                    Set, LED TV, Wifi</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="text-danger d-block">Booked</span>
                                                <span class="fs-14 ">Oct 08th - 26th</span>
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
                                                    <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check style-1">
                                                <input class="form-check-input" type="checkbox" value="">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="guest-bx">
                                                <div id="carouselExampleControls-2" class="carousel slide me-3"
                                                    data-bs-ride="carousel">
                                                    <div class="carousel-inner">
                                                        <div class="carousel-item active">
                                                            <img src="images/hotel/pic11.jpg" class="d-block w-100"
                                                                alt="...">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img src="images/hotel/pic22.jpg" class="d-block w-100"
                                                                alt="...">
                                                        </div>
                                                        <div class="carousel-item">
                                                            <img src="images/hotel/pic33.jpg" class="d-block w-100"
                                                                alt="...">
                                                        </div>
                                                    </div>
                                                    <button class="carousel-control-prev" type="button"
                                                        data-bs-target="#carouselExampleControls-2"
                                                        data-bs-slide="prev">
                                                        <i class="fas fa-chevron-left text-black"></i>
                                                    </button>
                                                    <button class="carousel-control-next" type="button"
                                                        data-bs-target="#carouselExampleControls-2"
                                                        data-bs-slide="next">
                                                        <i class="fas fa-chevron-right text-black"></i>
                                                    </button>
                                                </div>
                                                <div>
                                                    <span class="text-primary">#00050</span>
                                                    <h4 class="mb-0 mt-1"><a class="text-black"
                                                            href="guest-detail.html">Deluxe B-00050</a></h4>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="fs-16">Double Bed</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="fs-16">Floor G-50</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>

                                                <span class="fs-16">AC, Shower, Double Bed, Towel, Bathup,<br> Coffee
                                                    Set, LED TV, Wifi</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <span class="text-success">Available</span>

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
                                                    <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Report</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Room Facility</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                placeholder="AC, Shower, Double Bed, Towel, Bathup,Coffee Set, LED TV, Wifi">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <label class="form-label d-block">Bed Type</label>
                        <select class="nice-select me-sm-2 default-select form-control wide"
                            aria-label="Default select example">
                            <option selected>Bed Type</option>
                            <option value="1">Single Bed</option>
                            <option value="2">Double Bed</option>
                        </select>
                    </div>
                    <div class="col-xl-6">
                        <div class="mb-3">
                            <label for="exampleFormControlInput2" class="form-label">Room Floor</label>
                            <input type="text" class="form-control" id="exampleFormControlInput2"
                                placeholder="Floor G-05">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>



@include('layout.footer');
