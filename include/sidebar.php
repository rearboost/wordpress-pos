<nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="profile-image">
                  <img class="img-xs rounded-circle" src="../assets/images/faces/face8.jpg" alt="profile image">
                  <div class="dot-indicator bg-success"></div>
                </div>
                <?php 
                if(isset($_SESSION['username'])){
                    $user= $_SESSION['username'];
                    $sql=mysqli_query($conn,"SELECT * FROM user U, user_role R WHERE username='$user' AND R.id=U.user_role");
                    $row = mysqli_fetch_assoc($sql);
                    $name = $row['username'];
                    $designation = $row['role'];
                }
                ?>
                <div class="text-wrapper">
                  <p class="profile-name"><?php echo $name; ?></p>
                  <p class="designation"><?php echo $designation; ?></p>
                </div>
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
            <!-- <li class="nav-item nav-category"> -->
            <?php 
            //if(isset($_SESSION['user_role'])){ echo $user_role_name;}  
            ?>
              
            <!-- </li> -->
            <?php if ($_SESSION['user_role']==1): ?>
            <li class="nav-item">
              <a class="nav-link" href="home.php">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <?php else: ?>
            <?php endif ?>
             <?php if ($_SESSION['user_role']==1): ?>
              <li class="nav-item">
                <a class="nav-link" href="customer.php">
                  <i class="menu-icon typcn typcn-shopping-bag"></i>
                  <span class="menu-title">Customers</span>
                </a>
              </li>
            <?php else: ?>
            <?php endif ?>


             <?php if ($_SESSION['user_role']==1): ?>
              <li class="nav-item">
                <a class="nav-link" href="suppliers.php">
                  <i class="menu-icon typcn typcn-shopping-bag"></i>
                  <span class="menu-title">Suppliers</span>
                </a>
              </li>
            <?php else: ?>
            <?php endif ?>

            <?php if ($_SESSION['user_role']== 1 || $_SESSION['user_role']==  2): ?>

            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-buyer" aria-expanded="false" aria-controls="ui-buyer">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Jobs</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-buyer">
                <ul class="nav flex-column sub-menu">
                    <?php if ($_SESSION['user_role']== 1): ?>
                    <li class="nav-item">
                      <a class="nav-link" href="request.php">Inbound Requests</a>
                    </li>
                    <?php else: ?>
                    <?php endif ?>
                    <?php if ($_SESSION['user_role']== 1 || $_SESSION['user_role']==  2 ): ?>
                    <li class="nav-item">
                      <a class="nav-link" href="progress.php">Jobs In Process</a>
                    </li>
                    <?php else: ?>
                    <?php endif ?>
                    <?php if ($_SESSION['user_role']== 1): ?>
                    <li class="nav-item">
                      <a class="nav-link" href="completed.php">Completed Jobs</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="finished.php">Finished Jobs</a>
                    </li>
                    <?php else: ?>
                    <?php endif ?>
                    <?php if ($_SESSION['user_role']== 1): ?>
                    <li class="nav-item">
                      <a class="nav-link" href="rejected.php">Rejected Jobs</a>
                    </li>
                  <?php else: ?>
                  <?php endif ?>
                </ul>
              </div>
            </li>
            <?php else: ?>
            <?php endif ?>



            <?php if ($_SESSION['user_role']==1): ?>
            <li class="nav-item">
              <a class="nav-link" href="dashboard_items.php">
                <i class="menu-icon typcn typcn-shopping-bag"></i>
                <span class="menu-title">Dashboard Items</span>
              </a>
            </li>

            <?php else: ?>
            <?php endif ?>

            <?php if ($_SESSION['user_role']==1): ?>

            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-style" aria-expanded="false" aria-controls="ui-style">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title" style="color: chartreuse;">GRN</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-style">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="grn.php">Add GRN</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="grn_bill_history.php">GRN Bill History</a>
                  </li>
                </ul>
              </div>
            </li>

            <?php else: ?>
            <?php endif ?>

            <?php if ($_SESSION['user_role']==1): ?>
            <li class="nav-item">
              <a class="nav-link" href="stock.php">
                <i class="menu-icon typcn typcn-shopping-bag"></i>
                <span class="menu-title">Manage Stock</span>
              </a>
            </li>

            <?php else: ?>
            <?php endif ?>
            
            <?php if ($_SESSION['user_role']==1): ?>

            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-style" aria-expanded="false" aria-controls="ui-style">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title" style="color: chartreuse;">POS</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-style">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="billing_item.php">Billing Items</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="billing_service.php">Billing Services</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="billing_history.php">POS Bill History</a>
                  </li>
                </ul>
              </div>
            </li>

            <?php else: ?>
            <?php endif ?>

            <?php if ($_SESSION['user_role']==1): ?>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-claim" aria-expanded="false" aria-controls="ui-style">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Warranty Claim</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-claim">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="claim.php">Claim</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="warranty.php">Warranty Claim List</a>
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
                <span class="menu-title">Report</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-item">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="report_profit.php">Service Income Report</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="monthly_report.php">Monthly Profit Report</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="report_stock.php">Stock Report</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="report_jobs.php">Job Status Report</a>
                  </li>
              </div>
            </li>

            <?php else: ?>
            <?php endif ?>

            <?php if ($_SESSION['user_role']==1): ?>
              <li class="nav-item">
                <a class="nav-link" href="setting.php">
                  <i class="menu-icon typcn typcn-shopping-bag"></i>
                  <span class="menu-title">Setting</span>
                </a>
              </li>
            <?php else: ?>
            <?php endif ?>

          </ul>
        </nav>