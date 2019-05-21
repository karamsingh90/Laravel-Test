@extends('layouts.app')

@section('content')

<div class="container">

        <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                  <li class="breadcrumb-item"><a href="{{route('items-management')}}">Items Management</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Update Item</li>

                </ol>
              </nav>
              <h2>Update Item</h2>


              <form action="{{route('add-update-item')}}" method="POST">
                    {{ csrf_field() }}
                    <input name="item_id" type="hidden" value="{{$item->id}}">
                    <div class="form-group">
                      <label for="item-name">Item Name</label>
                    <input name="name" type="text" class="form-control" id="item-name" placeholder="Item name" value="{{$item->name}}">

                    @if($errors->has('name'))
                      <p class="alert alert-danger">{{ $errors->first('name')}}</p>
                    @endif

                    </div>
                    <div class="form-group">
                      <label for="item-price">Item price</label>
                      <input name='price' type="text" class="form-control" id="item-price" placeholder="Item Price" value="{{$item->price}}">
                      @if($errors->has('price'))
                      <p class="alert alert-danger">{{ $errors->first('price')}}</p>
                    @endif
                    </div>

                    <button type="submit" class="btn btn-primary">Create</button>
                  </form>

      </div>

  @endsection
