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
            <h1 class="mb-4">{{__('messages.Add New Offer')}}</h1>

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


            <form action="{{ url('offers/store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label class="form-label">{{__('messages.nameofinput_ar')}}</label>
                    <input type="text" class="form-control" name="name_ar" autocomplete="off">
                    @error ('name_ar')
                        <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">{{__('messages.nameofinput_en')}}</label>
                    <input type="text" class="form-control" name="name_en" autocomplete="off">
                    @error ('name_en')
                        <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">{{__('messages.priceofinput')}}</label>
                    <input type="number" class="form-control" name="price" autocomplete="off" min="1">
                    @error ('price')
                        <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">{{__('messages.detailsofinput_ar')}}</label>
                    <textarea class="form-control" name="details_ar"></textarea>
                    @error ('details_ar')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">{{__('messages.detailsofinput_en')}}</label>
                    <textarea class="form-control" name="details_en"></textarea>
                    @error ('details_en')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">{{__('messages.submit')}}</button>
            </form>
        </div>
    </div>
@endsection
