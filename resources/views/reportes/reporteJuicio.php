<!DOCTYPE html>
<html lang="en">

    <!-- begin::Head -->
    <head>
        <meta charset="utf-8" />
        <title>Sistema de Control Jurídico | Escritorio</title>
        <meta name="description" content="Latest updates and statistic charts">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!--begin::Fonts -->
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
        <script>
            WebFont.load({
                google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
                active: function() {
                    sessionStorage.fonts = true;
                }
            });
        </script>
        <style type="text/css">
        	.table1 td {
        		font-size: 12px;
        		width: 30%;
        	}

        	.table2 td {
        		font-size: 12px;
        		width: 50%;
        	}

        	.table3 td {
        		font-size: 12px;
        	}

        	.table4 td {
        		font-size: 12px;
        	}

        	h2 {
        		font-size: 18px;
        		line-height: 5px;
        	}

        	h3 {
				font-size: 16px;
        		line-height: 5px;        		
        	}

        	table tr td {
        		line-height: 40px;
        	}

        	.separador {
        		 border-top: solid; 
        		 border-width: 1px;
        	}

        	.titulo {
        		font-weight: bold;
        	}

        	.nota_nota {
        		width: 60%;
        	}

        	.fecha_nota {
        		width: 20%;
        	}
        	
        	.autor_nota {
        		width: 20%;
        	}
        </style>
    </head>

    <!-- end::Head -->

    <!-- begin::Body -->
    <body>
    	<div style="text-align: center;">
	    	<h2> Sistema de Control Jurídico </h2>
	    	<h2> Reporte de Juicio </h2>
	    	<h3> Expediente: <?= $juicio->expediente ?> </h3>
	    	<h3> Coordinador: <?= $coordinador->name ?> </h3>
		</div>
        <table class="table1" width="100%">
        	<tr>
        		<td class="separador">
        			<span class="titulo">Estado:</span> <?= $estado->estado ?>
        		</td>
        		<td class="separador" colspan="2">
        			<span class="titulo">Cliente:</span> <?= $cliente->user()->first()->name ?>
        		</td>
        	</tr>
        	<tr>
        		<td>
        			<span class="titulo">Colaborador:</span> <?= $colaborador->name ?>
        		</td>
        		<td colspan="2">
        			<span class="titulo">Info de Contacto del Cliente:</span> <?= $cliente->user_contact_info ?>
        		</td>
        	</tr>        	
        	<tr>
        		<td>
        			<span class="titulo">Numero de Crédito:</span> <?= $juicio->numero_credito ?>
        		</td>
        		<td colspan="2">
        			<span class="titulo">Demandado:</span> <?= $demandado->name ?>
        		</td>
        	</tr>    	
        	<tr>
        		<td>
        			
        		</td>
        		<td colspan="2">
        			<span class="titulo">Codemandado:</span> <?= $codemandado->name ?>
        		</td>
        	</tr>        	    	
        	<tr>
        		<td>
        			<span class="titulo">Meta legal:</span> <?= $juicio->meta_legal ?>
        		</td>
        		<td>
        			<span class="titulo">Tipo de juzgado:</span> <?= $juzgadotipo->juztipo ?>
        		</td>        		
        		<td>
        			<span class="titulo">Tipo de juzgado:</span> <?= $juzgadotipo->juztipo ?>
        		</td>
        	</tr>
        	<tr>
        		<td>
        			<span class="titulo">Tipo de juicio:</span> <?= $juiciotipo->juiciotipo ?>
        		</td>
        		<td>
        			<span class="titulo">Ultima fecha de boletin judicial:</span> <?= $juicio->ultima_fecha_boletin ?>
        		</td>        		
        		<td>
        			<span class="titulo">Extracto:</span> <?= $juicio->extracto ?>
        		</td>
        	</tr>
        </table>
        <table class="table3" width="100%">
        	<?php if($notas->count() > 0) { ?>
        	<tr>
        		<td colspan="3" class="separador" style="text-align: center;">
        			<span class="titulo">Notas de seguimiento:</span>
        		</td>
        	</tr>
        	<tr>
        		<td class="separador nota_nota">
        			<span class="titulo">Nota:</span>
        		</td>
        		<td class="separador fecha_nota">
        			<span class="titulo">Fecha:</span>
        		</td>        		
        		<td class="separador autor_nota">
        			<span class="titulo">Escrita por:</span>
        		</td>
        	</tr>
        	<?php } ?>
        	<?php foreach ($notas as $nota) { ?>
        	<tr>
        		<td>
        			<?= $nota->nota ?>
        		</td>
        		<td>
        			<?= $nota->updated_at ?>
        		</td>        		
        		<td>
        			<?= $nota->user()->first()->name ?>
        		</td>
        	</tr>
        	<?php } ?>
        </table>
        <table class="table4" width="100%">        	
        	<tr>
        		<td class="separador">
        			<span class="titulo">Fecha de próxima acción:</span> <?= $juicio->fecha_proxima_accion ?>
        		</td>
        		<td class="separador" colspan="2">
        			<span class="titulo">Proxima acción:</span> <?= $juicio->proxima_accion ?>
        		</td>
        	</tr>
        	<tr>
        		<td class="separador" colspan="3" style="text-align: center;">
        			<h3> Antecedentes / Detalles del Juicio</h3>
        		</td>
        	</tr>
        </table>
        <table class="table2" width="100%">
        	<tr>
        		<td class="separador">
        			<span class="titulo">Moneda: </span> <?= $moneda->moneda ?>
        		</td>
        		<td class="separador">
        			<span class="titulo">Monto demandado: </span> <?= $juicio->monto_demandado ?>
        		</td>
        	</tr>        	
        	<tr>
        		<td>
        			<span class="titulo">Importe del crédito: </span> <?= $juicio->importe_credito ?>
        		</td>
        		<td>
        			<span class="titulo">Macro etapa: </span> <?= $macroetapa->macroetapa ?>
        		</td>
        	</tr>        	
        	<tr>
        		<td>
        			<span class="titulo">Garantia: </span> <?= $juicio->garantia ?>
        		</td>
        		<td>
        			<span class="titulo">Datos de registro público de la propiedad: </span> <?= $juicio->datos_rpp ?>
        		</td>
        	</tr>        	        	
        	<tr>
        		<td>
        			<span class="titulo">Otros domicilios: </span> <?= $juicio->otros_domicilios ?>
        		</td>
        		<td>
        			<span class="titulo">Procesos asociados: </span> <?= $juicio->procesos_asoc ?>
        		</td>
        	</tr>        	        	
        	<tr>
        		<td>
        			<span class="titulo">Sala de apelacion: </span> <?= $salaapela->salaapela ?>
        		</td>
        		<td>
        			<span class="titulo">Toca: </span> <?= $juicio->toca ?>
        		</td>
        	</tr>        	        	
        	<tr>
        		<td>
        			<span class="titulo">Autoridad amparo: </span> <?= $juicio->atoridad_amparo ?>
        		</td>
        		<td>
        			<span class="titulo">Expediente amparo: </span> <?= $juicio->expediente_amparo ?>
        		</td>
        	</tr>        	        	
        	<tr>
        		<td>
        			<span class="titulo">Autoridad recurso de amparo: </span> <?= $juicio->autoridad_recurso_amparo ?>
        		</td>
        		<td>
        			<span class="titulo">Expediente recurso de amparo: </span> <?= $juicio->expediente_recurso_amparo ?>
        		</td>
        	</tr>        	        	
        	<tr>
        		<td colspan="2">
        			<span class="titulo">Audiencias de juicio: </span> <?= $juicio->audeincia_juicio ?>
        		</td>
        	</tr>
    	</table>
    	<table class="table1" width="100%">
        	<tr>
        		<td class="separador" colspan="3" style="text-align: center;">
        			<h3> Expediente Electrónico</h3>
        		</td>
        	</tr>
        	<tr>
        		<?php foreach ($doc_tipos as $doc_tipo) { ?>
        			<td class="separador">
        				<span class="titulo"><?=$doc_tipo->tipo?>: </span>
        				<?php foreach ($documentos as $documento) { 
        					if($documento->doc_tipo_id == $doc_tipo->id) {?>
        					<a href="/doc_juicios/<?=$juicio->id?>/<?=$doc_tipo->id?>" target="_blank"><?=$documento->ruta_archivo?></a>
        				<?php }
        				} ?>
        			</td>
        		<?php } ?>
        	</tr>
        </table>
    </body>

    <!-- end::Body -->
</html>