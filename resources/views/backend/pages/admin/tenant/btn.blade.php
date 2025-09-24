@php $model = isset($tenant) ? $tenant : (isset($user) ? $user : null); @endphp
<form method="POST"
      action="{{ $model ? route('admin.tenants.destroy', $model) : '#' }}"
      style="display: inline-block">
    @csrf
    @method('DELETE')
    <button class="btn btn-sm  red " href="javascript:void(0)"  onclick="return confirm('Are You sure')">
        <i class="fa fa-trash"></i>&nbsp;
    </button>

</form>
<a class="btn btn-sm  yellow " href="{{ $model ? route('admin.tenants.show', $model) : '#' }}" ><i class="fa fa-eye"></i>&nbsp;</a>
<a class="btn btn-sm  green " href="{{ $model ? route('admin.tenants.edit', $model) : '#' }}" ><i class="fa fa-edit"></i>&nbsp;</a>
