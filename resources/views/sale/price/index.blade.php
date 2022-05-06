@extends('layouts.app')

@section('meta')
    <title>{{ __( 'Цены' ) }} {{$sale->name}}</title>
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
                <a href="{{ route('sale.index') }}">
                    {{ __( 'Акции' ) }}
                </a>
            </li>
            <li class="breadcrumb-item" aria-current="page">
                <a href="{{route('sale.edit', ['sale' => $sale])}}">
                    {{$sale->name}}
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                {{ __( 'Цены' ) }}
            </li>
        </ol>
        <!-- end breadcrumb -->

    </nav>
    <!-- End Breadcrumbs -->

    @include('sale.tabs', ['model' => $sale])

    <!-- stretch -->
    <div class="stretch-card">

        <!-- card -->
        <div class="card">

            <!-- body -->
            <div class="card-body">

                <!-- btn -->
                <p>
                    <a href="{{ route('sale.prices.create', ['sale' => $sale]) }}" class="btn btn-primary">
                        {{ __( 'Добавить цену' ) }}
                    </a>
                </p>
                <!-- end btn -->

                <!-- responsive -->
                <div class="table-responsive">

                    <!-- table -->
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __( 'Код 1С' ) }}</th>
                            <th>{{ __( 'Цена' ) }}</th>
                            <th>{{ __( 'Цена со скидкой' ) }}</th>
                            <th>{{ __( 'Описание' ) }}</th>
                            <th>{{ __( 'Условие' ) }}</th>
                            <th>{{ __( 'Позиция' ) }}</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->code}}</td>
                                <td>{{$item->price}}</td>
                                <td>{{$item->discount_price}}</td>
                                <td>{{\Illuminate\Support\Str::limit($item->description, 50)}}</td>
                                <td>{{\Illuminate\Support\Str::limit($item->condition, 50)}}</td>
                                <td>{{$item->order}}</td>
                                <td class="text-right">
                                    <a href="{{route('sale.prices.edit', ['sale' => $sale, 'price' => $item])}}" class="btn btn-info btn-xs">
                                        {{ __( 'Изменить' ) }}
                                    </a>
                                </td>
                                <td class="text-left">
                                    <form action="{{route('sale.prices.destroy', ['sale' => $sale, 'price' => $item])}}" method="post" onsubmit="return confirm('Вы уверены?')">
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

                </div>
                <!-- end responsive -->

            </div>
            <!-- end body -->

        </div>
        <!-- end card -->

    </div>
    <!-- end stretch -->

@endsection
