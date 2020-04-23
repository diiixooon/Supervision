@if(Auth::guard('web')->check())
<p class="text-success">
    You are logged in as a <strong>User</strong>!
</p>
@else
<p class="text-danger">
    You are logged out as a <strong>User</strong>!
</p>
@endif

@if(Auth::guard('supervisor')->check())
<p class="text-success">
    You are logged in as a <strong>Supervisor</strong>!
</p>
@else
<p class="text-danger">
    You are logged out as a <strong>Supervisor</strong>!
</p>
@endif