@extends('layouts.app')

@section('meta')
    @if($model->id)
        <title>{{$model->name}}</title>
    @else
        <title>{{ __( 'Добавление записи' ) }}</title>
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
            @if($model->id)
                <li class="breadcrumb-item active" aria-current="page">
                    {{$model->name}}
                </li>
            @else
                <li class="breadcrumb-item active" aria-current="page">
                    {{ __( 'Добавление записи' ) }}
                </li>
            @endif
        </ol>
        <!-- end breadcrumb -->

    </nav>
    <!-- End Breadcrumbs -->

    @include('partials.message')

    @includeWhen($model->id, 'doctor.tabs', ['doctor' => $model])

    <!-- form -->
    <form action="{{route('doctor.' . ($model->id ? 'update' : 'store'), ['doctor' => $model])}}" method="post" enctype="multipart/form-data">
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
                            <div class="col-lg-3">

                                <!-- group -->
                                <div class="form-group">
                                    <label for="code">
                                        {{ __( 'Код 1С' ) }}
                                    </label>
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
                            <div class="col-lg-9">

                                <!-- group -->
                                <div class="form-group">
                                    <label for="name">
                                        {{ __( 'Полное наименование' ) }}
                                    </label>
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
                            <div class="col-lg-12">

                                <!-- group -->
                                <div class="form-group">
                                    <label for="excerpt">
                                        {{ __( 'Краткий текст' ) }}
                                    </label>
                                    {!! html_textarea('excerpt', old('excerpt', $model->excerpt), ['class' => 'form-control', 'id' => 'excerpt', 'rows' => 5]) !!}
                                    @error('excerpt')
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
                                    <label for="experience">
                                        {{ __( 'Стаж' ) }}
                                    </label>
                                    {!! html_input('text', 'experience', old('experience', $model->experience), ['class' => 'form-control', 'id' => 'experience']) !!}
                                    @error('experience')
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
                                    <label for="category">
                                        {{ __( 'Категория' ) }}
                                    </label>
                                    {!! html_input('text', 'category', old('category', $model->category), ['class' => 'form-control', 'id' => 'category']) !!}
                                    @error('category')
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
                                    <label for="is_call_home">
                                        {{ __( 'Вызов на дом' ) }}
                                    </label>
                                    {!! html_select('is_call_home', old('is_call_home', $model->is_call_home), $call_home, ['class' => 'custom-select', 'id' => 'is_call_home']) !!}
                                    @error('is_call_home')
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
                                    <label for="degree">
                                        {{ __( 'Степень' ) }}
                                    </label>
                                    {!! html_input('text', 'degree', old('degree', $model->degree), ['class' => 'form-control', 'id' => 'degree']) !!}
                                    @error('degree')
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
                                    <label for="clinic">
                                        {{ __( 'Клиники' ) }}
                                    </label>
                                    {!! html_select('clinics[]', $model->clinics->map->id->toArray(), list_data($clinic, 'id', 'name'), ['class' => 'js-example-basic-multiple w-100', 'multiple' => 'multiple', 'id' => 'clinic']) !!}
                                    @error('clinic')
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
                                    <label for="content">
                                        {{ __( 'Текст' ) }}
                                    </label>
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
                            {{ __( 'Прочее' ) }}
                        </h6>
                        <!-- end title -->

                        <!-- group -->
                        <div class="form-group mb-4">
                            <label for="order">
                                {{ __( 'Сортировка' ) }}
                            </label>
                            {!! html_input('text', 'order', (empty($model->order)) ? 0 : $model->order, ['class' => 'form-control', 'id' => 'order']) !!}
                            @error('order')
                            <div class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                        <!-- end group -->

                        <!-- group -->
                        <div class="form-group mb-4">
                            <label for="video">
                                {{ __( 'Ссылка на видео' ) }}
                            </label>
                            {!! html_input('text', 'video', $model->video, ['class' => 'form-control', 'id' => 'video']) !!}
                            @error('video')
                            <div class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                        <!-- end group -->

                        <hr>

                        <!-- title -->
                        <h6 class="card-title pt-3">
                            {{ __( 'Изображение' ) }}
                        </h6>
                        <!-- end title -->

                        <!-- group -->
                        <div class="form-group mb-4">
                            @if($model->image)
                                <div class="mb-3">
                                    <img src="{{ Storage::disk('public')->url('thumbnail/' . $model->image) }}" class="img-responsive" />
                                </div>
                            @endif
                            {!! html_input('file', 'filename', null, ['id' => 'file', 'multiple' => 'true']) !!}
                        </div>
                        <!-- end group -->

                        <hr>

                        <!-- title -->
                        <h6 class="card-title pt-3">
                            {{ __( 'Действие' ) }}
                        </h6>
                        <!-- end title -->

                        <!-- check -->
                        <div class="form-check form-check-flat form-check-primary">
                            <label class="form-check-label">
                                {!! html_hidden('is_active', 0) !!}
                                {!! html_checkbox('is_active', $model->is_active, ['class' => 'form-check-input', 'value' => 1]) !!} Активный
                                <i class="input-frame"></i>
                            </label>
                        </div>
                        <!-- end check -->

                        <!-- check -->
                        <div class="form-check form-check-flat form-check-primary">
                            <label class="form-check-label">
                                {!! html_hidden('is_top', 0) !!}
                                {!! html_checkbox('is_top', $model->is_top, ['class' => 'form-check-input', 'value' => 1]) !!}
                                {{ __( 'Топ' ) }}
                                <i class="input-frame"></i>
                            </label>
                        </div>
                        <!-- end check -->

                        <button type="submit" class="btn btn-primary">
                            {{ __( 'Сохранить' ) }}
                        </button>

                        <a href="{{ route('doctor.index') }}" class="btn btn-primary">
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
