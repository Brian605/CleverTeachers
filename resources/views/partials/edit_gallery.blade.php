<div class="modal fade" id="editSchool">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="editTitle">
                    New Category
                </h4>
                <button type="button" class="btn btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="/gallery/change">
                    <input type="hidden" name="id" id="categId">
                    @csrf
                    <div class="mb-4">
                        <label class="form-label" for="edname">Caption</label>
                        <input class="form-control" name="name"  id="edname" required>
                    </div>

                    <div class="mb-4 text-end">
                        <button class="btn btn-danger">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

