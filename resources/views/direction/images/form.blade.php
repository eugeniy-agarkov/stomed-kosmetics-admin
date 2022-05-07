@extends('layouts.app')

@section('meta')
    @if($model->id)
        <title>{{ __( 'Редактирование изображения' ) }}</title>
    @else
        <title>{{ __( 'Добавление изображения' ) }}</title>
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
                <a href="{{ route('direction.index') }}">
                    {{ __( 'Направления' ) }}
                </a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('direction.edit', $direction) }}">
                    {{ $direction->name }}
                </a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('direction.images.index', $direction) }}">
                    {{ __( 'Изображения' ) }}
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                @if($model->id)
                    {{ __( 'Редактирование изображения' ) }}
                @else
                    {{ __( 'Добавление изображения' ) }}
                @endif
            </li>
        </ol>
        <!-- end breadcrumb -->

    </nav>
    <!-- End Breadcrumbs -->

    @include('partials.message')

    <!-- form -->
    <form action="{{route('direction.images.' . ($model->id ? 'update' : 'store'), ['direction' => $direction, 'image' => $model])}}" method="post" enctype="multipart/form-data">
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

                        <a href="{{ route('direction.images.index', $direction) }}" class="btn btn-primary">
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
