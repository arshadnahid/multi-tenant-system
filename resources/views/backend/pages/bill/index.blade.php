@extends('backend.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption" style="font-size: 14px;">
                        <?php echo get_phrase('Create Bill') ?>
                    </div>
                </div>
                <div class="portlet-body">
                    <form id="publicForm" class="bs-example form-horizontal required-form"
                          action="{{route('owner.bills.store')}}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-sm-4 control-label no-padding-right" for="flat_id"><span
                                        style="color:red;"> *</span> <?php echo get_phrase('Flat') ?>
                                </label>
                                <div class="col-sm-6">
                                    <select name="flat_id" id="flat_id" class="form-control chosen-select" required>
                                        <option value="">-- <?php echo get_phrase('Select') ?> --</option>
                                        @foreach($falts  as $key => $f)
                                            <option value="{{ $f->id }}">{{ $f->flat_number }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label no-padding-right" for="bill_category_id"><span
                                        style="color:red;"> *</span> <?php echo get_phrase('Bill Category') ?>
                                </label>
                                <div class="col-sm-6">
                                    <select name="bill_category_id" id="bill_category_id" class="form-control chosen-select" required>
                                        <option value="">-- <?php echo get_phrase('Select') ?> --</option>
                                        @foreach($bill_categories  as $key => $c)
                                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label no-padding-right" for="month"><span
                                        style="color:red;"> *</span> <?php echo get_phrase('Month (YYYY-MM)') ?>
                                </label>
                                <div class="col-sm-6">
                                    <input class="form-control" type="text" name="month" id="month"
                                           placeholder="2025-08" required autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label no-padding-right" for="status"><span
                                        style="color:red;"> *</span> <?php echo get_phrase('Status') ?>
                                </label>
                                <div class="col-sm-6">
                                    <select name="status" id="status" class="form-control" required>
                                        <option value="unpaid">{{ get_phrase('Unpaid') }}</option>
                                        <option value="paid">{{ get_phrase('Paid') }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label no-padding-right" for="amount"><span
                                        style="color:red;"> *</span> <?php echo get_phrase('Amount') ?>
                                </label>
                                <div class="col-sm-6">
                                    <input class="form-control decimal" type="text" name="amount" id="amount"
                                           required autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label no-padding-right" for="notes">
                                    <?php echo get_phrase('Notes') ?>
                                </label>
                                <div class="col-sm-6">
                                    <textarea class="form-control" name="notes" id="notes" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label no-padding-right" for="building_address">

                                </label>
                                <div class="col-sm-6">
                                    <button style="width: 100%;" type="button" onclick="return confirmSwat()" id="subBtn"
                                            class="btn blue" type="button"
                                            data-loading-text="<i class='fa fa-spinner fa-spin '></i> Processing ">
                                        <i class="ace-icon fa fa-check bigger-110"></i>
                                        <?php echo get_phrase('Save') ?>
                                    </button>

                                    &nbsp; &nbsp; &nbsp;


                                </div>
                            </div>
                        </div>


                        <div class="clearfix form-actions">

                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption" style="font-size: 14px;">
                        <?php echo get_phrase('Create Bill') ?>
                    </div>
                </div>
                <div class="portlet-body">

                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
    </script>
@endsection
