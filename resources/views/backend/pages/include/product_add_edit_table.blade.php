@php
    $mode = $mode ?? '';
    $form_type = $form_type ?? 'purchase';
@endphp
<style>
    table tr td {
        margin: 0px !important;
        padding: 1px !important;
    }

    table tr td tfoot .form-control {
        width: 100%;
        height: 34px;
    }

    .table-bordered, .table-bordered > tbody > tr > td, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > td, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > thead > tr > th {
        border: 1px solid #d2d5d7;
    }

</style>
<div class="col-md-12 ">


    <div class="table-header">
        Order Item
        <a class="btn red btn-sm" data-toggle="modal" href="#basic"> <i class="icon-wrench"></i> </a>
    </div>


    <table class="table table-bordered  tableAddItem" id="show_item">

        <thead>
            <tr>
                <th class="product_type_td" nowrap style="width:10%;border-radius:10px;text-align: center;">
                    <strong>{{get_phrase('Product Type')}}
                    </strong>
                </th>
                <th class="product_category_td" nowrap style="width:10%;border-radius:10px;text-align: center;">
                    <strong>{{get_phrase('Category')}}
                    </strong>
                </th>
                <th class="product_th" nowrap style="width:20%;text-align: center;" id="product_th">
                    <strong> {{get_phrase('Product Name')}}
                        <span style="color:red;"> *</span></strong>
                </th>
                <th class="quantity_td" style="white-space:nowrap; width:10%; vertical-align:top;text-align: right;">
                    <strong>
                        {{get_phrase('Quantity')}}
                        <span style="color:red;"> *</span>
                    </strong>
                </th>
                <th class="unit_price_th" style="white-space:nowrap; width:10%; vertical-align:top;text-align: right;">
                    <strong>
                        {{get_phrase('Unit_Price')}}
                        <span

                            style="color:red;"> *</span>
                    </strong>
                </th>
                <th class="vat_per_td" style="white-space:nowrap; width:5%; vertical-align:top;text-align: right;display: none"
                    nowrap><strong>{{get_phrase('Vat ')}}%</strong>
                </th>
                <th class="vat_amount_td" style="white-space:nowrap; width:5%; vertical-align:top;text-align: right;display: none"
                    nowrap><strong>{{get_phrase('Vat Amount')}}</strong>
                </th>
                <th class="other_expanse_td" style="white-space:nowrap; width:5%; vertical-align:top;text-align: right;"
                    nowrap><strong>{{get_phrase('Other Expanse')}}</strong>
                </th>
                <th class="total_price_th" style="white-space:nowrap; width:10%; vertical-align:top;text-align: right;" nowrap>
                    <strong>{{get_phrase('Total Price')}}
                        <span style="color:red;"> *</span></strong>
                </th>

                <th  class="one_line_narration_td" nowrap
                    style="text-align: center;width:15%;border-radius:10px;">
                    <strong>{{'Narration'}}</strong>
                </th>
                <th class="action_th" style="white-space:nowrap; width:5%; vertical-align:top;text-align: right;">
                    <strong>{{ get_phrase('Action')}}</strong>
                </th>
            </tr>

        <tr>
            <td class="product_type_td">
                <select name="" id="product_type"
                        class="chosen-select form-control" data-placeholder="Search product type" onchange="getProductList()">
                    <option value="">All</option>
                    @foreach($product_types as $key =>$product_type)
                        <option value="{{$product_type}}">{{$product_type}}</option>

                    @endforeach
                </select>
            </td>
            <td class="product_category_td">
                <select class="chosen-select form-control" data-placeholder="Select product Category"
                        id="category_id"
                        onchange="getProductList()">
                    <option></option>
                    {!! get_category_that_have_product_dropdown_by_ledger_type('all','all') !!}
                </select>
            </td>
            <td class="product_th" id="product_td">
                <select id="product_id" onchange="getProductDetails(this.value)"
                        class="chosen-select form-control"
                        data-placeholder="Select  Product">
                    <option value=""></option>
                </select>
            </td>

            <td class="quantity_td">
                <input class="hidden" type="text" value="">
                <input class="hidden" type="text" value="">
                <input type="text" onclick="this.select();"  class="form-control text-right quantity decimal" attr-row-id="0" id="quantity_0"  placeholder="0">
            </td>
            <td class="unit_price_th">
                <input type="hidden" onclick="this.select();" class="form-control text-right sales_price decimal" placeholder="0.00">
                <input type="hidden" onclick="this.select();" class="form-control text-right retail_price decimal" placeholder="0.00">
                <input type="hidden" onclick="this.select();" class="form-control text-right purchases_price decimal" placeholder="0.00">
                <input type="text" onclick="this.select();" class="form-control text-right rate decimal" attr-row-id="0" id="rate_0" placeholder="0.00">

            </td>
            <td class="vat_per_td" style="display: none">
                <input type="text" onclick="this.select();" attr-row-id="0"  id="vat_per_0" class="form-control text-right vat_per decimal"
                       placeholder="0.00">
            </td>
            <td class="vat_amount_td" style="display: none">
                <input type="text" onclick="this.select();"
                       class="form-control text-right vat_amount decimal"  attr-row-id="0"  id="vat_amount_0" placeholder="0.00">
            </td>
            <td class="other_expanse_td">
                <input type="text" onclick="this.select();" attr-row-id="0"  id="other_expanse_0" class="form-control text-right  decimal other_expanse"
                       placeholder="0.00"s>
            </td>
            <td class="total_price_th">
                <input type="text" onclick="this.select();" class="form-control text-right price decimal" attr-row-id="0" id="price_0"
                       placeholder="0.00"
                       readonly="readonly">
            </td>
            <td class="one_line_narration_td" style="" >
                <input type="text" onclick="this.select();"
                       class="form-control text-right one_line_narration" attr-row-id="0"  id="one_line_narration_0"
                       placeholder="">
            </td>
            <td class="action_th">
                <a id="add_item" class="btn blue form-control" href="javascript:void(0);" title="Add Item"
                   data-loading-text="<i class='fa fa-spinner fa-spin '></i> Processing ">
                    <i class="fa fa-plus" style="margin-top: 6px;margin-left: 8px;"></i>&nbsp;&nbsp;
                </a>
            </td>
        </tr>
        </thead>
        <tbody>


        </tbody>

        <tfoot>
        <tr>
            <th class="product_type_td" >
            </th>
            <th class="product_category_td">
            </th>
            <th class="product_th">
                <strong>Total Qty</strong>
            </th>
            <th class="quantity_td">

                <input class="text-right" type="text" id="total_qty" readonly name="total_qty" style="border: none;background: #f5f5f5">
            </th>
            <th class="unit_price_th" >
            </th>
            <th class="vat_per_td" style="display: none">
            </th>
            <th class="vat_amount_td" style="display: none">
            </th>
            <th class="other_expanse_td" >
            </th>
            <th class="total_price_th" >
                <strong id="">Grand Total </strong><strong id="total_price"></strong>
            </th>
            <th class="one_line_narration_td" >

            </th>
            <th class="action_th" >

            </th>
        </tr>
        </tfoot>
    </table>
