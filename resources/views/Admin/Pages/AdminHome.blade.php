@extends('Admin.Content.HomeContent')
@section('AdminContent')
    <div class="container-fluid">
        <div class="row" style="padding: 10px;">

            <div class="col-12 mt-3">
                <div class="row">
                    <div class="col-12 col-md-6 d-flex">
                        <input type="text" placeholder="Search" class="form-control rounded rounded-0">
                        <button class="btn btn-primary rounded-0">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-12 mt-3 mb-3">
                <h4>{{ date('l') }} <br> <span class="text-dark">{{ date('M') }} {{ date('d') }},
                        {{ date('Y') }}</span></h4>
            </div>
            <div class="col-12">

                <div class="row">


                    <div class="col-12 col-md-6 ">
                        <div class="row">
                            <div class="col-12 p-2">
                                <img src="{{ asset('assets/images/pexels-chan-walrus-941861.jpg') }}"
                                    class="img-fluid imagedark" alt="Admin Image" style="">
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 ">
                        <div class="row h-100 flex-grow-1 flex-equal flex-auto flex-shrink-1">
                            <div class="col-6">
                                <div class="row p-2  d-flex align-items-center justify-content-center">
                                    <div class="col-12 text-center p-4  boxStyles ">
                                        <h6>HOTELS</h6>
                                        <h6 class="text-dark fw-bold">{{$hotelsCount}}</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 ">
                                <div class="row p-2  d-flex align-items-center justify-content-center">
                                    <div class="col-12 text-center p-4  boxStyles  ">
                                        <h6>USERS</h6>
                                        <h6 class="text-dark fw-bold">{{$usersCount}}</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 ">
                                <div class="row p-2  d-flex align-items-center justify-content-center">
                                    <div class="col-12 text-center p-4  boxStyles  ">
                                        <h6>TABLES</h6>
                                        <h6 class="text-dark fw-bold">{{$tablesCount}}</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 ">
                                <div class="row p-2  d-flex align-items-center justify-content-center">
                                    <div class="col-12 text-center p-4  boxStyles  h-100">
                                        <h6>EMPLOYEES</h6>
                                        <h6 class="text-dark fw-bold">{{$hotel_employees_count}}</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 ">
                                <div class="row p-2  d-flex align-items-center justify-content-center">
                                    <div class="col-12 text-center p-4  boxStyles  ">
                                        <h6>CACHEERS</h6>
                                        <h6 class="text-dark fw-bold">{{$hotel_cacher_count}}</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 ">
                                <div class="row p-2  d-flex align-items-center justify-content-center">
                                    <div class="col-12 text-center p-4  boxStyles  h-100">
                                        <h6>ADMINS</h6>
                                        <h6 class="text-dark fw-bold">{{$hotel_admins_count}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-12">
                        
                    </div>

                </div>

            </div>


        </div>
    </div>
@endsection
