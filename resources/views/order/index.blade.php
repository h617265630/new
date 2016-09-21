@extends('layouts.home')
@section('content')
<div class="row">
    <div class="col-md-8">
        @if($basket->itemCount())
        <div class="well">
            <table class="table">
                <thead>
                <tr>
                    <th>Product </th>
                    <th>Price</th>
                    <th>Quantity</th>
                </tr>
                </thead>
                <tbody>
                @foreach($basket->all() as $item)
                <tr>
                    <td>{{ $item->name}}</td>
                    <td>${{ $item->price}}</td>
                    <td>
                        <form action="" method="post" class="form-inline">
                            <select name="quantity" class="form-control input-sm">
                                @for($i=0;$i<$item->stock;$i++)
                                <option value="{{$i}}" >{{$i}}</option>
                                @endfor
                                <option value="0">None</option>
                            </select>
                            <input type="submit" value="Update" class="btn btn-default btn-sm">
                        </form>
                    </td>
                    <td></td>
                </tr>
               @endforeach
                </tbody>
            </table>
        </div>
        @else
        <p>You have no items in your cart.</p>
        @endif
    </div>
</div>
@endsection