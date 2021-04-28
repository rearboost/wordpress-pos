<nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="profile-image">
                  <img class="img-xs rounded-circle" src="../assets/images/faces/face8.jpg" alt="profile image">
                  <div class="dot-indicator bg-success"></div>
                </div>
                <!-- <div class="text-wrapper">
                  <p class="profile-name">Allen Moreno</p>
                  <p class="designation">Admin</p>
                </div> -->
              </a>
            </li>
            <!--+++++++++++++++++++++++++++++++++++++++ Admin Module  +++++++++++++++++++++++++++++++++++++++-->

            <?php 
                if(isset($_SESSION['user_role'])){
                    $user_role_id= $_SESSION['user_role'];
                    $sql=mysqli_query($conn,"SELECT * FROM user_role WHERE id='$user_role_id'");
                    $row = mysqli_fetch_assoc($sql);
                    $user_role_name = $row['role'];
                }
            ?>
            <li class="nav-item nav-category"><?php if(isset($_SESSION['user_role'])){ echo $user_role_name;}  ?></li>
            <li class="nav-item">
              <a class="nav-link" href="home.php">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
             <?php if ($_SESSION['user_role']==1): ?>
              <li class="nav-item">
                <a class="nav-link" href="user.php">
                  <i class="menu-icon typcn typcn-shopping-bag"></i>
                  <span class="menu-title">User</span>
                </a>
              </li>
            <?php else: ?>
            <?php endif ?>

            <?php if ($_SESSION['user_role']== 1 || $_SESSION['user_role']==  2 || $_SESSION['user_role']==  3 || $_SESSION['user_role']== 4 || $_SESSION['user_role']==  5): ?>

            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-buyer" aria-expanded="false" aria-controls="ui-buyer">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Buyer</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-buyer">
                <ul class="nav flex-column sub-menu">
                  <?php if ($_SESSION['user_role']== 1 || $_SESSION['user_role']==  2 ): ?>
                    <li class="nav-item">
                      <a class="nav-link" href="b_registre.php">Register</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="b_division.php">Division</a>
                    </li>
                  <?php else: ?>
                  <?php endif ?>
                  <?php if ($_SESSION['user_role']==1 || $_SESSION['user_role']==  3): ?>
                  <li class="nav-item">
                    <a class="nav-link" href="b_wise_sizes.php">Wise Sizes</a>
                  </li>
                  <?php else: ?>
                  <?php endif ?>
                  <?php if ($_SESSION['user_role']==1 || $_SESSION['user_role']==  2): ?>
                  <li class="nav-item">
                    <a class="nav-link" href="b_default_sub_categories.php">Default Sub Categories</a>
                  </li>
                  <?php else: ?>
                  <?php endif ?>
                  <?php if ($_SESSION['user_role']==1): ?>
                  <li class="nav-item">
                    <a class="nav-link" href="b_sensitivity.php">Sensitivity Admin</a>
                  </li>
                  <?php else: ?>
                  <?php endif ?>
                  <?php if ($_SESSION['user_role']==1 || $_SESSION['user_role']==  4 || $_SESSION['user_role']==  5): ?>
                  <li class="nav-item">
                    <a class="nav-link" href="b_wise_sensitivity.php">Buyer wise Sensitivity</a>
                  </li>
                  <?php else: ?>
                  <?php endif ?>
                </ul>
              </div>
            </li>

            <?php else: ?>
            <?php endif ?>
            
            <?php if ($_SESSION['user_role']==1 || $_SESSION['user_role']==  2): ?>

            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-style" aria-expanded="false" aria-controls="ui-style">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-style">Style</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-style">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="s_creation.php">Creation</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="s_size_reference.php">Size Reference</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="s_season_admin.php">Season Admin</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="s_department_admin.php">Department Admin</a>
                  </li>
                </ul>
              </div>
            </li>

            <?php else: ?>
            <?php endif ?>


            <?php if ($_SESSION['user_role']==1): ?>

            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-item" aria-expanded="false" aria-controls="ui-item">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Item</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-item">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="i_category.php">Category</a>
                  </li>
                  <!-- <li class="nav-item">
                    <a class="nav-link" href="i_main_category.php">Main Category</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="s_sub_category.php">Sub Category</a>
                  </li> -->
                  <li class="nav-item">
                    <a class="nav-link" href="i_create_item.php">Create Item</a>
                  </li>
                </ul>
              </div>
            </li>

            <?php else: ?>
            <?php endif ?>

            <!--+++++++++++++++++++++++++++++++++++++++ Costing Module  +++++++++++++++++++++++++++++++++++++++-->

            <li class="nav-item nav-category">Costing Module</li>

            <?php if ($_SESSION['user_role']==1 || $_SESSION['user_role']== 2 || $_SESSION['user_role']==  6 || $_SESSION['user_role']==  8 || $_SESSION['user_role']==  9 || $_SESSION['user_role']==  10): ?>

             <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-costing" aria-expanded="false" aria-controls="ui-costing">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Costing</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-costing">
                <ul class="nav flex-column sub-menu">
                  <?php if ($_SESSION['user_role']==1 || $_SESSION['user_role']==  2): ?>
                  <li class="nav-item">
                    <a class="nav-link" href="c_pre_order_costing.php">Pre order Costing </a>
                  </li>
                  <?php else: ?>
                  <?php endif ?>
                  <?php if ($_SESSION['user_role']==1 || $_SESSION['user_role']==  6): ?>
                  <li class="nav-item">
                    <a class="nav-link" href="c_smv_confirmation.php">SMV Confirmation</a>
                  </li>
                  <?php else: ?>
                  <?php endif ?>
                  <?php if ($_SESSION['user_role']== 8 ||  $_SESSION['user_role']==  1 ): ?>
                  <li class="nav-item">
                    <a class="nav-link" href="c_marker_y_confirmation.php">Marker YY Confirmation</a>
                  </li>
                  <?php else: ?>
                  <?php endif ?>
                  <?php if ($_SESSION['user_role']== 1 || $_SESSION['user_role']==  10): ?>
                   <li class="nav-item">
                    <a class="nav-link" href="c_costing_approvals.php">Costing Approvals </a>
                  </li>
                  <?php else: ?>
                  <?php endif ?>
                  <?php if ($_SESSION['user_role']== 1 || $_SESSION['user_role']==  9): ?>
                   <li class="nav-item">
                    <a class="nav-link" href="c_confirmatio_allocation.php">Costing Confirmation <br>and Allocation </a>
                  </li>
                  <?php else: ?>
                  <?php endif ?>
                </ul>
              </div>
            </li>

            <?php else: ?>
            <?php endif ?>

            <?php if ($_SESSION['user_role']== 5 || $_SESSION['user_role']==  7 || $_SESSION['user_role']==  1): ?>

            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-bom" aria-expanded="false" aria-controls="ui-bom">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">BOM (Bill of Materials)</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-bom">
                <ul class="nav flex-column sub-menu">
                  <!-- <li class="nav-item">
                    <a class="nav-link" href="i_category.php">Merchandiser</a>
                  </li> -->
                   <li class="nav-item">
                    <a class="nav-link" href="bb_purchase_order_entering.php">Purchase Order Entering</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="bb_bom_ratio.php">BOM Ratio </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="bb_bom.php">BOM</a>
                  </li>
                </ul>
              </div>
            </li>

            <?php else: ?>
            <?php endif ?>
            <!--+++++++++++++++++++++++++++++++++++++++ Reports Module  +++++++++++++++++++++++++++++++++++++++-->
            <!-- <li class="nav-item nav-category">Reports</li> -->
             <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-reports" aria-expanded="false" aria-controls="ui-reports">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Reports</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-reports">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="bb_bom_report.php">BOM report</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="i_main_category.php">Costing Report</a>
                  </li>
                </ul>
              </div>
            </li>
             <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-settings" aria-expanded="false" aria-controls="ui-reports">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Settings</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-settings">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="settings.php">User</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="settings_item.php">Item</a>
                  </li>
                </ul>
              </div>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link" href="pages/forms/basic_elements.html">
                <i class="menu-icon typcn typcn-shopping-bag"></i>
                <span class="menu-title">Form elements</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pages/charts/chartjs.html">
                <i class="menu-icon typcn typcn-th-large-outline"></i>
                <span class="menu-title">Charts</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pages/tables/basic-table.html">
                <i class="menu-icon typcn typcn-bell"></i>
                <span class="menu-title">Tables</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pages/icons/font-awesome.html">
                <i class="menu-icon typcn typcn-user-outline"></i>
                <span class="menu-title">Icons</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <i class="menu-icon typcn typcn-document-add"></i>
                <span class="menu-title">User Pages</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="pages/samples/blank-page.html"> Blank Page </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pages/samples/login.html"> Login </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pages/samples/register.html"> Register </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pages/samples/error-404.html"> 404 </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pages/samples/error-500.html"> 500 </a>
                  </li>
                </ul>
              </div>
            </li> -->
          </ul>
        </nav>