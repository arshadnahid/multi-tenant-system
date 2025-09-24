@php
    $class = "even";
    $row_id = time();
@endphp

<tr class="{{$class}} new_item_{{$row_id}}">


    <td class="product_type_td">
        {{$product_details->product_type}}
    </td>
    <td class="product_category_td">
        {{$product_details->category?->category_name}}
    </td>
    <td class="product_th">
        {{$product_details->product_name}}
        <input type="hidden" name="slNo[{{$row_id}}]" value="{{$row_id}}"/>
        <input type="hidden" name="product_id_{{$row_id}}" value="{{$product_details->id}}"/>
    </td>
    <td class="quantity_td">
        <input type="text" style="border: 0px !important;" onclick="this.select();" attr-row-id="{{$row_id}}" id="quantity_{{$row_id}}"
               class="form-control text-right quantity decimal " name="quantity_{{$row_id}}"
               value="{{$given_quantity}}"/>
    </td>
    <td class="unit_price_th">
        <input onclick="this.select();" type="text" id="rate_{{$row_id}}" attr-row-id="{{$row_id}}"
               class="form-control rate text-right decimal " name="rate_{{$row_id}}"
               value="{{$given_product_unit_price}}"/>
    </td>
    <td class="vat_per_td">
        <input type="text"
               id="vat_per_{{$row_id}}"
               class="form-control vat_per text-right decimal " attr-row-id="{{$row_id}}"
               name="vat_per_{{$row_id}}"
               value="{{$given_vat_per}}"/>
    </td>
    <td class="vat_amount_td">
        <input type="text"
               id="vat_amount_{{$row_id}}"
               class="form-control vat_amount text-right decimal " attr-row-id="{{$row_id}}"
               name="vat_amount_{{$row_id}}"
               value="{{$given_vat_amount}}">
    </td>
    <td class="other_expanse_td">
        <input onclick="this.select();" type="text" id="other_expanse_{{$row_id}}" attr-row-id="{{$row_id}}"
               class="form-control  text-right decimal other_expanse" name="other_expense_{{$row_id}}"
               value="{{$given_other_expanse}}">
    </td>
    <td class="total_price_th">
        <input readonly type="text" class=" price text-right form-control" attr-row-id="{{$row_id}}"
               id="price_{{$row_id}}"
               name="price[]"
               value="{{$total_price}}">

    </td>
    <td class="one_line_narration_td">
        <input type="text"
               class="given_one_line_narration text-right form-control "
               id="one_line_narration_{{$row_id}}"
               name="one_line_narration_{{$row_id}}"
               value="{{$one_line_narration}}">
    </td>
    <td class="action_th">
        <a del_id="{{$row_id}}" onclick="delete_item(this)" class="delete_item btn form-control btn-danger" href="javascript:;"
           title=""><i
                class="fa fa-times"></i>&nbsp;</a>
    </td>
</tr>

