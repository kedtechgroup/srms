<div class="left-sidebar bg-black-700 box-shadow">
    <div class="sidebar-content">

        <div class="user-info closed">
            <img src="../assets/images/download.png" width="60" height="60" alt="John Doe" class="img-circle profile-img">

            <h6 class="title"><?php echo $_SESSION['alogin']; ?></h6>

            <small class="info">Administrator</small>
            <hr class="btn-info">
        </div>

        <!-- /.user-info -->

        <div class="sidebar-nav">
            <ul class="side-nav color-secondary">
                <li class="nav-header">
                    <span class="">HOME</span>
                </li>
                <li>
                    <a href="../dashboard.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span> </a>
                </li>

                <li class="nav-header">
                    <span class="">SCHOOL INFORMATION</span>
                </li>

                <li class="has-children">
                    <a href="#"><i class="fa fa-black-tie"></i> <span>Years</span> <i class="fa fa-angle-right arrow"></i></a>
                    <ul class="child-nav">

                        <li><a href="/years/index.php"><i class="fa fa-bars"></i> <span> Exam Years </span></a></li>

                    </ul>
                </li>

                <li class="has-children">
                    <a href="#"><i class="fa fa-industry"></i> <span>School Terms</span> <i class="fa fa-angle-right arrow"></i></a>
                    <ul class="child-nav">

                        <li><a href="/manage_term.php"><i class="fa fa fa-server"></i> <span>View Terms</span></a></li>

                    </ul>
                </li>
                <li class="has-children">
                    <a href="#"><i class="fa fa-linux"></i> <span>School Exams</span> <i class="fa fa-angle-right arrow"></i></a>
                    <ul class="child-nav">
                        <li><a href="/create-exam.php"><i class="fa fa-bars"></i> <span>Create Exam</span></a></li>

                        <li><a href="/manage-exam.php"><i class="fa fa fa-server"></i> <span>View Exams</span></a></li>

                        <!-- <li><a href="manage-exam-periods.php"><i class="fa fa-bars"></i> <span> Exam Periods </span></a></li> -->

                    </ul>
                </li>

                <li class="has-children">
                    <a href="#"><i class="fa fa-bars"></i> <span>Streams</span> <i class="fa fa-angle-right arrow"></i></a>
                    <ul class="child-nav">
                        <!-- <li><a href="create-stream.php"><i class="fa fa-bars"></i> <span>Create Stream</span></a></li> -->
                        <li><a href="/add-class-to-stream.php"><i class="fa fa-bars"></i> <span>Add Classes </span></a></li>
                        <li><a href="/manage-stream.php"><i class="fa fa fa-server"></i> <span>Manage Stream</span></a></li>

                    </ul>
                </li>

                <li class="has-children">
                    <a href="#"><i class="fa fa-delicious"></i> <span>Classes</span> <i class="fa fa-angle-right arrow"></i></a>
                    <ul class="child-nav">
                        <!-- <li><a href="create-class.php"><i class="fa fa-bars"></i> <span>Create Class</span></a></li> -->
                        <li><a href="/classes/index.php"><i class="fa fa fa-server"></i> <span>Manage Classes</span></a></li>

                    </ul>
                </li>
                <li class="has-children">
                    <a href="#"><i class="fa fa-file-text"></i> <span>Subjects</span> <i class="fa fa-angle-right arrow"></i></a>
                    <ul class="child-nav">
                        <li><a href="/create-subject.php"><i class="fa fa-bars"></i> <span>Create Subject</span></a></li>
                        <li><a href="/subjects/index.php"><i class="fa fa fa-server"></i> <span>Manage Subjects</span></a></li>
                        <li><a href="/add-subjectcombination.php"><i class="fa fa-newspaper-o"></i> <span>Add Subject Combination </span></a></li>
                        <a href="/manage-subjectcombination.php"><i class="fa fa-newspaper-o"></i> <span>Manage Subject Combination </span></a>
                        </li>
                    </ul>
                </li>
                <li class="has-children">
                    <a href="#"><i class="fa fa-user"></i> <span>Teachers</span> <i class="fa fa-angle-right arrow"></i></a>
                    <ul class="child-nav">
                        <li><a href="/add-users.php"><i class="fa fa-bars"></i> <span>Add Teacher</span></a></li>
                        <li><a href="/subject_teacher.php"><i class="fa fa-bars"></i> <span>Add Subject Teacher</span></a></li>

                        <li><a href="../manage-users.php"><i class="fa fa fa-server"></i> <span>Manage Teacher</span></a></li>

                    </ul>
                </li>
                <li class="has-children">
                    <a href="#"><i class="fa fa-users"></i> <span>Students</span> <i class="fa fa-angle-right arrow"></i></a>
                    <ul class="child-nav">
                        <li><a href="/student/add-students.php"><i class="fa fa-bars"></i> <span>Add Students</span></a></li>
                        <li><a href="/student/index.php"><i class="fa fa fa-server"></i> <span>Manage Students</span></a></li>

                    </ul>
                </li>
                <li class="has-children">
                    <a href="#"><i class="fa fa-pied-piper-pp"></i> <span>Results</span> <i class="fa fa-angle-right arrow"></i></a>
                    <ul class="child-nav">
                        <li><a href="../add-result.php"><i class="fa fa-bars"></i> <span>Add Result</span></a></li>
                        <li><a href="../find-result.php"><i class="fa fa-search"></i><span>Find Result</span></a></li>
                        <li><a href="../manage-results.php"><i class="fa fa fa-server"></i> <span>Manage Result</span></a></li>

                    </ul>
                </li>

                <li class="nav-header ">
                    <span class="">Reports</span>
                </li>

                <li class="has-children">
                    <a href="#"><i class="fa fa-file-pdf-o"></i> <span>Reports</span> <i class="fa fa-angle-right arrow"></i></a>
                    <ul class="child-nav">
                        <li><a href="/add-result.php"><i class="fa fa-bars"></i> <span>Class Report</span></a></li>
                        <li><a href="student_reports.php"><i class="fa fa fa-server"></i> <span>Student Report</span></a></li>

                    </ul>
                </li>

                <li class="nav-header">
                    <span class="">Configurations</span>
                </li>

                <li class="has-children">
                    <a href="#"><i class="fa fa-user-secret"></i> <span>Setup and Configurations</span> <i class="fa fa-angle-right arrow"></i></a>
                    <ul class="child-nav">
                        <li><a href="../create-specialization.php"><i class="fa fa fa-stethoscope"></i> <span>Teachers Specialization</span></a></li>
                        <li><a href="../users/auth-admin.php"><i class="fa fa-user-plus"></i> <span>Add User</span></a></li>
                        <li><a href="../teachers-category.php"><i class="fa fa fa-server"></i> <span>Categories</span></a></li>
                        <li><a href="../change-password.php"><i class="fa fa fa-database"></i> <span>Change Password</span></a></li>
                        <li><a href="student_reports.php"><i class="fa fa fa-user-plus"></i> <span>User Profile</span></a></li>
                        <li><a href="../create_cities.php"><i class="fa fa fa-user-plus"></i> <span>Add Address</span></a></li>

                    </ul>
                </li>
            </ul>
        </div>
        <!-- /.sidebar-nav -->
    </div>
    <!-- /.sidebar-content -->
</div>