<div class="col-md-4">
    <div class="card">
        <div class="card-body">
            <div class="row d-flex justify-content-evenly">
                <div class="col-md-2 col-2">
                    <img width="48" height="48" class="rounded avatar avatar-md" src="{{$category->icon}}" alt="">
                </div>
                <div class="col-md-10 col-10">
                    <h6>{{$category->name}}</h6>
                    <div class="text-end">
                        <a href="#" onclick="showEdit('{{$category->id}}','{{$category->name}}','{{$category->icon}}')" class="btn btn-primary btn-sm me-2">Edit</a>

                        <a href="/categories/remove/{{$category->id}}" class="btn btn-danger btn-sm">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

