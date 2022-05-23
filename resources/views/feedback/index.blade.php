@extends('layouts.app')

@section('meta')
    <title>
        {{ __( 'Обратная связь' ) }}
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
                {{ __( 'Обратная связь' ) }}
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
                            <th>{{ __( 'Имя' ) }}</th>
                            <th>{{ __( 'Телефон' ) }}</th>
                            <th>{{ __( 'Содержимое' ) }}</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model as $item)
                            <tr>
                                <td>{{$item->published_at->format('d.m.Y H:i')}}<br/></td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->phone}}</td>
                                <td class="nowrap-normal">{{$item->content}}</td>
                                <td>
                                    <form action="{{route('feedback.destroy', ['feedback' => $item])}}" method="post" onsubmit="return confirm('Вы уверены?')">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">удалить</button>
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
