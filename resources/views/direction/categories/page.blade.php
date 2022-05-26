@extends('layouts.app')

@section('meta')
    <title>{{ __( 'SEO' ) }} {{$category->name}}</title>
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
            <li class="breadcrumb-item">
                <a href="{{ route('direction.categories.edit', ['category' => $category]) }}">
                    {{ $category->name }}
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                {{ __( 'SEO данные' ) }}
            </li>
        </ol>
        <!-- end breadcrumb -->

    </nav>
    <!-- End Breadcrumbs -->

    @include('partials.message')

    @includeWhen($category->id, 'direction.categories.tabs', ['model' => $category])

    <!-- form -->
    <form action="{{ route('direction.categories.page.store', ['category' => $category]) }}" method="post" enctype="multipart/form-data">
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
                            <div class="col-lg-12">

                                <!-- group -->
                                <div class="form-group">
                                    <label for="h1">
                                        {{ __( 'H1' ) }}
                                    </label>
                                    {!! html_input('text', 'h1', $model->h1, ['class' => 'form-control', 'id' => 'h1']) !!}
                                    @error('h1')
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
                                    <label for="meta_title">
                                        {{ __( 'Meta title' ) }}
                                    </label>
                                    {!! html_input('text', 'meta_title', $model->meta_title, ['class' => 'form-control', 'id' => 'meta_title']) !!}
                                    @error('meta_title')
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
                                    <label for="meta_description">
                                        {{ __( 'Meta description' ) }}
                                    </label>
                                    {!! html_textarea('meta_description', $model->meta_description, ['class' => 'form-control', 'id'=>'meta_description', 'rows' => 6]) !!}
                                    @error('meta_description')
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
                                    <label for="meta_keyword">
                                        {{ __( 'Meta Keyword' ) }}
                                    </label>
                                    {!! html_textarea('meta_keyword', $model->meta_keyword, ['class' => 'form-control', 'id'=>'meta_keyword', 'rows' => 6]) !!}
                                    @error('meta_keyword')
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
                            {{ __( 'Прочее' ) }}
                        </h6>
                        <!-- end title -->

                        <!-- check -->
                        <div class="form-check form-check-flat form-check-primary">
                            <label class="form-check-label">
                                {!! html_hidden('robots', 0) !!}
                                {!! html_checkbox('robots', $model->robots, ['class' => 'form-check-input', 'value' => 1]) !!} {{ __( 'Индексировать' ) }}
                                <i class="input-frame"></i>
                            </label>
                        </div>
                        <!-- end check -->

                        <!-- title -->
                        <h6 class="card-title pt-3">
                            {{ __( 'Действие' ) }}
                        </h6>
                        <!-- end title -->

                        <button type="submit" class="btn btn-primary">
                            {{ __( 'Сохранить' ) }}
                        </button>

                        <a href="{{ route('direction.categories.edit', ['category' => $category]) }}" class="btn btn-primary">
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
