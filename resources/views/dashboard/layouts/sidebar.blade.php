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
                @if ($m->id == 2)
                    <li class="nav-item nav-category">Menu</li>
                @endif
                @if ($role_name == 1)
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
                @elseif ($role_name == 2 || $role_name == 3)
                    @if ($m->id == 2)
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="collapse" href="#{{ $m->clicked }}"
                                aria-expanded="false" aria-controls="{{ $m->clicked }}">
                                <i class="menu-icon {{ $m->icon }}"></i>
                                <span class="menu-title">{{ $m->menu_name }}</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="collapse" id="{{ $m->clicked }}">
                                <ul class="nav flex-column sub-menu">
                                    @if ($submenu[0]->main_id)
                                        @foreach ($submenu as $s)
                                            @if ($s->main_id == $m->id)
                                                <li class="nav-item"> <a class="nav-link" href="javascript:void(0);"
                                                        onclick="window.location='/dashboard/{{ $s->link }}'">{{ $s->menu_name }}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </li>
                    @endif
                    @if ($m->id == 3)
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="collapse" href="#{{ $m->clicked }}"
                                aria-expanded="false" aria-controls="{{ $m->clicked }}">
                                <i class="menu-icon {{ $m->icon }}"></i>
                                <span class="menu-title">{{ $m->menu_name }}</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="collapse" id="{{ $m->clicked }}">
                                <ul class="nav flex-column sub-menu">
                                    @if ($submenu[0]->main_id)
                                        @foreach ($submenu as $s)
                                            @if ($s->main_id == $m->id)
                                                <li class="nav-item"> <a class="nav-link" href="javascript:void(0);"
                                                        onclick="window.location='/dashboard/{{ $s->link }}'">{{ $s->menu_name }}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </li>
                    @endif
                    @if ($m->id == 4)
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="collapse" href="#{{ $m->clicked }}"
                                aria-expanded="false" aria-controls="{{ $m->clicked }}">
                                <i class="menu-icon {{ $m->icon }}"></i>
                                <span class="menu-title">{{ $m->menu_name }}</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="collapse" id="{{ $m->clicked }}">
                                <ul class="nav flex-column sub-menu">
                                    @if ($submenu[0]->main_id)
                                        @foreach ($submenu as $s)
                                            @if ($s->main_id == $m->id)
                                                <li class="nav-item"> <a class="nav-link" href="javascript:void(0);"
                                                        onclick="window.location='/dashboard/{{ $s->link }}'">{{ $s->menu_name }}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </li>
                    @endif
                @elseif ($role_name == 4)
                    @if ($m->id == 3)
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="collapse" href="#{{ $m->clicked }}"
                                aria-expanded="false" aria-controls="{{ $m->clicked }}">
                                <i class="menu-icon {{ $m->icon }}"></i>
                                <span class="menu-title">{{ $m->menu_name }}</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="collapse" id="{{ $m->clicked }}">
                                <ul class="nav flex-column sub-menu">
                                    @if ($submenu[0]->main_id)
                                        @foreach ($submenu as $s)
                                            @if ($s->main_id == $m->id)
                                                <li class="nav-item"> <a class="nav-link" href="javascript:void(0);"
                                                        onclick="window.location='/dashboard/{{ $s->link }}'">{{ $s->menu_name }}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </li>
                    @endif
                @endif
            @endif
        @endforeach
        {{-- <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a class="dropdown-item" :href="route('logout')"
                    onclick="event.preventDefault();this.closest('form').submit();">
                    {{ __('Log Out') }}</a>
            </form>
        </li> --}}
    </ul>
</nav>
