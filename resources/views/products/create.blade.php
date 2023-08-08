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
            margin: 110px auto;
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
            <h1 class="mb-4">Add New Product</h1>

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


            <form action="{{ url('products/store') }}" method="post" enctype="multipart/form-data" id="myForm">
                @csrf
                <div class="mb-3">
                    <label class="form-label">name of product</label>
                    <input type="text" class="form-control" name="name" autocomplete="off">
                    @error ('name')
                        <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">price of product</label>
                    <input type="number" class="form-control" name="price" autocomplete="off" min="1">
                    @error ('price')
                        <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">color of product</label>
                    <input type="text" class="form-control" name="color" autocomplete="off">
                    @error ('color')
                        <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">product photo</label>
                    <input type="file" class="form-control" name="photo" autocomplete="off">
                    @error ('photo')
                        <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div> 

                <div class="mb-3">
                    <label class="form-label">country of origin</label>
                    <input type="text" class="form-control" name="country_of_origin" autocomplete="off">
                    @error ('country_of_origin')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">details</label>
                    <textarea class="form-control" name="details"></textarea>
                    @error ('details_en')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">submit</button>
            </form>
        </div>
    </div>
@endsection

{{-- @section('scripts')
    
<script>
    $(document).ready(function() {
        // Find the form element
        const form = $('#myForm');

        // Add a submit event listener to the form
        form.on('submit', function(event) {
            // Prevent the default form submission behavior
            event.preventDefault();

            // Serialize the form data
            const formData = form.serialize();

            // Send the form data via AJAX
            $.ajax({
                url: '/products/store',
                method: 'POST',
                data: formData,
                success: function(response) {
                    // Handle the response from the server
                    console.log('hello');
                    alert('hello');
                },
                error: function(error) {
                    // Handle any errors that occurred during the AJAX request
                    console.error('no' );
                }
            });
        });
    });
</script>
@endsection --}}
