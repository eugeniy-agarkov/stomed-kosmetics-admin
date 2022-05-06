<!-- nav -->
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link {{request()->routeIs('clinic.edit') ? 'active' : ''}}" href="{{route('clinic.edit', compact('clinic'))}}">
            {{ __( 'Профиль' ) }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{request()->routeIs('clinic.faq.index') ? 'active' : ''}}" href="{{route('clinic.faq.index', compact('clinic'))}}">
            {{ __( 'Вопросы и ответы' ) }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{request()->routeIs('clinic.images.index') ? 'active' : ''}}" href="{{route('clinic.images.index', compact('clinic'))}}">
            {{ __( 'Галлерея' ) }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{request()->routeIs('clinic.page') ? 'active' : ''}}" href="{{route('clinic.page', compact('clinic'))}}">
            {{ __( 'SEO данные' ) }}
        </a>
    </li>
</ul>
<!-- end nav -->
