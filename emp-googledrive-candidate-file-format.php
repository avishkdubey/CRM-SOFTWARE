<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Import Candidates</title>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <link rel="stylesheet" href="CSS\talentpool.css">
    <script src="cities.js"></script>
    <script src="only-cities.js"></script>
</head>
<style>
  .input-container {
    position: relative;
  }

  .input-container input {
    padding-right: 30px; /* Adjust as needed to make space for the icon */
  }

  .input-container i {
    position: absolute;
    top: 50%;
    right: 5px; /* Adjust as needed for desired spacing */
    transform: translateY(-50%);
  }

</style>

<body class="bg-white">
    <!-- Navbar -->
    <nav class="navbar navbar-primary sticky-top p-1" style="background-color: #313949;">
        <div class="row">
            <a class="navbar-brand d-flex" href="admindash.html" style="color: black; margin-right:20px;">
                <img src="web-images/cropped-workart-white-500-2.png" style="width: 5rem; margin-bottom: 25px;" alt="">
                <h4 style="margin-left: 20px; color: white; margin-top: 8px;">Import Candidates</h4>
            </a>
        </div>
        <div class="menu-icon p-3">
            <ul class="navbar-nav" id="list">
                <li class="nav-item">
                    <a style="color: #ffffff;" class="nav-link support-link" href="emp-upload-candidate.php"><i class="fa fa-solid fa-angle-left fa-xl" style="color: #ffffff; background-color: transparent;"></i>&nbsp;Back</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Navbar -->
    <div class="container">
        <center>
            <h3 class="mt-2">CHOOSE TYPE</h3>
        </center>
        <hr>
        <form action="">
            <div class="row p-3">
                <center>
                <div class="col-md-5 p-3 m-5 bg-light" style="border:2px solid black; border-radius:5px;">
                    <center>
                        <h5>Workart Format</h5>
                        <p style="font-size:1.8vh;">Format your google sheet according to Workart format</p>
                        <div class="input-container">
                            <input class="form-control" type="text">
                            <i class="fa-solid fa-link" style="color: #2734ec;"></i>
                        </div>
                    </center>
                </div>
                <div class="col-md-5 p-3 bg-light m-2" style="border:2px solid black; border-radius:5px;">
                    <center>
                        <h5>Custom Format</h5>
                        <p style="font-size:1.8vh;">You have to map your google sheet headers with our candidate columns</p>
                        <div class="input-container">
                            <input class="form-control" type="text">
                            <i class="fa-solid fa-link" style="color: #2734ec;"></i>
                        </div>
                    </center>
                </div>
                </center>
            </div>
        </form>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">


</body>

</html>