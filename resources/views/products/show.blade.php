@extends('layouts.master')

@section('content')
    <h1>{{ __('messages.offers')}} </h1>
    <div class="container-fluid">
        <div class="row">
            <div class="col-11">

                <table class="table m-4 table-dark">
                    <thead>
                        <tr>
                            <th scope="col">Number</th>
                            <th scope="col">id</th>
                            <th scope="col">Name</th> 
                            <th scope="col">Price</th>
                            <th scope="col">Item Weight</th>
                            <th scope="col">Country Of Origin</th>
                            <th scope="col">Details</th>
                            <th scope="col">Photo</th>
                            <th scope="col">Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($products as $product)
                            <tr>
                                <th scope="row"> {{ $i++ }} </th>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->item_weight }}</td>
                                <td>{{ $product->country_of_origin }}</td>
                                <td>{{ $product->details }}</td> 
                                <td>
                                    <img src=""/>
                                </td> 
                                <td> 
                                    <a href="{{('/products/edit/'). $product->id}}">Edit</a> 
                                    <br>
                                    <a href="{{('/products/destroy/'). $product->id}}">Delete</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
