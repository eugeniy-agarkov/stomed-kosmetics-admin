@extends('layouts.app')

@section('meta')
    @if( request()->routeIs('prices.doctor') )
        <title>{{ __( 'Цены врачей' ) }}</title>
    @elseif( request()->routeIs('prices.direction') )
        <title>{{ __( 'Цены услуг' ) }}</title>
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
            <li class="breadcrumb-item active" aria-current="page">
                @if( request()->routeIs('prices.doctor') )
                    {{ __( 'Цены врачей' ) }}
                @elseif( request()->routeIs('prices.direction') )
                    {{ __( 'Цены услуг' ) }}
                @endif
            </li>
        </ol>
        <!-- end breadcrumb -->

    </nav>
    <!-- End Breadcrumbs -->

    <!-- stretch -->
    <div class="stretch-card mt-2">

        <!-- card -->
        <div class="card">

            <!-- body -->
            <div class="card-body">

                <!-- responsive -->
                <div class="table-responsive">

                    <!-- table -->
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th width="150px">{{ __( 'Код 1С' ) }}</th>
                            <th width="150px">{{ __( 'Цена' ) }}</th>
                            <th width="150px">{{ __( 'Цена со скидкой' ) }}</th>
                            @if( request()->routeIs('prices.doctor') )
                                <th width="200px">{{ __( 'Доктор' ) }}</th>
                            @elseif( request()->routeIs('prices.direction') )
                                <th width="200px">{{ __( 'Услуга' ) }}</th>
                            @endif
                            <th width="200px">{{ __( 'Описание' ) }}</th>
                            <th width="200px">{{ __( 'Условие' ) }}</th>
                            <th width="100px">{{ __( 'Позиция' ) }}</th>
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
                                    {!! html_input('text', 'code', $item->code, ['class' => 'form-control']) !!}
                                </td>
                                <td>
                                    {!! html_input('text', 'price', $item->price, ['class' => 'form-control']) !!}
                                </td>
                                <td>
                                    {!! html_input('text', 'discount_price', $item->discount_price, ['class' => 'form-control']) !!}
                                </td>
                                @if( request()->routeIs('prices.doctor') )
                                    <td class="text-wrap">
                                        {{ $item->doctor->name }}
                                    </td>
                                @elseif( request()->routeIs('prices.direction') )
                                    <td class="text-wrap">
                                        {{ $item->direction->name }}
                                    </td>
                                @endif
                                <td>
                                    {!! html_textarea('description', $item->description, ['class' => 'form-control', 'rows' => 3]) !!}
                                </td>
                                <td>
                                    {!! html_textarea('condition', $item->condition, ['class' => 'form-control', 'rows' => 3]) !!}
                                </td>
                                <td>
                                    {!! html_input('text', 'order', $item->order, ['class' => 'form-control']) !!}
                                </td>
                                <td class="text-right">
                                    <a
                                        href="{{route('prices.edit', $item)}}"
                                        class="btn btn-info btn-xs priceLiveSave"
                                        data-id="{{ $item->id }}"
                                        data-model="{{ request()->routeIs('prices.doctor') ? 'Doctor' : 'Direction' }}"
                                    >
                                        {{ __( 'Сохранить' ) }}
                                    </a>
                                </td>
                                <td class="text-left">
                                    <a
                                        href="{{route('prices.destroy', $item)}}"
                                        class="btn btn-danger btn-xs priceLiveDestroy"
                                        data-id="{{ $item->id }}"
                                        data-model="{{ request()->routeIs('prices.doctor') ? 'Doctor' : 'Direction' }}"
                                    >
                                        {{ __( 'Удалить' ) }}
                                    </a>
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
