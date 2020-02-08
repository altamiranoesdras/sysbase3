<!-- Name Field -->
{!! Form::label('name', 'Name:') !!}
{!! $role->name !!}<br>


<!-- Guard Name Field -->
{!! Form::label('guard_name', 'Guard Name:') !!}
{!! $role->guard_name !!}<br>


{!! Form::label('permissions', 'Permisos:') !!}
@forelse($role->permissions as $permission)

    <span class="badge badge-info">
    {!! $permission->name !!}
    </span>
@empty
    <span class="badge badge-secondary">
        Ningún permiso asignado
    </span>

@endforelse
<br>
