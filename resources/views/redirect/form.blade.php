@extends('layouts.app')

@section('meta')
    @if($model->id)
        <title>{{ __( 'Редактирование записи' ) }}</title>
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
                <a href="{{route('redirect.index')}}">
                    {{ __( 'Редиректы' ) }}
                </a>
            </li>
            @if($model->id)
                <li class="breadcrumb-item active" aria-current="page">
                    {{ __( 'Редактирование записи' ) }}
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

    <!-- form -->
    <form action="{{route('redirect.' . ($model->id ? 'update' : 'store'), $model)}}" method="post" enctype="multipart/form-data">
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
                                    <label for="from">
                                        {{ __( 'From' ) }}
                                    </label>
                                    {!! html_input('text', 'from', old('from', $model->from), ['class' => 'form-control', 'id' => 'from']) !!}
                                    @error('from')
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
                                    <label for="to">
                                        {{ __( 'To' ) }}
                                    </label>
                                    {!! html_input('text', 'to', old('to', $model->to), ['class' => 'form-control', 'id' => 'to']) !!}
                                    @error('to')
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

                        <button type="submit" class="btn btn-primary">
                            {{ __( 'Сохранить' ) }}
                        </button>

                        <a href="{{ route('redirect.index') }}" class="btn btn-primary">
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
