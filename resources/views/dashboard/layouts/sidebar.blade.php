<nav class="sidebar sidebar-offcanvas px-2" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="/dashboard">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item nav-category">Menu</li>
        <?php $role_name = auth()->user()->roles[0]->id; ?>
        @if ($role_name == 1)
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="true"
                    aria-controls="ui-basic">
                    <i class="menu-icon mdi mdi-account-multiple"></i>
                    <span class="menu-title">Setup</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-basic">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="/dashboard/admin/users">Setup User</a>
                        </li>
                        <li class="nav-item"> <a class="nav-link" href="/dashboard/admin/roles">Setup Role</a>
                        </li>
            </li>
    </ul>
    </div>
    </li>
@else
    <li class="nav-item">
        <a class="nav-link" href="http://bootstrapdash.com/demo/star-admin2-free/docs/documentation.html">
            <i class="menu-icon mdi mdi-file-document"></i>
            <span class="menu-title">Documentation</span>
        </a>
    </li>
    </ul>
    @endif
</nav>
