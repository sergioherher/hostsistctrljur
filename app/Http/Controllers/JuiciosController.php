<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Juicio, App\Colaborator, App\Juzgado, App\Juiciotipo, App\Macroetapa, App\DocTipo, App\User, App\Estado, App\Salaapela, App\Juzgadotipo, App\Juiciouser, App\Demandado, App\DocJuicio;
use Validator, Mail;

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
        $juzgadotipo = Juicio::find($juicio_id)->juzgadotipo()->first();
        $juiciotipo = Juicio::find($juicio_id)->juiciotipo()->first();
        $juiciousers = Juicio::find($juicio_id)->juiciousers()->get();
        $macroetapa = Juicio::find($juicio_id)->macroetapa()->first();
        $demandados = Juicio::find($juicio_id)->demandados()->get();
        $documentos = Juicio::find($juicio_id)->doc_juicios()->get();
        $estado = Juicio::find($juicio_id)->estado()->first();
        $salaapela = Juicio::find($juicio_id)->salaapela()->first();

        $salaapelas = Salaapela::all();
        $juzgadotipos = Juzgadotipo::all();
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

        foreach ($juiciousers as $juiciouser) {
          if($juiciouser->role_id == 2) {
            $colaborator = $juiciouser->user()->first();
          }
          elseif($juiciouser->role_id == 3) {
            $cliente = $juiciouser->user()->first();
          }
        }

        return view('juicios.verDetalleJuicio')->with('juicio', $juicio)
                                               ->with('estado', $estado)
                                               ->with('estados', $estados)
                                               ->with('colaborators', $users)
                                               ->with('colaborator', $colaborator)
                                               ->with('juzgado', $juzgado)
                                               ->with('juzgados', $juzgados)
                                               ->with('juzgadotipos', $juzgadotipos)
                                               ->with('juzgadotipo', $juzgadotipo)
                                               ->with('juiciotipo', $juiciotipo)
                                               ->with('juiciotipos', $juiciotipos)
                                               ->with('cliente', $cliente)
                                               ->with('clientes', $clientes)
                                               ->with('macroetapa', $macroetapa)
                                               ->with('macroetapas', $macroetapas)
                                               ->with('demandados', $demandados)
                                               ->with('documentos', $documentos)
                                               ->with('doc_tipos', $doc_tipos)
                                               ->with('salaapelas', $salaapelas)
                                               ->with('salaapela', $salaapela);
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
            $demandado_name = $request->input("demandado");
            $codemandado_name = $request->input("codemandado");
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

                $user_cliente = User::where("id",$cliente)->first();
                $user_colaborador = User::where("id",$colaborador)->first();

                $juiciousuario_cliente = new Juiciouser;
                $juiciousuario_cliente->juicio_id = $juicio->id;
                $juiciousuario_cliente->user_id = $cliente;
                $juiciousuario_cliente->user_name = $user_cliente->name;
                $juiciousuario_cliente->user_contact_info = $cliente_contact_info;
                $juiciousuario_cliente->role_id = $user_cliente->roles()->first()->id;
                $juiciousuario_cliente->save();

                $juiciousuario_colaborador = new Juiciouser;
                $juiciousuario_colaborador->juicio_id = $juicio->id;
                $juiciousuario_colaborador->user_id = $colaborador;
                $juiciousuario_colaborador->user_name = $user_colaborador->name;
                $juiciousuario_colaborador->role_id = $user_colaborador->roles()->first()->id;
                $juiciousuario_colaborador->save();

                $demandado = new Demandado;
                $demandado->juicio_id = $juicio->id;
                $demandado->name = $demandado_name;
                $demandado->codemandado = 0;
                $demandado->save();

                if($codemandado_name != "") {
                    $codemandado = new Demandado;
                    $codemandado->juicio_id = $juicio->id;
                    $codemandado->name = $codemandado_name;
                    $codemandado->codemandado = 1;
                    $codemandado->save();
                }

                if ($request->hasFile('pdf_file_1') && $request->file('pdf_file_1')->isValid()) {

                    $filename_fundatorio = "fundatorio-".$juicio->id.".pdf";

                    if($request->file('pdf_file_1')->storeAs($juicio->id, $filename_fundatorio, 'juicios')) {
                        $documento = new DocJuicio;
                        $documento->ruta_archivo = $filename_fundatorio;
                        $documento->juicio_id = $juicio->id;
                        $documento->doc_tipo_id = 2;
                        $documento->save();
                    }
                }

                if ($request->hasFile('pdf_file_2') && $request->file('pdf_file_2')->isValid()) {

                    $filename_expediente = "expediente-".$juicio->id.".pdf";
                    
                    if($request->file('pdf_file_2')->storeAs($juicio->id, $filename_expediente, 'juicios')) {
                        $documento = new DocJuicio;
                        $documento->ruta_archivo = $filename_expediente;
                        $documento->juicio_id = $juicio->id;
                        $documento->doc_tipo_id = 2;
                        $documento->save();
                    }
                }

                if ($request->hasFile('pdf_file_3') && $request->file('pdf_file_3')->isValid()) {

                    $filename_otros = "otros-".$juicio->id.".pdf";
                    
                    if($request->file('pdf_file_3')->storeAs($juicio->id, $filename_otros, 'juicios')){
                        $documento = new DocJuicio;
                        $documento->ruta_archivo = $filename_otros;
                        $documento->juicio_id = $juicio->id;
                        $documento->doc_tipo_id = 3;
                        $documento->save();
                    }
                }

                $resultado = array('operacion' => true, 'message' => "Juicio creado exitosamente");

                $email = $user_colaborador->email;

                $data = array('colaborador' => $user_colaborador, 'juicio' => $juicio, 'cliente' => $user_cliente);

                //from(config('app.senders.info.address'), config('app.senders.info.name'))
                Mail::send(['html' => 'emails.juicioCreado'], $data, function($msj) use ($email) {
                    $msj->from('sisjurcontrol@gmail.com');
                    //$msj->from('facilposcorreo@gmail.com', $emails['from_name']);
                    $msj->subject("SISJUR | Juicio Creado");
                    $msj->to($email);
                });

                return redirect("home")->with("resultado", json_encode($resultado));

            } catch (Exception $e) {

                $resultado = array('operacion' => false, 'message' => $e->getMessage());

                return redirect()->back()->with("resultado", json_encode($resultado))
                                         ->withInput($request->all());

            } catch (\Swift_TransportException $e) {

                $resultado = array("operacion"=>true, "error_email"=>$e->getMessage());

                return redirect("home")->with("resultado", json_encode($resultado));
            }

        }
    }
}
