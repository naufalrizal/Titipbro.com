<?php require'includes/config.php'; 

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); } 

//$stmt = $db->prepare('SELECT memberID, username,email FROM members  WHERE username = :username');


$row = $user->get_user_profile($_SESSION['username']);

print($row['username']);

$profPic = $row['profPic'];

//define page title
$title = 'Members Page';

//include header template
require('layout/header.php'); 
require('controllers/navigation/after-login.php');
?>

<br><br><br><br><br>

<div class="container">
  <div class="row">
    <div class="col-md-8 col-xs-10">
      <div class="well panel panel-default">
        <div class="panel-body">
          <div class="row">
            <div class="col-xs-12 col-sm-4 text-center">
              <img src="userfiles/profile-pic/<?php echo $profPic;?>" alt="" class="center-block img-circle img-thumbnail img-responsive">
              
            </div>
            <!--/col--> 
            <div class="col-xs-12 col-sm-8">
              <h2><?php print($row['firstname'])?>, <?php print($row['lastname']) ?></h2>
              <p><strong>Email: </strong> <?php print($row['email'])?> </p>
            </div>
 
          </div>
          <!--/row-->
        </div>
        <!--/panel-body-->
      </div>
      <!--/panel-->
    </div>
    <!--/col--> 
  </div>
  <!--/row--> 
</div>
<!--/container-->

<?php 
//include header template
require('layout/footer.php'); 
?>
