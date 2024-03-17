@extends('layouts.app')

@section('title', 'Advanced Forms')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Doctor Schedule</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Doctor</a></div>
                    <div class="breadcrumb-item">All Doctor Schedule</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Doctors Schedule</h2>



                <div class="card">
                    <form action="{{ route('schedule.update', $schedule['id']) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            <h4>Input Text</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Doctor Name</label>
                                <div class="form-group">
                                    <select class="form-control" name="doctor_id">
                                        @foreach ($doctor as $item)
                                            <option value="{{ $item->id }}" @selected($item->id == $schedule['id'])>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Schedule</label>
                                @foreach ($schedule['day'] as $key => $day)
                                    <div class="row">
                                        <div class="col-4">
                                            <input class="form-control" name="day[]" value="{{ $day }}" readonly>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input type="text" class="form-control timepicker" name="start[]" value="{{ $schedule['time'][$key][0] }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input type="text" class="form-control timepicker" name="end[]" value="{{ $schedule['time'][$key][1] }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                @endforeach
                                
                            </div>

                            <div class="form-group">
                                <label>note</label>
                                <input type="text" class="form-control" name="note" value="{{ $schedule['note'] }}">
                            </div>


                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('library/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
@endpush
