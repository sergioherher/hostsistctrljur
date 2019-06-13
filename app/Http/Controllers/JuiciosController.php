<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Juicio, App\Colaborator, App\Juzgado, App\Juiciotipo, App\Macroetapa, App\DocTipo, App\User, App\Estado, App\Salaapela, App\Juzgadotipo, App\Juiciouser, App\Demandado, App\DocJuicio, App\Moneda;
use Validator, Mail;
use App\Traits\MpdfTrait;
use Illuminate\Support\Facades\Storage;

class JuiciosController extends Controller
{
    use MpdfTrait;
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
        $moneda = Juicio::find($juicio_id)->moneda()->first();

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

        $coordinadores = User::whereHas('roles', function ($query) {
            $query->where('slug', '=', 'coordinador');
        })->get();

        foreach ($juiciousers as $juiciouser) {
          if ($juiciouser->role_id == 2) {
            $coordinador = $juiciouser->user()->first();
          }
          elseif($juiciouser->role_id == 3) {
            $colaborator = $juiciouser->user()->first();
          }
          elseif($juiciouser->role_id == 4) {
            $cliente = $juiciouser->user()->first();
          }
        }

        $monedas = Moneda::all();

        return view('juicios.verDetalleJuicio')->with('juicio', $juicio)
                                               ->with('moneda', $moneda)
                                               ->with('monedas', $monedas)             
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
                                               ->with('coordinadores', $coordinadores)
                                               ->with('coordinador', $coordinador)
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

        $coordinadores = User::whereHas('roles', function ($query) {
            $query->where('slug', '=', 'coordinador');
        })->get();

        $salaapelas = Salaapela::all();
        $juzgadotipos = Juzgadotipo::all();
        $monedas = Moneda::all();

