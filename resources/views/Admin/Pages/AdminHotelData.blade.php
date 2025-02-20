@extends('Admin.Content.HomeContent')
@section('AdminContent')
    <div class="container-fluid">
        <div class="row" style="padding: 10px;">

            {{-- @dd($hotelData, $hotelData->user, $hotelData->table,$roles,$employeesCount,$tables) --}}
            <div class="col-12">
                <div class="row ">
                    <div class="col-12">

                        <div class="row ">
                            <div class="col-12 col-md-6">
                                <div class="row p-1 align-self-baseline  h-auto d-flex inline-flex">
                                    <div class="col-12  p-3 bg-white align-self-baseline shadow">
                                        <h5>Hotel Details</h5>
                                        <hr>
                                        <h6>Name : <span class="text-secondary">{{ $hotelData->hotel_name }}</span></h6>
                                        <h6>Employees : <span class="text-secondary">{{ $employeesCount }}</span></h6>
                                        <h6>Location : <span class="text-secondary">{{ $hotelData->hotel_address }}</span>
                                        </h6>
                                        </h6>
                                        <h6>Transactions : <span class="text-secondary">{{ $transactionCount }}</span></h6>
                                        <h6>Total Income : <span class="text-secondary">Rs.{{ $totalPrice }}</span></h6>
                                        <h6>
                                            <a class="text-decoration-none text-dark" data-bs-toggle="collapse"
                                                href="#tableData" role="button" aria-expanded="false"
                                                aria-controls="tableData">
                                                Tables : <i class="fa fa-arrow-down text-primary"></i>
                                            </a>
                                        </h6>
                                        <div class="collapse" id="tableData">
                                            <div class="card card-body border-0 m-0 p-0 g-0 gap-0">
                                                <ul>
                                                    @foreach ($tables as $table)
                                                        <li>{{ $table->table_name }} -
                                                            @if ($table->isActive == 1)
                                                                <span class="text-success">Active</span>
                                                        </li>
                                                    @else
                                                        <span class="text-danger">Not Active</span></li>
                                                    @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        <h6>Mobiles :
                                            <span class="text-secondary">
                                                <ul>
                                                    <li class="text-primary">{{ $hotelData->hotel_mobile }}</li>
                                                </ul>
                                            </span>
                                        </h6>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-6 ">
                                <div class="row p-1 d-flex inline-flex">
                                    <div class="col-12  p-3 bg-white align-self-baseline shadow ">
                                        <h5>Hotel Admin Details</h5>
                                        <hr>
                                        <h6>Name : <span class="text-secondary">{{ $hotelData->user->name }}</span></h6>
                                        <h6>NIC No : <span class="text-secondary">{{ $hotelData->user->mobile }}</span></h6>
                                        <h6>Address : <span class="text-secondary">{{ $hotelData->user->address }}.</span>
                                        </h6>
                                        <h6>Created : <span
                                                class="text-secondary">{{ \Carbon\Carbon::parse($hotelData->user->created_at)->format('jS F Y') }}</span>
                                        </h6>
                                        </h6>
                                        <h6>Email : <span class="text-secondary">{{ $hotelData->user->email }}</span></h6>
                                        <h6>
                                            <a class="text-decoration-none text-dark" data-bs-toggle="collapse"
                                                href="#userUpdates" role="button" aria-expanded="false"
                                                aria-controls="userUpdates">
                                                Updates : <i class="fa fa-arrow-down text-primary"></i>
                                            </a>
                                        </h6>
                                        <div class="collapse" id="userUpdates">
                                            <div class="card card-body border-0 m-0 p-0 g-0 gap-0">
                                                <ul>
                                                    <li>Profile Pic Update - <span class="text-success">Completed</span>
                                                    </li>
                                                    <li>Table Count Update - <span class="text-danger">Faild</span></li>
                                                    <li>Employee Added - <span class="text-success">Completed</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <h6>Mobiles :
                                            <span class="text-secondary">
                                                <ul>
                                                    <li class="text-primary">0769458554</li>
                                                </ul>
                                            </span>
                                        </h6>
                                    </div>

                                </div>
                            </div>
                            <div class="col-12 overflow-x-auto mt-3 mb-3">

                                <div class="col-12 mt-3 d-flex justify-content-end align-items-end">
                                    <a data-bs-toggle="collapse" href="#collapseExample" role="button">
                                        <button class="btn btn-primary rounded rounded-0">
                                            <i class="fa fa-plus-circle text-white"></i> Add Hotel Table
                                        </button>
                                    </a>
                                </div>
                                <div class="col-12 mt-3 d-flex justify-content-end align-items-end">
                                    <a data-bs-toggle="collapse" href="#categories" role="button">
                                        <button class="btn btn-primary rounded rounded-0">
                                            <i class="fa fa-plus-circle text-white"></i> Hotel Categories
                                        </button>
                                    </a>
                                </div>

                                <div class="col-12">
                                    @if (session('success'))
                                        <p class="text-success">{{ session('success') }} </p>
                                    @endif

                                    @if ($errors->any())
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li class="text-danger">{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    @endif

                                </div>
                                <div class="col-12 mt-3">
                                    <div class="collapse" id="collapseExample">
                                        <div class="card card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h5>Add New Table</h5>
                                                </div>
                                                <div class="col-12 mt-2">
                                                    <form action="{{ route('Create.table', $hotelData->hotel_id) }}"
                                                        method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="input-group flex-nowrap mb-3">
                                                            <span class="input-group-text" id="addon-wrapping">Table
                                                                Name</span>
                                                            <input type="text" name="table_name" class="form-control"
                                                                placeholder="Table Name" aria-label="Username"
                                                                aria-describedby="addon-wrapping">
                                                        </div>

                                                        <div class="input-group flex-nowrap mb-3">
                                                            <span class="input-group-text" id="addon-wrapping">Table
                                                                Seats</span>
                                                            <input type="number" name="max_seats" class="form-control"
                                                                placeholder="Table Seats" aria-label="Username"
                                                                aria-describedby="addon-wrapping">
                                                        </div>

                                                        <ul class="mt-3">
                                                            <li class="text-danger">Please Make Sure The Entered Data is
                                                                Corrected and
                                                                Confirmed.</li>
                                                        </ul>

                                                        <button type="submit" class="btn btn-primary rounded-0 px-3">Add
                                                            Table </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-3">
                                    <div class="collapse" id="categories">
                                        <div class="card card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h5>Hotel Categories</h5>
                                                </div>
                                                <div class="col-12 mt-2">
                                                    <div class="hstack gap-3 border border-secondary">
                                                        @foreach ($categories as $category)
                                                            <div class="p-2 ms-auto">{{ $category->name }}</div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <hr class="m-1">
                            <div class="col-12 overflow-x-auto " style="height: 50vh">
                                <div class="row p-1 d-flex inline-flex">
                                    <table class=" col-12 table table-responsive table-sm table-hover caption-top"
                                        style="height: 20vh">
                                        <caption class="text-dark fw-bold ">latest transcations</caption>
                                        <thead class="table-light align-items-center">
                                            <tr>
                                                <th scope="col" class="text-center">#</th>
                                                <th scope="col" class="text-center">Transaction ID</th>
                                                <th scope="col" class="text-center">Order ID</th>
                                                <th scope="col" class="text-center">C. Employee NIC</th>
                                                <th scope="col" class="text-center">Items</th>
                                                <th scope="col" class="text-center">Total </th>
                                                <th scope="col" class="text-center">More</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-group-divider ">
                                            <tr class="">
                                                <td class="text-center" scope="row">1</th>
                                                <td class="text-center">#2234-3342-HH34-k73C</td>
                                                <td class="text-center">0000001</td>
                                                <td class="text-center"><a href="#"
                                                        class="text-primary text-decoration-none">200506414585</a></td>
                                                <td class="text-center">6</td>
                                                <td class="text-center">Rs.4700.oo</td>
                                                <td class="text-center">
                                                    <button class="btn btn-primary rounded-0">VIEW</button>
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
    </div>
@endsection
