@extends('layouts.home')
@section('content')
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Phone no.</th>
                    <th>Address</th>
                    <th>Credit card no.</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{$result->name}}</td>
                    <td>{{$result->phoneNo}}</td>
                    <td>{{$result->address}}</td>
                    <td>{{$result->creditCard}}</td>
                </tr>
                </tbody>
            </table>
        </div>
        <!-- /.table-responsive -->
        <hr/>

        <div>

            <a href="{{url('/item')}}">search item for this customer</a>
        </div>

    </div>
    @section('test')
        @@parent
        this is child test bar
        @stop
@endsection