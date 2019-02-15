<?php
$oDatabase= new Database();
$sql = "SELECT * FROM user WHERE user_id";
$result = $oDatabase->fquery($sql);
if ($result->num_rows === 0) {
  header('Location: index.php');
}
 ?>


  <div class="page-header header-filter" data-parallax="true" >

    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <div class="brand">
            <h1>Hi, <span style="text-transform: capitalize;"><?php echo $_SESSION['username']; ?></span></h1>
          </div>
          <button type="button" class="btn btn-primary btn-round float-right" rel="tooltip" title="" data-placement="bottom"   data-original-title="New User" data-toggle="modal" data-target="#exampleModal">
            <i class="material-icons">person_add</i>
          </button>
        </div>
      </div>
    </div>
  </div>
  <div class="main main-raised">
    <div class="profile-content">
      <div class="container">
        <div class="row">
          <div class="col-md-6 text-center">
            <div class="col-md-12 text-center">
                <div class="brand">
                  <h3>Users List</h3>
                </div>
              </div>
            <table id="myTable" class="display">
              <thead>
                  <tr>
                      <th>ID</th>
                      <th>Username</th>
                      <th>Status</th>
                      <th>Manage</th>
                  </tr>
              </thead>
              <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Status</th>
                    <th>Manage</th>
                  </tr>
              </tfoot>
              <tbody>
                <?php
                while($row = $result->fetch_assoc()) {
                 ?>
                  <tr>
                      <td><?php echo $row["user_id"]; ?></td>
                      <td><?php echo $row["username"]; ?></td>
                      <?php if ($row["status"] == 1) { ?>
                        <td>Active</td>
                        <td><?php if ($row["user_id"] != $_SESSION['userid']) { ?>
                       <a href="form.php?hidden=status&sta=0&userid=<?php echo $row["user_id"]; ?>" class="btn btn-danger btn-round btn-sm">Suspend</a> <?php } ?></td>
                        <?php
                      } else {  ?>
                      <td>Suspended</td>
                      <td><a href="form.php?hidden=status&sta=1&userid=<?php echo $row["user_id"]; ?>" class="btn btn-danger btn-round btn-sm">Activate</a></td>
                       <?php } ?>
                      
                  </tr>
                  <?php } ?>

              </tbody>
          </table>
          </div>
          <form class="col-md-6" method="post" action="form.php">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-12 text-center">
                <div class="brand">
                  <h3>Change Password</h3>
                </div>
              </div>
              <div class="col-md-12">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="material-icons">lock_open</i>
                    </span>
                  </div>
                  <input type="password" class="form-control" placeholder="Old Password" name="oldpass" required>
                  <input type="hidden" value="edit_pass" name="hidden">
                  <input type="hidden" value="<?php echo $_SESSION['userid']; ?>" name="userid">
                </div>
              </div>
              <div class="col-md-12">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="material-icons">lock</i>
                    </span>
                  </div>
                  <input type="password" class="form-control" placeholder="New Password" name="newpass" required>
                </div>
              </div>
              <div class="col-md-12">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="material-icons">lock</i>
                    </span>
                  </div>
                  <input type="password" class="form-control" placeholder="Repeat New Password" name="rnewpass" required>
                </div>
              </div>
              <div class="col-md-12 text-center">
                <br>
              <button class="btn btn-primary btn-sm btn-round">
                <i class="material-icons">security</i> Update Password
              </button>
              <?php 
              if(isset($_GET['msg']) && $_GET['msg'] !='')
                  { ?>
                    <br><br>
                    <button type="button" class="btn btn-info"><?php echo $_GET['msg']; ?></button>
                  
              <?php } ?>
            </div>
            </div>
          </div>
          </form>
          </div>
        </div>
        <div class="space-50"></div>
      </div>
    </div>
  </div>


<!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form" method="post" action="form.php">
      <div class="modal-body">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-12">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i class="material-icons">face</i>
                  </span>
                </div>
                <input type="text" class="form-control" placeholder="Username" name="username" required autocomplete="off">
                <input type="hidden" name="hidden" value="useradd">
              </div>
            </div>
            <div class="col-md-12">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i class="material-icons">lock</i>
                  </span>
                </div>
                <input type="password" class="form-control" placeholder="New Password" name="newpass" required>
              </div>
            </div>
            <div class="col-md-12">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i class="material-icons">lock</i>
                  </span>
                </div>
                <input type="password" class="form-control" placeholder="Repeat New Password" name="rnewpass" required>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
          <button class="btn btn-primary btn-round float-right">Add User</button>
        </div>
      </form>
    </div>
  </div>
</div>
