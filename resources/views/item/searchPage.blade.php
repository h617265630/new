@extends('layouts.home')
@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="search">
        <form class="form"  method="post" action="{{url('/item/search')}}">
            {{csrf_field()}}
            <div class="form-group">
                <input  type="text" name="name" placeholder="enter item name" class="form-control" required>
            </div>
            <div class="form-group">
                <input  type="submit"  class="btn btn-primary">
            </div>
        </form>
    </div>
@endsection