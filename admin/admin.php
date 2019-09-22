<!DOCTYPE html>
 <html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../style.css">
        <link rel="stylesheet" href="../customstyle.css">
        <style> 
            .flex-container{
                height:100vh;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .g-bg-color{
                background: #28AB87;
            }
            .admin-input{
                width: 250px;
                height: 45px;
                margin: 10px;
                outline: none;
                border-radius: 10px;
                border: 1px solid gray;
                padding: 10px;
                transition: ease-in-out, width .35s ease-in-out;
            }
            .admin-input:focus{
                width: 270px;
                border: 2px solid #696969;
            }
            #submit{
                margin: 20px;
                width: 100px;
                padding: 10px;
                outline: none;
                background: #28AB87;
                color: white;
                border: none;
                border-radius: 10px;
            }
        </style>
    </head>
    <body class="g-bg-color">
        <div class="flex-container">
            <div class="d-flex md-d-flex md-flex-col white  b-rad-2">
                <div class="p-2 text-center b-rad-2" style="background:#e0e0e0;">
                    <img width="300" src="../user/userimages/HAHA.jpeg" alt="">
                </div>
                <!-- Login Form -->
                <div class="min-h-100 white b-rad-2 p-2">
                    <div style="width:400px;">
                        <div class="text-center">
                            <h4 style="color:gray" >Welcome Back!</h4>
                        </div>
                        <div class="mt-2">
                            <form id="login-form">
                                <div class="text-center">
                                    <input id="login-email" class="admin-input" type="email" placeholder="Enter Email Address...">
                                </div>
                                <div class="text-center">
                                    <input id="login-password" class="admin-input" type="password" placeholder="Password...">
                                </div>
                                <div class="text-center">
                                    <input id="submit" type="submit">
                                </div>
                            </form>
                            <hr>
                            <div class="text-center mt-1">
                                <a style="color:gray;" class="text-deco-none" href="">Forget Password?</a>
                            </div>
                            <p style="color:red" class="error text-center"></p>
                        </div>
                    </div>
                </div>
                <!-- Login Ends -->
            </div>
        </div>
        <!-- The core Firebase JS SDK is always required and must be listed first -->
        <script src="https://www.gstatic.com/firebasejs/6.6.2/firebase-app.js"></script>
        <script src="https://www.gstatic.com/firebasejs/6.6.1/firebase-auth.js"></script>

        <!-- TODO: Add SDKs for Firebase products that you want to use
            https://firebase.google.com/docs/web/setup#available-libraries -->

        <script>
            // Your web app's Firebase configuration
            var firebaseConfig = {
                apiKey: "AIzaSyC5BzwjPQ9z6y1WpcNtha0Xh3NLpTh7V5w",
                authDomain: "computer-store-73c89.firebaseapp.com",
                databaseURL: "https://computer-store-73c89.firebaseio.com",
                projectId: "computer-store-73c89",
                storageBucket: "",
                messagingSenderId: "669609836548",
                appId: "1:669609836548:web:3a0ced9c1d413fd475b551"
            };
            // Initialize Firebase
            firebase.initializeApp(firebaseConfig);
            //make auth & firestore refereneces
            const auth = firebase.auth();
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script src="js/auth.js"></script>
    </body>
 </html>