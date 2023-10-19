<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{ route("admin.dashboard") }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
            <!--user-->
        <li class="nav-item active">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="{{ route("user.index") }}">
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
        <!--user detail-->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav_user_detail" data-bs-toggle="collapse" href="{{ route("user_detail.index") }}">
                <i class="fa-brands fa-osi"></i><span>User Detail</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav_user_detail" class="nav-content collapse " data-bs-parent="#sidebar-nav_user_detail">
                <li>
                    <a href="{{ route("user_detail.index") }}">
                        <i class="bi bi-circle"></i><span>User Detail List</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route("user_detail.create") }}">
                        <i class="bi bi-circle"></i><span>Add User Detail</span>
                    </a>
                </li>
            </ul>
        </li>
        <!--security question-->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav_security_question" data-bs-toggle="collapse" href="{{ route("security_question.index") }}">
                <i class="fa-solid fa-circle-question"></i><span>Security Question</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav_security_question" class="nav-content collapse " data-bs-parent="#sidebar-nav_security_question">
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

        <!--departments-->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav_departments" data-bs-toggle="collapse" href="{{ route("department.index") }}">
                <i class="fa-solid fa-building"></i><span>Department</span><i class="bi bi-chevron-down ms-auto"></i>
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

        <!--project category-->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav_project_category" data-bs-toggle="collapse" href="{{ route("project_category.index") }}">
                <i class="fa-solid fa-briefcase"></i><span>Project Category</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav_project_category" class="nav-content collapse " data-bs-parent="#sidebar-nav_project_category">
                <li>
                    <a href="{{ route("project_category.index") }}">
                        <i class="bi bi-circle"></i><span>Project Category List</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route("project_category.create") }}">
                        <i class="bi bi-circle"></i><span>Add Project Category</span>
                    </a>
                </li>
            </ul>
        </li>
        <!--project initiation-->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav_project_initiation" data-bs-toggle="collapse" href="{{ route("project_initiation.index") }}">
                <i class="fa-brands fa-osi"></i><span>Project Initiation</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav_project_initiation" class="nav-content collapse " data-bs-parent="#sidebar-nav_project_initiation">
                <li>
                    <a href="{{ route("project_initiation.index") }}">
                        <i class="bi bi-circle"></i><span>Project Initiation List</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route("project_initiation.create") }}">
                        <i class="bi bi-circle"></i><span>Add Project Initiation</span>
                    </a>
                </li>
            </ul>
        </li>

        <!--status-->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav_status" data-bs-toggle="collapse" href="{{ route("status.index") }}">
                <i class="fa-solid fa-bullseye"></i></i><span>Status</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav_status" class="nav-content collapse " data-bs-parent="#sidebar-nav_status">
                <li>
                    <a href="{{ route("status.index") }}">
                        <i class="bi bi-circle"></i><span>Status List</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route("status.create") }}">
                        <i class="bi bi-circle"></i><span>Add Status</span>
                    </a>
                </li>
            </ul>
        </li>

    </ul>

</aside><!-- End Sidebar-->
