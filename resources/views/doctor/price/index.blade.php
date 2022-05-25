@extends('layouts.app')

@section('meta')
    <title>{{ __( 'Цены' ) }}</title>
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
                <a href="{{ route('doctor.index') }}">
                    {{ __( 'Врачи' ) }}
                </a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('doctor.edit', $doctor) }}">
                    {{ $doctor->name }}
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                {{ __( 'Цены' ) }}
            </li>
        </ol>
        <!-- end breadcrumb -->

    </nav>
    <!-- End Breadcrumbs -->

    @include('partials.message')

    @includeWhen($doctor->id, 'doctor.tabs', ['model' => $doctor])

    <!-- stretch -->
    <div class="stretch-card">

        <!-- card -->
        <div class="card">

            <!-- body -->
            <div class="card-body">

                <!-- btn -->
                <p>
                    <a href="{{route('doctor.price.create', $doctor)}}" class="btn btn-primary">
                        {{ __( 'Добавить' ) }}
                    </a>
                </p>
                <!-- end btn -->

                <!-- responsive -->
                <div class="table-responsive">

                    <!-- table -->
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>{{ __( '#' ) }}</th>
                            <th>{{ __( 'Направление' ) }}</th>
                            <th>{{ __( 'Код 1С' ) }}</th>
                            <th>{{ __( 'Цена' ) }}</th>
                            <th>{{ __( 'Цена со скидкой' ) }}</th>
                            <th>{{ __( 'Позиция' ) }}</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model as $item)
                            <tr>
                                <td>
                                    {{ $item->id }}
                                </td>
                                <td>
                                    {{ $item->direction ? $item->direction->name : '' }}
                                </td>
                                <td>
                                    {{ $item->code }}
                                </td>
                                <td>
                                    {{ $item->price }}
                                </td>
                                <td>
                                    {{ $item->discount_price }}
                                </td>
                                <td>
                                    {{ $item->order }}
                                </td>
                                <td class="text-right">
                                    <a href="{{route('doctor.price.edit', ['doctor' => $doctor, 'price' => $item])}}" class="btn btn-info btn-xs">
                                        {{ __( 'Изменить' ) }}
                                    </a>
                                </td>
                                <td class="text-left">
                                    <form action="{{route('doctor.price.destroy', ['doctor' => $doctor, 'price' => $item])}}" method="post" onsubmit="return confirm('Вы уверены?')">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-xs">
                                            {{ __( 'Удалить' ) }}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <!-- end table -->

                    {{$model->appends(request()->all())->links('vendor.pagination.bootstrap-4')}}

                </div>
                <!-- end responsive -->

            </div>
            <!-- end body -->

        </div>
        <!-- end card -->

    </div>
    <!-- end stretch -->

@endsection
