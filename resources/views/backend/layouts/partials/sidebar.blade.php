<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{ route("admin.dashboard") }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <!--user-->
        @role(["super_admin", "admin"])
            <li class="nav-item active">
                <a class="nav-link collapsed" data-bs-target="#nav_user" data-bs-toggle="collapse" href="{{ route("user.index") }}">
                    <i class="fa-solid fa-users"></i><span>User</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="nav_user" class="nav-content collapse" data-bs-parent="#nav_user">
                    <li>
                        <a class="nav-content-item" href="{{ route("user.index") }}">
                            <i class="fa-regular fa-rectangle-list"></i><span>User List</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-content-item" href="{{ route("user.create") }}">
                            <i class="fa-solid fa-file-circle-plus"></i><span>Add User</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endrole

        <!--vendor-->
        @role(["super_admin", "admin"])
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#nav_vendor" data-bs-toggle="collapse" href="{{ route("vendor.index") }}">
                    <i class="fa-solid fa-user-tie"></i><span>Vendor</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="nav_vendor" class="nav-content collapse " data-bs-parent="#nav_vendor">
                    <li>
                        <a class="nav-content-item" href="{{ route("vendor.index") }}">
                            <i class="fa-regular fa-rectangle-list"></i><span>Vendor List</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-content-item" href="{{ route("vendor.create") }}">
                            <i class="fa-solid fa-file-circle-plus"></i><span>Add Vendor</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endrole

        <!--Role-->
        @role(["super_admin"])
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#nav_role" data-bs-toggle="collapse" href="{{ route("role.index") }}">
                    <i class="fa-solid fa-circle"></i></i><span>Role</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="nav_role" class="nav-content collapse " data-bs-parent="#nav_role">
                    <li>
                        <a class="nav-content-item" href="{{ route("role.index") }}">
                            <i class="fa-regular fa-rectangle-list"></i><span>Role List</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-content-item" href="{{ route("role.create") }}">
                            <i class="fa-solid fa-file-circle-plus"></i><span>Add Role</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endrole
        <!--Permission-->
        @role(["super_admin"])
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#nav_permission" data-bs-toggle="collapse" href="{{ route("role.index") }}">
                    <i class="fa-solid fa-circle"></i></i><span>Permission</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="nav_permission" class="nav-content collapse " data-bs-parent="#nav_permission">
                    <li>
                        <a class="nav-content-item" href="{{ route("permission.index") }}">
                            <i class="fa-regular fa-rectangle-list"></i><span>Permission List</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-content-item" href="{{ route("permission.create") }}">
                            <i class="fa-solid fa-file-circle-plus"></i><span>Add Permission</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endrole

        <!--user detail-->
        @role(["super_admin", "admin"])
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#nav_user_detail" data-bs-toggle="collapse" href="{{ route("user_detail.index") }}">
                    <i class="bi bi-person-lines-fill"></i><span>User Detail</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>

                <ul id="nav_user_detail" class="nav-content collapse " data-bs-parent="#nav_user_detail">
                    <li>
                        <a class="nav-content-item" href="{{ route("user_detail.index") }}">
                            <i class="fa-regular fa-rectangle-list"></i><span>User Detail List</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-content-item" href="{{ route("user_detail.create") }}">
                            <i class="fa-solid fa-file-circle-plus"></i><span>Add User Detail</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endrole

        {{-- <!--security question-->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="nav_security_question" data-bs-toggle="collapse" class="nav-content-item" href="{{ route("security_question.index") }}">
                <i class="fa-solid fa-circle-question"></i><span>Security Question</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="nav_security_question" class="nav-content collapse " data-bs-parent="nav_security_question">
                <li>
                    <a class="nav-content-item" href="{{ route("security_question.index") }}">
                        <i class="fa-regular fa-rectangle-list"></i><span>Security Question List</span>
                    </a>
                </li>
                <li>
                    <a class="nav-content-item" href="{{ route("security_question.create") }}">
                        <i class="fa-solid fa-file-circle-plus"></i><span>Add Security Question</span>
                    </a>
                </li>
            </ul>
        </li> --}}

        {{-- departments --}}
        @role(["super_admin", "admin", "stuff"])
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#nav_departments" data-bs-toggle="collapse" href="{{ route("department.index") }}">
                    <i class="fa-solid fa-building"></i><span>Department</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="nav_departments" class="nav-content collapse " data-bs-parent="nav_departments">
                    <li>
                        <a class="nav-content-item" href="{{ route("department.index") }}">
                            <i class="fa-regular fa-rectangle-list"></i><span>Department List</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-content-item" href="{{ route("department.create") }}">
                            <i class="fa-solid fa-file-circle-plus"></i><span>Add Department</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endrole

        <!--project category-->
        @role(["super_admin", "admin", "stuff"])
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#nav_project_category" data-bs-toggle="collapse" href="{{ route("project_category.index") }}">
                    <i class="fa-solid fa-briefcase"></i><span>Project Category</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="nav_project_category" class="nav-content collapse " data-bs-parent="nav_project_category">
                    <li>
                        <a class="nav-content-item" href="{{ route("project_category.index") }}">
                            <i class="fa-regular fa-rectangle-list"></i><span>Project Category List</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-content-item" href="{{ route("project_category.create") }}">
                            <i class="fa-solid fa-file-circle-plus"></i><span>Add Project Category</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endrole

        <!--project initiation-->
        @role(["super_admin", "admin", "stuff", "team_leader"])
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#nav_project_initiation" data-bs-toggle="collapse" href="{{ route("project_initiation.index") }}">
                    <i class="fa-solid fa-arrow-right-to-bracket"></i><span>Project Initiation</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="nav_project_initiation" class="nav-content collapse " data-bs-parent="nav_project_initiation">
                    <li>
                        <a class="nav-content-item" href="{{ route("project_initiation.index") }}">
                            <i class="fa-regular fa-rectangle-list"></i><span>Project Initiation List</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-content-item" href="{{ route("project_initiation.create") }}">
                            <i class="fa-solid fa-file-circle-plus"></i><span>Add Project Initiation</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endrole

        <!--my project-->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#nav_my_project" data-bs-toggle="collapse" href="{{ route("my_project.index") }}">
                <i class="fa-solid fa-arrow-right-to-bracket"></i><span>My Project</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="nav_my_project" class="nav-content collapse " data-bs-parent="nav_my_project">
                <li>
                    <a class="nav-content-item" href="{{ route("my_project.index") }}">
                        <i class="fa-regular fa-rectangle-list"></i><span>My Project List</span>
                    </a>
                </li>
            </ul>
        </li>

        <!--Project Submission-->
        @role(["super_admin", "admin"])
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#nav_project_initiation_submission" data-bs-toggle="collapse" href="{{ route("project_submission.index") }}">
                    <i class="bi bi-bookmark-fill"></i><span>Project Submission</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="nav_project_initiation_submission" class="nav-content collapse " data-bs-parent="nav_project_initiation_submission">
                    <li>
                        <a class="nav-content-item" href="{{ route("project_submission.index") }}">
                            <i class="fa-regular fa-rectangle-list"></i><span>Project Submission List</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endrole

        <!--disburse project payment-->
        @role(["super_admin", "admin"])
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#nav_project_initiation_disburse_project_payment" data-bs-toggle="collapse" href="{{ route("disburse_project_payment.index") }}">
                    <i class="fa-solid fa-file-invoice-dollar"></i><span>Disburse Project Payment</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="nav_project_initiation_disburse_project_payment" class="nav-content collapse " data-bs-parent="nav_project_initiation_disburse_project_payment">
                    <li>
                        <a class="nav-content-item" href="{{ route("disburse_project_payment.index") }}">
                            <i class="fa-regular fa-rectangle-list"></i><span>Project List</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endrole

        <!--sign off project-->
        @role(["super_admin", "admin"])
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#nav_signoff_project" data-bs-toggle="collapse" href="{{ route("signoff_project.index") }}">
                    <i class="fa-solid fa-folder-tree"></i><span>Sign-Off Project</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="nav_signoff_project" class="nav-content collapse " data-bs-parent="nav_signoff_project">
                    <li>
                        <a class="nav-content-item" href="{{ route("signoff_project.index") }}">
                            <i class="fa-regular fa-rectangle-list"></i><span>Sign-Off Project List</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endrole

        <!--status-->
        @role(["super_admin", "admin"])
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#nav_status" data-bs-toggle="collapse" href="{{ route("status.index") }}">
                    <i class="fa-solid fa-bullseye"></i><span>Status</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="nav_status" class="nav-content collapse " data-bs-parent="nav_status">
                    <li>
                        <a class="nav-content-item" href="{{ route("status.index") }}">
                            <i class="fa-regular fa-rectangle-list"></i><span>Status List</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-content-item" href="{{ route("status.create") }}">
                            <i class="fa-solid fa-file-circle-plus"></i><span>Add Status</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endrole

        <!--resource-->
        @role(["super_admin", "admin"])
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#nav_resource" data-bs-toggle="collapse" href="{{ route("status.index") }}">
                    <i class="fa-solid fa-sitemap"></i><span>Resource</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="nav_resource" class="nav-content collapse " data-bs-parent="nav_resource">
                    <li>
                        <a class="nav-content-item" href="{{ route("resource.index") }}">
                            <i class="fa-regular fa-rectangle-list"></i><span>Resource List</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-content-item" href="{{ route("resource.create") }}">
                            <i class="fa-solid fa-file-circle-plus"></i><span>Add Resource</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endrole

        <!--task-->
        @role(["super_admin", "admin", "stuff", "team_leader"])
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#nav_task" data-bs-toggle="collapse" href="{{ route("task.index") }}">
                    <i class="fa-solid fa-list-check"></i><span>Task</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="nav_task" class="nav-content collapse " data-bs-parent="nav_task">
                    <li>
                        <a class="nav-content-item" href="{{ route("task.index") }}">
                            <i class="fa-regular fa-rectangle-list"></i><span>Task List</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-content-item" href="{{ route("task.create") }}">
                            <i class="fa-solid fa-file-circle-plus"></i><span>Assign Task</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endrole

        <!--my task-->
        @role(["super_admin", "admin", "stuff", "team_leader", "team_members"])
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#nav_my_task" data-bs-toggle="collapse" href="{{ route("my_task.index") }}">
                    <i class="fa-solid fa-bars-progress"></i><span>My Task</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="nav_my_task" class="nav-content collapse " data-bs-parent="nav_my_task">
                    <li>
                        <a class="nav-content-item" href="{{ route("my_task.index") }}">
                            <i class="fa-regular fa-rectangle-list"></i><span>My Task List</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endrole

        <!--designation-->
        @role(["super_admin", "admin"])
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#nav_designation" data-bs-toggle="collapse" href="{{ route("designation.index") }}">
                    <i class="fa-solid fa-user-shield"></i><span>Designation</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="nav_designation" class="nav-content collapse " data-bs-parent="nav_designation">
                    <li>
                        <a class="nav-content-item" href="{{ route("designation.index") }}">
                            <i class="fa-regular fa-rectangle-list"></i><span>Designation List</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-content-item" href="{{ route("designation.create") }}">
                            <i class="fa-solid fa-file-circle-plus"></i><span>Add Designation</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endrole

        <!--monitoring team-->
        @role(["super_admin", "admin"])
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#nav_monitoring_team" data-bs-toggle="collapse" href="{{ route("monitoring_team.index") }}">
                    <i class="fa-solid fa-people-group"></i><span>Monitoring Team</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="nav_monitoring_team" class="nav-content collapse " data-bs-parent="#nav_monitoring_team">
                    <li>
                        <a class="nav-content-item" href="{{ route("monitoring_team.index") }}">
                            <i class="fa-regular fa-rectangle-list"></i><span>Monitoring Team List</span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-content-item" href="{{ route("monitoring_team.create") }}">
                            <i class="fa-solid fa-file-circle-plus"></i><span>Make Monitoring Team</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endrole

    </ul>

</aside><!-- End Sidebar-->
