{{ Form::open(array('route' => array('shipping.import'),'method'=>'post', 'enctype' => "multipart/form-data")) }}
<div class="row">
    <div class="col-md-12 mb-6">
        <div class="d-flex align-items-center g-2 justify-content-between">
            {{Form::label('file',__('Download Sample Shipping CSV File'),['class'=>'col-form-label'])}}
            <a href="{{asset(Storage::url('uploads/sample')).'/sample-shipping.xlsx'}}" class="btn p-2 d-flex align-items-center justify-content-between btn-sm btn-primary btn-icon-only">
                <i class="fa fa-download"></i>
            </a>
        </div>
    </div>
    <div class="col-md-12 mt-1">
        {{Form::label('file',__('Select CSV File'),['class'=>'col-form-label '])}}
        <div class="choose-file form-group">
            <label for="file" class="form-label w-100">
                <input type="file" class="form-control" name="file" id="file" data-filename="upload_file" required>
            </label>
            <p class="upload_file"></p>
        </div>
    </div>
    <div class="form-group py-0 mb-0 col-12 d-flex justify-content-end col-form-label">
        <input type="button" value="{{__('Cancel')}}" class="btn btn-secondary" data-bs-dismiss="modal">
        <input type="submit" value="{{__('Upload')}}" class="btn btn-primary ms-2">
    </div>
</div>
{{ Form::close() }}

