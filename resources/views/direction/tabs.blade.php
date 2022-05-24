<!-- nav -->
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link {{request()->routeIs('direction.edit') ? 'active' : ''}}" href="{{route('direction.edit', $model)}}">
            {{ __( 'Основное' ) }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{request()->routeIs('direction.images.index') ? 'active' : ''}}" href="{{route('direction.images.index', $model)}}">
            {{ __( 'Изображения' ) }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{request()->routeIs('direction.gallery.index') ? 'active' : ''}}" href="{{route('direction.gallery.index', $model)}}">
            {{ __( 'Галерея' ) }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{request()->routeIs(['direction.prices.index', 'direction.prices.*']) ? 'active' : ''}}" href="{{route('direction.prices.index', ['direction' => $model])}}">
            {{ __( 'Цены' ) }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{request()->routeIs('direction.page.edit') ? 'active' : ''}}" href="{{route('direction.page.edit', $model)}}">
            {{ __( 'SEO данные' ) }}
        </a>
    </li>
</ul>

<!-- end nav -->
