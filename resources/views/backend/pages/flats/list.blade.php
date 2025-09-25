<table  class=" datatable table table-bordered table-striped dataTable dtr-inline">
    <thead>
    <tr>
        <th>No</th>
        <th>Category Name</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>

    @foreach($bill_categories as $key => $bill_category)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{ $bill_category->name }}</td>
            <td>
                <a href="{{ route('owner.bill_categories.edit', $bill_category->id) }}" class="btn btn-primary btn-sm">Edit</a>
                <form action="{{ route('owner.bill_categories.destroy', $bill_category->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

