@extends('layouts.master')


@section('content')
    <style>
        body {
            background-color: #f8f9fa;
        }

        .form-container {
            background-color: #fff;
            border: 1px solid #dee2e6;
            border-radius: 10px;
            margin: 55px auto;
            max-width: 60%;
            padding: 20px;
            position: absolute;
            top: 60%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>



    <div class="container">
        <div class="form-container">
            <h1 class="mb-4">Edit The Product</h1>

            {{-- @if (session()->has()->errors())
            <div class="alert alert-danger" role="alert">{{ $errors }}</div>
        
            <script>
                setTimeout(function() {
                    window.location.href = '{{ url()->previous() }}';
                }, 5000);
            </script>
            @endif --}}

            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">{{ session()->get('success') }}</div>

                <script>
                    setTimeout(function() {
                        window.location.href = '{{ url()->previous() }}';
                    }, 5000);
                </script>
            @endif


            <form action="{{ url('products/update/'. $offer->id)}}" method="post">
                @csrf
                <div class="mb-3">
                    <label class="form-label">name of product</label>
                    <input type="text" class="form-control" value="{{$offer->name_ar}}" name="name_ar" autocomplete="off">
                    @error ('name_ar')
                        <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">price of product</label>
                    <input type="text" class="form-control" value="{{$offer->name_en}}" name="name_en" autocomplete="off">
                    @error ('name_en')
                        <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">color of product</label>
                    <input type="number" class="form-control" value="{{$offer->price}}" name="price" autocomplete="off" min="1">
                    @error ('price')
                        <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">product weight</label>
                    <input type="number" class="form-control" value="{{$offer->price}}" name="price" autocomplete="off" min="1">
                    @error ('price')
                        <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>


                <div class="mb-3">
                    <label class="form-label">country of origin</label>
                    <textarea class="form-control" name="details_ar">{{$offer->details_ar}}</textarea>
                    @error ('details_ar')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">{{__('messages.update')}}</button>
            </form>
        </div>
    </div>
@endsection
