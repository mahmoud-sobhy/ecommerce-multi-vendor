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
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>



    <div class="container">
        <div class="form-container">
            <h1 class="mb-4">Add New Offer</h1>


    @if (session()->has('success'))
    <div class="alert alert-danger" role="alert">{{ session()->get('success') }}</div>

    <script>
        setTimeout(function() {
            window.location.href = '{{ url()->previous() }}';
        }, 5000);
    </script>
@endif


            <form action="{{ url('offers/store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" autocomplete="off">
                </div>

                <div class="mb-3">
                    <label class="form-label">Price</label>
                    <input type="number" class="form-control" name="price" autocomplete="off">
                </div>

                <div class="mb-3">
                    <label class="form-label">Details</label>
                    <textarea class="form-control" name="details"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
