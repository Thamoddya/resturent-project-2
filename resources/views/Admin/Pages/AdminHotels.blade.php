@extends('Admin.Content.HomeContent')
@section('AdminContent')
    <div class="container-fluid">
        <div class="row" style="padding: 10px;">
            <div class="col-12 ">
                <div class="row bg-white align-items-center">
                    <div class="col-6 d-flex justify-content-center align-items-center p-3">
                        <h5><i class="fa fa-hotel text-dark"></i> {{$hotelsCount}}</h5>
                    </div>
                    <div class="col-6 d-flex justify-content-center align-items-center p-3">
                        <h5><i class="fa fa-user-friends text-dark"></i> {{$hotel_employees_count}}</h5>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-3 d-flex justify-content-end align-items-end">
                <a data-bs-toggle="collapse" href="#collapseExample" role="button">
                    <button class="btn btn-primary rounded rounded-0">
                        <i class="fa fa-plus-circle text-white"></i> Add Hotel
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
                                <h5>Register New hotel</h5>
                            </div>
                            <div class="col-12 mt-2">
                                <form action="{{ route('Create.Hotel') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="input-group flex-nowrap mb-3">
                                        <span class="input-group-text" id="addon-wrapping">Hotel Name</span>
                                        <input type="text" name="hotel_name" class="form-control"
                                            placeholder="Hotel Name" aria-label="Username"
                                            aria-describedby="addon-wrapping">
                                    </div>

                                    <div class="input-group flex-nowrap mb-3">
                                        <span class="input-group-text" id="addon-wrapping">Hotel Email</span>
                                        <input type="email" name="hotel_email" class="form-control"
                                            placeholder="Hotel Email" aria-label="Username"
                                            aria-describedby="addon-wrapping">
                                    </div>

                                    <div class="input-group mb-3">
                                        <label class="input-group-text" for="inputGroupFile01">Hotel DP</label>
                                        <input name="hotel_image_path" accept=".jpg,.png,.jpeg" type="file"
                                            class="form-control" id="inputGroupFile01">
                                    </div>

                                    <div class="input-group flex-nowrap mb-3">
                                        <span class="input-group-text" id="addon-wrapping">Hotel Mobile</span>
                                        <input type="number" maxlength="10" name="hotel_mobile" class="form-control"
                                            placeholder="Hotel Mobile" aria-label="Username"
                                            aria-describedby="addon-wrapping">
                                    </div>

                                    <div class="input-group flex-nowrap mb-3">
                                        <span class="input-group-text" id="addon-wrapping">Hotel Address</span>
                                        <input type="text" name="hotel_address"
                                            class="form-control" placeholder="Hotel Address" aria-label="Username"
                                            aria-describedby="addon-wrapping">
                                    </div>

                                    <ul class="mt-3">
                                        <li class="text-danger">Please Make Sure The Entered Data is Corrected and
                                            Confirmed.</li>
                                    </ul>

                                    <button type="submit" class="btn btn-primary rounded-0 px-3">Register Hotel</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 mt-3 overflow-auto">
                <table class="table table-hover ">
                    <thead class="table-light align-items-center">
                        <tr>
                            <th scope="col" class="text-center">#</th>
                            <th scope="col" class="text-center">Name</th>
                            <th scope="col" class="text-center">Owner name</th>
                            <th scope="col" class="text-center">Owner Nic</th>
                            <th scope="col" class="text-center">Table Count</th>
                            <th scope="col" class="text-center">Owner mobile</th>
                            <th scope="col" class="text-center">More</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider ">

                        @foreach ($hotels as $hotel)
                            <tr class="">
                                <td class="text-center" scope="row">{{ $hotel->id }}</th>
                                <td class="text-center">{{ $hotel->hotel_name }}</td>
                                <td class="text-center">
                                    @if ($hotel->user)
                                        {{ $hotel->user->name }}
                                    @else
                                        Not Assigned
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($hotel->user)
                                        {{ $hotel->user->nic }}
                                    @else
                                        Not Assigned
                                    @endif
                                </td>
                                <td class="text-center">{{ $hotel->table_count }}</td>
                                <td class="text-center">
                                    @if ($hotel->user)
                                        {{ $hotel->user->mobile }}
                                    @else
                                        Not Assigned
                                    @endif
                                </td>
                                <td class="text-center">
                                @if ($hotel->user)
                                <a
                                        href="{{ route('SuperAdmin.HotelDetails', $hotel->hotel_id) }}"><button
                                            class="btn btn-primary rounded-0">VIEW</button>
                                        </a>
                                    @else
                                        Not Assigned
                                    @endif
                                 
                                        </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
