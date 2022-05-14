@extends('layouts.app')

@section('meta')
    @if($model->id)
        <title>{{$model->name}}</title>
    @else
        <title>{{ __( 'Добавление Акции' ) }}</title>
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
                <a href="{{route('sale.index')}}">
                    {{ __( 'Акции' ) }}
                </a>
            </li>
            @if($model->id)
                <li class="breadcrumb-item active" aria-current="page">
                    {{$model->name}}
                </li>
            @else
                <li class="breadcrumb-item active" aria-current="page">
                    {{ __( 'Добавление Акции' ) }}
                </li>
            @endif
        </ol>
        <!-- end breadcrumb -->

    </nav>
    <!-- End Breadcrumbs -->

    @include('partials.message')

    @includeWhen($model->id, 'sale.tabs', ['sale' => $model])

    <!-- form -->
    <form action="{{route('sale.' . ($model->id ? 'update' : 'store'), ['sale' => $model])}}" method="post" enctype="multipart/form-data">
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
                            <div class="col-lg-8">

                                <!-- group -->
                                <div class="form-group">
                                    <label for="name">
                                        {{ __( 'Наименование' ) }}
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
                            <div class="col-lg-4">

                                <!-- group -->
                                <div class="form-group">
                                    <label for="category_id">
                                        {{ __( 'Категория' ) }}
                                    </label>
                                    {!! html_select('category_id', old('category_id', $model->category_id), list_data($categories, 'id', 'name'), ['class' => 'custom-select', 'id' => 'category_id']) !!}
                                    @error('category_id')
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
                                    {!! html_textarea('excerpt', old('excerpt', $model->excerpt), ['class' => 'form-control', 'id'=>'excerpt', 'rows' => 7]) !!}
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
                            <label for="published_at">{{ __( 'Дата публикации' ) }}</label>
                            {!! html_input('text', 'published_at', $model->published_at ? $model->published_at->format('m/d/Y') : '', ['class' => 'form-control datepicker', 'id' => 'published_at', 'autocomplete' => 'off']) !!}
                            @error('published_at')
                            <div class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                        <!-- end group -->

                        <!-- group -->
                        <div class="form-group mb-4">
                            <label for="published_at">{{ __( 'Дата окончания акции' ) }}</label>
                            <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                            {!! html_input('text', 'date_end', $model->date_end ? $model->date_end->format('m/d/Y H:i A') : '', ['class' => 'form-control', 'id' => 'datetimepickerExample', 'autocomplete' => 'off', 'data-toggle' => 'datetimepicker', 'data-target' => '#datetimepickerExample']) !!}
                            </div>
                            @error('date_end')
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
                            @if($model->photo)
                                <div class="mb-3">
                                    <img src="{{ Storage::disk('public')->url('thumbnail/' . $model->photo) }}" class="img-responsive" />
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

                        <button type="submit" class="btn btn-primary">
                            {{ __( 'Сохранить' ) }}
                        </button>

                        <a href="{{ route('sale.index') }}" class="btn btn-primary">
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
