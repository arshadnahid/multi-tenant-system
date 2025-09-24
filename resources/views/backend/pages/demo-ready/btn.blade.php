<form method="POST"
      action="{{route('users.destroy',$user)}}"
      style="display: inline-block">
    @csrf
    @method('DELETE')
    <button class="btn btn-sm  red " href="javascript:void(0)"  onclick="return confirm('Are You sure')">
        <i class="fa fa-trash"></i>&nbsp;
    </button>

</form>
<a class="btn btn-sm  green " href="{{route('users.edit', $user->id)}}" ><i class="fa fa-edit"></i>&nbsp;</a>
