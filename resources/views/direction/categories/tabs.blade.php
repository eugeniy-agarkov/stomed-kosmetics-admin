<!-- nav -->
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link {{request()->routeIs('direction.categories.edit') ? 'active' : ''}}" href="{{route('direction.categories.edit', $model)}}">
            {{ __( 'Основное' ) }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{request()->routeIs('direction.categories.page.edit') ? 'active' : ''}}" href="{{route('direction.categories.page.edit', $model)}}">
            {{ __( 'SEO данные' ) }}
        </a>
    </li>
</ul>

<!-- end nav -->
