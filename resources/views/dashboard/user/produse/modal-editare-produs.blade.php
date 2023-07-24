<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Editare Produs</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
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
                    <button type="submit" class="btn btn-primary">Actualizare</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anulare</button>
                </form>
            </div>
        </div>
    </div>
</div>
