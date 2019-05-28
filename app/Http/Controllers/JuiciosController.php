<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Juicio, App\Colaborator, App\Juzgado, App\Juiciotipo, App\Macroetapa, App\DocTipo, App\User, App\Estado, App\Salaapela, App\Juzgadotipo;
use Validator;

class JuiciosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Muestra el detalle de un juicio
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function detalleJuicio($juicio_id)
    {
        $juicio  = Juicio::where('id', $juicio_id)->first();
        $juzgado = Juicio::find($juicio_id)->juzgado()->first();
        $juiciotipo = Juicio::find($juicio_id)->juiciotipo()->first();
        $juiciousers = Juicio::find($juicio_id)->juiciousers()->get();
        $macroetapa = Juicio::find($juicio_id)->macroetapa()->first();
        $demandados = Juicio::find($juicio_id)->demandados()->get();
        $documentos = Juicio::find($juicio_id)->doc_juicios()->get();

        $juzgados = Juzgado::all();
        $juiciotipos = Juiciotipo::all();
        $macroetapas = Macroetapa::all();
        $doc_tipos = DocTipo::all();
        $users = User::whereHas('roles', function ($query) {
            $query->where('slug', '=', 'colaborador');
        })->get();

        $clientes = User::whereHas('roles', function ($query) {
            $query->where('slug', '=', 'cliente');
        })->get();

        foreach ($juiciousers as $juiciouser) {
          if($juiciouser->role_id == 2) {
            $colaborator = $juiciouser->user()->first();
          }
          elseif($juiciouser->role_id == 3) {
            $cliente = $juiciouser->user()->first();
          }
        }

        return view('juicios.verDetalleJuicio')->with('juicio', $juicio)
                                               ->with('colaborators', $users)
                                               ->with('colaborator', $colaborator)
                                               ->with('juzgado', $juzgado)
                                               ->with('juzgados', $juzgados)
                                               ->with('juiciotipo', $juiciotipo)
                                               ->with('juiciotipos', $juiciotipos)
                                               ->with('cliente', $cliente)
                                               ->with('macroetapa', $macroetapa)
                                               ->with('macroetapas', $macroetapas)
                                               ->with('demandados', $demandados)
                                               ->with('documentos', $documentos)
                                               ->with('doc_tipos', $doc_tipos);
    }

    /**
     * Muestra el detalle de un juicio
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function cargarJuicio()
    {
        $estados = Estado::all();
        $juzgados = Juzgado::all();
        $juiciotipos = Juiciotipo::all();
        $macroetapas = Macroetapa::all();
        $doc_tipos = DocTipo::all();
        $users = User::whereHas('roles', function ($query) {
            $query->where('slug', '=', 'colaborador');
        })->get();

        $clientes = User::whereHas('roles', function ($query) {
            $query->where('slug', '=', 'cliente');
        })->get();

        $salaapelas = Salaapela::all();
        $juzgadotipos = Juzgadotipo::all();

        return view('juicios.cargarJuicio')->with('estados', $estados)
                                           ->with('colaborators', $users)
                                           ->with('juzgados', $juzgados)
                                           ->with('juiciotipos', $juiciotipos)
                                           ->with('macroetapas', $macroetapas)
                                           ->with('clientes', $clientes)
                                           ->with('doc_tipos', $doc_tipos)
                                           ->with('juzgadotipos',$juzgadotipos)
                                           ->with('salaapelas',$salaapelas);
    }

    public function guardarJuicio(Request $request)
    {
        $messages = [
            'required'    => 'Este campo es requerido',
            'min'         => 'Ingrese al menos :min caracteres',
            'max'         => 'Ingrese hasta :max caracteres',
            'unique'      => 'El valor de este campo ya existe, elija uno diferente',
            'email'       => 'Ingrese una dirección de correo válida',
            'integer'     => 'Ingrese solo números',
            'required_if' => 'Este campo es requerido.'
        ];

        $rules = [
                  'cliente'           => 'required',
                  'colaborator'       => 'required',
                  'demandado'         => 'required',
                  'juzgadotipo'       => 'required',
                  'juzgado'           => 'required',
                  'juiciotipo'        => 'required',
                  'numero_credito'    => 'numeric',
                  'expediente'        => 'required',
                  'macroetapa'        => 'required',
                  'salaapela'         => 'required',
              ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            
            return redirect()->back()->withErrors($validator->errors())
                                     ->withInput($request->all());

        } else {

            $estado = $request->input("estado");
            $cliente = $request->input("cliente");
            $colaborador = $request->input("colaborator");
            $cliente_contact_info = $request->input("cliente_contact_info");
            $numero_credito = $request->input("numero_credito");
            $demandado = $request->input("demandado");
            $codemandado = $request->input("codemandado");
            $juzgadotipo = $request->input("juzgadotipo");
            $juzgado = $request->input("juzgado");
            $juiciotipo = $request->input("juiciotipo");
            $ultima_fecha_boletin = $request->input("ultima_fecha_boletin");
            $extracto = $request->input("extracto");
            $expediente = $request->input("expediente");
            $notas_seguimiento = $request->input("notas_seguimiento");
            $fecha_proxima_accion = $request->input("fecha_proxima_accion");
            $proxima_accion = $request->input("proxima_accion");
            $monto_demandado = $request->input("monto_demandado");
            $importe_credito = $request->input("importe_credito");
            $macroetapa = $request->input("macroetapa");
            $garantia = $request->input("garantia");
            $datos_rpp = $request->input("datos_rpp");
            $otros_domicilios = $request->input("otros_domicilios");
            $procesos_asociados = $request->input("procesos_asociados");
            $salaapela = $request->input("salaapela");
            $toca = $request->input("toca");
            $autoridad_amparo = $request->input("autoridad_amparo");
            $expediente_amparo = $request->input("expediente_amparo");
            $autoridad_recurso_amparo = $request->input("autoridad_recurso_amparo");
            $expediente_recurso_amparo = $request->input("expediente_recurso_amparo");

            try {

                $juicio = new Juicio;
                $juicio->estado_id = $estado;
                $juicio->numero_credito = $numero_credito;
                $juicio->juzgado_id = $juzgado;
                $juicio->juzgadotipo_id = $juzgadotipo;
                $juicio->expediente = $expediente;
                $juicio->juiciotipo_id = $juiciotipo;
                $juicio->ultima_fecha_boletin = $ultima_fecha_boletin;
                $juicio->extracto = $extracto;
                $juicio->expediente= $expediente;
                $juicio->notas_seguimiento = $notas_seguimiento;
                $juicio->fecha_proxima_accion = $fecha_proxima_accion;
                $juicio->proxima_accion = $proxima_accion;
                $juicio->monto_demandado = $monto_demandado;
                $juicio->importe_credito = $importe_credito;
                $juicio->macroetapa_id = $macroetapa;
                $juicio->garantia = $garantia;
                $juicio->datos_rpp = $datos_rpp;
                $juicio->otros_domicilios = $otros_domicilios;
                $juicio->procesos_asoc = $procesos_asociados;
                $juicio->salaapela_id = $salaapela;
                $juicio->toca = $toca;
                $juicio->autoridad_amparo = $autoridad_amparo;
                $juicio->expediente_amparo = $expediente_amparo;
                $juicio->autoridad_recurso_amparo = $autoridad_recurso_amparo;
                $juicio->expediente_recurso_amparo = $expediente_recurso_amparo;
                $juicio->save();

                $user_cliente = User::find($cliente)->first();
                $user_colaborador = User::find($colaborador)->first();

                $juiciousuario = new Juiciousuario;
                $juiciousuario->juicio_id = $juicio->id;
                $juiciousuario->user_id = $cliente;
                $juiciousuario->user_name = $user_cliente->name;
                $juiciousuario->user_contact_info = $cliente_contact_info;
                $juiciousuario->role_id = $user_cliente->roles()->first()->id;
                $juiciousuario->save();

                $juiciousuario = new Juiciousuario;
                $juiciousuario->juicio_id = $juicio->id;
                $juiciousuario->user_id = $colaborador;
                $juiciousuario->user_name = $user_colaborador->name;
                $juiciousuario->role_id = $user_colaborador->roles()->first()->id;
                $juiciousuario->save();

                $demandado = new Demandado;
                $demandado->juicio_id = $juicio->id;
                $demandado->name = $demandado;
                $demandado->codemandado = 0;
                $demandado->save();

                if($codemandado != "") {
                    $demandado = new Demandado;
                    $demandado->juicio_id = $juicio->id;
                    $demandado->name = $codemandado;
                    $demandado->codemandado = 1;
                    $demandado->save();
                }

                if ($request->hasFile('pdf-file-1') && $request->file('pdf-file-1')->isValid()) {

                    $filename_fundatorio = $juicio->id."/fundatorio-".$juicio->id.".pdf";
                    if($request->file('pdf-file-1')->store($filename_fundatorio, 'juicios')) {
                        $documento = new DocJuicio;
                        $documento->ruta_archivo = $filename_fundatorio;
                        $documento->juicio_id = $juicio->id;
                        $documento->doc_tipo_id = 2;
                        $documento->save();
                    }
                }

                if ($request->hasFile('pdf-file-2') && $request->file('pdf-file-2')->isValid()) {

                    $filename_expediente = $juicio->id."/expediente-".$juicio->id.".pdf";
                    if($request->file('pdf-file-2')->store($filename_expediente, 'juicios')) {
                        $documento = new DocJuicio;
                        $documento->ruta_archivo = $filename_expediente;
                        $documento->juicio_id = $juicio->id;
                        $documento->doc_tipo_id = 2;
                        $documento->save();
                    }
                }

                if ($request->hasFile('pdf-file-3') && $request->file('pdf-file-3')->isValid()) {

                    $filename_otros = $juicio->id."/otros-".$juicio->id.".pdf";
                    if($request->file('pdf-file-3')->store($filename_otros, 'juicios')){
                        $documento = new DocJuicio;
                        $documento->ruta_archivo = $filename_otros;
                        $documento->juicio_id = $juicio->id;
                        $documento->doc_tipo_id = 3;
                        $documento->save();
                    }
                }

                $resultado = array('operacion' => true, 'message' => "Juicio creado exitosamente");

                return redirect("home")->with("resultado", json_encode($resultado));

            } catch (Exception $e) {

                $resultado = array('operacion' => false, 'message' => $e->getMessage());

                return redirect()->back()->with("resultado", json_encode($resultado))
                                         ->withInput($request->all());

            }

        }
    }
}
