@include('layouts.head')
<body class="bg-gradient-primary" cz-shortcut-listen="true">
    <div class="container d-flex flex-column align-items-center justify-content-center min-vh-100">
        <div class="row justify-content-center w-100">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-flex">
                                <div class="flex-grow-1 bg-login-image d-flex justify-center align-items-center m-2">
                                    <img class="img-fluid h-50 m-auto" src="logo.png" alt="" srcset="">
                                </div>
                            </div>
                            <div class="col-lg-6 p-5">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4">Welcome to <br>BullWhip Task Team 4!</h4>
                                    </div>
                                    <form class="user py-3">
                                        @csrf
                                        <div class="mb-3"><input class="form-control form-control-user" type="text" id="exampleInputUsername" aria-describedby="emailHelp" placeholder="Username" name="username"></div>
                                        <div class="mb-3"><input class="form-control form-control-user" type="password" id="exampleInputPassword" placeholder="Password" name="password"></div>
                                       <button class="btn btn-primary d-block btn-user w-100 my-3" type="submit">Login</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>