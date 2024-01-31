@extends('dashboard')
@section('title','View Result')
@section('dashboardContent')
    <div class="box box-primary smart-scroll-y" style="height: calc(100vh - 176px);width: 1115px">
        <div class="box-body">
            @if(count($resultList) == 0)
                <h2 style="text-align: center">Results not yet added...!</h2>
            @else
                <h3 style="text-align: center">Results</h3>
                <table class="table table-dark table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Subject</th>
                        <th scope="col">Marks</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($resultList as $data)
                        <tr>
                            <td scope="row">{{$data->subject_name}}</td>
                            <td scope="row">{{$data->marks}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
@endsection
