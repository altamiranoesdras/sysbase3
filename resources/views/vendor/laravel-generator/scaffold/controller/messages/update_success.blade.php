@if($config->options->localized)
    flash()->success(__('messages.updated', ['model' => __('models/{{ $config->modelNames->camelPlural }}.singular')]));
@else
    flash()->success('{{ $config->modelNames->human }} actualizado.');
@endif
