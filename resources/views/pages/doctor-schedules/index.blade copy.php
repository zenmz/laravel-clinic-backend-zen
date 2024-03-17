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
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Doctor</a></div>
                    <div class="breadcrumb-item">All Doctor Schedule</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Doctors Schedule</h2>



                <div class="card">
                    <table class="table table-bordered table-sm ">
                        <thead class="thead-dark">
                            <tr>
                                <th>Column</th>
                                <th>Column</th>
                                <th>Column</th>
                                <th>Column</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="clickable" data-toggle="collapse" data-target="#group-of-rows-1"
                                aria-expanded="false" aria-controls="group-of-rows-1">
                                <td><i class="fa fa-folder"></i></td>
                                <td>data</td>
                                <td>data</td>
                                <td>data</td>
                            </tr>
                        </tbody>
                        <tbody id="group-of-rows-1" class="collapse">
                            <tr class="table-warning">
                                <td><i class="fa fa-folder-open"></i> child row</td>
                                <td>data 1</td>
                                <td>data 1</td>
                                <td>data 1</td>
                            </tr>
                            <tr class="table-warning">
                                <td><i class="fa fa-folder-open"></i> child row</td>
                                <td>data 1</td>
                                <td>data 1</td>
                                <td>data 1</td>
                            </tr>
                        </tbody>
                        <tbody>
                            <tr class="clickable" data-toggle="collapse" data-target="#group-of-rows-2"
                                aria-expanded="false" aria-controls="group-of-rows-2">
                                <td><i class="fa fa-folder"></i></td>
                                <td>data</td>
                                <td>data</td>
                                <td>data</td>
                            </tr>
                        </tbody>
                        <tbody id="group-of-rows-2" class="collapse">
                            <tr class="table-warning">
                                <td><i class="fa fa-folder-open"></i> child row</td>
                                <td>data 2</td>
                                <td>data 2</td>
                                <td>data 2</td>
                            </tr>
                            <tr class="table-warning">
                                <td><i class="fa fa-folder-open"></i> child row</td>
                                <td>data 2</td>
                                <td>data 2</td>
                                <td>data 2</td>
                            </tr>
                        </tbody>
                    </table>
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
