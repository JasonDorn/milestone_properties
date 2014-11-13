<?php include 'navbar.php';    ?>
<?php include_once 'functions.php'; ?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
        <title>Listings Page</title>
        <style>
            .breadcrumb{
                background: none;
                text-align: left;
            }
            body{padding-top:4%;}
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <ol class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="index.php">Search</a></li>
                        <li class="active">Listings</li>
                    </ol>
                </div>
                <div class="col-md-7 text-left">
                    <h2>Search Results</h2>
                    <p>For X results</p>
                </div>
            </div>
            <div class="row">
                <nav class="navbar navbar-default"><ul class="nav navbar-nav">
                    <li><a href="#">Price</a></li>
                    <li><a href="#">SqFt</a></li>
                    <li><a href="#">Walkscore</a></li>
            </ul></nav>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <?php
        $connection = connect_to_mysql();
        $results = milestone_search($connection);
        display_search_results($results);
        
        close_mysql_connection($connection);
        ?>
                    
                </div>
                <div class="col-md-3">
                    <ul>
                        <li>Address</li>
                        <li>Square Feet</li>
                        <li>Schools Nearby</li>
                        <li>Bedrooms</li>
                        <li>Bathrooms</li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <ul>
                        <li>Price</li>
                        <li>Walkscore</li>
                        <li>Schools Nearby</li>
                        <li>Details</li>
                    </ul>
                </div>
            </div>
        </div>
                <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    </body>
</html>