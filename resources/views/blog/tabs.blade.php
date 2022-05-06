<!-- nav -->
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link {{request()->routeIs('blog.edit') ? 'active' : ''}}" href="{{route('blog.edit', ['blog' => $model])}}">
            {{ __( 'Основное' ) }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{request()->routeIs(['blog.prices.index', 'blog.prices.*']) ? 'active' : ''}}" href="{{route('blog.prices.index', ['blog' => $model])}}">
            {{ __( 'Цены' ) }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{request()->routeIs('blog.page.edit') ? 'active' : ''}}" href="{{route('blog.page.edit', ['blog' => $model])}}">
            {{ __( 'SEO данные' ) }}
        </a>
    </li>
</ul>

<!-- end nav -->
