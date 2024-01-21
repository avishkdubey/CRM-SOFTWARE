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
                    <a style="color: #ffffff;" class="nav-link support-link" href="admindash.html"><i class="fa fa-solid fa-angle-left fa-xl" style="color: #ffffff; background-color: transparent;"></i>&nbsp;Back</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Navbar -->


    <div class="container-fluid bg-white p-2">
        <div class="row p-3 mt-2">
            <div class="col-md-6">
                <a href="emp-upload-candidate.php">
                    <button class="btn" style="background-color: #313949; color: white; width:30%;">
                        <i class="fa-solid fa-upload" style="color: #ffffff;"></i>&nbsp;&nbsp;Upload Candidate
                    </button>
                </a>
            </div>
        </div>
    </div>
    <hr>
    <div class="container-fluid bg-white">
        
        <div class="row p-5">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Name/Link</th>
                        <th scope="col">Total Candidates</th>
                        <th scope="col">Imported Candidates</th>
                        <th scope="col">Fail to Upload</th>
                        <th scope="col">Queue Timestamp</th>
                        <th scope="col">Status</th>
                        <th scope="col">Remove Task</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>



                    </tr>


                </tbody>
            </table>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

</body>

</html>