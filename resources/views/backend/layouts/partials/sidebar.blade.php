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

        <!--vendor-->
        <li class="nav-item active">
            <a class="nav-link collapsed" data-bs-target="#components-nav_vendor" data-bs-toggle="collapse" href="{{ route("vendor.index") }}">
                <i class="fa-solid fa-users"></i><span>Vendor</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav_vendor" class="nav-content collapse " data-bs-parent="#sidebar-nav_vendor">
                <li>
                    <a href="{{ route("vendor.index") }}">
                        <i class="bi bi-circle"></i><span>Vendor List</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route("vendor.create") }}">
                        <i class="bi bi-circle"></i><span>Add Vendor</span>
                    </a>
                </li>
            </ul>
        </li>

        <!--Role-->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav_role" data-bs-toggle="collapse" href="{{ route("role.index") }}">
                <i class="fa-solid fa-circle"></i></i><span>Role</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav_role" class="nav-content collapse " data-bs-parent="#sidebar-nav_role">
                <li>
                    <a href="{{ route("role.index") }}">
                        <i class="bi bi-circle"></i><span>Role List</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route("role.create") }}">
                        <i class="bi bi-circle"></i><span>Add Role</span>
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
        {{-- <!--security question-->
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
        </li> --}}

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
                <i class="fa-solid fa-bullseye"></i><span>Status</span><i class="bi bi-chevron-down ms-auto"></i>
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

        <!--resource-->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav_resource" data-bs-toggle="collapse" href="{{ route("status.index") }}">
                <i class="fa-brands fa-osi"></i><span>Resource</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav_resource" class="nav-content collapse " data-bs-parent="#sidebar-nav_resource">
                <li>
                    <a href="{{ route("resource.index") }}">
                        <i class="bi bi-circle"></i><span>Resource List</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route("resource.create") }}">
                        <i class="bi bi-circle"></i><span>Add Resource</span>
                    </a>
                </li>
            </ul>
        </li>
        <!--task-->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav_task" data-bs-toggle="collapse" href="{{ route("task.index") }}">
                <i class="fa-solid fa-list-check"></i><span>Task</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav_task" class="nav-content collapse " data-bs-parent="#sidebar-nav_task">
                <li>
                    <a href="{{ route("task.index") }}">
                        <i class="bi bi-circle"></i><span>Task List</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route("task.create") }}">
                        <i class="bi bi-circle"></i><span>Assign Task</span>
                    </a>
                </li>
            </ul>
        </li>

        <!--designation-->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav_designation" data-bs-toggle="collapse" href="{{ route("designation.index") }}">
                <i class="fa-solid fa-plane"></i><span>Designation</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav_designation" class="nav-content collapse " data-bs-parent="#sidebar-nav_designation">
                <li>
                    <a href="{{ route("designation.index") }}">
                        <i class="bi bi-circle"></i><span>Designation List</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route("designation.create") }}">
                        <i class="bi bi-circle"></i><span>Add Designation</span>
                    </a>
                </li>
            </ul>
        </li>

    </ul>

</aside><!-- End Sidebar-->
