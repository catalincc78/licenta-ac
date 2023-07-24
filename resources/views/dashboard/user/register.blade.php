<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Register</h3></div>
                                    <div class="card-body">
                                        <form action="{{ route('user.create') }}" method="POST">
                                            @if(Session::get('success'))
                                            <div class="alert alert-success"> {{ Session::get('success') }}</div>
                                            @endif
                                            @if(Session::get('fail'))
                                            <div class="alert alert-danger"> {{ Session::get('fail') }}</div>
                                            @endif
                                            @csrf
                                            <div class="form-floating mb-3">
                                                <div>
                                                    <label for="category">Tipul de user:</label>
                                                    <select id="category" name="category" onchange="toggleFields()">
                                                        <option value="1">Persoana fizica</option>
                                                        <option value="2">Companie</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input name="username" class="form-control" id="inputUsername" type="text" placeholder="Username" />
                                                <label>Username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input name="first_name" class="form-control" id="inputFirstName" type="text" placeholder="Prenume" />
                                                <label>Prenume</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input name="last_name" class="form-control" id="inputLastName" type="text" placeholder="Nume" />
                                                <label>Nume</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input name="nume_companie" class="form-control" id="inputCompanyName" type="text" placeholder="Nume Companie" disabled />
                                                <label>Nume Companie</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input name="password" class="form-control" id="inputPassword" type="password" placeholder="Parola" />
                                                <label>Parola</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input name="cpassword" class="form-control" id="inputConfirmPassword" type="password" placeholder="Confirm Password"/>
                                                <label for="inputConfirmPassword">Confirm Password</label>
                                            </div>

                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button type="submit" class="btn btn-primary">Register</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="{{ route('user.login') }}">Already have an account? Login Here</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
        <script src="js/scripts.js"></script>
        <script>
                function toggleFields() {
                    var categorySelect = document.getElementById("category");
                    var companyNameField = document.getElementById("inputCompanyName")
                    var firstNameField = document.getElementById("inputFirstName");
                    var lastNameField = document.getElementById("inputLastName");

                    if (categorySelect.value === "1") {
                        companyNameField.disabled = true;
                        firstNameField.disabled = false;
                        lastNameField.disabled = false;
                    } else {
                        companyNameField.disabled = false;
                        firstNameField.disabled = true;
                        lastNameField.disabled = true;
                    }
                }

                document.getElementById("registrationForm").addEventListener("submit", function (event) {
                    event.preventDefault();
                });
        </script>
    </body>
</html>
