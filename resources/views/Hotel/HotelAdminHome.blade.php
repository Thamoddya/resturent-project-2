 @extends('Hotel.Content.HomeContent')

@section('HotelAdminContent')
    <div class="container-fluid">
        <div class="row" style="padding: 10px;">

            {{-- @dd($hotelData, $hotelData->user, $hotelData->table, $roles, $employeesCount, $tables) --}}
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
                                        <h6>NIC No : <span class="text-secondary">{{ $hotelData->user->nic }}</span></h6>
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
                                                    <li class="text-primary">{{ $hotelData->user->mobile }}</li>
                                                </ul>
                                            </span>
                                        </h6>
                                    </div>

                                </div>
                            </div>

                            <hr class="m-1">
                            <div class="col-12 mt-3 d-flex justify-content-end align-items-end">
                                <a data-bs-toggle="collapse" href="#categories" role="button">
                                    <button class="btn btn-primary rounded rounded-0">
                                        <i class="fa fa-plus-circle text-white"></i> Hotel Categories
                                    </button>
                                </a>
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
                                            <div class="col-12 mt-2">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h6>Add New Category</h6>
                                                    </div>
                                                    <div class="col-12">
                                                        <form action="{{route('AddCategory')}}" method="POST">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <input type="text" name="category_name"
                                                                        class="form-control" placeholder="Category Name">
                                                                </div>
                                                                <div class="col-12 mt-2">
                                                                    <button class="btn btn-primary rounded-0">Add</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 overflow-x-auto mb-2 mt-2">
                                    <div class="row p-1 d-flex inline-flex">
                                        <table class=" col-12 table table-responsive table-sm table-hover caption-top"
                                            style="height: 20vh">
                                            <caption class="text-dark fw-bold ">Tables</caption>
                                            <thead class="table-light align-items-center">
                                                <tr>
                                                    <th scope="col" class="text-center">#</th>
                                                    <th scope="col" class="text-center">Table ID</th>
                                                    <th scope="col" class="text-center">Table Name</th>
                                                    <th scope="col" class="text-center">Max Seats</th>
                                                    <th scope="col" class="text-center">Status</th>
                                                    <th scope="col" class="text-center">Action</th>
                                                    <th scope="col" class="text-center">View</th>
                                                    <th scope="col" class="text-center">Qr Code</th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-group-divider ">
                                                @foreach ($tables as $table)
                                                    <tr class="">
                                                        <td class="text-center" scope="row">1</th>
                                                        <td class="text-center">{{ $table->table_id }}</td>
                                                        <td class="text-center">{{ $table->table_name }}</td>
                                                        <td class="text-center">{{ $table->max_seats }}</td>
                                                        <td class="text-center">
                                                            @if ($table->isActive == 1)
                                                                <span class="text-success">Active</span>
                                                        </td>
                                                    @else
                                                        <span class="text-danger">Not Active</span></td>
                                                @endif
                                                <td class="text-center">
                                                    @if ($table->isActive == 1)
                                                        <a href="{{ route('UpdateTableStatusDown', $table->table_id) }}">
                                                            <button class="btn btn-danger rounded-0">Deactivate</button>
                                                        </a>
                                                    @else
                                                        <a href="{{ route('UpdateTableStatusUp', $table->table_id) }}">
                                                            <button class="btn btn-Primary rounded-0">Activate</button>
                                                        </a>
                                                    @endif
                                                </td>
                                                <td><a href="{{ route('table-id-food', $table->table_id) }}">View
                                                        Table</a></td>
                                                <td class="text-center">
                                                    {{-- {!! $table->generateQr() !!} --}}
                                                    {{-- @dd($table->generateQr()) --}}
                                                    <img style="width: 100px;height: 100px;"
                                                        src="{{ $table->generateQr() }}" alt="">
                                                    {{-- @dd($table->generateQr()) --}}
                                                    {{-- {!! QrCode::size(100)->generate('RemoteStack') !!} --}}
                                                </td>
                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
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
                                                @foreach ($transactions as $transaction)
                                                    <tr class="">
                                                        <td class="text-center" scope="row">1</th>
                                                        <td class="text-center">#{{ $transaction->invoice_id }}</td>
                                                        <td class="text-center">{{ $transaction->order->order_id }}</td>
                                                        <td class="text-center"><a href="#"
                                                                class="text-primary text-decoration-none">{{ $transaction->order->user->nic }}</a>
                                                        </td>
                                                        <td class="text-center">
                                                            {{ $transaction->order->orderdMenus()->count() }}</td>
                                                        <td class="text-center">
                                                            Rs.{{ number_format($transaction->total_price, 2) }}</td>
                                                        <td class="text-center">
                                                            <button class="btn btn-primary rounded-0">VIEW</button>
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


            </div>
        </div>
    @endsection
