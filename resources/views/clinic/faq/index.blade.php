@extends('layouts.app')

@section('meta')
    <title>{{ __( 'Вопросы и ответы' ) }}</title>
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
            <li class="breadcrumb-item active" aria-current="page">
                {{ __( 'Вопросы и ответы' ) }}
            </li>
        </ol>
        <!-- end breadcrumb -->

    </nav>
    <!-- End Breadcrumbs -->

    @include('clinic.tabs', ['clinic' => $clinic])

    <!-- stretch -->
    <div class="stretch-card mt-0">

        <!-- card -->
        <div class="card">

            <!-- body -->
            <div class="card-body">

                <!-- btn -->
                <p>
                    <a href="{{route('clinic.faq.create', $clinic)}}" class="btn btn-primary">
                        {{ __( 'Добавить' ) }}
                    </a>
                </p>
                <!-- end btn -->

                @if( $model->count() )

                    <!-- responsive -->
                    <div class="table-responsive">

                        <!-- table -->
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>{{ __( 'Дата' ) }}</th>
                                <th>{{ __( 'Вопрос' ) }}</th>
                                <th>{{ __( 'Статус' ) }}</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($model as $item)
                                <tr>
                                    <td>
                                        @if($item->published_at)
                                            {{ $item->published_at->format('d.m.Y') }}
                                        @endif
                                    </td>
                                    <td>
                                        {{ $item->question }}
                                    </td>
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
                                        <a href="{{route('clinic.faq.edit', ['clinic' => $clinic, 'faq' => $item])}}" class="btn btn-info btn-xs">
                                            {{ __( 'Изменить' ) }}
                                        </a>
                                    </td>
                                    <td class="text-left">
                                        <form action="{{route('clinic.faq.destroy', ['clinic' => $clinic, 'faq' => $item])}}" method="post" onsubmit="return confirm('Вы уверены?')">
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

                        {{$model->appends(request()->all())->links()}}

                    </div>
                    <!-- end responsive -->

                @endif

            </div>
            <!-- end body -->

        </div>
        <!-- end card -->

    </div>
    <!-- end stretch -->

@endsection
