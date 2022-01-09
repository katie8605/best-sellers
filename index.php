<?php
require_once('Models/Api.php');
$api = New Api;
$data = $api->getBookLists();
?>

<!doctype html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Best Sellers</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;700&display=swap" rel="stylesheet">
        <link href="https://code.jquery.com/ui/1.13.0/themes/redmond/jquery-ui.css" rel ="stylesheet">
        <link href="styles.css" rel="stylesheet">
    </head>

    <body>
        <div class="text-center">
            <h1 style="color:white">
                <span class="display-6 fw-light darker-blue-font" style="margin-left:-40px;">The New York Times</span> 
                <span style="margin-top:-18px;" class="text-uppercase fw-bold display-3 d-block">Best Sellers</span>
                <span class="fw-bold text-uppercase p-1 position-relative bg-light" style="font-size:15px; color:#b53790; letter-spacing:.2rem; top:-30px; left:150px;">
                    Hardcover Fictions
                </span>
            </h1>
            <p class="darker-blue-font">To purchase the book (from Amazon), click on the book title.</p>   
        </div>

        <div class="list-section">
            <?php include_once('list.php'); ?>
        </div>

        <br />
        <br />

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.rawgit.com/nnattawat/flip/master/dist/jquery.flip.min.js"></script>
        <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
        <script type="text/javascript" src="list.js"></script>
    </body>
</html>