@extends('layouts.app')

@section('meta')
    @if($model->id)
        <title>{{$model->name}}</title>
    @else
        <title>{{ __( 'Добавление клиники' ) }}</title>
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
                <a href="{{route('clinic.index')}}">
                    {{ __( 'Клиники' ) }}
                </a>
            </li>
            @if($model->id)
                <li class="breadcrumb-item active" aria-current="page">
                    {{$model->name}}
                </li>
            @else
                <li class="breadcrumb-item active" aria-current="page">
                    {{ __( 'Добавление клиники' ) }}
                </li>
            @endif
        </ol>
        <!-- end breadcrumb -->

    </nav>
    <!-- End Breadcrumbs -->

    @include('partials.message')

    @includeWhen($model->id, 'clinic.tabs', ['clinic' => $model])

    <!-- form -->
    <form action="{{route('clinic.' . ($model->id ? 'update' : 'store'), ['clinic' => $model])}}" method="post" enctype="multipart/form-data">
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
                            <div class="col-lg-2">

                                <!-- group -->
                                <div class="form-group">
                                    <label for="code">{{ __( 'Код 1C' ) }}</label>
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
                            <div class="col-lg-7">

                                <!-- group -->
                                <div class="form-group">
                                    <label for="name">{{ __( 'Название' ) }}</label>
                                    {!! html_input('text', 'name', old('name', $model->name), ['class' => 'form-control', 'id' => 'name']) !!}
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
                            <div class="col-lg-3">

                                <!-- group -->
                                <div class="form-group">
                                    <label for="short_name">{{ __( 'Короткое название' ) }}</label>
                                    {!! html_input('text', 'short_name', old('short_name', $model->short_name), ['class' => 'form-control', 'id' => 'short_name']) !!}
                                    @error('short_name')
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
                                    <label for="address">{{ __( 'Адрес' ) }}</label>
                                    {!! html_input('text', 'address', old('address', $model->id ? $details->address : ''), ['class' => 'form-control', 'id' => 'address']) !!}
                                    @error('address')
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
                                    <label for="guide">{{ __( 'Ориентир' ) }}</label>
                                    {!! html_input('text', 'guide', old('guide', $model->id ? $details->guide : ''), ['class' => 'form-control', 'id' => 'guide']) !!}
                                    @error('guide')
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

                                <!-- group -->
                                <div class="form-group">
                                    <label for="schedule">{{ __( 'График работы' ) }}</label>
                                    {!! html_input('text', 'schedule', old('schedule', $model->id ? $details->schedule : ''), ['class' => 'form-control', 'id' => 'schedule']) !!}
                                    @error('schedule')
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

                                <!-- group -->
                                <div class="form-group">
                                    <!-- title -->
                                    <h6 class="card-title pt-3">
                                        {{ __( 'Координаты' ) }}
                                    </h6>
                                    <!-- end title -->
                                </div>
                                <!-- end group -->

                            </div>
                            <!-- end col -->

                            <!-- col -->
                            <div class="col-lg-6">

                                <!-- group -->
                                <div class="form-group">
                                    {!! html_input('text', 'lat',  old('name', $model->id ? $details->lat : ''), ['class' => 'form-control', 'placeholder' => 'lat']) !!}
                                    @error('lat')
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
                                    {!! html_input('text', 'lng', old('name', $model->id ? $details->lng : ''), ['class' => 'form-control', 'placeholder' => 'lng']) !!}
                                    @error('lng')
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

                                <!-- group -->
                                <div class="form-group">
                                    <label for="content">{{ __( 'Как доехать' ) }}</label>
                                    {!! html_textarea('route', old('route', $model->id ? $page->route : ''), ['class' => 'form-control', 'id'=>'route', 'rows' => 6]) !!}
                                    @error('route')
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

                                <!-- group -->
                                <div class="form-group">
                                    <label for="content">{{ __( 'Описание' ) }}</label>
                                    {!! html_textarea('content', old('content', $model->id ? $page->content : ''), ['class' => 'form-control custom-editor', 'id'=>'content']) !!}
                                    @error('content')
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

                        <!-- check -->
                        <div class="form-check form-check-flat form-check-primary">
                            <label class="form-check-label">
                                {!! html_hidden('is_active', 0) !!}
                                {!! html_checkbox('is_active', $model->is_active, ['class' => 'form-check-input', 'value' => 1]) !!}
                                {{ __( 'Активный' ) }}
                                <i class="input-frame"></i>
                            </label>
                        </div>
                        <!-- end check -->

                        <button type="submit" class="btn btn-primary">
                            {{ __( 'Сохранить' ) }}
                        </button>

                        <a href="{{ route('clinic.index') }}" class="btn btn-primary">
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

    @includeWhen($model->id, 'partials.editor', ['slug' => $model->slug])

@endsection
