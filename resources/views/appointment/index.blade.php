@extends('layouts.app')

@section('meta')
    <title>
        {{ __( 'Заявки' ) }}
    </title>
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
                {{ __( 'Заявки' ) }}
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
                            <th>{{ __( 'Дата' ) }}</th>
                            <th>{{ __( 'Форма' ) }}</th>
                            <th>{{ __( 'Содержимое' ) }}</th>
                            <th>{{ __( 'Имя' ) }}</th>
                            <th>{{ __( 'Телефон' ) }}</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model as $item)
                            <tr>
                                <td>
                                    {{$item->published_at->format('d.m.Y H:i')}}<br/>
                                </td>
                                <td>
                                    {{ \App\Enums\FormEnum::getName($item->form) }}
                                </td>
                                <td class="text-wrap">
                                    @if( $item->direction_id )
                                       <div class="mb-1">{{ __( 'Услуга' ) }}: {{ $item->direction->name }}</div>
                                    @endif
                                    {!! $item->content !!}
                                </td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->phone}}</td>
                                <td>
                                    <form action="{{route('appointment.destroy', ['appointment' => $item])}}" method="post" onsubmit="return confirm('Вы уверены?')">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-xs">удалить</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- end table -->

                    <!-- pagination -->
                    {{$model->appends(request()->all())->links('vendor.pagination.bootstrap-4')}}
                    <!-- end pagination -->

                </div>
                <!-- end responsive -->

            </div>
            <!-- end body -->

        </div>
        <!-- end card -->

    </div>
    <!-- end stretch -->

@endsection
