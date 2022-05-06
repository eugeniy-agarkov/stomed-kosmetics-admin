@extends('layouts.app')

@section('meta')
    <title>
        {{ __( 'Клиники' ) }}
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
                {{ __( 'Клиники' ) }}
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

                <p>
                    <a href="{{route('clinic.create')}}" class="btn btn-primary">
                        {{ __( 'Добавить клинику' ) }}
                    </a>
                </p>

                <!-- responsive -->
                <div class="table-responsive">

                    <!-- table -->
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>{{ __( 'Код 1C' ) }}</th>
                            <th>{{ __( 'Название' ) }}</th>
                            <th>{{ __( 'Статус' ) }}</th>
                            <th></th>
                            @can('isAdmin')
                                <th></th>
                            @endcan
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model as $item)
                            <tr>
                                <td>{{$item->code}}</td>
                                <td>{{$item->name}}</td>
                                <td>
                                    @if( $item->is_active )
                                        <span class="badge badge-success">
                                            {{ __( 'Активный' ) }}
                                        </span>
                                    @else
                                        <span class="badge badge-secondary">
                                            {{ __( 'Скрытый' ) }}
                                        </span>
                                    @endif
                                </td>
                                <td class="text-right">
                                    <a href="{{route('clinic.edit', ['clinic' => $item])}}" class="btn btn-info btn-xs">
                                        {{ __( 'Изменить' ) }}
                                    </a>
                                </td>
                                @can('isAdmin')
                                    <td class="text-left">
                                        <form action="{{route('clinic.destroy', $item)}}" method="post" onsubmit="return confirm('Вы уверены?')">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-xs">
                                                {{ __( 'Удалить' ) }}
                                            </button>
                                        </form>
                                    </td>
                                @endcan
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <!-- end table -->

                    <!-- pagination -->
                    {{$model->appends(request()->all())->links()}}
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
