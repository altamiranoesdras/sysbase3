<?php

use App\Models\Configuration;
use App\Models\Option;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use App\Extenciones\NumeroALetras;
use Illuminate\Support\Facades\File;


/**
 * Crea un array de elmentos en base a un modelo
 * Para agregarlo como parametro de un select html de colective
 * @param $model
 * @param string $label
 * @param string $id
 * @param string $defaultValue
 * @param string $defaultKey
 * @return array
 */
function select($model, $label='nombre', $id='id', $defaultValue='SELECCIONE UNO...', $defaultKey='')
{

    if ($model instanceof Builder) {

        $options = $model->get()->pluck($label, $id)->toArray();
    } else {
        $options = $model::all()->pluck($label, $id)->toArray();
    }


    if (!is_null($defaultValue)) {
        $options = Arr::prepend($options, $defaultValue, $defaultKey);
    }
    return $options;
}


/**
 * Convierte una plantilla .docx a pdf
 * @param $pathTemplate
 * @param $data
 * @param null $fileName
 * @param string $outDir
 * @return string
 * @throws \PhpOffice\PhpWord\Exception\CopyFileException
 * @throws \PhpOffice\PhpWord\Exception\CreateTemporaryFileException
 */
function templateToPdf($pathTemplate, $data,$fileName=null,$outDir="/temp"){

    // PROCESA EL TEMPLATE EN DOCX
    $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor($pathTemplate);


    foreach ($data as $index => $dato) {
        $templateProcessor->setValue($index, $dato);
    }

    $ArgOutDir='--outdir '.public_path().$outDir;


    if (is_null($fileName)){
        $fileName = Auth::user()->usuario_dominio."_".Carbon::now()->format('d_m_Y_H_i_s');
    }

    $saveAs = "templateToPdf/".$fileName.".docx";

    // GUARDA EL NUEVO ARCHIVO DOCX
    $templateProcessor->saveAs($saveAs);

    $pathNewDocx = public_path().'/'.$saveAs;

    // :::: LINUX ::::
    $command = 'export HOME=/tmp && soffice --headless --convert-to pdf "'.$pathNewDocx.'" '.$ArgOutDir;

    // :::: WINDOWS ::::
    if (PHP_OS=='WINNT'){
        $command = 'start /wait soffice --headless --convert-to pdf "'.$pathNewDocx.'" '.$ArgOutDir;
    }


    try {

        shell_exec($command);
//        unlink($pathNewDocx);
        $pathNewPdf = $outDir."/".$fileName.".pdf";

    } catch (\Exception $exception) {

        throw new  Exception($exception);
    }


    return $pathNewPdf;
}


/**
 * Devuelve el nombre del mes
 * @param null $mes
 * @return mixed
 */
function mesLetras($mes=null){
    $meses = ["enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","diciembre"];

    return strtoupper($meses[$mes-1]);
}

/**
 * Devuelve el año actual en numeros
 * @return string
 */
function anioActual(){
    return Carbon::now()->format('Y');
}


/**
 * Devuelve el dia actual en numeros
 * @return string
 */
function diaActual(){
    return Carbon::now()->format('d');
}


/**
 * Convierte un numero a letras
 * @param $numero
 * @return string
 */
function numAletras($numero,$moneda=null,$centimos=null){
    return NumeroALetras::convertir($numero,$moneda,$centimos);
}

/**
 * Devuelve la fecha actual en formato ingles o latino
 * @param string $fomato
 * @return string
 */
function fechaActual($fomato='es'){
    if ($fomato=='en'){
        return Carbon::now()->format('Y-m-d');
    }

    return Carbon::now()->format('d/m/Y');
}

function fechaActualLetras(){
    list($dia,$mes,$anio)=explode("/",fechaActual());

    return numAletras($dia)." DE ".mesLetras($mes)." DEL ".numAletras($anio);
}

/**
 * Valida si la ruta actual es la que se envía compo parametro
 * @param $routeName
 * @return bool
 */
function routeIs($routeName){
    return request()->route()->getName() == $routeName ? true : false;
}


/**
 * Return el porcentaje, validando no division cero
 * @param $value1, $valueTotal
 * @return string
 */
function porcentaje($value1, $valueTotal){
    return ($valueTotal>0)? number_format($value1 * 100 / $valueTotal, 2) : 0;
}


/**
 * Convierte una fecha en formato latino
 * @param string $fecha
 * @return string
 */
function fechaLtn(string $fecha=null){

    return $fecha ? Carbon::parse($fecha)->format('d/m/Y') : '';
}


function rutaOpcion($opcion){
    try{
        return route($opcion->ruta.'');
    }catch (\Exception $e){
        return route('admin.home');
    }
}


