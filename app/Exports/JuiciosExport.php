<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Juicio, App\Demandado, App\Juiciouser, App\Juzgadotipo, App\Juzgado, App\Juiciotipo, App\Moneda, App\Macroetapa, App\Salaapela, App\User, App\Estado, App\Nota;
use \stdClass;

class JuiciosExport implements FromCollection, WithMapping, WithHeadings
{    
    
	protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

	public function headings(): array
    {
        return [
            'Id',
            'Estado',
            'Portafolio',
            'Cliente',
            'Info Contact. Cliente',
            'Colaborador',
            'Nº Crédito',
            'Demandado',
            'Codemandado',
            'Meta Legal',
            'Tipo de Juzgado',
            'Juzgado',
            'Expediente',
            'Tipo de Juicio',
            'Ultima Fecha Boletin',
            'Extracto',
            'Última Nota de Seguimiento',
            'Fecha Próxima Acción',
            'Próxima Acción',
            'Moneda',
            'Monto demandado',
            'Importe de Crédito',
            'Macro Etapa',
            'Garantía',
            'Datos RPP',
            'Otros Domicilios',
           	'Procesos Asociados',
           	'Sala Apelación',
           	'Toca',
           	'Autoridad Amparo',
           	'Expediente Amparo',
           	'Autoridad Recurso Amparo',
           	'Expediente Recurso Amparo',
           	'Audiencia de Juicio'
        ];
    }

    public function collection()
    {
        
        $user = $this->user;

        if($user->hasRole('administrador')) {
            $juicios = Juicio::select()->orderBy('fecha_proxima_accion', 'ASC')->orderBy('juzgado_id', 'ASC')->get();
        } elseif ($user->hasRole('coordinador')) {
            $juicios_all = Juicio::select()->orderBy('fecha_proxima_accion', 'ASC')->orderBy('juzgado_id', 'ASC')->get();
            $juicios = $juicios_all->filter(function($key,$value) use ($user){
                $juicios_users = $key->juiciousers()->get();
                foreach ($juicios_users as $juicios_user) {
                    if($juicios_user->user_id == $user->id && $user->roles()->first()->slug == "coordinador"){
                        return true;
                    }
                }
            });
        } elseif ($user->hasRole('colaborador')) {
            $juicios_all = Juicio::select()->orderBy('fecha_proxima_accion', 'ASC')->orderBy('juzgado_id', 'ASC')->get();
            $juicios = $juicios_all->filter(function($key,$value) use ($user){
                $juicios_users = $key->juiciousers()->get();
                foreach ($juicios_users as $juicios_user) {
                    if($juicios_user->user_id == $user->id && $user->roles()->first()->slug == "colaborador"){
                        return true;
                    }
                }
            });
        } else {
            $juicios_all = Juicio::select()->orderBy('fecha_proxima_accion', 'ASC')->orderBy('juzgado_id', 'ASC')->get();
            $juicios = $juicios_all->filter(function($key,$value) use ($user){
                $juicios_users = $key->juiciousers()->get();
                foreach ($juicios_users as $juicios_user) {
                    if($juicios_user->user_id == $user->id && $user->roles()->first()->slug == "cliente"){
                        return true;
                    }
                }
            });
        }

        return $juicios;
    }

    /**
    * @var Juicio $juicio
    */
    public function map($juicio): array
    {
    	$juiciousers    = Juiciouser::where("juicio_id", $juicio->id)->get();
    	$demandados     = Demandado::where("juicio_id", $juicio->id)->get();
    	$juzgado_tipo   = Juzgadotipo::where("id", $juicio['juzgadotipo_id'])->first();
    	$juzgado  		= Juzgado::where("id", $juicio['juzgado_id'])->first();
    	$juicio_tipo  	= Juiciotipo::where("id", $juicio['juiciotipo_id'])->first();
    	$moneda  		= Moneda::where("id", $juicio['moneda_id'])->first();
    	$macroetapa		= Macroetapa::where("id", $juicio['macroetapa_id'])->first();
    	$salaapela		= Salaapela::where("id", $juicio['salaapela_id'])->first();
        $estado         = Estado::where("id", $juicio['estado_id'])->first();
        $nota          = Nota::where("juicio_id", $juicio->id)->orderBy("updated_at", "desc")->first();

    	foreach ($juiciousers as $juiciouser) {
          if ($juiciouser->role_id == 2) {
            $coordinador = $juiciouser->user()->first();
          }
          elseif($juiciouser->role_id == 3) {
            $colaborator = $juiciouser->user()->first();
          }
          elseif($juiciouser->role_id == 4) {
            $cliente = $juiciouser;
          }
        }

        foreach ($demandados as $demandado) {
        	if($demandado->codemandado == 1) {
        		$export_codemandado = $demandado;
        	} else {
        		$export_demandado = $demandado;
        	}
        }

        if(!isset($export_codemandado)) {
            $export_codemandado = new StdClass;
            $export_codemandado->name = "";
        }

        return [
            $juicio->id,
            $estado->estado,
            $juicio->portafolio,
            $cliente->user()->first()->name,
            $cliente->user_contact_info,
            $colaborator->name,
            $juicio->numero_credito,
            $export_demandado->name,
            $export_codemandado->name,
            $juicio->meta_legal,
            $juzgado_tipo->juztipo,
            $juzgado->juzgado,
            $juicio->expediente,
			$juicio_tipo->juiciotipo,
			$juicio->ultima_fecha_boletin,
			$juicio->extracto,
			$nota ? $nota->nota : "",
			$juicio->fecha_proxima_accion,
			$juicio->proxima_accion,
			$moneda->desc_moneda,
			$juicio->monto_demandado,
			$juicio->importe_credito,
			$macroetapa->macroetapa,
			$juicio->garantia,
			$juicio->datos_rpp,
			$juicio->otros_domicilios,
			$juicio->procesos_asoc,
			$salaapela->sala,
			$juicio->toca,
			$juicio->autoridad_amparo,
			$juicio->expediente_amparo,
			$juicio->autoridad_recurso_amparo,
			$juicio->expediente_recurso_amparo,
			$juicio->audiencia_juicio
            //Date::dateTimeToExcel($invoice->created_at),
        ];
    }
}