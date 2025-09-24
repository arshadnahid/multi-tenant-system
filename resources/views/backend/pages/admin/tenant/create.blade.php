@extends('backend.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption" style="font-size: 14px;">
                        <?php echo get_phrase('Create tenants ') ?>
                    </div>
                </div>
                <div class="portlet-body">
                    <form id="publicForm" class="bs-example form-horizontal required-form"
                          action="{{route('admin.tenants.store')}}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="name"><span
                                        style="color:red;"> *</span> <?php echo get_phrase('Name') ?>
                                </label>
                                <div class="col-sm-4">
                                    <input class="form-control" type="text" name="name" id="name"
                                           value="" required
                                           autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="name"> <?php echo get_phrase('contact') ?>
                                </label>
                                <div class="col-sm-4">
                                    <input class="form-control" type="text" name="contact" id="contact"
                                           value="" required
                                           autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="email"><?php echo get_phrase('Email') ?>
                                </label>
                                <div class="col-sm-4">
                                    <input class="form-control" type="email" name="email" id="email"
                                           value="" required autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="building_name"><span
                                        style="color:red;"> *</span> <?php echo get_phrase('Building Name') ?>
                                </label>
                                <div class="col-sm-4">
                                    <select name="house_owner_id" class="form-control chosen-select" id="house_owner_id" required>
                                        <option value="" disabled selected>Select Building</option>
                                        @foreach($owners as $owner)
                                            <option value="{{ $owner->id }}">{{ $owner->name .' '.$owner->building_address }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="building_address">

                                </label>
                                <div class="col-sm-4">


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
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function () {


        });

    </script>
@endsection
