@extends('layouts.app')

@section('meta')
    <title>{{ __( 'Настройки' ) }}</title>
@endsection

@section('content')

    <!-- Breadcrumbs -->
    <nav class="page-breadcrumb">

        <!-- breadcrumb -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">
                    {{ __( 'Главная' ) }}
                </a>
            </li>
            <li class="breadcrumb-item">
                {{ __( 'Настройки' ) }}
            </li>
        </ol>
        <!-- end breadcrumb -->

    </nav>
    <!-- End Breadcrumbs -->

    @include('partials.message')

    <!-- nav -->
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="main-tab" data-toggle="tab" href="#main" role="tab" aria-controls="main" aria-selected="true">
                {{ __( 'Главные' ) }}
            </a>
        </li>
    </ul>
    <!-- end nav -->

    <!-- form -->
    <form action="{{route('settings.store')}}" method="post" enctype="multipart/form-data">
        @csrf

        <!-- content -->
        <div class="tab-content">

            <!-- row -->
            <div class="row">

                <!-- col -->
                <div class="col-lg-8 grid-margin stretch-card">

                    <!-- card -->
                    <div class="card">

                        <!-- body -->
                        <div class="card-body">

                            <!-- pane -->
                            <div class="tab-pane fade show active" id="main" role="tabpanel" aria-labelledby="main-tab">

                                <!-- row -->
                                <div class="row">

                                    <!-- col -->
                                    <div class="col-lg-6">

                                        <!-- group -->
                                        <div class="form-group">
                                            <label for="type">
                                                {{ __( 'Email для заявок' ) }}
                                            </label>
                                            {!! html_textarea('settings[email_appointments]', isset($model->email_appointments) ? $model->email_appointments : '', ['class' => 'form-control', 'rows' => 3]) !!}
                                            <p class="card-description">
                                                <small>{{ __( 'Список записей через запятую' ) }}</small>
                                            </p>
                                        </div>
                                        <!-- end group -->

                                    </div>
                                    <!-- end col -->

                                    <!-- col -->
                                    <div class="col-lg-6">

                                        <!-- group -->
                                        <div class="form-group">
                                            <label for="type">
                                                {{ __( 'Email для заявок руководству' ) }}
                                            </label>
                                            {!! html_textarea('settings[email_leadership]', isset($model->email_leadership) ? $model->email_leadership : '', ['class' => 'form-control', 'rows' => 3]) !!}
                                            <p class="card-description">
                                                <small>{{ __( 'Список записей через запятую' ) }}</small>
                                            </p>
                                        </div>
                                        <!-- end group -->

                                    </div>
                                    <!-- end col -->

                                    <!-- col -->
                                    <div class="col-lg-6">

                                        <!-- group -->
                                        <div class="form-group">
                                            <label for="type">
                                                {{ __( 'Email для отзывов' ) }}
                                            </label>
                                            {!! html_textarea('settings[email_reviews]', isset($model->email_reviews) ? $model->email_reviews : '', ['class' => 'form-control', 'rows' => 3]) !!}
                                            <p class="card-description">
                                                <small>{{ __( 'Список записей через запятую' ) }}</small>
                                            </p>
                                        </div>
                                        <!-- end group -->

                                    </div>
                                    <!-- end col -->

                                    <!-- col -->
                                    <div class="col-lg-6">

                                        <!-- group -->
                                        <div class="form-group">
                                            <label for="type">
                                                {{ __( 'Email для резюме' ) }}
                                            </label>
                                            {!! html_textarea('settings[email_resumes]', isset($model->email_resumes) ? $model->email_resumes : '', ['class' => 'form-control', 'rows' => 3]) !!}
                                            <p class="card-description">
                                                <small>{{ __( 'Список записей через запятую' ) }}</small>
                                            </p>
                                        </div>
                                        <!-- end group -->

                                    </div>
                                    <!-- end col -->

                                    <!-- col -->
                                    <div class="col-lg-12">

                                        <!-- group -->
                                        <div class="form-group">
                                            <label for="type">
                                                {{ __( 'Код счетчиков' ) }}
                                            </label>
                                            {!! html_textarea('settings[counters]', isset($model->counters) ? $model->counters : '', ['class' => 'form-control', 'rows' => 10]) !!}
                                        </div>
                                        <!-- end group -->

                                    </div>
                                    <!-- end col -->

                                </div>
                                <!-- end row -->

                            </div>
                            <!-- end pane -->

                        </div>
                        <!-- end body -->

                    </div>
                    <!-- end card -->

                </div>
                <!-- end col -->

                <!-- col -->
                <div class="col-lg-4 grid-margin stretch-card">

                    <!-- card -->
                    <div class="card">

                        <!-- body -->
                        <div class="card-body">

                            <!-- title -->
                            <h6 class="card-title pt-3">
                                {{ __( 'Действие' ) }}
                            </h6>
                            <!-- end title -->

                            <button type="submit" class="btn btn-primary">
                                {{ __( 'Сохранить' ) }}
                            </button>

                        </div>
                        <!-- end body -->

                    </div>
                    <!-- end card -->

                </div>
                <!-- end col -->

            </div>
            <!-- end row -->

        </div>
        <!-- end content -->

    </form>
    <!-- end form -->

@endsection
