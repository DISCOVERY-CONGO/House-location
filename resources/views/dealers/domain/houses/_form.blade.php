{!! form_start($form, $options = ['attr' => ['class' => 'nk-wizard nk-wizard-simple is-alter']]) !!}
    <div class="row gy-3">
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-control-wrap">
                    {!! form_row($form->town) !!}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-control-wrap">
                    {!! form_row($form->commune) !!}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-control-wrap">
                    {!! form_row($form->district) !!}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-control-wrap">
                    {!! form_row($form->address) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="row gy-3">
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-control-wrap">
                    {!! form_row($form->prices) !!}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-control-wrap">
                    {!! form_row($form->warranty_price) !!}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-control-wrap">
                    {!! form_row($form->number_rooms) !!}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-control-wrap">
                    {!! form_row($form->number_pieces) !!}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-control-wrap">
                    {!! form_row($form->categories) !!}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-control-wrap">
                    {!! form_row($form->type) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="row gy-2">
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-control-wrap">
                    {!! form_row($form->latitude) !!}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-control-wrap">
                    {!! form_row($form->longitude) !!}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-control-wrap">
                    {!! form_row($form->electricity) !!}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-control-wrap">
                    {!! form_row($form->toilet) !!}
                </div>
            </div>
        </div>
        <div class="col-md-12 mt-3">
            <div class="form-group">
                <div class="form-control-wrap">
                    <input
                        type="file"
                        name="image"
                        multiple
                        data-allow-reorder="true"
                        data-max-file-size="3MB"
                        data-max-files="4"
                    >
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <div class="form-control-wrap">
                    {!! form_row($form->description) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="justify-content-center mt-3 text-center">
        <button type="submit" class="btn btn-outline-primary rounded-lg">Save</button>
    </div>
{!! form_end($form) !!}
