@if($config->options->localized)
    flash()->success(__('messages.saved', ['model' => __('models/{{ $config->modelNames->camelPlural }}.singular')]));
@else
    flash()->success('{{ $config->modelNames->human }} guardado.');
@endif
