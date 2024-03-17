@extends('layouts.app')

@section('title', 'Doctors')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Doctor Schedule</h1>
                <div class="section-header-button">
                    <a href="{{ route('schedule.create') }}" class="btn btn-primary">Add New</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Doctor</a></div>
                    <div class="breadcrumb-item">All Doctor Schedule</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>
                <h2 class="section-title">Doctors Schedule</h2>
                <p class="section-lead">
                    You can manage all Users, such as editing, deleting and more.
                </p>


                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>All Doctors Schedule</h4>
                            </div>
                            <div class="card-body">

                                <div class="float-right">
                                    <form method="GET" action="{{ route('schedule.index') }}">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search" name="name">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table table-borderless ">
                                        <thead>
                                            <tr>
                                                <th>Doctor Name</th>
                                                <th class="text-center" style="width: 25em">Actions</th>
                                                {{-- <th>Column</th>
                                                <th>Column</th> --}}
                                            </tr>
                                        </thead>
                                        @foreach ($data as $doctor)
                                            <tbody>
                                                <tr class="clickable" data-toggle="collapse"
                                                    data-target="#group-of-rows-{{ $loop->iteration }}"
                                                    aria-expanded="false"
                                                    aria-controls="group-of-rows-{{ $loop->iteration }}">
                                                    <td>{{ $doctor->name }}</td>
                                                    <td>
                                                        <div class="d-flex justify-content-center">
                                                            <button class="btn btn-sm btn-primary btn-icon mr-2">Schedule</button>

                                                            <a href='{{ route('schedule.edit', $doctor->id) }}'
                                                                class="btn btn-sm btn-info btn-icon">
                                                                <i class="fas fa-edit"></i>
                                                                Edit
                                                            </a>

                                                            <form action="{{ route('schedule.destroy', $doctor->id) }}"
                                                                method="POST" class="ml-2">
                                                                <input type="hidden" name="_method" value="DELETE" />
                                                                <input type="hidden" name="_token"
                                                                    value="{{ csrf_token() }}" />
                                                                <button
                                                                    class="btn btn-sm btn-danger btn-icon confirm-delete">
                                                                    <i class="fas fa-times"></i> Delete
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tbody id="group-of-rows-{{ $loop->iteration }}" class="collapse">
                                                @forelse($doctor->schedule as $schedule)
                                                    <tr class="table-warning">
                                                        <td>{{ $schedule->day }}</td>
                                                        <td>{{ $schedule->time }}</td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="2" class="text-center table-warning">No Data</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        @endforeach

                                    </table>
                                </div>
                                <div class="float-right">
                                    {{ $data->withQueryString()->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