function optionsParentAuthUser($user = null){
    $authUser = $user ?? Auth::user();

//    $allOptions = $authUser->options;
    $allOptions = $authUser->getAllOptions();

    $optionParent = $allOptions->filter(function ($op){
        return is_null($op->option_id);
    });



    $childres = $allOptions->filter(function ($op){
        return !is_null($op->option_id);
    })->pluck('id')->toArray();

    $options = Option::padresDe($childres)->with('children')->get();

    $options = $optionParent->merge($options)->sortBy('orden');

    return $options;

}

function getLogo($conversion='webp'){

    /**
     * @var Configuration $config
     */
    $config = Configuration::find(Configuration::LOGO);

    $media = $config->getMediaLogo();

    return $media ? $media->getUrl($conversion) : asset('img/default.svg');
}

function getFondoLogin($conversion=''){

    /**
     * @var Configuration $config
     */
    $config = Configuration::find(Configuration::FONDO_LOGIN);

    $media = $config->getMediaFondoLogin();

    return $media ? $media->getUrl($conversion) : asset('img/default.svg');
}



function getIcono($conversion=''){

    /**
     * @var Configuration $config
     */
    $config = Configuration::find(Configuration::ICONO);

    $media = $config->getMediaIcono();

    return $media ? $media->getUrl($conversion) : asset('img/default.svg');
}

function appIsDebug(){
    return (boolean) json_decode(strtolower(config('app.debug')));
}


/**
 * Devuelve el símbolo de la moneda que esta guardada en las variables de configuración en la tabla configurations
 * @return \Illuminate\Config\Repository|mixed
 */
function dvs(){
    return config('app.divisa') ?? "$";
}

/**
 * Formatea los números de cantidades con separador de miles, separador decimales y cantidad de decimales mediante llaves de configuración
 */
function nf($numero,$cantidad_decimales=null,$separador_decimal=null,$separador_miles=null){

    $cantidad_decimales = $cantidad_decimales ?? config('app.cantidad_decimales');
    $separador_decimal = $separador_decimal ?? config('app.separador_decimal');
    $separador_miles = $separador_miles ?? config('app.separador_miles');

    return number_format($numero,$cantidad_decimales,$separador_decimal,$separador_miles);
}

/**
 * Formatea los números de precios con separador de miles, separador decimales y cantidad de decimales mediante llaves de configuración
 */
function nfp($numero,$cantidad_decimales=null,$separador_decimal=null,$separador_miles=null){


    $cantidad_decimales = $cantidad_decimales ?? config('app.cantidad_decimales_precio');
    $separador_decimal = $separador_decimal ?? config('app.separador_decimal');
    $separador_miles = $separador_miles ?? config('app.separador_miles');

    return number_format($numero,$cantidad_decimales,$separador_decimal,$separador_miles);
}

/**
 * @param \Illuminate\Database\Eloquent\Collection $items
 * @param $items
 * @param $id
 * @return null
 */
function validaChecked($items,$id){
    if (!$items){
        return null;
    }


    if ($items->contains('id',$id)){
        return 'checked';
    }else{
        return null;
    }

}

function prefijoCeros($numero,$cantidadCeros){
    return str_pad($numero,$cantidadCeros,"0",STR_PAD_LEFT);
}

function generarManifest()
{

    $iconos = collect();

    /**
     * @var Configuration $config
     */
    $config = Configuration::find(Configuration::ICONO);

    $media = $config->getMediaIcono();

    if ($media){

        foreach ($media->getGeneratedConversions() as $conversionName => $valido) {

            $pathIcon = "storage/".$media->getPathRelativeToRoot($conversionName);

            $new = [
                "src" => $pathIcon,
                "type" => "image/png",
                "sizes" => $conversionName
            ];

            $iconos->push($new);
        }
    }


    $json = Collection::make([
        "short_name" => config('app.name'),
        "name" => config('app.name'),
        "background_color" => "#007BFF",
        "orientation" => "portrait",
        "theme_color" => "#007BFF",
        "icons" => $iconos,
        "start_url" => "/",
        "display" => "standalone"
    ])->toJson(JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

    File::put(public_path('manifest.json'),$json);
}

function getLenguajeActualDesc(){

    $idiomas = [
        'es' => 'Spanish',
        'en' => 'English',
    ];

    $actual = app()->getLocale();

    return __($idiomas[$actual]);
}

function autoIncrementFaker()
{
    for ($i = 0; $i < 1000; $i++) {
        yield $i;
    }
}

function separaNombreCompleto($nombre_completo){

    $nombres = explode(' ',$nombre_completo,3);

    if(count($nombres)==1){
        return [$nombres[0],''];
    }
    elseif(count($nombres)>2){
        return [$nombres[0]." ".$nombres[1],$nombres[2]];
    }else{
        return $nombres;
    }

}
