<div class="modal fade" id="create-specialize-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">X</span>
                </button>
                <h4 class="modal-title" id="modal-label">{{ __('create a new specialize') }}</h4>
            </div>

            {{ Form::open(['action' => 'Admin\SpecializeController@store', 'method' => 'post']) }}

            @foreach ($errors->all() as $error)
                <p class="alert alert-danger fix-alert">{{ $error }}</p>
            @endforeach
            <div class="modal-body mx-3">
                <div class="md-form mb-5">
                    {{ Form::label('name', __('name')) }}
                    {{ Form::text('name', null, ['class' => 'form-control validate', 'id' => 'name']) }}
                </div>

                <div class="md-form mb-4">
                    {{ Form::label('teaching_grade', __('teaching_grade')) }}
                    {{ Form::text('teaching_grade', null, ['class' => 'form-control validate', 'id' => 'teaching_grade']) }}
                </div>

            </div>
            <div class="modal-footer d-flex justify-content-center">
                {{ Form::submit(__('add new'), ['class' => 'btn btn-primary', 'id' => 'create-btn']) }}
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
