        if (empty(${{ $config->modelNames->camel }})) {
@if($config->options->localized)
            flash()->error(__('models/{{ $config->modelNames->camelPlural }}.singular').' '.__('messages.not_found'));
@else
            flash()->error('{{ $config->modelNames->human }} no encontrado');
@endif

            return redirect(route('{{ $config->prefixes->getRoutePrefixWith('.') }}{{ $config->modelNames->camelPlural }}.index'));
        }
