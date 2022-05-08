@extends('layouts.app')

@section('meta')
    <title>{{ __( 'Список новостей' ) }}</title>
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
                {{ __( 'Новости' ) }}
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
                <form action="{{ route('blog.index') }}" class="row">
                    @csrf

                    <!-- col -->
                    <div class="col-md-3">
                        {!! html_select('categories', (int)request('categories', ''), ['' => __( 'Категория' )] + list_data($categories, 'id', 'name'), ['onchange' => '$(this).closest("form").submit()']) !!}
                    </div>
                    <!-- end col -->

                    <!-- col -->
                    <div class="col-md-9">

                        <!-- group -->
                        <div class="input-group">
                            {!! html_input('search', 'name', request('name', ''), ['class' => 'form-control']) !!}
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="submit">{{ __( 'Найти' ) }}</button>
                            </span>
                        </div>
                        <!-- end group -->

                    </div>
                    <!-- end col -->

                </form>
                <!-- form -->

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

                <!-- btn -->
                <p>
                    <a href="{{route('blog.create')}}" class="btn btn-primary">
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
                            <th>{{ __( 'Дата' ) }}</th>
                            <th>{{ __( 'Фото' ) }}</th>
                            <th>{{ __( 'Название' ) }}</th>
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
                                    @if($item->photo)
                                        <img src="{{ Storage::disk('public')->url('thumbnail/' . $item->photo) }}"/>
                                    @endif
                                </td>
                                <td>{{ $item->name }}</td>
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
                                    <a href="{{route('blog.edit', ['blog' => $item])}}" class="btn btn-info btn-xs">
                                        {{ __( 'Изменить' ) }}
                                    </a>
                                </td>
                                <td class="text-left">
                                    <form action="{{route('blog.destroy', ['blog' => $item])}}" method="post" onsubmit="return confirm('Вы уверены?')">
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

            </div>
            <!-- end body -->

        </div>
        <!-- end card -->

    </div>
    <!-- end stretch -->

@endsection
