<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{ route('admin.dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        
        <!--user-->
        <li class="nav-item active">
            <a class="nav-link collapsed" data-bs-target="#user" data-bs-toggle="collapse"
                href="{{ route('user.index') }}">
                <i class="fa-solid fa-users"></i><span>User</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="user" class="nav-content collapse " data-bs-parent="#user">
                <li>
                    <a class="nav-content-item" href="{{ route('user.index') }}">
                        <i class="fa-regular fa-rectangle-list"></i><span>User List</span>
                    </a>
                </li>
                <li>
                    <a class="nav-content-item" href="{{ route('user.create') }}">
                        <i class="fa-solid fa-file-circle-plus"></i><span>Add User</span>
                    </a>
                </li>
            </ul>
        </li>

        <!--security question-->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#securityQues" data-bs-toggle="collapse"
                href="{{ route('security_question.index') }}">
                <i class="fa-solid fa-circle-question"></i><span>Security Question</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="securityQues" class="nav-content collapse" data-bs-parent="#securityQues">
                <li>
                    <a class="nav-content-item" href="{{ route('security_question.index') }}">
                        <i class="fa-regular fa-rectangle-list"></i><span>Security Question List</span>
                    </a>
                </li>
                <li>
                    <a class="nav-content-item" href="{{ route('security_question.create') }}">
                        <i class="fa-solid fa-file-circle-plus"></i><span>Add Security Question</span>
                    </a>
                </li>
            </ul>
        </li>

        <!--departments-->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#departments" data-bs-toggle="collapse"
                href="{{ route('department.index') }}">
                <i class="fa-solid fa-building"></i><span>Department</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="departments" class="nav-content collapse " data-bs-parent="#departments">
                <li>
                    <a class="nav-content-item" href="{{ route('department.index') }}">
                        <i class="fa-regular fa-rectangle-list"></i><span>Department List</span>
                    </a>
                </li>
                <li>
                    <a class="nav-content-item" href="{{ route('department.create') }}">
                        <i class="fa-solid fa-file-circle-plus"></i><span>Add Department</span>
                    </a>
                </li>
            </ul>
        </li>

        <!--project category-->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#project_category" data-bs-toggle="collapse"
                href="{{ route('project_category.index') }}">
                <i class="fa-solid fa-briefcase"></i><span>Project Category</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="project_category" class="nav-content collapse "
                data-bs-parent="#project_category">
                <li>
                    <a class="nav-content-item" href="{{ route('project_category.index') }}">
                        <i class="fa-regular fa-rectangle-list"></i><span>Project Category List</span>
                    </a>
                </li>
                <li>
                    <a class="nav-content-item" href="{{ route('project_category.create') }}">
                        <i class="fa-solid fa-file-circle-plus"></i><span>Add Project Category</span>
                    </a>
                </li>
            </ul>
        </li>
        
        <!--project initiation-->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#project_initiation" data-bs-toggle="collapse"
                href="{{ route('project_initiation.index') }}">
                <i class="fa-brands fa-osi"></i><span>Project Initiation</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="project_initiation" class="nav-content collapse "
                data-bs-parent="#project_initiation">
                <li>
                    <a class="nav-content-item" href="{{ route('project_initiation.index') }}">
                        <i class="fa-regular fa-rectangle-list"></i><span>Project Initiation List</span>
                    </a>
                </li>
                <li>
                    <a class="nav-content-item" href="{{ route('project_initiation.create') }}">
                        <i class="fa-solid fa-file-circle-plus"></i><span>Add Project Initiation</span>
                    </a>
                </li>
            </ul>
        </li>

    </ul>

</aside><!-- End Sidebar-->
