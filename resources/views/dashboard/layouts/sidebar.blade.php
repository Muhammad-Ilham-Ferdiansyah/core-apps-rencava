<?php
use App\Models\Menu;
$menu = Menu::where('main_id', 0)
    ->where('published', 1)
    ->orderBy('orderno', 'asc')
    ->get();
$submenu = Menu::where('main_id', '<>', 0)
    ->where('published', 1)
    ->orderBy('orderno', 'asc')
    ->get();
?>
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        @foreach ($menu as $m)
            @if ($m->link == 'dashboard')
                <li class="nav-item">
                    <a class="nav-link" href="/dashboard">
                        <i class="menu-icon {{ $m->icon }}"></i>
                        <span class="menu-title">{{ $m->menu_name }}</span>
                    </a>
                </li>
            @else
                <?php $role_name = auth()->user()->roles[0]->id; ?>
                @if ($role_name == 1)
                    @if ($m->id == 2)
                        <li class="nav-item nav-category">Menu</li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#{{ $m->clicked }}" aria-expanded="false"
                            aria-controls="{{ $m->clicked }}">
                            <i class="menu-icon {{ $m->icon }}"></i>
                            <span class="menu-title">{{ $m->menu_name }}</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="{{ $m->clicked }}">
                            <ul class="nav flex-column sub-menu">
                                @foreach ($submenu as $s)
                                    @if ($s->main_id == $m->id)
                                        <li class="nav-item"> <a class="nav-link" href="javascript:void(0);"
                                                onclick="window.location='/dashboard/{{ $s->link }}'">{{ $s->menu_name }}</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </li>
                @endif
            @endif
        @endforeach
    </ul>
</nav>
