<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Import Candidates</title>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="loader.css">

</head>
<style>
    .drop-container {
        position: relative;
        display: flex;
        gap: 10px;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 200px;
        padding: 20px;
        border-radius: 10px;
        border: 2px dashed #555;
        color: #444;
        cursor: pointer;
        transition: background .2s ease-in-out, border .2s ease-in-out;
    }

    .drop-container:hover,
    .drop-container.drag-active {
        background: #eee;
        border-color: #111;
    }

    .drop-container:hover .drop-title,
    .drop-container.drag-active .drop-title {
        color: #222;
    }

    .drop-title {
        color: #444;
        font-size: 20px;
        font-weight: bold;
        text-align: center;
        transition: color .2s ease-in-out;
    }

    input[type=file] {
        width: 350px;
        max-width: 100%;
        color: #444;
        padding: 5px;
        background: #fff;
        border-radius: 10px;
        border: 1px solid #555;
    }

    input[type=file]::file-selector-button {
        margin-right: 20px;
        border: none;
        background: #084cdf;
        padding: 10px 20px;
        border-radius: 10px;
        color: #fff;
        cursor: pointer;
        transition: background .2s ease-in-out;
    }

    input[type=file]::file-selector-button:hover {
        background: #0d45a5;
    }
</style>

<body class="bg-white">
    <!-- Navbar -->
    <nav class="navbar navbar-primary sticky-top p-1" style="background-color: #313949;">
        <div class="row">
            <a class="navbar-brand d-flex" href="employeedash.php" style="color: black; margin-right:20px;">
                <img src="web-images/cropped-workart-white-500-2.png" style="width: 5rem; margin-bottom: 25px;" alt="">
                <h4 style="margin-left: 20px; color: white; margin-top: 8px;">Import Candidates</h4>
            </a>
        </div>
        <div class="menu-icon p-3">
            <ul class="navbar-nav" id="list">
                <li class="nav-item">
                    <a style="color: #ffffff;" class="nav-link support-link" href="mp-upload-candidate.php"><i class="fa fa-solid fa-angle-left fa-xl" style="color: #ffffff; background-color: transparent;"></i>&nbsp;Back</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Navbar -->
    <div class="container">
        <center>
            <h3 class="mt-2">CHOOSE TYPE</h3>
        </center>
        <div class="row p-3 m-3" style="border-style: groove;">
            <form method="post" id="employee-details" enctype="multipart/form-data">
                <center>
                    <h5>Workart Format</h5>
                    <p style="font-size:1.8vh;">Format your excel sheet according to Workart format</p>
                    <p style="font-size:1.8vh;">Upload CSV/XLS/XLSX in Workart format</p>
                    <p style="font-size:1.8vh;"><a href="web-files/workartImportFormat.csv" download="workartImportFormat.csv">CLICK HERE</a>
                        to view the Workart excel sheet format.</p>
                </center>
                <center>
                    <input type="file" id="workart_format" name="workart_format" accept=".csv" required>
                    <input type="submit" class="btn btn-primary" style="margin-left: 1vw;" name="import" value="Submit Workart Format">
                </center>

            </form>
        </div>

        <div class="row p-3 m-3" style="border-style: groove;">
        <form method="post" id="custom-format" enctype="multipart/form-data">
            <div class="row" style="margin-top:3vw; margin-left:10vw; margin-right:10vw;">
                <center>
                    <h5>Custom Format</h5>
                    <p style="font-size:1.8vh;">You have to map your sheet headers with our candidate columns</p>
                    <p style="font-size:1.8vh;">Upload CSV/XLS/XLSX in your custom format</p>
                </center>
                <center>
                    <input type="file" id="images" accept="image/*" required>

                    <input type="submit" class="btn btn-primary" style="margin-left: 1vw;" value="Submit Custom Format">
                </center>
            </div>
        </form>
        </div>
        <div class="row p-3 m-3" style="border-style: groove;">
            <form method="post" id="zip-format">
                <div class="row" style="margin-top:3vw; margin-left:10vw; margin-right:10vw;">
                    <center>
                        <h5>Zip Format</h5>
                        <p style="font-size:1.8vh;">Create a zip file of resumes and upload here</p>
                        <p style="font-size:1.8vh;">Upload ZIP file format</p>
                    </center>
                    <center>
                        <input type="file" id="images" accept="image/*" required>
                        <input type="submit" class="btn btn-primary" style="margin-left: 1vw;" value="Submit Zip Format">
                    </center>
                </div>
            </form>
        </div>
        


        <!-- ____________________________________________________________________________________________________________________________________________________________________ -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Add this script at the end of your HTML file -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



        <script>
            $(document).on('submit', '#employee-details', function(e) {
                e.preventDefault();
                $('.loader').addClass('is-active');
                $.ajax({
                    url: "emp-insert-workart-format.php",
                    type: "post",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        $('.loader').removeClass('is-active');

                        if (data == '1') {
                            alert("Successfully Submitted...");
                            $('#employee-details')[0].reset();
                            window.location = "employee_import_candidate.php";
                        } else if (data == '2') {
                            alert("Error");
                        }
                    },
                    error: function() {
                        alert("An error occurred during the submission.");
                    }
                });
            });
        </script>

</body>

</html>