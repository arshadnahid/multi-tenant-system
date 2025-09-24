@extends('backend.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption" style="font-size: 14px;">
                        <?php echo $user->name.' '.get_phrase('data update') ?>
                    </div>
                </div>
                <div class="portlet-body">
                    <form id="publicForm" class="bs-example form-horizontal required-form"
                          action="{{ route('users.update',$user) }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="col-md-12">

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="name"><span
                                        style="color:red;"> *</span> <?php echo get_phrase('Name') ?>
                                </label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" name="name" id="name"
                                           value="" required
                                           autocomplete="off">
                                </div>
                            </div>
                        </div>

                        <div class="clearfix form-actions">
                            <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">

                                <button style="width: 100%;" type="button" onclick="return confirmSwat()" id="subBtn"
                                        class="btn blue" type="button"
                                        data-loading-text="<i class='fa fa-spinner fa-spin '></i> Processing ">
                                    <i class="ace-icon fa fa-check bigger-110"></i>
                                    <?php echo get_phrase('update') ?>
                                </button>

                                &nbsp; &nbsp; &nbsp;

                            </div>
                        </div>
                    </form>
                </div>
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
