<table  class=" datatable table table-bordered table-striped dataTable dtr-inline">
    <thead>
    <tr>
        <th>No</th>
        <th>Category Name</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @php($i=1)
    @foreach($bill_categories as $key => $bill_category)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{ $bill_category->name }}</td>
            <td>
                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-flat-{{ $bill_category->id }}">View</button>
                <a href="{{ route('owner.flats.edit', $bill_category->id) }}" class="btn btn-primary btn-sm">Edit</a>
                <form action="{{ route('owner.flats.destroy', $bill_category->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

