<div class="modal fade" id="newSchool">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    New Study Mode
                </h4>
                <button type="button" class="btn btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="/modes/create">
                    @csrf
                    <div class="mb-4">
                        <label class="form-label" for="name">Name</label>
                        <input class="form-control" name="name" placeholder="Online,Offline,PartTime,FullTime" id="name" required>
                    </div>

                    <div class="mb-4 text-end">
                        <button class="btn btn-danger">Add Study Mode</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
