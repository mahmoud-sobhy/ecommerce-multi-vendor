@extends('layouts.master')

@section('content')
    <h1>{{ __('messages.offers')}} </h1>
    <div class="container-fluid">
        <div class="row">
            <div class="col-11">

                <table class="table m-4 table-dark">
                    <thead>
                        <tr>
                            <th scope="col">{{__('messages.Number')}}</th>
                            <th scope="col">{{__('messages.id')}}</th>
                            <th scope="col">{{ __('messages.name')}}</th> 
                            <th scope="col">{{__('messages.price')}}</th>
                            <th scope="col">{{ __('messages.details')}}</th>
                            <th scope="col">{{__('messages.offer_photo')}}</th>
                            <th scope="col">{{__('messages.actions')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($offers as $offer)
                            <tr>
                                <th scope="row"> {{ $i++ }} </th>
                                <td>{{ $offer->id }}</td>
                                <td>{{ $offer->name }}</td>
                                <td>{{ $offer->price }}</td>
                                <td>{{ $offer->details }}</td> 
                                <td>
                                    <img src=""/>
                                </td> 
                                <td> 
                                    <a href="{{('/offers/edit/'). $offer->id}}">Edit</a> 
                                    <br>
                                    <a href="{{('/offers/destroy/'). $offer->id}}">Delete</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