        return view('juicios.cargarJuicio')->with('estados', $estados)
                                           ->with('colaborators', $users)
                                           ->with('juzgados', $juzgados)
                                           ->with('juiciotipos', $juiciotipos)
                                           ->with('macroetapas', $macroetapas)
                                           ->with('clientes', $clientes)
                                           ->with('doc_tipos', $doc_tipos)
                                           ->with('juzgadotipos',$juzgadotipos)
                                           ->with('salaapelas',$salaapelas)
                                           ->with('coordinadores', $coordinadores)
                                           ->with('monedas',$monedas);
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
                  'coordinador'       => 'required',
                  'cliente'           => 'required',
                  'colaborator'       => 'required',
                  'demandado'         => 'required',
                  'juiciotipo'        => 'required',
                  'macroetapa'        => 'required',
                  'salaapela'         => 'required',
              ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            
            return redirect()->back()->withErrors($validator->errors())
                                     ->withInput($request->all());

        } else {

            $estado = $request->input("estado");
            $coordinador = $request->input("coordinador");
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
            $audiencia_juicio = $request->input("audiencia_juicio");
            $moneda = $request->input("moneda");

            $editar_o_crear = $request->input("editar_o_crear");

            $user_cliente = User::where("id",$cliente)->first();
            $user_colaborador = User::where("id",$colaborador)->first();
            $user_coordinador = User::where("id",$coordinador)->first();

            try {

              if($editar_o_crear == 0) {

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
                $juicio->audiencia_juicio = $audiencia_juicio;
                $juicio->moneda_id = $moneda;
                $juicio->save();

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

                $juiciousuario_coordinador = new Juiciouser;
                $juiciousuario_coordinador->juicio_id = $juicio->id;
                $juiciousuario_coordinador->user_id = $coordinador;
                $juiciousuario_coordinador->user_name = $user_coordinador->name;
                $juiciousuario_coordinador->role_id = $user_coordinador->roles()->first()->id;
                $juiciousuario_coordinador->save();

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

                $resultado = array('operacion' => true, 'message' => "Juicio creado exitosamente", 'title' => 'Creación de Juicio', 'juicio_id' => $juicio->id);

              } else {

                $juicio_id = $request->input("juicio_id");

                $juicio = Juicio::where("id", $juicio_id)->first();
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
                $juicio->audiencia_juicio = $audiencia_juicio;
                $juicio->moneda_id = $moneda;
                $juicio->save();

                $juiciousuario_cliente = Juiciouser::where("juicio_id", $juicio_id)->where("role_id", 4)->first();
                $juiciousuario_cliente->user_name = $user_cliente->name;
                $juiciousuario_cliente->user_contact_info = $cliente_contact_info;
                $juiciousuario_cliente->user_id = $user_cliente->id;
                $juiciousuario_cliente->role_id = 4;
                $juiciousuario_cliente->save();

                $juiciousuario_colaborador = Juiciouser::where("juicio_id", $juicio_id)->where("role_id", 3)->first();
                $juiciousuario_colaborador->user_name = $user_colaborador->name;
                $juiciousuario_colaborador->role_id = 3;
                $juiciousuario_colaborador->user_id = $user_colaborador->id;
                $juiciousuario_colaborador->save();

                $juiciousuario_coordinador = Juiciouser::where("juicio_id", $juicio_id)->where("role_id", 2)->first();
                $juiciousuario_coordinador->user_name = $user_coordinador->name;
                $juiciousuario_coordinador->user_id = $user_coordinador->id;
                $juiciousuario_coordinador->role_id = 2;
                $juiciousuario_coordinador->save();

                $demandado = Demandado::where("juicio_id", $juicio_id)->where("codemandado", 0)->first();
                $demandado->name = $demandado_name;
                $demandado->save();

                if($codemandado_name != "") {
                    $codemandado = Demandado::where("juicio_id", $juicio_id)->where("codemandado", 1)->first();
                    $codemandado->name = $codemandado_name;
                    $codemandado->save();
                }

                if ($request->hasFile('pdf_file_1') && $request->file('pdf_file_1')->isValid()) {

                    $filename_fundatorio = "fundatorios-".$juicio->id.".pdf";

                    if($request->file('pdf_file_1')->storeAs($juicio->id, $filename_fundatorio, 'juicios')) {
                        $documento = new DocJuicio;
                        $documento->ruta_archivo = $filename_fundatorio;
                        $documento->juicio_id = $juicio->id;
                        $documento->doc_tipo_id = 1;
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

                $resultado = array('operacion' => true, 'message' => 'Juicio editado exitosamente', 'title' => 'Edición de Juicio');

                $emails = array($user_colaborador->email, 'sergioh81@gmail.com');

                $data = array('colaborador' => $user_colaborador, 'juicio' => $juicio, 'cliente' => $user_cliente);

                //from(config('app.senders.info.address'), config('app.senders.info.name'))
                Mail::send(['html' => 'emails.juicioEditado'], $data, function($msj) use ($emails) {
                    $msj->from('sisjurcontrol@gmail.com');
                    //$msj->from('facilposcorreo@gmail.com', $emails['from_name']);
                    $msj->subject("SISJUR | Juicio Editado");
                    $msj->to($emails);
                });

              }                                     

              return json_encode($resultado);

            } catch (Exception $e) {

                $resultado = array('operacion' => false, 'message' => $e->getMessage(), 'title' => 'Creación/Edición de Juicio');

                return json_encode($resultado);

            } catch (\Swift_TransportException $e) {    

                $resultado = array("operacion"=>false, "message"=>$e->getMessage(), 'title' => 'Envío de Email');

                return json_encode($resultado);
            }

        }
    }

    public function subirDocJuicio(Request $request) { 

      $doc_tipo_id = $request->input("doc_tipo_id");
      $juicio_id = $request->input("juicio_id");
      $doc_tipo_id = $request->input("doc_tipo_id");

      if ($request->hasFile('pdf_file') && $request->file('pdf_file')->isValid()) {

          if($doc_tipo_id == 1) {
            $archivo = "fundatorios";
          } elseif ($doc_tipo_id == 2) {
            $archivo = "expediente";
          } else {
            $archivo = "otros";
          }
          $filename_fundatorio = $archivo."-".$juicio_id.".pdf";

          if($request->file('pdf_file')->storeAs($juicio_id, $filename_fundatorio, 'juicios')) {
              $documento = new DocJuicio;
              $documento->ruta_archivo = $filename_fundatorio;
              $documento->juicio_id = $juicio_id;
              $documento->doc_tipo_id = $doc_tipo_id;
              $documento->save();

              $resultado = array('exito' => true, 'ruta' => url("doc_juicios/".$juicio_id."/".$archivo."-".$juicio_id.".pdf"), 'doc_tipo_id' => $doc_tipo_id, 'juicio_id' => $juicio_id);
          } else {
              $resultado = array('exito' => false, 'message'=>'Ocurrió un error al intentar subir el archivo, intente nuevamente', $title=>'Carga de archivo');
          }
      } else {
        $resultado = array('exito' => false, 'message'=>'Ocurrió un error al intentar subir el archivo, intente nuevamente', $title=>'Carga de archivo');
      }

      return json_encode($resultado);

    }

    public function subirArchivo(Request $request) {

      $juicio_id = $request->input("juicio_id");
      $extension = $request->file('file')->extension();
      
      if ($request->hasFile('file') && $request->file('file')->isValid()) {

          $temp_file_name = "temp_file-".$juicio_id.".".$request->file('file')->extension();

          $otros_pdf = storage_path("app/juicios/".$juicio_id."/otros-".$juicio_id.".pdf");

          //$ruta = url("/img_temp/".$juicio_id."/".$request->file('file')->extension());
          $ruta = storage_path("app/temp_files/".$temp_file_name);
          //$ruta = url($temp_file_name);          

          if($request->file('file')->storeAs("", $temp_file_name, 'temp_files')) {

            $mpdf = $this->MpdfObject();
            $mpdf->showImageErrors = true;

            //$pagecount = $mpdf->SetSourceFile(storage_path("app/juicios/".$juicio_id."/otros-".$juicio_id.".pdf"));
            //$import_page = $mpdf->ImportPage(1);

            //$mpdf->UseTemplate($import_page);

            // Add Last page
            /*$mpdf->AddPageByArray(array(
              'orientation' => 'P',
              'ohvalue' => 1,
              'ehvalue' => -1,
              'ofvalue' => -1,
              'efvalue' => -1,
              'newformat' => 'Letter'
            ));*/


            try {
            //$mpdf->Image($ruta, 0, 0, 210, 297, $extension, '', true, false);
              if(file_exists($otros_pdf)) {
              
                $pagecount = $mpdf->SetSourceFile($otros_pdf);
                for ($i = 1; $i <= $pagecount; $i++) {
                  $tplId = $mpdf->ImportPage($i);
                  $mpdf->UseTemplate($tplId);
                  $mpdf->WriteHTML('<pagebreak />');
                }

              } else {

                $documento = new DocJuicio;
                $documento->ruta_archivo = "otros-".$juicio_id.".pdf";
                $documento->juicio_id = $juicio_id;
                $documento->doc_tipo_id = 3;
                $documento->save();

              }

              if($extension == "jpeg" || $extension == "jpg" || $extension == "png") { 
                $mpdf->WriteHTML("<img width='100%' height='297cm' src='".$ruta."'/>");
              } elseif ($extension == "pdf") {
                $pagecount = $mpdf->SetSourceFile($ruta);
                for ($i = 1; $i <= $pagecount; $i++) {
                  $tplId = $mpdf->ImportPage($i);
                  $mpdf->UseTemplate($tplId);
                  $mpdf->WriteHTML('<pagebreak />');
                }
              }

              $mpdf->Output($otros_pdf, \Mpdf\Output\Destination::FILE);  

              $resultado = array('exito' => true, 'ruta' => url("doc_juicios/".$juicio_id."/otros-".$juicio_id.".pdf"), 'tipo_doc' => 3);
            } catch (\Mpdf\MpdfException $e) {
              $resultado = array('exito' => false, 'error' => $e->getMessage());
            }
              
          }
      }

      /*if(!file_exists($technical_drawing)) {
        $mpdf = $this->MpdfObject();
      } else {
        $mpdf = $this->MpdfObject();

        $pagecount = $mpdf->SetSourceFile($technical_drawing);
        $import_page = $mpdf->ImportPage(1);

        $mpdf->UseTemplate($import_page);

        // Add Last page
        $mpdf->AddPageByArray(array(
          'orientation' => 'P',
          'ohvalue' => 1,
          'ehvalue' => -1,
          'ofvalue' => -1,
          'efvalue' => -1,
          'newformat' => 'Letter'
        ));
      }

      $mpdf->WriteHTML($html);
      $mpdf->Output($output_file, 'I');

      exit;*/


      return json_encode($resultado);
    }

    public function getDocuments($jucio_id, $doc_tipo_id) {

      if($doc_tipo_id == 1) {
        $path = storage_path("app/juicios/".$jucio_id."/fundatorios-".$jucio_id.".pdf");  
      } elseif ($doc_tipo_id == 2) {
        $path = storage_path("app/juicios/".$jucio_id."/expediente-".$jucio_id.".pdf");  
      } else {
        $path = storage_path("app/juicios/".$jucio_id."/otros-".$jucio_id.".pdf");  
      }
      
      return response()->file($path);
    }

    public function getImageTemp($juicio_id, $extension) {


      $path = storage_path("app/temp_files/temp_file-".$juicio_id.".".$extension);
      
      return response()->file($path);
    }

    public function deleteDocument(Request $request) {
      
      $juicio_id = $request->input("juicio_id");
      $doc_tipo_id = $request->input("doc_tipo_id");

      try {
        $url_fund = storage_path('app/juicios/'.$juicio_id.'/fundatorios-'.$juicio_id.'.pdf');
        $url_expe = storage_path('app/juicios/'.$juicio_id.'/expediente-'.$juicio_id.'.pdf');
        $url_otro = storage_path('app/juicios/'.$juicio_id.'/otros-'.$juicio_id.'.pdf');
        if($doc_tipo_id == 1) {
          if(unlink($url_fund)) {
            $doc_juicio = DocJuicio::where('juicio_id', $juicio_id)->where("doc_tipo_id", $doc_tipo_id)->first();
            $doc_juicio->delete();
            $result = array('operacion' => true, 'message' => "exitoso", "doc_tipo_id" => $doc_tipo_id);
          } else {
            $result = array('operacion' => false, 'message' => $url_fund);
          }
        } elseif ($doc_tipo_id == 2) {
          if(unlink($url_expe)) {
            $doc_juicio = DocJuicio::where('juicio_id', $juicio_id)->where("doc_tipo_id", $doc_tipo_id)->first();
            $doc_juicio->delete();
            $result = array('operacion' => true, 'message' => "exitoso", "doc_tipo_id" => $doc_tipo_id);
          } else {
            $result = array('operacion' => false, 'message' => $url_expe);
          }
        } else {
          if(unlink($url_otro)) {
            $doc_juicio = DocJuicio::where('juicio_id', $juicio_id)->where("doc_tipo_id", $doc_tipo_id)->first();
            $doc_juicio->delete();
            $result = array('operacion' => true, 'message' => "exitoso", "doc_tipo_id" => $doc_tipo_id);
          } else {
            $result = array('operacion' => false, 'message' => $url_otro);
          }
        }       

      } catch (Exception $e) {
        $result = array('operacion' => false, 'message' => "Falló");
      }
      
      return json_encode($result);

    }
}
