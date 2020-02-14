<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tweet@cademie!</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="jquery.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <script src="script.js"></script>
</head>

<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Tweet@!</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#">Messages</a></li>
                    <li><a href="#" onclick="switchTheme()">Theme</a></li>
                </ul>
                <form action="tweetQuery.php" class="navbar-form navbar-right" role="search" method="GET">
                    <div class="form-group input-group">
                        <input type="text" class="form-control" placeholder="Search.." name="search">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                    </div>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container text-center">
        <div class="row">
            <div class="col-sm-10">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default text-left">
                            <div class="panel-body">
                                <p contenteditable="true">How you doin'?</p>
                                <button type="button" class="btn btn-default btn-sm">
                                    <span class="glyphicon glyphicon-picture"></span> Photo
                                </button>
                                <button type="button" style="float: right" class="btn btn-primary btn-sm">
                                    <span class="glyphicon glyphicon-send"></span>
                                    Tweet!
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php

                $servername = "localhost";
                $username = "admin";
                $dbname = "tweet_academy";
                $search = $_GET['search'];

                try {
                    $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $username);
                    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $tweetQuery = $connection->prepare("SELECT *
                    FROM
                        tweet
                        LEFT JOIN user ON user.id_user = tweet.id_autor
                        WHERE `content_tweet` LIKE '%$search%'");
                    $tweetQuery->execute();
                    if ($tweetQuery->rowCount() >= 1) {
                        $tweetValues = $tweetQuery->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($tweetValues as $tweetValue)
                        echo "<div class=\"row\">
                        <div class=\"col-sm-3\">
                            <div class=\"well\">
                            <p>" . $tweetValue['name'] . "</p>
                            <span class=\"glyphicon glyphicon-user\"></span>
                            </div>
                            </div>
                    <div class=\"col-sm-9\">
                        <div class=\"well\">
                            <p class='tweet'>" . $tweetValue['content_tweet'] . "</p>
                            <button class='btn'><span class='glyphicon glyphicon-thumbs-up'></button>
                            <button class='btn'><span class='glyphicon glyphicon-retweet'></button>
                        </div>
                    </div>
                </div>";
                            
                    } else {
                        echo 'No tweets found!';
                    }
                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }

                $connection = null;
                ?>
                
            </div>
            <div class="col-sm-2 well">
                <p>Trending this week:</p>
                <div class="thumbnail">
                    <p><strong>#Bernie<wbr>OrBust</strong></p>
                    <p>Thu. 20 February 2020</p>
                    <button class="btn btn-primary">Tweet</button>
                </div>
                <div class="thumbnail">
                    <p><strong>#Bojack<wbr>Finale</strong></p>
                    <p>Sat. 22 February 2020</p>
                    <button class="btn btn-primary">Tweet</button>
                </div>
                <div class="thumbnail">
                    <p><strong>#WAC<wbr>Rocks</strong></p>
                    <p>Sun. 23 February 2020</p>
                    <button class="btn btn-primary">Tweet</button>
                </div>
            </div>
        </div>
    </div>
    <footer class="container-fluid text-center">
        <p><span class="glyphicon glyphicon-copyright-mark"></span> Copyright of W@C 2020. Suggestions and complaints <a href="Milton.jpg">here</a>.</p>
    </footer>
</body>

</html>