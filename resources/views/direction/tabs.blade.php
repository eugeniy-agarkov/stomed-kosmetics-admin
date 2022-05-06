<!-- nav -->
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link {{request()->routeIs('direction.edit') ? 'active' : ''}}" href="{{route('direction.edit', $model)}}">
            {{ __( 'Основное' ) }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{request()->routeIs('direction.page.edit') ? 'active' : ''}}" href="{{route('direction.page.edit', $model)}}">
            {{ __( 'SEO данные' ) }}
        </a>
    </li>
</ul>

<!-- end nav -->
