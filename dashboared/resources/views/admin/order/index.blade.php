@extends('layouts.master')

@section('title', 'Orders')
@section('name', 'Orders Users')

@section('content')
<div class="container-fuild px-4">

    <div class="card mt-4">
        <div class="card-header">
            <h4> View Orders </h4>
        </div>
    <div class="card-body">

        @if(session('message'))
        <div class="alert alert-success">{{ session('message') }}
        </div>
        @endif

        <table id="exampleTable" class="table table-boardered">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($orders as $item )
                    
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ $item->user->email }}</td>
                    <td>{{ $item->order_total }}</td>
                    <td>{{ ucfirst($item->order_status) }}</td>
                    <td><a href="javascript:void(0)" 
                        class="btn btn-success edit-status-btn" 
                        data-id="{{ $item->id }}" 
                        data-status="{{ $item->order_status }}">
                        Edit
                     </a>
                     
                    </td>
                    <td>
                        <form action="{{ url('admin/delete-order/' . $item->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        
                        {{-- <a href="{{ url ('admin/delete-user/' . $item->id)}}" class="btn btn-danger">Delete</a> --}}
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
    </div>

</div>
@endsection