<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dr. Rafael Ziolkowski Guest Book</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/guestbookstyles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
            <div class="container px-5">
                <a class="navbar-brand" href="#page-top">Congrats, Rafa!</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="masthead text-center text-white">
            <div class="masthead-content">
                <div class="container px-5">
                    <h1 class="masthead-heading mb-0">Congratulations, <br> Dr. Rafael Ziolkowski!</h1>
                    <h2 class="masthead-subheading mb-0">Online Guestbook</h2>
                    <a class="btn btn-primary btn-xl rounded-pill mt-5" href="https://github.com/Kahzn/blockchainguestbook">Based loosely on blockchain. Made with love.</a>
                </div>
            </div>
            <div class="bg-circle-1 bg-circle"></div>
            <div class="bg-circle-2 bg-circle"></div>
            <div class="bg-circle-3 bg-circle"> </div>
            <div class="bg-circle-4 bg-circle"></div>
            <div class="profile-pic"><img class="img-fluid rounded-circle" src="https://www.blockchain.uzh.ch/wp-content/uploads/Rafael-Ziolkowski.jpeg" alt="..." /></div>
        </header>

        <?php



            $con = mysqli_connect("localhost", "ziolkowski_guestbook", "WcEpPGX3bsqdz3zy", "ziolkowski_guestbook");

            if (mysqli_connect_errno()) {

                printf("connection failed: %s\n", mysqli_connect_error());
                exit();
            }


            $counter = 0;
            $sql    = 'SELECT * FROM entries ORDER BY id DESC';
            $result = mysqli_query($con, $sql);

            while ($row = mysqli_fetch_assoc($result)) {
                    echo '
                    <section id="scroll">
                        <div class="container px-5">
                            <div class="row gx-5 align-items-center">
                                <div class="col-lg-6 order-lg-2">
                                    <div class="p-5"><img class="img-fluid rounded-circle" src="https://picsum.photos/200?random=' . $counter . '" alt="..." /></div>
                                </div>
                                <div class="col-lg-6 order-lg-1">
                                    <div class="p-5">
                                        <h2 class="display-4">
                                        ' . $row['title'] . '
                                        </h2>
                                        <p class ="messageText">' . $row['text'] . '</p>
                                        <p class="guestBookName" id="name1">
                                            ' . $row['name'] . '
                                        </p>
                                        <p class="entrydate" id="entrydate">
                                            ' . $row['date'] . '
                                        </p>
                                        <p class = "hashcode">
                                            previous Hash: '. $row['previous_hash'] .' <br>
                                            current hash: ' . $row['hash'] . '
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    ';

                $counter++;
            }

            mysqli_free_result($result);
            mysqli_close($con);

        ?>


        <!-- Form -->
        <section>
            <div class="container px-5 entryform">
                <form action="post.php" method="POST">
                    <label for="name" >Your name:</label><br>
                    <input type="text" id="nameInput" name="name" onInput=""><br>
                    <label for="title">Message title:</label><br>
                    <input type="title" id="title" name="title"><br>
                    <label for="message">Your message:</label><br>
                    <textarea type="textarea" id="message" name="message" placeholder="Type your message here..." rows="10" cols="100"></textarea>
                    <br>
                    <input type="submit" value="Submit">
                  </form>
            </div>
        </section>

        <!-- Footer-->
        <footer class="py-5 bg-black">
            <div class="container px-5"><p class="m-0 text-center text-white small">Copyright &copy; Your Website 2021</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
