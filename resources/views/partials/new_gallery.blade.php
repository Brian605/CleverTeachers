<div class="modal fade" id="newSchool">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    New Category
                </h4>
                <button type="button" class="btn btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="/gallery/create" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label class="form-label" for="name">Images (10 Maximum)</label>
                        <input class="form-control" onchange="checkFiles(this.files)"  type="file" multiple maxlength="10" accept="image/*" name="name[]"  id="name" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="icon">Caption</label>
                        <input type="text" class="form-control" name="icon" id="icon" required>
                    </div>
                    <div class="mb-4 text-end">
                        <button class="btn btn-danger">Add To Gallery</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('extra')
    <script>
        function checkFiles(files) {
            if(files.length>10) {
                alert("length exceeded; files have been truncated");

                let list = new DataTransfer;
                for(let i=0; i<10; i++)
                    list.items.add(files[i])

                document.getElementById('name').files = list.files
            }
        }
    </script>
@endpush
