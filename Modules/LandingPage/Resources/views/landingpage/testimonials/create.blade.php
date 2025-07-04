{{ Form::open(array('route' => 'testimonials_store', 'method'=>'post', 'enctype' => "multipart/form-data", 'class'=>'needs-validation', 'novalidate')) }}
    <div class="modal-body">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Title', __('Title'), ['class' => 'form-label']) }}<x-required></x-required>
                    {{ Form::text('testimonials_title',null, ['class' => 'form-control ', 'placeholder' => __('Enter Title'),'required'=>'required']) }}
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Star', __('Star'), ['class' => 'form-label']) }}<x-required></x-required>
                    {{ Form::number('testimonials_star',null, ['class' => 'form-control ', 'min'=>'1', 'max'=>'5','required'=>'required', 'placeholder' => __('Enter Star')]) }}
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    {{ Form::label('Description', __('Description'), ['class' => 'form-label']) }}
                    {{ Form::textarea('testimonials_description', null, ['class' => 'form-control', 'placeholder' => __('Enter Description'),'rows'=>'3', 'id'=>'mytextarea']) }}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('User', __('User'), ['class' => 'form-label']) }}<x-required></x-required>
                    {{ Form::text('testimonials_user',null, ['class' => 'form-control ', 'placeholder' => __('Enter User Name'),'required'=>'required']) }}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Designation', __('Designation'), ['class' => 'form-label']) }}<x-required></x-required>
                    {{ Form::text('testimonials_designation',null, ['class' => 'form-control ', 'placeholder' => __('Enter Designation'),'required'=>'required']) }}
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    {{ Form::label('User Avtar', __('User Avtar'), ['class' => 'form-label']) }}
                    <input type="file" name="testimonials_user_avtar" class="form-control" required="required">
                </div>
            </div>


        </div>
    </div>
    <div class="modal-footer pb-0">
        <input type="button" value="{{__('Cancel')}}" class="btn  btn-secondary" data-bs-dismiss="modal">
        <input type="submit" value="{{__('Create')}}" class="btn  btn-primary">
    </div>
{{ Form::close() }}

