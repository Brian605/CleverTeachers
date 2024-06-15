<div class="modal fade" id="newUnit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    New Unit
                </h4>
                <button type="button" class="btn btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="/unit/create">
                    <input type="hidden" name="courseId" value="{{$course->id}}">
                    @csrf
                    <div class="mb-4">
                        <label class="form-label" for="name">Unit Name</label>
                        <input class="form-control" name="name" placeholder="e.g Introduction to quantum mechanics" id="name" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="icon">Cat 1 Marks</label>
                        <input type="number" step="0.1" class="form-control" name="cat1" id="icon" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="icon">Cat 2 Marks</label>
                        <input type="number" step="0.1" class="form-control" name="cat2" id="icon" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="icon">Main Exam Marks</label>
                        <input type="number" step="0.1" class="form-control" name="cat3" id="icon" required>
                    </div>
                    <div class="mb-4 text-end">
                        <button class="btn btn-danger">Add Unit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
