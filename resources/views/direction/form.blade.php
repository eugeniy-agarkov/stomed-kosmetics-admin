@extends('layouts.app')

@section('meta')
    @if($model->id)
        <title>{{$model->name}}</title>
    @else
        <title>{{ __( 'Добавление направления' ) }}</title>
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
                <a href="{{route('direction.index')}}">
                    {{ __( 'Направления' ) }}
                </a>
            </li>
            @if($model->id)
                <li class="breadcrumb-item active" aria-current="page">
                    {{$model->name}}
                </li>
            @else
                <li class="breadcrumb-item active" aria-current="page">
                    {{ __( 'Добавление направления' ) }}
                </li>
            @endif
        </ol>
        <!-- end breadcrumb -->

    </nav>
    <!-- End Breadcrumbs -->

    @include('partials.message')

    @includeWhen($model->id, 'direction.tabs', ['direction' => $model])

    <!-- form -->
    <form action="{{route('direction.' . ($model->id ? 'update' : 'store'), ['direction' => $model])}}" method="post" enctype="multipart/form-data">
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
                                    <label for="clinic_id">
                                        {{ __( 'Клиника' ) }}
                                    </label>
                                    {!! html_select('clinic_id', old('clinic_id', $model->clinic_id), $clinics, ['class' => 'custom-select', 'id' => 'clinic']) !!}
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
                            <div class="col-lg-12">

                                <!-- group -->
                                <div class="form-group">
                                    <label for="time_spending">
                                        {{ __( 'Время проведения' ) }}
                                    </label>
                                    {!! html_input('text', 'time_spending', old('time_spending', $model->time_spending), ['class' => 'form-control', 'id' => 'time_spending']) !!}
                                    @error('time_spending')
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
                                    <label for="title_excerpt">
                                        {{ __( 'Заголовок краткого текста' ) }}
                                    </label>
                                    {!! html_input('text', 'title_excerpt', old('title_excerpt', $model->title_excerpt), ['class' => 'form-control', 'id' => 'title_excerpt']) !!}
                                    @error('title_excerpt')
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
                                    {!! html_textarea('excerpt', old('excerpt', $model->excerpt), ['class' => 'form-control custom-editor', 'id'=>'excerpt']) !!}
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
                                    <label for="description">
                                        {{ __( 'Текст' ) }}
                                    </label>
                                    {!! html_textarea('description', old('description', $model->description), ['class' => 'form-control custom-editor', 'id'=>'description']) !!}
                                    @error('description')
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

                        <!-- Title -->
                        <h6 class="card-title pt-3">
                            {{ __( 'Категория' ) }}
                        </h6>
                        <!-- End Title -->

                        <!-- form group -->
                        <div class="form-group mb-4">

                            <!-- List -->
                            <ul class="list-unstyled" style="padding-left: 20px">

                                @foreach( $categories as $category )

                                    <li>

                                        <div class="form-check">
                                            <input
                                                type="radio"
                                                id="category-{{ $category->id }}"
                                                name="category_id"
                                                value="{{ $category->id }}"
                                                @if( $model->category_id == $category->id ) checked @endif
                                                class="form-check-input"
                                            >
                                            <label for="category-{{ $category->id }}" class="mb-0">{{ $category->name }}</label>
                                        </div>
                                        @if(count($category->subcategory))
                                            @include('direction.subcategory',['subcategories' => $category->subcategory, 'model' => $model])
                                        @endif
                                    </li>

                                @endforeach
                            </ul>
                            <!-- End List -->

                            @error('category_id')
                            <div class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror

                        </div>
                        <!-- end form group -->

                        <hr>

                        <!-- group -->
                        <div class="form-group mb-4">
                            <label for="description">
                                {{ __( 'Сортировка' ) }}
                            </label>
                            {!! html_input('text', 'order', empty($model->order) ? 0 : $model->order, ['class' => 'form-control', 'id' => 'order']) !!}
                            @error('order')
                            <div class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
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
                                {!! html_checkbox('is_active', $model->is_active, ['class' => 'form-check-input', 'value' => 1]) !!}
                                {{ __( 'Активный' ) }}
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

                        <a href="{{ route('direction.index') }}" class="btn btn-primary">
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
