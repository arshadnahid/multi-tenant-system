@extends('backend.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="portlet box red">
                <div class="portlet-title">
                    <div class="caption" style="font-size: 14px;">
                        <?php echo get_phrase('Unpaid Bills') ?>
                    </div>
                </div>
                <div class="portlet-body">
                    <table  class="datatable table table-bordered table-striped dataTable dtr-inline">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Bill Category</th>
                            <th>Month</th>
                            <th>Amount</th>
                            <th>Note</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($unpaid_bills as $key => $unpaid_bill)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$unpaid_bill->category->name}}</td>
                                <td>{{$unpaid_bill->month}}</td>
                                <td>{{ $unpaid_bill->amount }}</td>
                                <td>{{$unpaid_bill->notes}}</td>
                                <td>
                                    <a href="{{ route('owner.bills.mark_paid', $unpaid_bill) }}" class="btn btn-primary btn-sm">Paid Bill</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption" style="font-size: 14px;">
                        <?php echo get_phrase('Paid  Bills') ?>
                    </div>
                </div>
                <div class="portlet-body">
                    <table  class=" datatable table table-bordered table-striped dataTable dtr-inline">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Bill Category</th>
                            <th>Month</th>
                            <th>Amount</th>
                            <th>Note</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($paid_bills as $key => $paid_bill)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$paid_bill->category->name}}</td>
                                <td>{{$paid_bill->month}}</td>
                                <td>{{ $paid_bill->amount }}</td>
                                <td>{{$paid_bill->notes}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">

    </script>
@endsection

