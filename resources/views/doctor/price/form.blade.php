@extends('layouts.app')

@section('meta')
    @if($model->id)
        <title>{{ __( 'Цена для:' ) }} {{$doctor->name}}</title>
    @else
        <title>{{ __( 'Добавление цены' ) }}</title>
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
                <a href="{{route('doctor.price.index', $doctor)}}">
                    {{ __( 'Цены' ) }}
                </a>
            </li>
            @if($model->id)
                <li class="breadcrumb-item active" aria-current="page">
                   {{ __( 'Цена' ) }}
                </li>
            @else
                <li class="breadcrumb-item active" aria-current="page">
                    {{ __( 'Добавление цены' ) }}
                </li>
            @endif
        </ol>
        <!-- end breadcrumb -->

    </nav>
    <!-- End Breadcrumbs -->

    @include('partials.message')

    @includeWhen($doctor->id, 'doctor.tabs', ['model' => $doctor])

    <!-- form -->
    <form action="{{route('doctor.price.' . ($model->id ? 'update' : 'store'), ['doctor' => $doctor, 'price' => $model])}}" method="post" enctype="multipart/form-data">
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
                            <div class="col-lg-4">

                                <!-- group -->
                                <div class="form-group">
                                    <label for="code">{{ __( 'Код 1С' ) }}</label>
                                    {!! html_input('text', 'code', old('code', $model->code), ['class' => 'form-control', 'id' => 'code']) !!}
                                    @error('code')
                                    <div class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                                <!-- end group -->

                            </div>
                            <!-- end col -->

                            <!-- col -->
                            <div class="col-lg-8">

                                <!-- group -->
                                <div class="form-group">
                                    <label for="direction_id">{{ __( 'Направление' ) }}</label>
                                    {!! html_select('direction_id', old('direction_id', $model->direction_id), $directions, ['class' => 'custom-select', 'id' => 'direction_id']) !!}
                                    @error('direction_id')
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
                                    <label for="price">{{ __( 'Цена' ) }}</label>
                                    {!! html_input('text', 'price', old('price', $model->price), ['class' => 'form-control', 'id' => 'price']) !!}
                                    @error('price')
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
                                    <label for="discount_price">{{ __( 'Цена со скидкой' ) }}</label>
                                    {!! html_input('text', 'discount_price', old('discount_price', $model->discount_price), ['class' => 'form-control', 'id' => 'discount_price']) !!}
                                    @error('discount_price')
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
                                    <label for="description">{{ __( 'Описание' ) }}</label>
                                    {!! html_textarea('description', old('discount_price', $model->description), ['class' => 'form-control', 'id'=>'description', 'rows' => 6]) !!}
                                    @error('description')
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
                                    <label for="condition">{{ __( 'Условия акции' ) }}</label>
                                    {!! html_textarea('condition', old('discount_price', $model->condition), ['class' => 'form-control', 'id'=>'condition', 'rows' => 6]) !!}
                                    @error('condition')
                                    <div class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
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

                        <!-- group -->
                        <div class="form-group mb-4">
                            <label for="order">
                                {{ __( 'Сортировка' ) }}
                            </label>
                            {!! html_input('text', 'order', old('discount_price', empty($model->order) ? 0 : $model->order), ['class' => 'form-control', 'id' => 'order']) !!}
                            @error('order')
                            <div class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                        <!-- end group -->

                        <button type="submit" class="btn btn-primary">
                            {{ __( 'Сохранить' ) }}
                        </button>

                        <a href="{{ route('doctor.price.index', $doctor) }}" class="btn btn-primary">
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
