@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">Inventory Management System </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">

                        <div class="col-sm-4">
                          <h3>Manage Items</h3>
                          <p>Create, update and delete items</p>
                          <a class="btn btn-primary" href="{{route('items-management')}}">Start</a>
                         </div>

                        <div class="col-sm-4">
                          <h3>Coming Soon</h3>
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                        </div>

                        <div class="col-sm-4">
                            <h3>Coming Soon</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
