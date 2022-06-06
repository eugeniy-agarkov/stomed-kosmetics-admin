@extends('layouts.app')

@section('meta')
    @if($model->id)
        <title>{{$model->name}}</title>
    @else
        <title>{{ __( 'Добавление категории' ) }}</title>
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
                    {{ __( 'Услуги' ) }}
                </a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{route('direction.categories.index')}}">
                    {{ __( 'Категории' ) }}
                </a>
            </li>
            @if($model->id)
                <li class="breadcrumb-item active" aria-current="page">
                   {{$model->name}}
                </li>
            @else
                <li class="breadcrumb-item active" aria-current="page">
                    {{ __( 'Добавление категории' ) }}
                </li>
            @endif
        </ol>
        <!-- end breadcrumb -->

    </nav>
    <!-- End Breadcrumbs -->

    @include('partials.message')

    @includeWhen($model->id, 'direction.categories.tabs', ['category' => $model])

    <!-- form -->
    <form action="{{route('direction.categories.' . ($model->id ? 'update' : 'store'), ['category' => $model])}}" method="post" enctype="multipart/form-data">
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
                                    <label for="name">{{ __( 'Наименование' ) }}</label>
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
                            <div class="col-lg-6">

                                <!-- group -->
                                <div class="form-group">
                                    <label for="title_menu">{{ __( 'Наименование в меню' ) }}</label>
                                    {!! html_input('text', 'title_menu', old('title_menu', $model->title_menu), ['class' => 'form-control', 'id' => 'title_menu']) !!}
                                    @error('title_menu')
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
                                    {{ __( 'Баннер' ) }}
                                </h6>
                                <!-- end title -->

                                <!-- group -->
                                <div class="form-group">
                                    @if($model->image)
                                        <div class="mb-3">
                                            <img src="{{ Storage::disk('public')->url('images/' . $model->image) }}" class="img-responsive" style="max-width: 400px;" />
                                        </div>
                                    @endif
                                    {!! html_input('file', 'filename', null, ['id' => 'file', 'multiple' => 'true']) !!}
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

                        <!-- Title -->
                        <h6 class="card-title">
                            {{ __( 'Категория' ) }}
                        </h6>
                        <!-- End Title -->

                        <!-- form group -->
                        <div class="form-group mb-3">

                            <ul class="list-unstyled" style="padding-left: 20px">
                                <li>

                                    <div class="form-check">
                                        <input
                                            type="radio"
                                            id="category-0"
                                            name="parent_id"
                                            value=""
                                            @if( is_null($model->parent_id)) checked @endif
                                            class="form-check-input"
                                        >
                                        <label for="category-0" class="mb-0">{{ __( 'Родительская' ) }}</label>
                                    </div>
                                </li>
                                @foreach( $categories as $category )

                                    @if( $model->id <> $category->id )
                                        <li>

                                            <div class="form-check">
                                                <input
                                                    type="radio"
                                                    id="category-{{ $category->id }}"
                                                    name="parent_id"
                                                    value="{{ $category->id }}"
                                                    @if( $model->parent_id == $category->id ) checked @endif
                                                    class="form-check-input"
                                                >
                                                <label for="category-{{ $category->id }}" class="mb-0">{{ $category->name }}</label>
                                            </div>
                                            @if(count($category->subcategory))
                                                @include('direction.categories.subcategory',['subcategories' => $category->subcategory, 'model' => $model])
                                            @endif
                                        </li>
                                    @endif

                                @endforeach
                            </ul>

                        </div>
                        <!-- end form group -->

                        <hr>

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
                            {!! html_input('text', 'order', $model->order, ['class' => 'form-control', 'id' => 'order']) !!}
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
                                {!! html_hidden('is_menu', 0) !!}
                                {!! html_checkbox('is_menu', old('is_menu', $model->is_menu), ['class' => 'form-check-input', 'value' => 1]) !!}
                                {{ __( 'Показать в меню' ) }}
                                <i class="input-frame"></i>
                            </label>
                        </div>
                        <!-- end check -->

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

                        <a href="{{ route('direction.categories.index') }}" class="btn btn-primary">
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
