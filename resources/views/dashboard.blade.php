@extends('layouts.app')

@section('meta')
    <title>{{ __( 'Главная' ) }}</title>
@endsection

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">
                {{ __( 'Главная страница' ) }}
            </h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            <div class="input-group date datepicker dashboard-date mr-2 mb-2 mb-md-0 d-md-none d-xl-flex" id="dashboardDate">
                <span class="input-group-addon bg-transparent"><i data-feather="calendar" class=" text-primary"></i></span>
                <input type="text" class="form-control">
            </div>
            <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
                <i class="btn-icon-prepend" data-feather="download-cloud"></i>
                {{ __( 'Скачать заявки' ) }}
            </button>
        </div>
    </div>

    <div class="row">

        <div class="col-lg-7 col-xl-8 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline mb-2">
                        <h6 class="card-title mb-3">
                            {{ __( 'Новые заявки' ) }}
                        </h6>
                    </div>
                    <div class="table-responsive">
                        @if( $appoinment->count() )

                            <table class="table table-hover mb-0">
                                <thead>
                                <tr>
                                    <th class="pt-0">#</th>
                                    <th class="pt-0">Имя</th>
                                    <th class="pt-0">Телефон</th>
                                    <th class="pt-0">Содержимое</th>
                                    <th class="pt-0">Форма</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach( $appoinment as $item )
                                    <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{!! $item->content !!}</td>
                                    <td>{{ \App\Enums\FormEnum::getName($item->form) }}</td>
                                </tr>
                                @endforeach

                                </tbody>
                            </table>
                            <a href="{{ route('appointment.index') }}" class="btn btn-primary">
                                {{ __( 'Все заявки' ) }}
                            </a>
                        @else
                            <div class="mb-3">{{ __( 'Заявок еще нет' ) }}</div>
                        @endif

                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-5 col-xl-4 grid-margin grid-margin-xl-0 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline mb-2">
                        <h6 class="card-title mb-0">
                            {{ __( 'Новые отзывы' ) }}
                        </h6>
                    </div>
                    <div class="d-flex flex-column">

                        @if( $reviews->count() )

                            @foreach( $reviews as $item )
                                <a href="{{ route('reviews.edit', $item) }}" class="d-flex align-items-center border-bottom py-3">
                                    <div class="w-100">
                                        <div class="d-flex justify-content-between">
                                            <h6 class="text-body mb-2">{{ $item->fio }}</h6>
                                            <p class="text-muted tx-12">{{ $item->published_at->format('d.m.Y H:i') }}</p>
                                        </div>
                                        <p class="text-muted tx-13">{!! \Illuminate\Support\Str::limit($item->content, 100) !!}</p>
                                    </div>
                                </a>
                            @endforeach

                                <a href="{{ route('reviews.index') }}" class="btn btn-primary btn-block">
                                    {{ __( 'Все отзывы' ) }}
                                </a>

                        @else
                            {{ __( 'Отзывов еще нет' ) }}
                        @endif

                    </div>
                </div>
            </div>
        </div>




    </div> <!-- row -->

@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/chartjs/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery.flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery.flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/progressbar-js/progressbar.min.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker.js') }}"></script>
@endpush
