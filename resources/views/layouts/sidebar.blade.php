<!-- Sidebar -->
<nav class="sidebar">

    <!-- Header -->
    <div class="sidebar-header">

        <!-- Logo -->
        <a href="{{ route('dashboard') }}" class="sidebar-brand">
            {{ __( 'Stolicagem.ru' ) }}
        </a>
        <!-- End Logo -->

        <!-- toggler -->
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <!-- end toggler -->

    </div>
    <!-- End Header -->

    <!-- Body -->
    <div class="sidebar-body">

        <!-- nav -->
        <ul class="nav">

            <li class="nav-item {{ active_class(['/']) }}">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">
                        {{ __( 'Главная' ) }}
                    </span>
                </a>
            </li>

            <li class="nav-item nav-category">
                {{ __( 'Обработка' ) }}
            </li>
            <li class="nav-item {{ active_class(['appointments']) }}">
                <a href="{{ route('appointment.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="calendar"></i>
                    <span class="link-title">
                        {{ __( 'Заявки' ) }}
                    </span>
                </a>
            </li>
            <li class="nav-item {{ active_class(['feedback']) }}">
                <a href="{{ route('feedback.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="help-circle"></i>
                    <span class="link-title">
                        {{ __( 'Обратная связь' ) }}
                    </span>
                </a>
            </li>
            <li class="nav-item {{ active_class(['reviews']) }}">
                <a href="{{ route('reviews.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="book-open"></i>
                    <span class="link-title">
                        {{ __( 'Отзывы' ) }}
                    </span>
                </a>
            </li>
{{--            <li class="nav-item {{ active_class(['apps/calendar']) }}">--}}
{{--                <a href="{{ url('/apps/calendar') }}" class="nav-link">--}}
{{--                    <i class="link-icon" data-feather="pie-chart"></i>--}}
{{--                    <span class="link-title">--}}
{{--                        {{ __( 'Аналитика' ) }}--}}
{{--                    </span>--}}
{{--                </a>--}}
{{--            </li>--}}

            <li class="nav-item nav-category">
                {{ __( 'Основные данные' ) }}
            </li>
            <li class="nav-item {{ active_class(['clinics']) }}">
                <a href="{{ route('clinic.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="home"></i>
                    <span class="link-title">
                        {{ __( 'Клиники' ) }}
                    </span>
                </a>
            </li>
            <li class="nav-item {{ active_class(['doctor']) }}">
                <a href="{{ route('doctor.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="users"></i>
                    <span class="link-title">
                        {{ __( 'Врачи' ) }}
                    </span>
                </a>
            </li>

            <li class="nav-item nav-category">
                {{ __( 'Администрирование' ) }}
            </li>
            @can('isAdmin')
                <li class="nav-item {{ active_class(['users']) }}">
                    <a href="{{ route('user.index') }}" class="nav-link">
                        <i class="link-icon" data-feather="smile"></i>
                        <span class="link-title">
                            {{ __( 'Пользователи' ) }}
                        </span>
                    </a>
                </li>
            @endcan
            <li class="nav-item {{ active_class(['seo']) }}">
                <a href="{{ route('seo.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="arrow-up-right"></i>
                    <span class="link-title">
                        {{ __( 'SEO данные' ) }}
                    </span>
                </a>
            </li>
            <li class="nav-item {{ active_class(['redirects']) }}">
                <a href="{{ route('redirect.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="arrow-up-right"></i>
                    <span class="link-title">
                        {{ __( 'Редиректы' ) }}
                    </span>
                </a>
            </li>
            <li class="nav-item {{ active_class(['settings']) }}">
                <a href="{{ route('settings.edit') }}" class="nav-link">
                    <i class="link-icon" data-feather="settings"></i>
                    <span class="link-title">
                        {{ __( 'Настройки' ) }}
                    </span>
                </a>
            </li>

            <li class="nav-item nav-category">
                {{ __( 'Контент' ) }}
            </li>
            <li class="nav-item {{ active_class(['directions']) }}">
                <a href="{{ route('direction.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="columns"></i>
                    <span class="link-title">
                        {{ __( 'Услуги' ) }}
                    </span>
                </a>
                <ul class="nav sub-menu">
                    <li class="nav-item {{ active_class(['directions/categories']) }}">
                        <a href="{{ route('direction.categories.index') }}" class="nav-link">
                            {{ __( 'Категории' ) }}
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ active_class(['blog']) }}">
                <a href="{{ route('blog.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="columns"></i>
                    <span class="link-title">
                        {{ __( 'Новости' ) }}
                    </span>
                </a>
                <ul class="nav sub-menu">
                    <li class="nav-item {{ active_class(['blog/categories']) }}">
                        <a href="{{ route('blog.categories.index') }}" class="nav-link">
                            {{ __( 'Категории' ) }}
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ active_class(['sales']) }}">
                <a href="{{ route('sale.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="columns"></i>
                    <span class="link-title">
                        {{ __( 'Акции' ) }}
                    </span>
                </a>
                <ul class="nav sub-menu">
                    <li class="nav-item {{ active_class(['sale/categories']) }}">
                        <a href="{{ route('sale.categories.index') }}" class="nav-link">
                            {{ __( 'Категории' ) }}
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ active_class(['gallery']) }}">
                <a href="{{ route('gallery.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="columns"></i>
                    <span class="link-title">
                        {{ __( 'Галерея' ) }}
                    </span>
                </a>
            </li>

            <li class="nav-item nav-category">
                {{ __( 'цены' ) }}
            </li>
            <li class="nav-item {{ active_class(['prices.doctor']) }}">
                <a href="{{ route('prices.doctor') }}" class="nav-link">
                    <i class="link-icon" data-feather="dollar-sign"></i>
                    <span class="link-title">
                        {{ __( 'Врачей' ) }}
                    </span>
                </a>
            </li>
            <li class="nav-item {{ active_class(['prices.direction']) }}">
                <a href="{{ route('prices.direction') }}" class="nav-link">
                    <i class="link-icon" data-feather="dollar-sign"></i>
                    <span class="link-title">
                        {{ __( 'Услуг' ) }}
                    </span>
                </a>
            </li>

        </ul>
        <!-- end nav -->

    </div>
    <!--End Body -->

</nav>
<!-- End Sidebar -->
