<!-- nav -->
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link {{request()->routeIs('sale.edit') ? 'active' : ''}}" href="{{route('sale.edit', ['sale' => $model])}}">
            {{ __( 'Основное' ) }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{request()->routeIs(['sale.prices.index', 'sale.prices.*']) ? 'active' : ''}}" href="{{route('sale.prices.index', ['sale' => $model])}}">
            {{ __( 'Цены' ) }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{request()->routeIs('sale.page.edit') ? 'active' : ''}}" href="{{route('sale.page.edit', ['sale' => $model])}}">
            {{ __( 'SEO данные' ) }}
        </a>
    </li>
</ul>

<!-- end nav -->
