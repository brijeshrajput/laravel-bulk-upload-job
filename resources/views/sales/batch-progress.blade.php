@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row h-100 align-content-center">
            <div class="col-12 col-sm-11 col-md-10 col-lg-12 mx-auto">
                <h3 class="text-center mb-4">Job Batch Progress</h3>
                <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: {{ $batch->progress() }}%;"
                        aria-valuenow="{{ $batch->progress() }}" aria-valuemin="0" aria-valuemax="100">
                        {{ $batch->progress() }}%</div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            var intervalId = setInterval(function() {
                $.ajax({
                    url: "{{ route('batch.progress', $batch->id) }}",
                    success: function(response) {
                        if (response.progress == 100) {
                            clearInterval(intervalId); // Stop the interval on success
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: 'Your operation has been completed successfully.',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href =
                                    "{{ route('home') }}"; // Redirect to sales index
                                }
                            });
                        }
                        $('.progress-bar').css('width', response.progress + '%').attr(
                            'aria-valuenow', response.progress).text(response.progress +
                            '%');
                    },
                    error: function(xhr, status, error) {
                        clearInterval(intervalId); // Stop the interval on error
                        console.log('Error:', status, error);
                    }
                });
            }, 1000);
        });
    </script>
@endsection
