<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
@include('layouts.navsidebar')
<div id="layoutSidenav_content">
    <main>

        <div class="container-fluid px-4">
            <div class="card mb-4">
                <div class="card-header-custom">
                    <i class="fas fa-table me-1"></i>
                    Produse
                </div>
                <div class="filters">
                    <div class="form-group">
                        <label for="productName">Product Name:</label>
                        <input type="text" id="productName" name="productName" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="startDate">Start Date:</label>
                        <input type="date" id="startDate" name="startDate" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="endDate">End Date:</label>
                        <input type="date" id="endDate" name="endDate" class="form-control">
                    </div>

                    <div class="form-group">
                        <button id="applyFilters" class="btn btn-primary">Apply Filters</button>
                        <button id="resetFilters" class="btn btn-secondary">Reset Filters</button>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-container">
                        <table class="table">
                            @include('dashboard.user.produse.modal-editare-produs')
                            @include('dashboard.user.produse.modal-stergere-produs')
                            <thead>
                            <tr>
                                <th>Nume produs</th>
                                <th>Valoare totala produs</th>
                                <th>Actiuni</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($produse as $produs)
                            <tr>
                                <td>{{$produs->nume_produs}}</td>
                                <td>{{$produs->valoare_produs}} (RON)</td>
                                <td>
                                    <button class="btn btn-primary edit-btn" data-id="{{$produs->id}}" data-nume_produs="{{ $produs->nume_produs }}" data-valoare_produs="{{ $produs->valoare_produs }}"  data-bs-toggle="modal" data-bs-target="#editModal">Editeaza</button>
                                    <button class="btn btn-danger btn-delete" data-id="{{ $produs->id }}">Sterge</button>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
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
        $('.edit-btn').click(function() {
            var produsId = $(this).data('id');
            var nume_produs = $(this).data('nume_produs');
            var valoare_produs = $(this).data('valoare_produs');
            $('#produsForm').attr('action', '/user/editare-produs/' + produsId);

            $('#editModal #nume_produs').val(nume_produs);
            $('#editModal #valoare_produs').val(valoare_produs);
            $('#editModal').modal('show');
        });

        $('#produsForm').submit(function(e) {
            e.preventDefault();

            var form = $(this);
            var formData = form.serialize();

            $.ajax({
                url: form.attr('action'),
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
        $('.btn-delete').click(function() {
            var produsId = $(this).data('id');
            $('#deleteModal').modal('show');

            $('.btn-confirm-delete').off('click').on('click', function() {
                var deleteButton = $(this);
                deleteButton.prop('disabled', true);

                $.ajax({
                    url: '/user/stergere-produs/' + produsId,
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $('#mesajRaspuns').empty();

                        if (response.hasOwnProperty('success') && response.success === 1) {
                            var successMessage = $('<div>').addClass('alert alert-success').text(response.message);
                            $('#mesajRaspuns').append(successMessage);
                            setTimeout(function() {
                                window.location.href = '/user/lista-produse';
                            }, 1500);
                        }
                        else if (response.hasOwnProperty('error') && response.error === 1) {
                            var errorMessage = $('<div>').addClass('alert alert-danger').text(response.message);
                            $('#mesajRaspuns').append(errorMessage);
                        }
                        else {
                            var errorMessage = $('<div>').addClass('alert alert-danger').text('A apărut o eroare. Te rog încearcă din nou.');
                            $('#mesajRaspuns').append(errorMessage);
                        }
                    },
                    error: function(xhr, status, error) {
                        $('#mesajRaspuns').empty();
                        $('#mesajRaspuns').text('A apărut o eroare. Te rog încearcă din nou.');
                    },
                    complete: function() {
                        deleteButton.prop('disabled', false);
                    }
                });
            });
        });
    });
</script>
</body>
</html>
