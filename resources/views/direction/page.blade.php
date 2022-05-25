@extends('layouts.app')

@section('meta')
    <title>{{ __( 'SEO' ) }} {{$direction->name}}</title>
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
                <a href="{{ route('direction.edit', $direction) }}">
                    {{ $direction->name }}
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

    @includeWhen($direction->id, 'direction.tabs', ['model' => $direction])

    <!-- form -->
    <form action="{{ route('direction.page.store', $direction) }}" method="post" enctype="multipart/form-data">
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
                                    <label for="title">
                                        {{ __( 'Meta title' ) }}
                                    </label>
                                    {!! html_input('text', 'title', $model->title, ['class' => 'form-control', 'id' => 'title']) !!}
                                    @error('title')
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
                                        {{ __( 'Meta description' ) }}
                                    </label>
                                    {!! html_textarea('description', $model->description, ['class' => 'form-control', 'id'=>'description', 'rows' => 6]) !!}
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
                        <h6 class="card-title pt-3">
                            {{ __( 'Действие' ) }}
                        </h6>
                        <!-- end title -->

                        <button type="submit" class="btn btn-primary">
                            {{ __( 'Сохранить' ) }}
                        </button>

                        <a href="{{ route('direction.edit', ['direction' => $direction]) }}" class="btn btn-primary">
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
