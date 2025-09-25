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
                        @foreach($flats as $key => $flat)
                            <tr>
                                <td>{{ $flat->id }}</td>
                                <td>{{ $flat->owner->building_name }}</td>
                                <td>{{ $flat->owner->email }}</td>
                                <td>{{ $flat->flat_number }}</td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-flat-{{ $flat->id }}">View</button>
                                    <a href="{{ route('owner.flats.edit', $flat->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('owner.flats.destroy', $flat->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    {{-- Render modals after the table to keep valid HTML --}}
                    @foreach($flats as $flat)
                        <div class="modal fade" id="modal-flat-{{ $flat->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel-{{ $flat->id }}">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="modalLabel-{{ $flat->id }}">{{ get_phrase('Flat Details') }}</h4>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table table-bordered">
                                            <tbody>
                                            <tr>
                                                <th style="width: 220px;">{{ get_phrase('Building Name') }}</th>
                                                <td>{{ $flat->owner->building_name }}</td>
                                            </tr>
                                            <tr>
                                                <th>{{ get_phrase('Owner Email') }}</th>
                                                <td>{{ $flat->owner->email }}</td>
                                            </tr>
                                            <tr>
                                                <th>{{ get_phrase('Flat Number') }}</th>
                                                <td>{{ $flat->flat_number }}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn default" data-dismiss="modal">{{ get_phrase('Close') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

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
