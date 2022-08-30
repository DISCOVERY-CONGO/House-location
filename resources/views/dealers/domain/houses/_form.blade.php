{!! form_start($form) !!}
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
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-control-wrap">
                    {!! form_row($form->email) !!}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="form-control-wrap">
                    {!! form_row($form->prices) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="row gy-3">
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
                    {!! form_row($form->images) !!}
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
        <div class="col-md-12">
            <div class="form-group">
                <div class="form-control-wrap">
                    {!! form_row($form->description) !!}
                </div>
            </div>
        </div>
    </div>

    <div class="justify-content-center mt-3 text-center">
        <button type="submit" class="btn btn-primary btn-dim rounded-lg">Save</button>
    </div>
{!! form_end($form) !!}
