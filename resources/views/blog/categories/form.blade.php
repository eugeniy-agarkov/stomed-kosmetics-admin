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
                <a href="{{route('blog.index')}}">
                    {{ __( 'Новости' ) }}
                </a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{route('blog.categories.index')}}">
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

    <!-- form -->
    <form action="{{route('blog.categories.' . ($model->id ? 'update' : 'store'), ['category' => $model])}}" method="post" enctype="multipart/form-data">
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
                            <div class="col-lg-7">

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
                            <div class="col-lg-5">

                                <!-- group -->
                                <div class="form-group">
                                    <label for="parent_id">{{ __( 'Категория' ) }}</label>
                                    {!! html_select('parent_id', old('parent_id', $model->parent_id), [null => __( 'Нет' )] + list_data($categories, 'id', 'name'), ['class' => 'custom-select', 'id' => 'parent_id']) !!}
                                    @error('parent_id')
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
                                {!! html_checkbox('is_active', old('is_active', $model->is_active), ['class' => 'form-check-input', 'value' => 1]) !!}
                                {{ __( 'Активный' ) }}
                                <i class="input-frame"></i>
                            </label>
                        </div>
                        <!-- end check -->

                        <button type="submit" class="btn btn-primary">
                            {{ __( 'Сохранить' ) }}
                        </button>

                        <a href="{{ route('blog.categories.index') }}" class="btn btn-primary">
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
