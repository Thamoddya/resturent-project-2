@extends('Admin.Content.HomeContent')
@section('AdminContent')
    <div class="container-fluid">
        <div class="row" style="padding: 10px;">


            <div class="col-12">
                <div class="row ">
                    <div class="col-12">

                        <div class="row ">
                            <div class="col-12 col-md-6">
                                <div class="row p-1 align-self-baseline  h-auto d-flex inline-flex">
                                    <div class="col-12  p-3 bg-white align-self-baseline shadow">
                                        <h5>Hotel Details</h5>
                                        <hr>
                                        <h6>Name : <span class="text-secondary">Texta World</span></h6>
                                        <h6>Employees : <span class="text-secondary">120</span></h6>
                                        <h6>Location : <span class="text-secondary">20 , Colombo Road , battaramulla.</span>
                                        </h6>
                                        <h6>Transactions : <span class="text-secondary">2112</span></h6>
                                        <h6>Total Income : <span class="text-secondary">Rs.15664.00</span></h6>
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
                                                    <li>Table 1 - <span class="text-success">Active</span></li>
                                                    <li>Table 2 - <span class="text-success">Active</span></li>
                                                    <li>Table 3 - <span class="text-success">Active</span></li>
                                                    <li>Table 4 - <span class="text-danger">Deactive</span></li>
                                                    <li>Table 5 - <span class="text-success">Active</span></li>
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

                            <div class="col-12 col-md-6 ">
                                <div class="row p-1 d-flex inline-flex">
                                    <div class="col-12  p-3 bg-white align-self-baseline shadow ">
                                        <h5>Hotel Admin Details</h5>
                                        <hr>
                                        <h6>Name : <span class="text-secondary">Thamoddya Rashmitha</span></h6>
                                        <h6>NIC No : <span class="text-secondary">200509414587</span></h6>
                                        <h6>Address : <span class="text-secondary">20 , Colombo Road , battaramulla.</span>
                                        </h6>
                                        <h6>Last Login : <span class="text-secondary">15<sup>th</sup> Feb , 2024 </span>
                                        </h6>
                                        <h6>Email : <span class="text-secondary">thamoddya.dev@thamoddya.cloud</span></h6>
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
                                                <td class="text-center"><a href="#" class="text-primary text-decoration-none">200506414585</a></td>
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
