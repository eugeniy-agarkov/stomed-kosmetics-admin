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
                            <th>{{ __( 'Врач' ) }}</th>
                            <th>{{ __( 'Имя' ) }}</th>
                            <th>{{ __( 'Телефон' ) }}</th>
                            <th>{{ __( 'Форма' ) }}</th>
                            <th>{{ __( 'Источник' ) }}</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model as $item)
                            <tr>
                                <td>
                                    {{$item->created_at->format('d.m.Y H:i')}}<br/>
                                </td>
                                <td>
                                    @if($item->doctor)
                                        <a href="{{route('doctor.edit', ['doctor' => $item->doctor])}}">{{$item->doctor->fio}}</a>
                                    @endif
                                </td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->phone}}</td>
                                <td>
                                    {{\Illuminate\Support\Str::limit($item->source_title, 50)}}<br/>
                                    {{\Illuminate\Support\Str::limit($item->source_url, 50)}}
                                </td>
                                <td>{{$item->getRefererType()}}</td>
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
