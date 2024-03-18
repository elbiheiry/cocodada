<form class="edit-form" action="{{ route('admin.projects.edit', ['id' => $project->id]) }}" method="post"
    enctype="multipart/form-data">
    <div class="modal-body">
        <div class="row">
            {!! csrf_field() !!}
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <img src="{{ asset('storage/uploads/projects/' . $project->image) }}" class="table-img">
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label>Attach product picture</label>
                    <label class="file">
                        <input type="file" id="file" aria-label="File browser example" name="image"
                            class="form-control">
                        <span class="file-custom"></span>
                    </label>
                    <span class="text-danger">Image size 315*210</span>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label>Product code</label>
                    <input class="form-control" type="text" name="code" value="{{ $project->code }}">
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label>Product price</label>
                    <input class="form-control" type="text" name="price" value="{{ $project->price }}">
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label>Product name in english</label>
                    <input class="form-control" type="text" name="name_en" value="{{ $project->english()->name }}">
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label>Product name in arabic</label>
                    <input class="form-control" type="text" name="name_ar" value="{{ $project->arabic()->name }}">
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label>Product size in english</label>
                    <input class="form-control" type="text" name="size_en" value="{{ $project->english()->size }}">
                    <span class="text-danger">Please note you can leave this input as null</span>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label>Product size in arabic</label>
                    <input class="form-control" type="text" name="size_ar" value="{{ $project->arabic()->size }}">
                    <span class="text-danger">Please note you can leave this input as null</span>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label>Product featuring in english</label>
                    <input class="form-control" type="text" name="featuring_en"
                        value="{{ $project->english()->featuring }}">
                    <span class="text-danger">Please note you can leave this input as null</span>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label>Product featuring in arabic</label>
                    <input class="form-control" type="text" name="featuring_ar"
                        value="{{ $project->arabic()->featuring }}">
                    <span class="text-danger">Please note you can leave this input as null</span>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label>Product description in english</label>
                    <textarea class="form-control" name="description_en">{{ $project->english()->description }}</textarea>
                    <span class="text-danger">Please note you can leave this input as null</span>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label>Product description in arabic</label>
                    <textarea class="form-control" name="description_ar">{{ $project->arabic()->description }}</textarea>
                    <span class="text-danger">Please note you can leave this input as null</span>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label>Product activities in english</label>
                    <textarea class="form-control" name="activities_en">{{ $project->english()->activities }}</textarea>
                    <span class="text-danger">Please note you can leave this input as null</span>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label>Product activities in arabic</label>
                    <textarea class="form-control" name="activities_ar">{{ $project->arabic()->activities }}</textarea>
                    <span class="text-danger">Please note you can leave this input as null</span>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label>Product scenario in english</label>
                    <textarea class="form-control" name="scenario_en">{{ $project->english()->scenario }}</textarea>
                    <span class="text-danger">Please note you can leave this input as null</span>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label>Product scenario in arabic</label>
                    <textarea class="form-control" name="scenario_ar">{{ $project->arabic()->scenario }}</textarea>
                    <span class="text-danger">Please note you can leave this input as null</span>
                </div>
            </div>
        </div>

        <div class="modal-footer text-center">
            <button type="submit" class="custom-btn green-bc">
                <i class="fa fa-edit"></i> Edit
            </button>
            <button type="button" class="custom-btn" data-dismiss="modal">
                <i class="fa fa-times"></i>close
            </button>
        </div>
    </div>
</form>
