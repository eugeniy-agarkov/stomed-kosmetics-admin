@extends('layouts.app')

@section('meta')
    @if($model->id)
        <title>{{ __( 'Сертификат для:' ) }} {{$doctor->name}}</title>
    @else
        <title>{{ __( 'Добавление сертификата' ) }}</title>
    @endif
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
                <a href="{{route('doctor.index')}}">
                    {{ __( 'Врачи' ) }}
                </a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{route('doctor.edit', $doctor)}}">
                    {{ $doctor->name }}
                </a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{route('doctor.sertificat.index', $doctor)}}">
                    {{ __( 'Сертификаты' ) }}
                </a>
            </li>
            @if($model->id)
                <li class="breadcrumb-item active" aria-current="page">
                   {{ __( 'Сертификат' ) }}
                </li>
            @else
                <li class="breadcrumb-item active" aria-current="page">
                    {{ __( 'Добавление сертификата' ) }}
                </li>
            @endif
        </ol>
        <!-- end breadcrumb -->

    </nav>
    <!-- End Breadcrumbs -->

    @include('partials.message')

    @includeWhen($doctor->id, 'doctor.tabs', ['model' => $doctor])

    <!-- form -->
    <form action="{{route('doctor.sertificat.' . ($model->id ? 'update' : 'store'), ['doctor' => $doctor, 'sertificat' => $model])}}" method="post" enctype="multipart/form-data">
        @csrf

        <!-- row -->
        <div class="row">

            <!-- col -->
            <div class="col-lg-8 grid-margin stretch-card">

                <!-- card -->
                <div class="card">

                    <!-- body -->
                    <div class="card-body">

                        <!-- row -->
                        <div class="row">

                            <!-- col -->
                            <div class="col-lg-6">

                                <!-- group -->
                                <div class="form-group">
                                    <label for="alt">{{ __( 'Alt' ) }}</label>
                                    {!! html_input('text', 'alt', old('alt', $model->alt), ['class' => 'form-control', 'id' => 'alt']) !!}
                                    @error('name')
                                    <div class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                                <!-- end group -->

                            </div>
                            <!-- end col -->

                            <!-- col -->
                            <div class="col-lg-6">

                                <!-- group -->
                                <div class="form-group">
                                    <label for="title">{{ __( 'Title' ) }}</label>
                                    {!! html_input('text', 'title', old('title', $model->title), ['class' => 'form-control', 'id' => 'title']) !!}
                                    @error('name')
                                    <div class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                                <!-- end group -->

                            </div>
                            <!-- end col -->

                            <!-- col -->
                            <div class="col-lg-12">

                                <!-- title -->
                                <h6 class="card-title pt-3">
                                    {{ __( 'Изображение' ) }}
                                </h6>
                                <!-- end title -->

                                <!-- group -->
                                <div class="form-group">

                                    @if($model->image)
                                        <div class="mb-3">
                                            <img src="{{ Storage::url('thumbnail/' . $model->image) }}" class="img-responsive" />
                                        </div>
                                    @endif
                                    {!! html_input('file', 'filename', null, ['id' => 'image', 'multiple' => 'true']) !!}

                                </div>
                                <!-- end group -->

                            </div>
                            <!-- end col -->

                        </div>
                        <!-- end row -->

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
                        <h6 class="card-title">
                            {{ __( 'Действие' ) }}
                        </h6>
                        <!-- end title -->

                        <button type="submit" class="btn btn-primary">
                            {{ __( 'Сохранить' ) }}
                        </button>

                        <a href="{{ route('doctor.sertificat.index', $doctor) }}" class="btn btn-primary">
                            {{ __( 'Отмена' ) }}
                        </a>

                    </div>
                    <!-- end body -->

                </div>
                <!-- end card -->

            </div>
            <!-- end col -->

        </div>
        <!-- end row -->
    </form>
    <!-- end form -->

@endsection
