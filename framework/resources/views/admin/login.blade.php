<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <h2 style="margin-top:50px"> Admin Login </h2>
                <form>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control-plaintext" id="staticEmail" placeholder="email@example.com">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group row  justify-content-end">
                        <div class="col-sm-2">
                            <button class="btn btn-success">Login</button>
                        </div>
                    </div>
                </form>

                <div class="form-group row">
                    <div class="col-sm-6">
                        <button class="btn btn-primary" style="width:100%">Login Facebook</button>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{route('redirect-to-provider')}}">
                            <button class="btn btn-danger" style="width:100%">Login Google</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>