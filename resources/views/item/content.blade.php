@extends('layouts.home')
@section('content')
        <div class="table-responsive">

            <table class="table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Detail</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Add to cart</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->detail}}</td>
                    <td>{{$item->price}}</td>
                    <form method="post" action="{{url('/order/add/'.$item->id)}}">
                        {{csrf_field()}}
                    <td>
                        <select name="quantity" class="form-control input-sm">
                           @for($num=1;$num<=$item->stock;$num++)
                            <option value="{{$num}}">{{$num}}</option>
                            @endfor
                            <option value="0">None</option>
                        </select>
                    </td>
                    <td><input type="submit" class="btn btn-danger" value="add to order"></td>
                    </form>
                </tr>
                </tbody>
            </table>

        </div>
@endsection