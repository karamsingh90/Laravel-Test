@extends('layouts.app')

@section('content')

<div class="container">

        <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Items Management</li>
                </ol>
              </nav>
              @if (session('message'))
              <div class="alert alert-success" role="alert">
                  {{ session('message') }}
              </div>
          @endif

        <h2>Items Management</h2>
       <div class="mb-2">
        <a href="{{route('add-item')}}" class="btn btn-primary float-left">Add new item</a>
        <input placeholder="Search Items" type="text" id="search" name="search" value="" class="float-right">
        <div class="clearfix"></div>
       </div>

    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Item Name</th>
          <th>Item Price</th>
          <th>Added at</th>
          <th>Update</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody id="tbody">
        @if(count($items) > 0)
        @foreach ($items as $item)
        <tr>
          <td>{{$item->name}}</td>
          <td>{{$item->price}}</td>
            <td>{{date('d-m-Y H:i:s', strtotime($item->created_at))}}</td>
            <td><a href="{{route('update-item', $item->id)}}">Update</a></td>
            <td><a onclick="return confirm('Are you sure?');" href="{{route('delete-item', $item->id)}}">Delete</a></td>

    </tr>
        @endforeach
        @else
        <tr>
                <td>No item found</td>

             </tr>
        @endif

      </tbody>
    </table>

    {{ $items->links() }}

  </div>


  @endsection
