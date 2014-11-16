<?php include 'navbar.php'; ?>
<?php include_once 'functions.php'; ?>

<!DOCTYPE>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
        <title>Milestone Properties</title>
        <style>
        #index{  
            padding-top:80px;
        }
        .navbar-form{
            visibility: hidden;
        }
        .row{
            padding: 1%;
        }
     
        </style>
    </head>
    <body>
        
        <div class="container" id="index">
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4 text-center">
                    <h1>Milestone Properties</h1>
                    <p class="lead">Find your dream home today</p>
                </div>
                <div class="col-sm-4"></div>
            </div>
                    <div class="row">
                        <div class="col-sm-4"></div>
                    <form class="col-sm-4" action="listing.php" method="post">
                        <div class="input-group input-group-md">
                            <input name="usersearch" type="text" class="center-block form-control input-md" title="Enter search query" placeholder="Enter state, city, zip code, or address...">
                            <span class="input-group-btn"><button class="btn btn-md btn-primary" type="submit">Search</button></span>
                        </div>
                    </form>
                        <div class="col-sm-4"></div>
                </div>
            </div>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    </body>  
</html>