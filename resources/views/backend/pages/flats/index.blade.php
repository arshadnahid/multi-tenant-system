@extends('backend.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption" style="font-size: 14px;">
                        <?php echo get_phrase('Flat List') ?>
                    </div>
                </div>
                <div class="portlet-body">
                    <table id="user_table" class="table table-bordered table-striped dataTable dtr-inline">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Building Name</th>
                            <th>Owner Email</th>
                            <th>Flat Number</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($flats as $key => $flats)
                            <tr>
                                <td>{{ $flats->id }}</td>
                                <td>{{ $flats->owner->building_name }}</td>
                                <td>{{ $flats->owner->email }}</td>
                                <td>{{ $flats->flat_number }}</td>
                                <td>
                                    <a href="{{ route('owner.flats.show', $flats->id) }}" class="btn btn-info btn-sm">View</a>
                                    <a href="{{ route('owner.flats.edit', $flats->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('owner.flats.destroy', $flats->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
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
        $(document).ready(function () {
            let table = $('#user_table').DataTable({
                serverSide: false,
                processing: true,
                deferRender: true,
                bLengthChange: true,
                searchDelay: 500,
                pageLength: 30,
                order: [[0, 'desc']],

            });
        });

    </script>
@endsection
