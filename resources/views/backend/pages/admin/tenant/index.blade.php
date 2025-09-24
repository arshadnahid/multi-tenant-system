@extends('backend.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption" style="font-size: 14px;">
                        <?php echo get_phrase('tenant List') ?>
                    </div>
                </div>
                <div class="portlet-body">
                    <table id="user_table" class="table table-bordered table-striped dataTable dtr-inline">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Building Name</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            let table = $('#user_table').DataTable({
                serverSide: true,
                processing: true,
                deferRender: true,
                bLengthChange: true,
                searchDelay: 500,
                pageLength: 30,

                order: [[0, 'desc']],
                ajax: {
                    url: "{{route('admin.tenants.index')}}",
                    data: function (d) {
                        d.doc_filter = $('#doc_filter').val();
                        d.search = $('input[type="search"]').val();
                    }
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'building_name', name: 'building_name'},
                    {data: 'mobile', name: 'mobile'},
                    {data: 'email', name: 'email'},
                    {data: 'action', name: 'action'},
                ]

            });
            $('.filter-select').change(function () {
                table.column($(this).attr('data-column')).search($(this).val()).draw();
            });
        });

    </script>
@endsection
