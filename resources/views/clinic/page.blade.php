@extends('layouts.app')

@section('meta')
    <title>{{ __( 'Страница' ) }} {{$clinic->name}}</title>
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
            <li class="breadcrumb-item" aria-current="page">
                <a href="{{route('clinic.edit', ['clinic' => $clinic])}}">
                    {{$clinic->name}}
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                {{ __( 'Страница' ) }}
            </li>
        </ol>
        <!-- end breadcrumb -->

    </nav>
    <!-- End Breadcrumbs -->

    @include('partials.message')

    @includeWhen($clinic->id, 'clinic.tabs', ['clinic' => $clinic])

    <!-- form -->
    <form action="{{ route('clinic.page.update', ['clinic' => $clinic]) }}" method="post" enctype="multipart/form-data">
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
                                </div>
                                <!-- end group -->

                            </div>
                            <!-- end col -->

                            <!-- col -->
                            <div class="col-lg-12">

                                <!-- group -->
                                <div class="form-group">
                                    <label for="features">
                                        {{ __( 'Преимущества' ) }}
                                    </label>
                                    {!! html_textarea('features', $model->features, ['class' => 'form-control', 'id' => 'features']) !!}
                                </div>
                                <!-- end group -->

                            </div>
                            <!-- end col -->

                            <!-- col -->
                            <div class="col-lg-6">

                                <!-- group -->
                                <div class="form-group">
                                    <label for="caption">
                                        {{ __( 'Заголовок текста' ) }}
                                    </label>
                                    {!! html_input('text', 'caption', $model->caption, ['class' => 'form-control', 'id' => 'caption']) !!}
                                </div>
                                <!-- end group -->

                            </div>
                            <!-- end col -->

                            <!-- col -->
                            <div class="col-lg-6">

                                <!-- group -->
                                <div class="form-group">
                                    <label for="title">
                                        {{ __( 'Meta title' ) }}
                                    </label>
                                    {!! html_input('text', 'title', $model->title, ['class' => 'form-control', 'id' => 'title']) !!}
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
                                    {!! html_textarea('description', $model->description, ['class' => 'form-control', 'id'=>'description']) !!}
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

                        <button type="submit" class="btn btn-primary">
                            {{ __( 'Сохранить' ) }}
                        </button>

                        <a href="{{ route('clinic.edit', ['clinic' => $clinic]) }}" class="btn btn-primary">
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
