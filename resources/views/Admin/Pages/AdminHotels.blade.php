@extends('Admin.Content.HomeContent')
@section('AdminContent')
    <div class="container-fluid">
        <div class="row" style="padding: 10px;">
            <div class="col-12 ">
                <div class="row bg-white align-items-center">
                    <div class="col-6 d-flex justify-content-center align-items-center p-3">
                        <h5><i class="fa fa-hotel text-dark"></i> 10</h5>
                    </div>
                    <div class="col-6 d-flex justify-content-center align-items-center p-3">
                        <h5><i class="fa fa-user-friends text-dark"></i> 10</h5>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-3 d-flex justify-content-end align-items-end">
                <button class="btn btn-primary rounded rounded-0">
                    <i class="fa fa-plus-circle text-white"></i> Add Hotel
                </button>
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
                        <tr class="">
                            <td class="text-center" scope="row">1</th>
                            <td class="text-center">Crispy Gone</td>
                            <td class="text-center">Texta Wolrd</td>
                            <td class="text-center">200506414585</td>
                            <td class="text-center">12</td>
                            <td class="text-center">0769458554</td>
                            <td class="text-center"><button class="btn btn-primary rounded-0">VIEW</button></td>
                        </tr>
                        <tr class="">
                            <td class="text-center" scope="row">1</th>
                            <td class="text-center">Crispy Gone</td>
                            <td class="text-center">Texta Wolrd</td>
                            <td class="text-center">200506414585</td>
                            <td class="text-center">12</td>
                            <td class="text-center">0769458554</td>
                            <td class="text-center"><button class="btn btn-primary rounded-0">VIEW</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
