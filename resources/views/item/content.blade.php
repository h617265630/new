@extends('layouts.home')
@section('content')
        <div class="table-responsive">

            <form method="post" action="{{url('/item')}}">
                {{csrf_field()}}
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
                        <td>
                        <select name="quantity" class="form-control input-sm">
                           @for($num=1;$num<=$item->stock;$num++)
                            <option value="{{$num}}">{{$num}}</option>endfor
                            @endfor
                            <option value="0">None</option>
                        </select>
                        </td>
                        <td><input type="hidden" name="id" value="{{$item->id}}"></td>
                        <td><input type="submit" value="add to order"></td>
                </tr>
                </tbody>
            </table>
            </form>
        </div>
@endsection