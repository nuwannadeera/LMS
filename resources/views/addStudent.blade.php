@extends('dashboard')
@section('title','Add Student')
@section('dashboardContent')
    <div class="box box-primary smart-scroll-y" style="height: calc(100vh - 176px);width: 1115px">
        <div class="box-body">
            <div class="mt-3">
                @if($errors->any())
                    <div class="row flex-row-reverse">
                        @foreach($errors->all() as $error)
                            <div class="col-md-3">
                                <div class="alert alert-danger"
                                     style="font-size: 13px;font-weight: bold">{{$error}}</div>
                            </div>
                        @endforeach
                    </div>
                @endif

                @if(session()->has('error'))
                    <div class="row">
                        <div class="col-md-5">
                            <div class="alert alert-danger">{{session('error')}}</div>
                        </div>
                    </div>
                @endif

                @if(session()->has('success'))
                    <div class="row">
                        <div class="col-md-5">
                            <div class="alert alert-success">{{session('success')}}</div>
                        </div>
                    </div>
                @endif
            </div>
            <form action="{{route('saveStudent')}}" method="POST" style="width: auto">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label style="font-weight: bold">Student Name</label>
                            <input type="text" class="form-control" placeholder="Enter Full Name" name="name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label style="font-weight: bold">E-mail</label>
                            <input type="email" class="form-control" placeholder="Enter Email" name="email">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label style="font-weight: bold">Index No</label>
                            <input type="password" class="form-control" placeholder="Enter Index No" name="indexno">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label style="font-weight: bold">Address</label>
                            <input type="text" class="form-control" placeholder="Enter Address" name="address">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label style="font-weight: bold">Contact No</label>
                            <input type="text" class="form-control" placeholder="Enter Contact No" name="contactno">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label style="font-weight: bold">Password</label>
                            <input type="password" class="form-control" placeholder="Enter Password" name="password">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Add Now</button>
            </form>
        </div>
        <br>
        <table class="table table-dark table-striped table-hover">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">E-mail</th>
                <th scope="col">Index No</th>
                <th scope="col">Address</th>
                <th scope="col">COntact No</th>
            </tr>
            </thead>
            <tbody>
            @foreach($studentList as $data)
                <tr>
                    <td scope="row">{{$data->name}}</td>
                    <td scope="row">{{$data->email}}</td>
                    <td scope="row">{{$data->indexno}}</td>
                    <td scope="row">{{$data->address}}</td>
                    <td scope="row">{{$data->contactno}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
