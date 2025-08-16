@extends('layouts.app')

@section('content')
<div class="container">
    @error('csv_file')
        @php
            toastr()->error($message)
        @endphp
    @enderror
    <div class="row h-100 align-content-center">
        <div class="col-12 col-sm-11 col-md-10 col-lg-12 mx-auto">
            <h3 class="text-center mb-4">Upload CSV File</h3>
            <form action="{{ route('sales.upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input-group">
                    <input type="file" class="form-control" name="csv_file" id="csv_file" aria-describedby="csv" aria-label="Upload">
                    <button class="btn btn-outline-success" type="submit">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
