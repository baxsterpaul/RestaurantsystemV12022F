<header class="main-header">
<style>

.a2 {
  text-decoration: none;
  display: inline-block;
  padding: 8px 16px;
}

.a2:hover {
  background-color: #ddd;
  color: black;
}

.previous {
  background-color: #f1f1f1;
  color: black;
}

.next {
  background-color: #04AA6D;
  color: white;
}

.round {
  border-radius: 50%;
}
</style>
<link href="/fontawesome/css/all.css" rel="stylesheet"> <!--load all styles -->
  <nav class="navbar navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
      <!-- <a href="#" class="previous round a2">&#8249;</a> -->
    
       
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
          <i class="fa fa-bars"></i>
        </button>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
        <ul class="nav navbar-nav">
         
       
       
      
          
          <?php
          if(isset($_SESSION['user'])){
          if($_SESSION['type'] === '0'){
         echo '';
          }
         else if($_SESSION['type'] === '2'){

          ?>
			
         <li><a href="orderkitchen.php" >KITCHEN</a></li>
         <?php }
        
        else{ echo"<li><a href='orderkitchen.php'>KITCHEN</a></li>";}
        }?>
            <ul class="dropdown-menu" role="menu">
              <?php
             
                $conn = $pdo->open();
                try{
                  $stmt = $conn->prepare("SELECT * FROM category");
                  $stmt->execute();
                  foreach($stmt as $row){
                    echo "
                      <li><a href='category.php?category=".$row['cat_slug']."'>".$row['name']."</a></li>
                    ";                  
                  }
                }
                catch(PDOException $e){
                  echo "There is some problem in connection: " . $e->getMessage();
                }

                $pdo->close();

              ?>
            </ul>
          </li>
        </ul>
     
      </div>
      <!-- /.navbar-collapse -->
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
         
          <?php
            if(isset($_SESSION['user'])){
              $image = (!empty($user['photo'])) ? 'images/'.$user['photo'] : 'images/profile.jpg';
              echo '
              <li><a href="logout.php">LOGOUT</a></li>
                <li  class="navbar-brand">
                <span>'.$user['firstname'].' '.$user['lastname'].'</span>
                </li>
              ';
            }
            else{
              echo "
                <li><a href='login.php'>LOGIN</a></li>
                
              ";
            }
          ?>
        </ul>
      </div>
    </div>
  </nav>
</header>