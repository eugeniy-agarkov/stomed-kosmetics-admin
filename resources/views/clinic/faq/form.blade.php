@extends('layouts.app')

@section('meta')
    @if($model->id)
        <title>{{ $model->question }}</title>
    @else
        <title>{{ __( 'Добавление запись' ) }}</title>
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
                <a href="{{ route('clinic.index') }}">
                    {{ __( 'Клиники' ) }}
                </a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('clinic.edit', $clinic) }}">
                    {{ $clinic->name }}
                </a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('clinic.faq.index', $clinic) }}">
                    {{ __( 'Вопросы и ответы' ) }}
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                @if($model->id)
                    {{ $model->question }}
                @else
                    {{ __( 'Добавление записи' ) }}
                @endif
            </li>
        </ol>
        <!-- end breadcrumb -->

    </nav>
    <!-- End Breadcrumbs -->

    @include('partials.message')

    <!-- form -->
    <form action="{{route('clinic.faq.' . ($model->id ? 'update' : 'store'), ['clinic' => $clinic, 'faq' => $model])}}" method="post" enctype="multipart/form-data">
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
                                    <label for="question">{{ __( 'Вопрос' ) }}</label>
                                    {!! html_input('text', 'question', old('question', $model->question), ['class' => 'form-control', 'id' => 'question']) !!}
                                    @error('question')
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

                        <a href="{{ route('clinic.faq.index', $clinic) }}" class="btn btn-primary">
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
