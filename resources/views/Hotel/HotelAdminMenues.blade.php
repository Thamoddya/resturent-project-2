@extends('Hotel.Content.HomeContent')

@section('HotelAdminContent')


    {{-- @dd($usersExceptLoggedInUsers) --}}
    <div class="container-fluid">
        <div class="row" style="padding: 10px;">
            <div class="col-12 ">
                <div class="row bg-white align-items-center">
                    <div class="col-4 d-flex justify-content-center align-items-center p-3">
                        <h5><i class="fa-solid fa-user text-dark"></i> 10</h5>
                    </div>
                    <div class="col-4 d-flex justify-content-center align-items-center p-3">
                        <h5><i class="fa-solid fa-fire-burner text-dark"></i> 10</h5>
                    </div>
                    <div class="col-4 d-flex justify-content-center align-items-center p-3">
                        <h5><i class="fa-solid fa-users-gear text-dark"></i> 10</h5>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-3 d-flex justify-content-end align-items-end">
                <a data-bs-toggle="collapse" href="#collapseExample" role="button">
                    <button class="btn btn-primary rounded rounded-0">
                        <i class="fa fa-plus-circle text-white"></i> Add Menu
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
                                <h5>Add New Menu</h5>
                            </div>
                            <div class="col-12 mt-2">
                                <form action="{{ route('Create.Menu') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="input-group flex-nowrap mb-3">
                                        <span class="input-group-text" id="addon-wrapping">Menu Name</span>
                                        <input type="text" name="menu_name" class="form-control" placeholder="menu Name"
                                            aria-label="Username" aria-describedby="addon-wrapping">
                                    </div>

                                    <div class="input-group flex-nowrap mb-3">
                                        <span class="input-group-text" id="addon-wrapping">Menu Price</span>
                                        <input type="number" name="menu_price" class="form-control"
                                            placeholder="Menu Prcie" aria-label="Username"
                                            aria-describedby="addon-wrapping">
                                    </div>

                                    <div class="input-group flex-nowrap mb-3">
                                        <span class="input-group-text" id="addon-wrapping">Menu Image</span>
                                        <input type="file" name="menu_image" class="form-control"
                                            placeholder="Menu Image" aria-label="Username"
                                            aria-describedby="addon-wrapping">
                                    </div>

                                    <div class="input-group flex-nowrap mb-3">
                                        <span class="input-group-text" id="addon-wrapping">Menu Category</span>
                                        <select name="category_id" class="form-select" aria-label="Default select example">

                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="input-group flex-nowrap mb-3">
                                        <span class="input-group-text" id="addon-wrapping">Menu Description</span>
                                        <input type="text" name="menu_description" class="form-control"
                                            placeholder="Menu Description" aria-label="Username"
                                            aria-describedby="addon-wrapping">
                                    </div>

                                    <ul class="mt-3">
                                        <li class="text-danger">Please Make Sure The Entered Data is Corrected and
                                            Confirmed.</li>
                                    </ul>

                                    <button type="submit" class="btn btn-primary rounded-0 px-3">Add Menu</button>
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
                            <th scope="col" class="text-center">Image</th>
                            <th scope="col" class="text-center">Menu Name</th>
                            <th scope="col" class="text-center">Price</th>
                            <th scope="col" class="text-center">Added Date</th>
                            <th scope="col" class="text-center">More</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider ">


                        @foreach ($menus as $menu)
                            {{-- @dd($usersExceptLoggedInUser->getRoleNames()); --}}
                            <tr class="">
                                <td class="text-center" scope="row">{{ $menu->id }}</th>
                                <td class="text-center" scope="row">
                                    <img src="{{ asset($menu->menu_image_path) }}" style="width: 40px;height: 40px;">
                                    </th>
                                <td class="text-center" scope="row">{{ $menu->menu_name }}</th>
                                <td class="text-center" scope="row">{{ $menu->menu_price }}</th>
                                <td class="text-center" scope="row">{{ $menu->created_at }}</th>
                                <td class="text-center"><button class="btn btn-primary rounded-0">VIEW</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
