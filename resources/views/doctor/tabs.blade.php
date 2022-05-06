<!-- nav -->
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link {{request()->routeIs('doctor.edit') ? 'active' : ''}}" href="{{route('doctor.edit', $model)}}">
            {{ __( 'Основное' ) }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{request()->routeIs('doctor.sertificat.*') ? 'active' : ''}}" href="{{route('doctor.sertificat.index', $model)}}">
            {{ __( 'Сертификаты' ) }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{request()->routeIs('doctor.price.*') ? 'active' : ''}}" href="{{route('doctor.price.index', $model)}}">
            {{ __( 'Цены' ) }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{request()->routeIs('doctor.page.edit') ? 'active' : ''}}" href="{{route('doctor.page.edit', $model)}}">
            {{ __( 'SEO данные' ) }}
        </a>
    </li>
</ul>
<!-- end nav -->
