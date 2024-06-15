<div class="col-md-4">
    <div class="card">
        <div class="card-body">
            <div class="row d-flex justify-content-evenly">
                <div class="col-md-4 col-12">
                    <img class="rounded img-fluid" src="{{\Illuminate\Support\Facades\Storage::url($category->file)}}" alt="">
                </div>
                <div class="col-md-8 col-12">
                    <h6>{{$category->caption}}</h6>
                    <div class="text-end">
                        <a href="#" onclick="showEdit('{{$category->id}}','{{$category->caption}}')" class="btn btn-primary btn-sm me-2">Edit Caption</a>

                        <a href="/gallery/remove/{{$category->id}}" class="btn btn-danger btn-sm">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

