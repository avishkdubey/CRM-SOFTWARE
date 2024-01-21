<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="loader.css">
    <link rel="stylesheet" href="CSS\login.css">
</head>

<body>
    <div class="loader loader-double" style="width: 100%; height: inherit;"></div>
    <nav class="navbar navbar-primary sticky-top p-1" style="background-color: #000000;">
        <div class="row">
            <a class="navbar-brand d-flex" href="https://workart.in" style="color: black; margin-left:20px;">
                <img src="web-images/cropped-workart-white-500-2.png" style="width: 5rem; margin-bottom: 25px;" alt="">
            </a>
        </div>
        <div class="menu-icon p-3">
            <ul class="navbar-nav" id="list">
                <li class="nav-item">
                    <a style="color: #ffffff;" class="nav-link support-link" href="joinUs.html"><i
                            class="fa fa-solid fa-angle-left fa-xl"
                            style="color: #ffffff; background-color: transparent;"></i>&nbsp;Back</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid p-0">
        <div class="row">

            <div class="col-md-3">
                <div class="conainer-fluid" id="main">
                    <section>
                        <div class="signin">

                            <div class="content">

                                <h2>Sign In</h2>
                                <form action="" id="login-form" method="post" style="width: 100%;">
                                    <div class="form">

                                        <div class="inputBox">

                                            <input type="email" name="employee-email" required> <i>Email</i>

                                        </div>

                                        <div class="inputBox">

                                            <input type="password" name="employee-password" required> <i>Password</i>

                                        </div>

                                        <div class="links"> <a href="forgot-pass.php">Forgot Password</a>
                                            

                                        </div>

                                        <div class="inputBox">

                                            <input type="submit" value="Login">

                                        </div>

                                    </div>
                                </form>

                            </div>

                        </div>

                    </section>
                </div>
            </div>
            <div class="col-md-9" id="body"></div>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).on('submit', '#login-form', function (e) {
            e.preventDefault();
            $('.loader').addClass('is-active');
            $.ajax({
                url: "staff-login-bck.php",
                type: "post",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function (response) {
                    $('.loader').removeClass('is-active');

                    if (response == '1') {
                        window.location = "employeedash.php";
                    }
                    else if (response == '3') {

                        alert('Incorrect Email or Password');

                    }
                },
                error: function () {
                    $('.loader').removeClass('is-active');
                    alert('An error occurred during the submiting process ');
                }
            });
        });
    </script>
</body>

</html>