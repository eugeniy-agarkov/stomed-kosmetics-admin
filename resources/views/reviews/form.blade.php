@extends('layouts.app')

@section('meta')
    @if($model->id)
        <title>{{$model->name}}</title>
    @else
        <title>{{ __( 'Добавление отзыва' ) }}</title>
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
                <a href="{{route('reviews.index')}}">
                    {{ __( 'Отзывы' ) }}
                </a>
            </li>
            @if($model->id)
                <li class="breadcrumb-item active" aria-current="page">
                   {{ __( 'Отзыв от' ) }}  {{$model->fio}}
                </li>
            @else
                <li class="breadcrumb-item active" aria-current="page">
                    {{ __( 'Добавление отзыва' ) }}
                </li>
            @endif
        </ol>
        <!-- end breadcrumb -->

    </nav>
    <!-- End Breadcrumbs -->

    @include('partials.message')

    <!-- form -->
    <form action="{{route('reviews.' . ($model->id ? 'update' : 'store'), ['review' => $model])}}" method="post" enctype="multipart/form-data">
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
                                    <label for="clinic_id">{{ __( 'Клиника' ) }}</label>
                                    {!! html_select('clinic_id', old('clinic_id', $model->clinic_id), [null => __( 'Нет' )] + list_data($clinics, 'id', 'name'), ['class' => 'custom-select', 'id' => 'clinic_id']) !!}
                                    @error('clinic_id')
                                        <div class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <!-- end group -->

                            </div>
                            <!-- end col -->

                            <!-- col -->
                            <div class="col-lg-4">

                                <!-- group -->
                                <div class="form-group">
                                    <label for="doctor_id">{{ __( 'Врач' ) }}</label>
                                    {!! html_select('doctor_id', old('doctor_id', $model->doctor_id), [null => __( 'Нет' )] + list_data($doctors, 'id', 'name'), ['class' => 'custom-select', 'id' => 'doctor_id']) !!}
                                    @error('doctor_id')
                                    <div class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                                <!-- end group -->

                            </div>
                            <!-- end col -->

                            <!-- col -->
                            <div class="col-lg-4">

                                <!-- group -->
                                <div class="form-group">
                                    <label for="direction_id">{{ __( 'Услуга' ) }}</label>
                                    {!! html_select('direction_id', old('direction_id', $model->direction_id), [null => __( 'Нет' )] + list_data($directions, 'id', 'name'), ['class' => 'custom-select', 'id' => 'direction_id']) !!}
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
                            <div class="col-lg-8">

                                <!-- group -->
                                <div class="form-group">
                                    <label for="fio">{{ __( 'ФИО' ) }}</label>
                                    {!! html_input('text', 'fio', old('fio', $model->fio), ['class' => 'form-control', 'id' => 'fio']) !!}
                                    @error('fio')
                                    <div class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                                <!-- end group -->

                            </div>
                            <!-- end col -->

                            <!-- col -->
                            <div class="col-lg-4">

                                <!-- group -->
                                <div class="form-group">
                                    <label for="phone">{{ __( 'Телефон' ) }}</label>
                                    {!! html_input('text', 'phone', old('phone', $model->phone), ['class' => 'form-control', 'id' => 'phone']) !!}
                                    @error('phone')
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
                                    <label for="published_at">{{ __( 'Дата публикации' ) }}</label>
                                    {!! html_input('text', 'published_at', $model->published_at ? $model->published_at->format('m/d/Y') : now()->format('m/d/Y'), ['class' => 'form-control datepicker', 'id' => 'published_at', 'autocomplete' => 'off']) !!}
                                    @error('published_at')
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
                                    <label for="type">{{ __( 'Тип отзыва' ) }}</label>
                                    {!! html_select('type', old('type', $model->type), $type, ['class' => 'custom-select', 'id' => 'type']) !!}
                                    @error('type')
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
                                    <label for="content">{{ __( 'Содержимое' ) }}</label>
                                    {!! html_textarea('content', old('content', $model->content), ['class' => 'form-control custom-editor', 'id'=>'content']) !!}
                                    @error('content')
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
                                    <label for="answer">{{ __( 'Ответ' ) }}</label>
                                    {!! html_textarea('answer', old('answer', $model->answer), ['class' => 'form-control custom-editor', 'id'=>'answer']) !!}
                                    @error('answer')
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
                        <h6 class="card-title pt-3">
                            {{ __( 'Оригинал отзыва' ) }}
                        </h6>
                        <!-- end title -->

                        <!-- group -->
                        <div class="form-group mb-4">
                            @if($model->original)
                                <div class="mb-3">
                                    <img src="{{ Storage::disk('public')->url('thumbnail/' . $model->original) }}" class="img-responsive" />
                                </div>
                            @endif
                            {!! html_input('file', 'filename', null, ['id' => 'file_original', 'multiple' => 'true']) !!}
                        </div>
                        <!-- end group -->

                        <hr>

                        <!-- title -->
                        <h6 class="card-title">
                            {{ __( 'Действие' ) }}
                        </h6>
                        <!-- end title -->

                        <!-- check -->
                        <div class="form-check form-check-flat form-check-primary">
                            <label class="form-check-label">
                                {!! html_hidden('is_active', 0) !!}
                                {!! html_checkbox('is_active', old('is_active', $model->is_active), ['class' => 'form-check-input', 'value' => 1]) !!}
                                {{ __( 'Активный' ) }}
                                <i class="input-frame"></i>
                            </label>
                        </div>
                        <!-- end check -->

                        <button type="submit" class="btn btn-primary">
                            {{ __( 'Сохранить' ) }}
                        </button>

                        <a href="{{ route('reviews.index') }}" class="btn btn-primary">
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

    @if($model->id)

        <!-- stretch -->
        <div class="stretch-card mt-2">

            <!-- card -->
            <div class="card">

                <!-- body -->
                <div class="card-body">

                    <!-- title -->
                    <h6 class="card-title">
                        {{ __( 'Файлы' ) }}
                    </h6>
                    <!-- end title -->

                    <!-- Form -->
                    <form action="{{route('reviews.photos.store', ['review' => $model])}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <!-- group -->
                        <div class="form-group">
                            {!! html_input('file', 'filename', null, ['id' => 'file', 'multiple' => 'true']) !!}
                            <button type="submit" class="btn btn-primary">
                                {{ __( 'Загрузить' ) }}
                            </button>
                        </div>
                        <!-- end group -->

                    </form>
                    <!-- End Form -->

                    <!-- responsive -->
                    <div class="table-responsive">

                        <!-- table -->
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __( 'Иконка' ) }}</th>
                                <th>{{ __( 'Файл' ) }}</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($photos as $photo)
                                <tr>
                                    <td>
                                        {{$photo->id}}
                                    </td>
                                    <td>
                                        <img src="{{ Storage::disk('public')->url('thumbnail/' . $photo->photo) }}"/>
                                    </td>
                                    <td>
                                        <a href="{{ Storage::url('images/' . $photo->photo) }}" target="_blank">
                                            {{$photo->photo}}
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{route('reviews.photos.destroy', ['review' => $model, 'id' => $photo->id])}}" method="post" onsubmit="return confirm('Вы уверены?')">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-xs">
                                                {{ __( 'Удалить' ) }}
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <!-- end table -->

                    </div>
                    <!-- end responsive -->

                </div>
                <!-- end body -->

            </div>
            <!-- end card -->

        </div>
        <!-- end stretch -->

    @endif

@endsection
