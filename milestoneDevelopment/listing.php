<?php session_start(); ?>
<?php include 'navbar.php';    ?>
<?php include 'login_modal.php'; ?>
<?php include 'signup_modal.php'; ?>
<?php include_once 'functions.php'; ?>
<!doctype html>
<html lang="en"> 
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Crimson+Text' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="css/custom.css">
        <title>Listings Page</title>
        <style>
            .breadcrumb{
                background: none;
                text-align: left;
            }
            #footer{
                display: inline;
                padding: 50px;
            }
            .top-container{
                margin-top: 80px;
                background-color:#e5e5e5;
                border-radius: 10px; 
                
            }
            .bottom-container{
                margin-top: 40px;
                padding: 2%;
                background-color:#e5e5e5;
                border-radius: 10px; 
            }
            .navbar-brand{
                font-family: 'Helvetica Neue', serif;
                font-weight: lighter;        
            }
            .property-listing{
                border-radius:4px;
            }
            .transbox{
                border-radius: 4px;
                -webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2), 0 1px 0px rgba(0, 0, 0, 0.1);
                box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2), 0 1px 0px rgba(0, 0, 0, 0.1);
        }
        </style>
    </head>
    <body>
        <?php
        error_reporting(E_ALL & ~E_NOTICE);
        $connection = connect_to_mysql();
        if($_POST["minprice"]){
            $results = milestone_search_with_filters($connection);
        }
        else{
        $results = milestone_search($connection);
        }
        ?>
        
            
        <div class="container top-container transbox"> 
            <div class="row">
                <div class="col-sm-3">
                <ol class="breadcrumb text-left">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Listings: <?php if(!(isset($_POST["usersearch"]))){echo '';}else{echo $_POST["usersearch"];} ?></li>
                    </ol>
                </div>
                <div class="col-sm-6 text-center">
                    <h2 style="font-family: 'Helvetica Neue', serif;
                font-weight: lighter; padding: 15px;">Milestone Property Home Listings</h2>
                </div>
            </div>
           <div class="row">
          <div class="col-md-10 col-md-offset-1 col-xs-12">
            <div class="quick-search">
              <div class="row">
                <form action="listing.php" method="post">
                  <div class="col-md-3 col-sm-3">
                    <div class="form-group">
                      <label for="bedroom">Search Homes</label>
                      <input name="usersearch" type="text" class="form-control" placeholder="<?php echo $_POST["usersearch"]?>" value = "<?php echo isset($_POST["usersearch"]) ? $_POST["usersearch"] : '' ?>">
                    </div>
                    <div class="form-group">
                      <label for="bedroom">Bedroom</label>
                      <select class="form-control" name="min_bedroom" >  
                        <?php echo "<option value=\"1\" " . (1 == $_POST["min_bedroom"] ? "selected=\"selected\"" : "") . ">1</option>"; ?>
                        <?php echo "<option value=\"2\" " . (2 == $_POST["min_bedroom"] ? "selected=\"selected\"" : "") . ">2</option>"; ?>
                        <?php echo "<option value=\"3\" " . (3 == $_POST["min_bedroom"] ? "selected=\"selected\"" : "") . ">3</option>"; ?>
                        <?php echo "<option value=\"4\" " . (4 == $_POST["min_bedroom"] ? "selected=\"selected\"" : "") . ">4</option>"; ?>
                      </select>
                    </div>
                  </div>
                    <div class="col-md-3 col-sm-3">
                    <div class="form-group">
                      <label for="status">Walkscore</label>
                      <select class="form-control" name = "min_walkscore">
                        <?php echo "<option value=\"0\" " . (0 == $_POST["min_walkscore"] ? "selected=\"selected\"" : "") . ">0</option>"; ?>
                        <?php echo "<option value=\"90\" " . (90 == $_POST["min_walkscore"] ? "selected=\"selected\"" : "") . ">90</option>"; ?>
                        <?php echo "<option value=\"80\" " . (80 == $_POST["min_walkscore"] ? "selected=\"selected\"" : "") . ">80</option>"; ?>
                        <?php echo "<option value=\"70\" " . (70 == $_POST["min_walkscore"] ? "selected=\"selected\"" : "") . ">70</option>"; ?>
                        <?php echo "<option value=\"60\" " . (60 == $_POST["min_walkscore"] ? "selected=\"selected\"" : "") . ">60</option>"; ?>
                        <?php echo "<option value=\"50\" " . (50 == $_POST["min_walkscore"] ? "selected=\"selected\"" : "") . ">50</option>"; ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="bathroom">Bathroom</label>
                      <select class="form-control" name="min_bathroom">
                        <?php echo "<option value=\"1\" " . (1 == $_POST["min_bathroom"] ? "selected=\"selected\"" : "") . ">1</option>"; ?>
                        <?php echo "<option value=\"2\" " . (2 == $_POST["min_bathroom"] ? "selected=\"selected\"" : "") . ">2</option>"; ?>
                        <?php echo "<option value=\"3\" " . (3 == $_POST["min_bathroom"] ? "selected=\"selected\"" : "") . ">3</option>"; ?>
                        <?php echo "<option value=\"4\" " . (4 == $_POST["min_bathroom"] ? "selected=\"selected\"" : "") . ">4</option>"; ?>
                      </select>
                     
                    </div>
                  </div>
                  <!-- break -->
                  <div class="col-md-3 col-sm-3">
                    <div class="form-group">
                      <label for="min_sq_ft">Sq Ft</label>
                      <select class="form-control" name="min_sq_ft">
                        <?php echo "<option value=\"90\" " . (90 == $_POST["min_sq_ft"] ? "selected=\"selected\"" : "") . ">90</option>"; ?>
                        <?php echo "<option value=\"120\" " . (120 == $_POST["min_sq_ft"] ? "selected=\"selected\"" : "") . ">120</option>"; ?>
                        <?php echo "<option value=\"170\" " . (170 == $_POST["min_sq_ft"] ? "selected=\"selected\"" : "") . ">170</option>"; ?>
                        <?php echo "<option value=\"190\" " . (190 == $_POST["min_sq_ft"] ? "selected=\"selected\"" : "") . ">190</option>"; ?>
                        <?php echo "<option value=\"210\" " . (210 == $_POST["min_sq_ft"] ? "selected=\"selected\"" : "") . ">210</option>"; ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="minprice">Min Price</label>
                      <select class="form-control" name="minprice">
                        <?php echo "<option value=\"20000\" " . (20000 == $_POST["minprice"] ? "selected=\"selected\"" : "") .">$20000</option>"; ?>
                        <?php echo "<option value=\"40000\" " . (40000 == $_POST["minprice"] ? "selected=\"selected\"" : "") .">$40000</option>"; ?>
                        <?php echo "<option value=\"60000\" " . (60000 == $_POST["minprice"] ? "selected=\"selected\"" : "") .">$60000</option>"; ?>
                        <?php echo "<option value=\"80000\" " . (80000 == $_POST["minprice"] ? "selected=\"selected\"" : "") .">$80000</option>"; ?>
                      </select>
                    </div>
                  </div>
                  <!-- break -->
                  <div class="col-md-3 col-sm-3">
                    <div class="form-group">
                      <label for="maxprice">Max Price</label>
                      <select class="form-control" name="maxprice">
                        <?php echo "<option value=\"500000\" " . (500000 == $_POST["maxprice"] ? "selected=\"selected\"" : "") .">$500000</option>"; ?>
                        <?php echo "<option value=\"600000\" " . (600000 == $_POST["maxprice"] ? "selected=\"selected\"" : "") .">$600000</option>"; ?>
                        <?php echo "<option value=\"700000\" " . (700000 == $_POST["maxprice"] ? "selected=\"selected\"" : "") .">$700000</option>"; ?>
                        <?php echo "<option value=\"800000\" " . (800000 == $_POST["maxprice"] ? "selected=\"selected\"" : "") .">$800000</option>"; ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="maxprice">&nbsp;</label>
                      <input type="submit" name="submit" value="Search Again" class="btn btn-primary btn-block">
                    </div>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>
            <br>
        </div>
            <div class="container-full bottom-container" style="background-color:#e8e8e8">
        <div class="container container-pad" id="property-listings">
            <div class="row">
              <div class="col-md-12 text-center">
                  <h2 style="font-family: 'Helvetica Neue', serif;
                font-weight: lighter; ">Showing <?php echo number_of_listings($results); ?> Results for:<br> <?php echo '"'; if(!(isset($_POST["usersearch"]))){echo '';}else{echo $_POST["usersearch"];} echo '"'; ?> </h2>
                <br>
                <br>
              </div>
            </div>
                           
                <?php 
                display_formatted_results($results);
                ?>

        </div><!-- End container -->
    </div>
        
    <div class="container container-fluid text-center" style="background-color: #e7e7e7; border-color: #777; width: 100%; position: absolute;left: 0;right: 0">
        <ul>
            <li id="footer"><a href="./contact.php"style="color:#777">Contact Us</a></li>
            <li id="footer"><a href="./about.php" style="color:#777">About Us</a></li>
        </ul>
            <p class="navbar-text navbar-right" style="margin-right: 15px;">This is for demonstration purposes only. CSC648/848 San Francisco State University Team02 Milestone Properties&copy</p>
        
    </div>



                <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    </body>
</html>