<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
            {{-- user --}}
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse"
                href="{{ route("user.index") }}">
                <i class="fa-solid fa-users"></i><span>User</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route("user.index") }}">
                        <i class="bi bi-circle"></i><span>User List</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route("user.create") }}">
                        <i class="bi bi-circle"></i><span>Add User</span>
                    </a>
                </li>
            </ul>
        </li>

        {{-- security question --}}
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav_security_question" data-bs-toggle="collapse"
                href="{{ route("security_question.index") }}">
                <i class="fa-solid fa-circle-question"></i><span>Security Question</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav_security_question" class="nav-content collapse "
                data-bs-parent="#sidebar-nav_security_question">
                <li>
                    <a href="{{ route("security_question.index") }}">
                        <i class="bi bi-circle"></i><span>Security Question List</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route("security_question.create") }}">
                        <i class="bi bi-circle"></i><span>Add Security Question</span>
                    </a>
                </li>
            </ul>
        </li>
        {{-- departments --}}

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav_departments" data-bs-toggle="collapse"
                href="{{ route("department.index") }}">
                <i class="fa-solid fa-circle-question"></i><span>Department</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav_departments" class="nav-content collapse " data-bs-parent="#sidebar-nav_departments">
                <li>
                    <a href="{{ route("department.index") }}">
                        <i class="bi bi-circle"></i><span>Department List</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route("department.create") }}">
                        <i class="bi bi-circle"></i><span>Add Department</span>
                    </a>
                </li>
            </ul>
        </li>

    </ul>

</aside><!-- End Sidebar-->
