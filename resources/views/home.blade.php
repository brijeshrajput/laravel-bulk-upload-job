@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 pb-5">
                <h1 class="text-center">Welcome to eSoftware Solutions</h1>
            </div>
            <button id="upload-pg" class="btn btn-primary mx-auto d-block">Let's Upload file</button>
            <br>
            <button id="sales-pg" class="btn btn-secondary mx-auto d-block mt-4">Sales Table</button>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#upload-pg').click(function() {
                window.location.href = "{{ route('sales.index') }}";
            });
            $('#sales-pg').click(function() {
                window.location.href = "{{ route('show') }}";
            });
        });

    </script>
@endsection