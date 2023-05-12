@if($config->options->localized)
    flash()->success(__('messages.deleted', ['model' => __('models/{{ $config->modelNames->camelPlural }}.singular')]));
@else
    flash()->success('{{ $config->modelNames->human }} eliminado.');
@endif
