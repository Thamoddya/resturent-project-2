@extends('Admin.Content.HomeContent')
@section('AdminContent')
    <div class="container-fluid">
        <div class="row" style="padding: 10px;">
            <div class="col-12 ">
                <div class="row bg-white align-items-center">
                    <div class="col-4 d-flex justify-content-center align-items-center p-3">
                        <h5><i class="fa-solid fa-user text-dark"></i> {{ $hotel_admins_count }}</h5>
                    </div>
                    <div class="col-4 d-flex justify-content-center align-items-center p-3">
                        <h5><i class="fa-solid fa-fire-burner text-dark"></i> {{ $hotel_employees_count }}</h5>
                    </div>
                    <div class="col-4 d-flex justify-content-center align-items-center p-3">
                        <h5><i class="fa-solid fa-users-gear text-dark"></i> {{ $hotel_cacher_count }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-3 d-flex justify-content-end align-items-end">
                <a data-bs-toggle="collapse" href="#collapseExample" role="button">
                    <button class="btn btn-primary rounded rounded-0">
                        <i class="fa fa-plus-circle text-white"></i> Add User
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
                                <h5>Add New Hotel Admin</h5>
                            </div>
                            <div class="col-12 mt-2">
                                <form action="{{ route('Create.User') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="input-group flex-nowrap mb-3">
                                        <span class="input-group-text" id="addon-wrapping">User Name</span>
                                        <input type="text" name="name" class="form-control" placeholder="User Name"
                                            aria-label="Username" aria-describedby="addon-wrapping">
                                    </div>

                                    <select class="form-select mb-3" name="hotel_id" aria-label="Default select example">
                                        <option selected>Select Hotel</option>
                                        @foreach ($hotels as $hotel)
                                            <option value="{{ $hotel->id }}">{{ $hotel->hotel_name }}</option>
                                        @endforeach
                                    </select>

                                    <div class="input-group flex-nowrap mb-3">
                                        <span class="input-group-text" id="addon-wrapping">User Email</span>
                                        <input type="email" name="email" class="form-control" placeholder="User Email"
                                            aria-label="Username" aria-describedby="addon-wrapping">
                                    </div>

                                    <div class="input-group flex-nowrap mb-3">
                                        <span class="input-group-text" id="addon-wrapping">User Password</span>
                                        <input type="text" name="password" class="form-control"
                                            placeholder="User Password" aria-label="Username"
                                            aria-describedby="addon-wrapping">
                                    </div>

                                    <div class="input-group flex-nowrap mb-3">
                                        <span class="input-group-text" id="addon-wrapping">User Mobile</span>
                                        <input type="number" maxlength="10" name="mobile" class="form-control"
                                            placeholder="User Mobile" aria-label="Username"
                                            aria-describedby="addon-wrapping">
                                    </div>

                                    <div class="input-group flex-nowrap mb-3">
                                        <span class="input-group-text" id="addon-wrapping">User Nic</span>
                                        <input type="text" name="nic" class="form-control" placeholder="User Nic"
                                            aria-label="Username" aria-describedby="addon-wrapping">
                                    </div>

                                    <div class="input-group flex-nowrap mb-3">
                                        <span class="input-group-text" id="addon-wrapping">User Address</span>
                                        <input type="text"  name="address"
                                            class="form-control" placeholder="User Address" aria-label="Username"
                                            aria-describedby="addon-wrapping">
                                    </div>

                                    <ul class="mt-3">
                                        <li class="text-danger">Please Make Sure The Entered Data is Corrected and
                                            Confirmed.</li>
                                    </ul>

                                    <button type="submit" class="btn btn-primary rounded-0 px-3">Register Hotel
                                        Admin</button>
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
                            <th scope="col" class="text-center">Hotel Name</th>
                            <th scope="col" class="text-center">Nic</th>
                            <th scope="col" class="text-center">Role</th>
                            <th scope="col" class="text-center">Mobile</th>
                            <th scope="col" class="text-center">Email</th>
                            <th scope="col" class="text-center">More</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider ">


                        @foreach ($usersExceptLoggedInUsers as $usersExceptLoggedInUser)
                            {{-- @dd($usersExceptLoggedInUser->getRoleNames()); --}}
                            <tr class="">
                                <td class="text-center" scope="row">{{ $usersExceptLoggedInUser->id }}</th>
                                <td class="text-center" scope="row">{{ $usersExceptLoggedInUser->name }}</th>
                                    @if ($usersExceptLoggedInUser->hotels)
                                    <td class="text-center" scope="row">{{ $usersExceptLoggedInUser->hotels->hotel_name }}
                                    </th>
                                    @else
                                    <td class="text-center" scope="row">Not Assigned
                                    </th>
                                    @endif
                                    <td class="text-center" scope="row">{{ $usersExceptLoggedInUser->nic }}</th>
                                <td class="text-center" scope="row">
                                    {{ $usersExceptLoggedInUser->getRoleNames()->first() }}</th>
                                
                                <td class="text-center" scope="row">{{ $usersExceptLoggedInUser->mobile }}</th>
                                <td class="text-center" scope="row">{{ $usersExceptLoggedInUser->email }}</th>
                                <td class="text-center"><button class="btn btn-primary rounded-0">VIEW</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
