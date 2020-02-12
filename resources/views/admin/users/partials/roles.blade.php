@forelse($user->roles as $rol)
    <span class="badge badge-info">{{$rol->name}}</span>
@empty
    <span class="badge badge-default">Ninguno</span>
@endforelse

