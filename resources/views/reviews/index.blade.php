@extends('layouts.app')

@section('meta')
    <title>
        {{ __( 'Отзывы' ) }}
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
                {{ __( 'Отзывы' ) }}
            </li>
        </ol>
        <!-- end breadcrumb -->

    </nav>
    <!-- End Breadcrumbs -->

    <!-- stretch -->
    <div class="stretch-card">

        <!-- card -->
        <div class="card">

            <!-- body -->
            <div class="card-body">

                <!-- form -->
                <form action="{{ route('reviews.index') }}" class="row">
                    @csrf

                    <!-- col -->
                    <div class="col-md-3">
                        {!! html_select('doctor', (int)request('doctor', 0), [0 => __( 'Врач' )] + list_data($doctors, 'id', 'name'), ['onchange' => '$(this).closest("form").submit()']) !!}
                    </div>
                    <!-- end col -->

                    <!-- col -->
                    <div class="col-md-9">

                        <!-- group -->
                        <div class="input-group">
                            {!! html_input('search', 'fio', request('fio', ''), ['class' => 'form-control']) !!}
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="submit">
                                    {{ __( 'Найти' ) }}
                                </button>
                            </span>
                        </div>
                        <!-- end group -->

                    </div>
                    <!-- end col -->
                </form>
                <!-- end form -->

            </div>
            <!-- end body -->

        </div>
        <!-- end card -->

    </div>
    <!-- end stretch -->

    <!-- stretch -->
    <div class="stretch-card mt-2">

        <!-- card -->
        <div class="card">

            <!-- body -->
            <div class="card-body">

                <p>
                    <a href="{{route('reviews.create')}}" class="btn btn-primary">
                        {{ __( 'Добавить отзыв' ) }}
                    </a>
                </p>

                <!-- responsive -->
                <div class="table-responsive">

                    <!-- table -->
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>{{ __( 'Дата' ) }}</th>
                            <th>{{ __( 'Врач' ) }}</th>
                            <th>{{ __( 'ФИО' ) }}</th>
                            <th>{{ __( 'Тел' ) }}</th>
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
                                        {{$item->published_at->format('d.m.Y')}}
                                    @endif
                                </td>
                                <td>
                                    @if($item->doctor)
                                        {{$item->doctor->fio}}
                                    @endif
                                </td>
                                <td>{{$item->fio}}</td>
                                <td>{{$item->phone}}</td>
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
                                    <a href="{{route('reviews.edit', ['review' => $item])}}" class="btn btn-info btn-xs">
                                        {{ __( 'Изменить' ) }}
                                    </a>
                                </td>
                                <td class="text-left">
                                    <form action="{{route('reviews.destroy', ['review' => $item])}}" method="post" onsubmit="return confirm('Вы уверены?')">
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