</div>
<div class="row">
    <div class="col-md-7">
        <table class="table table-bordered table-hover table-success">
            <tr>
                <td>
                    <input type="text" class="form-control" name="delivery_address"
                           placeholder="Delivery Address"
                           type="text">
                </td>
            </tr>
            <tr>
                <td>
            <textarea style="background: #ffffff;" cols="120" rows="7"

                      class="form-control" name="narration"

                      placeholder="Narration......"

                      type="text"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="file" name="document[]" multiple="multiple">
                </td>
            </tr>
        </table>
        <div class="clearfix"></div>
        <div class="clearfix form-actions">
            <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">

                <button style="width: 100%;" type="button" onclick="return isconfirm2()" id="subBtn"
                        class="btn blue" type="button"
                        data-loading-text="<i class='fa fa-spinner fa-spin '></i> Processing ">
                    <i class="ace-icon fa fa-check bigger-110"></i>
                    {{get_phrase('Save')}}
                </button>

                &nbsp; &nbsp; &nbsp;

            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="portlet box blue">

            <div class="portlet-title" style="min-height:21px">
                <div class="caption" style="font-size: 12px;padding:1px 0 1px;">
                    <?php echo get_phrase('Payment Calculation') ?>
                </div>

            </div>
            <div class="portlet-body" style="padding:1px;background-color: #e2e5e9;">
                <div class="form-group">
                    <label class="col-md-5 control-label"
                           style="font-size:11px"><strong>{{get_phrase('Total')}} :</strong></label>
                    <div class="col-md-7">

                        <input type="text" name="total_product_price" value="" id="total_price_in_payment" class="form-control total_price_in_payment text-right" readonly>
                    </div>
                </div>
                <div class="form-group" style="">
                    <label class="col-md-5 control-label"
                           style="white-space: nowrap;font-size:11px">
                        <strong>
                           {{get_phrase('Discount')}}
                            (-):
                        </strong>
                    </label>
                    <div class="col-md-7">
                        <input type="text" id="discount_in_payment" onclick="this.select();" autocomplete="off"
                               style="text-align: right" name="discount"
                               value="" class="form-control decimal"
                               placeholder="0.00"/>

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-5 control-label"
                           style="padding-top: 0px !important;white-space: nowrap; font-size:11px">
                        <select name="loader_ledger_id" class="chosen-select form-control " id="loader_ledger_id"
                                data-placeholder="Select  Loader" onchange="loader_field();">
                            <option></option>

                        </select>
                    </label>
                    <div class="col-md-7">
                        <input type="text" id="loader_payment_amount" onclick="this.select();" autocomplete="off"
                               style="text-align: right" name="loader_payment_amount"
                               value="" class="form-control decimal"
                               placeholder="0.00"/>

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-5 control-label"
                           style="padding-top: 0px !important;white-space: nowrap; font-size:11px"
                           data-toggle="tooltip" title="{{get_phrase('Transportation')}} (+) :">

                        <select name="vehicle_ledger_id" class="chosen-select form-control" id="vehicle_ledger_id"
                                data-placeholder="Select Transportation" onchange="transportation_field();">
                            <option></option>

                        </select>

                    </label>
                    <div class="col-md-7">
                        <input type="text" id="vehicle_payment_amount"
                              onclick="this.select();" autocomplete="off"
                               style="text-align: right"
                               name="vehicle_payment_amount" value=""
                               class="form-control decimal" placeholder="0.00"/>

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-5 control-label"
                           style="white-space: nowrap; font-size:11px"><strong><?php echo get_phrase('Net Total') ?>
                            :</strong></label>
                    <div class="col-md-7">
                        <input type="text" id="net_total_in_payment"
                               style="text-align: right" name="net_total_in_payment"
                               value="" readonly class="form-control decimal"
                               placeholder="0.00"/>

                    </div>
                </div>
                <div class="form-group cash_payment_info" id="">
                    <label class="col-md-5 control-label"
                           style="white-space: nowrap; font-size:11px;"><strong>{{get_phrase('Payment')}}
                            ( - )
                            :</strong></label>
                    <div class="col-md-7">
                        <input name="cash_payment_amount_in_payment" onclick="this.select();" autocomplete="off"
                               id="cash_payment_amount_in_payment" type="text"
                               class="form-control text-right decimal"
                               placeholder="0.00">

                    </div>
                </div>
                <div class="form-group bank_payment_info" id="cheque_amount_div" style="display: none">
                    <label class="col-md-5 control-label"
                           style="white-space: nowrap; font-size:11px;"><span style="color:red;">*</span>
                        <strong>{{get_phrase('cheque_amount')}}
                            ( - )
                            :</strong></label>
                    <div class="col-md-7">
                        <input name="cheque_payment_amount_in_payment" onclick="this.select();" autocomplete="off"
                               id="cheque_payment_amount_in_payment" type="text"
                               class="form-control text-right cheque_amount decimal"
                               placeholder="0.00">

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-5 control-label"
                           style="white-space: nowrap; font-size:11px;"><strong>{{get_phrase('Total Due')}}
                            :</strong></label>
                    <div class="col-md-7">
                        <input type="text" readonly
                               class="form-control text-right decimal"
                               value="" id="total_due_in_payment"
                               placeholder="0.00"/>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@push('custom-scripts')
    <script type="text/javascript">
        let mode = '{{$mode}}';
        let form_type = '{{$form_type}}';


        $(document).ready(function () {
            show_hide_setting();
            getProductList();
        });



        $(document).on('keyup', '.quantity, .rate, .other_expanse', function () {
            const rowId = $(this).attr('attr-row-id');
            priceCal(rowId);
            resetFieldStyle(this);
        });
        $(document).on('keyup', '.vat_amount', function () {
            const rowId = $(this).attr('attr-row-id');
            calculate_vat_persentage(rowId);
            console.log(rowId);
        });
        $(document).on('keyup', '.vat_per', function () {
            const rowId = $(this).attr('attr-row-id');
            calculate_vat_amount(rowId);
        });
        $(document).on('keyup', '#discount_in_payment, #loader_payment_amount, #vehicle_payment_amount ,#cash_payment_amount_in_payment ,#cheque_payment_amount_in_payment', function () {
            calculate_net_total_in_payment();
        });



        function show_hide_setting() {
            $("#show_item").LoadingOverlay("show", {
                background: "rgba(165, 190, 100, 0.5)"
            });
            if(form_type=='purchase'){
                let purchase_invoice_item_configration = localStorage.getItem('purchase_invoice_item_configration');
                if (purchase_invoice_item_configration) {
                    let purchase_order_item = JSON.parse(purchase_invoice_item_configration);
                    if (purchase_order_item.product_category == 0) {
                        $('.product_category_td').hide();
                        $("#ProductCategoryCheckBox").prop("checked", false);
                    } else {
                        $('.product_category_td').show();
                        $('#CategorySelect2_chosen').width('100%')
                        $("#ProductCategoryCheckBox").prop("checked", true);
                    }


                    if (purchase_order_item.one_line_narration == 0) {
                        $('.one_line_narration_td').hide();
                        $("#OneLineNarrationCheckBox").prop("checked", false);
                    } else {
                        $('.one_line_narration_td').show();
                        $("#OneLineNarrationCheckBox").prop("checked", true);
                    }



                    if (purchase_order_item.other_expanse == 0) {
                        $('.other_expanse_td').hide();
                        $("#OtherExpanseCheckBox").prop("checked", false);
                    } else {
                        $('.other_expanse_td').show();
                        $("#OtherExpanseCheckBox").prop("checked", true);
                    }
                    if (purchase_order_item.vat_per == 0) {
                        $('.vat_per_td').hide();
                        $("#VatPerCheckBox").prop("checked", false);
                    } else {
                        $('.vat_per_td').show();
                        $("#VatPerCheckBox").prop("checked", true);
                    }

                    if (purchase_order_item.vat_amaount == 0) {
                        $('.vat_amount_td').hide();
                        $("#VatAmountCheckBox").prop("checked", false);
                    } else {
                        $('.vat_amount_td').show();
                        $("#VatAmountCheckBox").prop("checked", true);
                    }
                } else {
                    store_added_product_details();
                }
            }else if(form_type=='sales'){
                let sales_invoice_item_configration = localStorage.getItem('sales_invoice_item_configration');
                if (sales_invoice_item_configration) {
                    let sales_order_item = JSON.parse(sales_invoice_item_configration);
                    if (sales_order_item.product_category == 0) {
                        $('.product_category_td').hide();
                        $("#ProductCategoryCheckBox").prop("checked", false);
                    } else {
                        $('.product_category_td').show();
                        $('#CategorySelect2_chosen').width('100%')
                        $("#ProductCategoryCheckBox").prop("checked", true);
                    }


                    if (sales_order_item.one_line_narration == 0) {
                        $('.one_line_narration_td').hide();
                        $("#OneLineNarrationCheckBox").prop("checked", false);
                    } else {
                        $('.one_line_narration_td').show();
                        $("#OneLineNarrationCheckBox").prop("checked", true);
                    }



                    if (sales_order_item.other_expanse == 0) {
                        $('.other_expanse_td').hide();
                        $("#OtherExpanseCheckBox").prop("checked", false);
                    } else {
                        $('.other_expanse_td').show();
                        $("#OtherExpanseCheckBox").prop("checked", true);
                    }
                    if (sales_order_item.vat_per == 0) {
                        $('.vat_per_td').hide();
                        $("#VatPerCheckBox").prop("checked", false);
                    } else {
                        $('.vat_per_td').show();
                        $("#VatPerCheckBox").prop("checked", true);
                    }

                    if (sales_order_item.vat_amaount == 0) {
                        $('.vat_amount_td').hide();
                        $("#VatAmountCheckBox").prop("checked", false);
                    } else {
                        $('.vat_amount_td').show();
                        $("#VatAmountCheckBox").prop("checked", true);
                    }
                } else {
                    store_added_product_details();
                }
            }
            $("#show_item").LoadingOverlay("hide", true);
        }
        function store_added_product_details() {
            if(form_type=='purchase') {
                let purchase_invoice_item_configration = [];
                localStorage.removeItem("purchase_invoice_item_configration");
                let item = {
                    product_category: $('#ProductCategoryCheckBox').prop("checked") == true ? 1 : 0,
                    one_line_narration: $('#OneLineNarrationCheckBox').prop("checked") == true ? 1 : 0,
                    vat_per: $('#VatPerCheckBox').prop("checked") == true ? 1 : 0,
                    vat_amaount: $('#VatAmountCheckBox').prop("checked") == true ? 1 : 0,
                    other_expanse: $('#OtherExpanseCheckBox').prop("checked") == true ? 1 : 0,
                }
                localStorage.setItem('purchase_invoice_item_configration', JSON.stringify(item));
            }else if(form_type=='sales'){
                let sales_invoice_item_configration = [];
                localStorage.removeItem("sales_invoice_item_configration");
                let item = {
                    product_category: $('#ProductCategoryCheckBox').prop("checked") == true ? 1 : 0,
                    one_line_narration: $('#OneLineNarrationCheckBox').prop("checked") == true ? 1 : 0,
                    vat_per: $('#VatPerCheckBox').prop("checked") == true ? 1 : 0,
                    vat_amaount: $('#VatAmountCheckBox').prop("checked") == true ? 1 : 0,
                    other_expanse: $('#OtherExpanseCheckBox').prop("checked") == true ? 1 : 0,
                }
                localStorage.setItem('sales_invoice_item_configration', JSON.stringify(item));
            }
        }
        function set_localStorage_data() {
            store_added_product_details();
            show_hide_setting();
        }
        function getProductList() {
            let product_type = $('#product_type').val();
            let branch_id = $('#branch_id').val();
            let category_id = $('#category_id').val();
            $.ajax({
                type: "GET",
                url: '{{route('products.get_product_dropdown')}}',
                data: {'category_id': category_id, 'branch_id': branch_id, 'warehouse_id': '', 'product_type': product_type},
                success: function (data) {
                    $('#product_id').chosen();
                    $('#product_id option').remove();
                    $("#product_id").trigger("chosen:open");
                    $('#product_id').append($(data));
                    $("#product_id").trigger("chosen:updated");
                }
            });
        }
        function getProductDetails(product_id) {
            $.ajax({
                type: "GET",
                dataType: "json",
                url: '{{route('products.get_product_quantity_price')}}',
                data: {'product_id': product_id, 'branch_id': '', 'warehouse_id': ''},
                beforeSend: function () {
                    resetFields([
                        '#quantity_0',
                        '.alarm_qty',
                        '.stock_qty',
                        '.sales_price',
                        '.retail_price',
                        '.purchases_price',
                        '#rate_0',
                        '#vat_per_0',
                        '#vat_amount_0',
                        '#other_expanse_0',
                        '#price_0',
                        '#one_line_narration_0'
                    ]);
                },beforeSend: function () {
                    $("#rate_0").LoadingOverlay("show", {
                        background: "rgba(165, 190, 100, 0.5)"
                    });
                },success: function (data) {
                    let sales_price = safeParseFloat(data.sales_price);
                    let retail_price = safeParseFloat(data.retail_price);
                    let purchases_price = safeParseFloat(data.purchases_price);
                    let alarm_qty = safeParseFloat(data.alarm_qty);
                    let stock_qty = safeParseFloat(data.stock_qty);


                    // Validate required fields
                    let requiredFields = [
                        { field: data.coa_sales_account, message: "Sales Account Required. Please Set Sales Account For This product" },
                        { field: data.coa_inventory_account, message: "Inventory Account Required. Please Set Inventory Account For This product" },
                        { field: data.coa_cost_of_good_sold, message: "Cost of Good Account Required. Please Set Cost of Good Account For This product" },
                        { field: data.coa_inv_adjustments_account, message: "Inv Adjustments Account Required. Please Set Inv Adjustments Account For This product" }
                    ];

                    for (let { field, message } of requiredFields) {
                        if (!field) {
                            showError(message);
                        }
                    }

                    $('.sales_price').val(sales_price);
                    $('.retail_price').val(retail_price);
                    $('.purchases_price').val(purchases_price);
                    $('.alarm_qty').val(alarm_qty);
                    $('.stock_qty').val(stock_qty);

                    if(form_type == 'sales'){
                        $('#rate_0').val(sales_price);
                    }else if(form_type == 'purchase'){
                        $('#rate_0').val(purchases_price);
                    }
                },complete: function () {
                    $("#rate_0").LoadingOverlay("hide", true);
                }
            });
        }




        $("#add_item").click(function () {
            const $addItemBtn = $('#add_item');
            const $showItemTable = $("#show_item");

            // Disable the button and show loading state
            $addItemBtn.prop('disabled', true).button('loading');

            // Collect form data
            const product_id = $('#product_id').val();
            const given_quantity = safeParseFloat($('#quantity_0').val());
            const given_product_unit_price = safeParseFloat($('#rate_0').val());
            const given_vat_per = safeParseFloat($('#vat_per_0').val());
            const given_vat_amount = safeParseFloat($('#vat_amount_0').val());
            const given_other_expanse = safeParseFloat($('#other_expanse_0').val());
            const one_line_narration = $('#one_line_narration_0').val();

            // Validation
            if (!product_id) {
                handleValidationError($addItemBtn, "#productID", "Please Select Product");
                return;
            }

            if (given_quantity <= 0) {
                handleValidationError($addItemBtn, '#quantity_0', "Please Enter Quantity");
                return;
            }
            if (given_product_unit_price <= 0) {
                handleValidationError($addItemBtn, '#rate_0', "Please Enter Unit Price");
                return;
            }

            // Prepare request data
            const requestData = {
                product_id,
                given_quantity,
                given_product_unit_price,
                given_vat_per,
                given_vat_amount,
                given_other_expanse,
                one_line_narration,
                branch_id: '',
                warehouse_id: ''
            };

            // Send AJAX request
            $.ajax({
                type: "GET",
                url: '{{route('products.get_product_grid')}}',
                data: requestData,
                beforeSend: function () {
                    $showItemTable.LoadingOverlay("show", { background: "rgba(165, 190, 100, 0.5)" });
                },
                success: function (data) {
                    $showItemTable.find("tbody").append(data);
                    toastr.success("Item added successfully!");
                },
                complete: function () {
                    // Reset button and loading state
                    $addItemBtn.prop('disabled', false).button('reset');
                    $showItemTable.LoadingOverlay("hide", true);

                    // Reset form fields
                    resetFields([
                        '#quantity_0',
                        '.alarm_qty',
                        '.stock_qty',
                        '.sales_price',
                        '.retail_price',
                        '.purchases_price',
                        '#rate_0',
                        '#vat_per_0',
                        '#vat_amount_0',
                        '#other_expanse_0',
                        '#price_0',
                        '#one_line_narration_0'
                    ]);

                    // Trigger Chosen events
                    $("#product_id").trigger("chosen:open chosen:changed");
                    show_hide_setting();
                    // Recalculate totals
                    calculate_final_total();
                },
                error: function () {
                    toastr.error("Failed to add item. Please try again.");
                    $addItemBtn.prop('disabled', false).button('reset');
                    $showItemTable.LoadingOverlay("hide", true);
                }
            });
        });







        /*calculation start here*/

        function calculate_vat_amount(rowId=0){
            const vat_per = safeParseFloat($('#vat_per_'+rowId).val());
            const quantity = safeParseFloat($('#quantity_'+rowId).val());
            const rate = safeParseFloat($('#rate_'+rowId).val());
            const vat_amount = (rate * quantity) * (vat_per / 100);
            $('#vat_amount_'+rowId).val(vat_amount.toFixed(2));
            setTimeout(priceCal(rowId), 100);
        }
        function calculate_vat_persentage(rowId=0){
            const vat_amount = safeParseFloat($('#vat_amount_'+rowId).val());
            const quantity = safeParseFloat($('#quantity_'+rowId).val());
            const rate = safeParseFloat($('#rate_'+rowId).val());
            let vat_per = 0;
            if(((rate * quantity)) > 0){
                vat_per = (vat_amount / (rate * quantity)) * 100;
            }
            $('#vat_per_'+rowId).val(vat_per.toFixed(2));
            setTimeout(priceCal(rowId), 100);
        }


        function priceCal(rowId=0) {
            const quantity = safeParseFloat($('#quantity_'+rowId).val());
            const vat_amount = safeParseFloat($('#vat_amount_'+rowId).val());
            const rate = safeParseFloat($('#rate_'+rowId).val());
            const given_other_expanse = safeParseFloat($('#other_expanse_'+rowId).val());
            const price = (rate * quantity) + vat_amount+given_other_expanse;
            $('#price_'+rowId).val(ParseFloat(price));
            if(rowId != 0){
                calculate_final_total();
            }
        }


        function calculate_final_total() {
            let total_price = 0;
            let total_quantity = 0;

            // Calculate total quantity
            $('.quantity').each(function () {
                total_quantity += safeParseFloat($(this).val()) || 0; // Use `|| 0` to handle empty or invalid values
            });

            // Calculate total price
            $('.price').each(function () {
                total_price += safeParseFloat($(this).val()) || 0; // Use `|| 0` to handle empty or invalid values
            });
            $('#total_qty').val(ParseFloat(total_quantity));
            $('#total_price').text(ParseFloat(total_price));
            $('#total_price_in_payment').val(ParseFloat(total_price));
            calculate_net_total_in_payment();
        }

        function calculate_net_total_in_payment() {
          let  total_price_in_payment = safeParseFloat($('#total_price_in_payment').val());
          let  discount_in_payment = safeParseFloat($('#discount_in_payment').val());
          let  loader_payment_amount = safeParseFloat($('#loader_payment_amount').val());
          let  vehicle_payment_amount = safeParseFloat($('#vehicle_payment_amount').val());
          let  cash_payment_amount_in_payment = safeParseFloat($('#cash_payment_amount_in_payment').val());
          let  cheque_payment_amount_in_payment = safeParseFloat($('#cheque_payment_amount_in_payment').val());
          let net_total_in_payment=total_price_in_payment+vehicle_payment_amount+loader_payment_amount-discount_in_payment;
          let total_due_in_payment =net_total_in_payment-cash_payment_amount_in_payment-cheque_payment_amount_in_payment;
          $('#net_total_in_payment').val(ParseFloat(net_total_in_payment));
          $('#total_due_in_payment').val(ParseFloat(total_due_in_payment));
        }



    function isconfirm2() {

        let $subBtn = $('#subBtn');
        $subBtn.prop('disabled', true);
        $subBtn.button('loading');
        let branch_id= $('#branch_id').val();
        let transactions_date= $('#transactions_date').val();
        let crm_id= $('#crm_id').val();
        let payment_type= $('#payment_type').val();
        let cash_ledger_id= $('#cash_ledger_id').val();
        let bank_ledger_id= $('#bank_ledger_id').val();
        let cheque_no= $('#cheque_no').val();
        let cash_payment_amount_in_payment= safeParseFloat($('#cash_payment_amount_in_payment').val());
        let cheque_payment_amount_in_payment= safeParseFloat($('#cheque_payment_amount_in_payment').val());
        let total_price_in_payment= safeParseFloat($('#total_price_in_payment').val());
        let total_qty= safeParseFloat($('#total_qty').val());
        console.log(branch_id);
        if(branch_id == '' || branch_id == null){
            handleValidationError($subBtn, "#branch_id", "Please Select Branch");
            return false;
        }else if (transactions_date == '' || transactions_date == null) {
            if(form_type == 'sales'){
                handleValidationError($subBtn, "#transactions_date", "Please Select Sales Date");
            }else{
                handleValidationError($subBtn, "#transactions_date", "Please Select Purchase Date");
            }
            return false;
        }else if (crm_id == '' || crm_id == null) {
            if(form_type=='sales'){
                handleValidationError($subBtn, "#crm_id", "Please Select Customer");
            }else{
                handleValidationError($subBtn, "#crm_id", "Please Select Supplier");
            }
            return false;
        }else if (payment_type == 'cash' && (cash_ledger_id == '' || cash_ledger_id == null)) {
                    handleValidationError($subBtn, "#cash_ledger_id", "Please Select Cash Ledger, if you want to cash payment");
            return false;
        }else if (payment_type == 'cash' && (cash_payment_amount_in_payment == '' || cash_payment_amount_in_payment == 0)) {
            handleValidationError($subBtn, "#cash_payment_amount_in_payment", "Please Enter Cash Payment amount");
            return false;
        }else if(payment_type == 'cheque' && (bank_ledger_id == '' || bank_ledger_id == null)){
            handleValidationError($subBtn, "#bank_ledger_id", "Please Select Bank Ledger, if you want to cheque payment");
            return false;
        }else if(payment_type == 'cheque' && (cheque_no == '' || cheque_no == null)){
            handleValidationError($subBtn, "#cheque_payment_amount_in_payment", "Please Enter Cheque Number");
            return false;
        }else if(payment_type == 'cheque' && (cheque_payment_amount_in_payment == '' || cheque_payment_amount_in_payment == 0)){
            handleValidationError($subBtn, "#cheque_payment_amount_in_payment", "Please Enter Cheque Payment amount");
            return false;
        }else if(total_qty == '' || total_qty == 0){
            handleValidationError($subBtn, "#total_qty", "Please All At last One product");
            return false;
        }else if(total_price_in_payment == '' || total_price_in_payment == 0){
            handleValidationError($subBtn, "#total_price_in_payment", "There is no product selected");
            return false;
        }else{
            swal({
                    title: "Are you sure ?",
                    text: "You won't be able to revert this!",
                    showCancelButton: true,
                    confirmButtonColor: '#73AE28',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes',
                    cancelButtonText: "No",
                    closeOnConfirm: true,
                    closeOnCancel: true,
                    type: 'success'
                },
                function (isConfirm) {
                    if (isConfirm) {
                        //clear_local_storage();
                        $("#publicForm").submit();
                    } else {
                        $('#subBtn').prop('disabled', false);
                        $('#subBtn').button('reset');
                        return false;
                    }
                });
        }

    }

    function delete_item(element) {
        const row = $(element).closest('tr');
        swal({
            title: "Are you sure?",
            text: "You want to delete this item?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: true
        }, function() {
            row.remove();
            calculate_final_total();
            toastr.success("Item deleted successfully!");
        });
    }

    </script>
@endpush
