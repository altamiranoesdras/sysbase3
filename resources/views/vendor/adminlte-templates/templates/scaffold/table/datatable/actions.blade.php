@@can('Ver {{ $config->modelNames->humanPlural }}')
    <a href="@{{ route('{!! $config->prefixes->getRoutePrefixWith('.') !!}{!! $config->modelNames->camelPlural !!}.show', ${!! $config->primaryName !!}) }}" data-toggle="tooltip" title="Ver" class='btn btn-icon btn-flat-secondary rounded-circle'>
        <i class="fa fa-eye"></i>
    </a>
@@endcan

@@can('Editar {{ $config->modelNames->humanPlural }}')
    <a href="@{{ route('{!! $config->prefixes->getRoutePrefixWith('.') !!}{!! $config->modelNames->camelPlural !!}.edit', ${!! $config->primaryName !!}) }}" data-toggle="tooltip" title="Editar" class='btn btn-icon btn-flat-info rounded-circle'>
        <i class="fa fa-edit"></i>
    </a>
@@endcan

@@can('Eliminar {{ $config->modelNames->humanPlural }}')
    <a href="#" onclick="deleteItemDt(this)" data-id="@{{ ${!! $config->primaryName !!} }}" data-toggle="tooltip" title="Eliminar" class='btn btn-icon btn-flat-danger rounded-circle'>
        <i class="fa fa-trash-alt"></i>
    </a>


    <form action="@{{ route('{!! $config->prefixes->getRoutePrefixWith('.') !!}{!! $config->modelNames->camelPlural !!}.destroy', ${!! $config->primaryName !!}) }}" method="POST" id="delete-form@{{ ${!! $config->primaryName !!} }}">
        @@method('DELETE')
        @@csrf
    </form>
@@endcan

