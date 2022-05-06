@extends('layouts.app')

@section('meta')
    <title>{{ __( 'Добавление цены' ) }} {{$blog->name}}</title>
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
            <li class="breadcrumb-item" aria-current="page">
                <a href="{{route('blog.edit', ['blog' => $blog])}}">
                    {{$blog->name}}
                </a>
            </li>
            <li class="breadcrumb-item" aria-current="page">
                <a href="{{route('blog.prices.index', ['blog' => $blog])}}">
                    {{ __( 'Цены' ) }}
                </a>
            </li>
            @if($model->id)
                <li class="breadcrumb-item active" aria-current="page">
                    {{ __( 'Редактирование цены' ) }}
                </li>
            @else
                <li class="breadcrumb-item active" aria-current="page">
                    {{ __( 'Добавление цены' ) }}
                </li>
            @endif
        </ol>
        <!-- end breadcrumb -->

    </nav>
    <!-- End Breadcrumbs -->

    @include('blog.tabs', ['model' => $blog])

    <!-- form -->
    <form action="{{route('blog.prices.' . ($model->id ? 'update' : 'store'), ['blog' => $blog, 'price' => $model])}}" method="post" enctype="multipart/form-data">
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
                            <div class="col-lg-4">

                                <!-- group -->
                                <div class="form-group">
                                    <label for="code">
                                        {{ __( 'Код 1C' ) }}
                                    </label>
                                    {!! html_input('text', 'code', $model->code, ['class' => 'form-control', 'id' => 'code']) !!}
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
                            <div class="col-lg-4">

                                <!-- group -->
                                <div class="form-group">
                                    <label for="price">
                                        {{ __( 'Цена' ) }}
                                    </label>
                                    {!! html_input('text', 'price', $model->price, ['class' => 'form-control', 'id' => 'price']) !!}
                                    @error('price')
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
                                    <label for="discount_price">
                                        {{ __( 'Цена со скидкой' ) }}
                                    </label>
                                    {!! html_input('text', 'discount_price', $model->discount_price, ['class' => 'form-control', 'id' => 'discount_price']) !!}
                                    @error('discount_price')
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
                                    <label for="description">
                                        {{ __( 'Описание' ) }}
                                    </label>
                                    {!! html_textarea('description', $model->description, ['class' => 'form-control', 'id' => 'description', 'rows' => 6]) !!}
                                    @error('description')
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
                                    <label for="description">
                                        {{ __( 'Условие акции' ) }}
                                    </label>
                                    {!! html_textarea('condition', $model->condition, ['class' => 'form-control', 'id' => 'condition', 'rows' => 6]) !!}
                                    @error('condition')
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
                            <label for="description">
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

                        <button type="submit" class="btn btn-primary">
                            {{ __( 'Сохранить' ) }}
                        </button>

                        <a href="{{ route('blog.prices.index', ['blog' => $blog]) }}" class="btn btn-primary">
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
