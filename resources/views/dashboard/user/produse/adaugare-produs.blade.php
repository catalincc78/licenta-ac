<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB User</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
    @include('layouts.navsidebar')
    <div id="layoutSidenav_content">
    <main>
        <div class="container adaugare-produs-container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card text-center">
                        <div class="card-header card-header-custom">
                            <h5 class="card-title">Adaugare Produs</h5>
                        </div>
                        <div class="card-body">
                            <form id="produsForm">
                                @csrf

                                <div id="mesajRaspuns"></div>

                                <div class="form-group">
                                    <label for="nume_produs" class="form-label-bold">Nume produs:</label>
                                    <input type="text" id="nume_produs" name="nume_produs" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="cantitate" class="form-label-bold">Cantitate:</label>
                                    <input type="number" id="cantitate" name="cantitate" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="valoare_produs" class="form-label-bold">Valoare produs:</label>
                                    <input type="number" step="0.01" id="valoare_produs" name="valoare_produs" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Adauga produs</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include('layouts.footer')
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="js/scripts.js"></script>
    <script>
        $(document).ready(function() {
            $('#produsForm').submit(function(event) {
                event.preventDefault();

                var formData = $(this).serialize();
                console.log(formData);

                $.ajax({
                    url: '/user/submit-adaugare',
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        $('#mesajRaspuns').empty();
                        var successMessage = $('<div>').addClass('alert alert-success').text(response.message);
                        $('#mesajRaspuns').append(successMessage);
                        setTimeout(function() {
                            window.location.href = '/user/lista-produse';
                        }, 1500);

                    },
                    error: function(xhr, status, error) {
                        $('#mesajRaspuns').empty();
                        var response = JSON.parse(xhr.responseText);

                        if (response.hasOwnProperty('message')) {
                            var errorMessage = $('<div>').addClass('alert alert-danger');

                            $.each(response.message, function(index, message) {
                                errorMessage.append($('<li>').text(message));
                            });

                            $('#mesajRaspuns').append(errorMessage);
                        } else {
                            $('#mesajRaspuns').text('An error occurred. Please try again.');
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>
