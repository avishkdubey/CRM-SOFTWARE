<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="loader.css">
    <link rel="stylesheet" href="CSS\admin-login-page.css">
</head>

<body>
    <div class="loader loader-double" style="width: 100%; height: inherit;"></div>
    <!-- Navbar -->
    <nav class="navbar navbar-primary sticky-top p-1" style="background-color: #000000;">
        <div class="row">
            <a class="navbar-brand d-flex" href="https://workart.in" style="color: black; margin-left:20px;">
                <img src="web-images/cropped-workart-white-500-2.png" style="width: 5rem; margin-bottom: 25px;" alt="">
            </a>
        </div>
        <div class="menu-icon p-3">
            <ul class="navbar-nav" id="list">
                <li class="nav-item">
                    <a href="https://workart.in/">Go to Website</a>
                </li>
            </ul>
        </div>
    </nav>
    <section class="container">
        <div class="login-container">
            <div class="circle circle-one"></div>
            <div class="form-container">
                <img src="web-images\fun-3d-cartoon-illustration-indian-businessman-removebg-preview.png" alt="illustration" class="illustration" />
                <h1 class="opacity">ADMIN LOGIN</h1>
                <form id="login-form" method="post">
                    <input type="email" name="email" placeholder="EMAIL" required />
                    <input type="password" name="password" placeholder="PASSWORD" required />
                    <button type="submit" class="opacity">SUBMIT</button>
                </form>
                <div class="register-forget opacity">
                    <a href="">FORGOT PASSWORD</a>
                </div>
            </div>
            <div class="circle circle-two"></div>
        </div>
        <div class="theme-btn-container"></div>
    </section>






    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        const themes = [{
                background: "#1A1A2E",
                color: "#FFFFFF",
                primaryColor: "#0F3460"
            },
            {
                background: "#461220",
                color: "#FFFFFF",
                primaryColor: "#E94560"
            },
            {
                background: "#192A51",
                color: "#FFFFFF",
                primaryColor: "#967AA1"
            },
            {
                background: "#F7B267",
                color: "#000000",
                primaryColor: "#F4845F"
            },
            {
                background: "#F25F5C",
                color: "#000000",
                primaryColor: "#642B36"
            },
            {
                background: "#231F20",
                color: "#FFF",
                primaryColor: "#BB4430"
            }
        ];

        const setTheme = (theme) => {
            const root = document.querySelector(":root");
            root.style.setProperty("--background", theme.background);
            root.style.setProperty("--color", theme.color);
            root.style.setProperty("--primary-color", theme.primaryColor);
            root.style.setProperty("--glass-color", theme.glassColor);
        };

        const displayThemeButtons = () => {
            const btnContainer = document.querySelector(".theme-btn-container");
            themes.forEach((theme) => {
                const div = document.createElement("div");
                div.className = "theme-btn";
                div.style.cssText = `background: ${theme.background}; width: 25px; height: 25px`;
                btnContainer.appendChild(div);
                div.addEventListener("click", () => setTheme(theme));
            });
        };

        displayThemeButtons();
    </script>
    <script>
        $(document).on('submit', '#login-form', function(e) {
            e.preventDefault();
            $('.loader').addClass('is-active');
            $.ajax({
                url: "admin-login.php",
                type: "post",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function(response) {
                    $('.loader').removeClass('is-active');

                    if (response == '1') {
                        window.location = "admindash.php";
                    } else if (response == '3') {

                        alert('Incorrect Email or Password');

                    }
                },
                error: function() {
                    $('.loader').removeClass('is-active');
                    alert('An error occurred during the submiting process ');
                }
            });
        });
    </script>
</body>

</html>