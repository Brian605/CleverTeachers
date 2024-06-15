<div class="modal fade" id="newSchool">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    New Examination Body
                </h4>
                <button type="button" class="btn btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="/examiners/create">
                    @csrf
                    <div class="mb-4">
                        <label class="form-label" for="name">Name</label>
                        <input class="form-control" name="name" placeholder="e.g KASNEB,KNEC" id="name" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="icon">Logo url</label>
                        <input type="url" class="form-control" name="icon" id="icon" required>
                    </div>
                    <div class="mb-4 text-end">
                        <button class="btn btn-danger">Add Examiner</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
