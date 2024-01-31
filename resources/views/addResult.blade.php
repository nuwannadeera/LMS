@extends('dashboard')
@section('title','Add Result')
@section('dashboardContent')
    <div class="box box-primary smart-scroll-y" style="height: calc(100vh - 176px);width: 1115px">
        <div class="mt-3">
            @if($errors->any())
                <div class="row flex-row-reverse">
                    @foreach($errors->all() as $error)
                        <div class="col-md-3">
                            <div class="alert alert-danger" style="font-size: 13px;font-weight: bold">{{$error}}</div>
                        </div>
                    @endforeach
                </div>
            @endif
            @if(session()->has('error'))
                <div class="row flex-row-reverse">
                    <div class="col-md-5">
                        <div class="alert alert-danger">{{session('error')}}</div>
                    </div>
                </div>
            @endif
            @if(session()->has('success'))
                <div class="row flex-row-reverse">
                    <div class="col-md-5">
                        <div class="alert alert-success">{{session('success')}}</div>
                    </div>
                </div>
            @endif
        </div>
        <div class="box-body">
            <form action="{{route('saveResult')}}" method="POST" style="width: auto">
                @csrf
                <div class="form-group">
                    <label style="font-weight: bold">Select Student</label>
                    <select class="custom-select" name="student">
                        <option value="">Select Student</option>
                        @foreach($studentList as $data)
                            <option value="{{$data->student_id}}">{{$data->name}}</option>
                        @endforeach
                    </select>
                </div>
                @foreach($subjectList as $data2)
                    <div class="form-group">
                        <label style="font-weight: bold">{{$data2->subject}} Marks</label>
                        <input type="text" class="form-control" placeholder="Enter {{$data2->subject}} Marks"
                               name="{{$data2->subject}}">
                    </div>
                @endforeach
                <button type="submit" class="btn btn-success">Add Result</button>
            </form>
        </div>
    </div>
@endsection
