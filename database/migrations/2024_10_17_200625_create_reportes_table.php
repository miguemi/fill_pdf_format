<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportesTable extends Migration
{
    public function up()
    {
        Schema::create('reportes', function (Blueprint $table) {
            $table->id();
            $table->string('f');
            $table->string('f_2');
            $table->string('f_3');
            $table->string('control');
            $table->integer('minutos');
            $table->string('telefono');
            $table->string('personal');
            $table->date('fecha');
            $table->string('salida');
            $table->string('hora_salida');
            $table->string('entrada');
            $table->string('hora_entrada');
            $table->string('direccion');
            $table->string('solicitantes');
            $table->string('pacientes1')->nullable();
            $table->string('pacientes2')->nullable();
            $table->string('pacientes3')->nullable();
            $table->integer('fallecidos1')->default(0);
            $table->integer('fallecidos2')->default(0);
            $table->string('edades');
            $table->string('domicilios');
            $table->string('escoltas')->nullable();
            $table->string('maternidad');
            $table->string('transito');
            $table->string('trabajo');
            $table->string('accidente_otro1')->nullable();
            $table->string('accidente_otro2')->nullable();
            $table->string('hospital_roosevelt');
            $table->string('hospital_general');
            $table->string('hospital_igss');
            $table->string('hospital_otro')->nullable();
            $table->string('radiotelefonista');
            $table->string('pilotos');
            $table->string('unidades');
            $table->string('personal1');
            $table->string('personal2')->nullable();
            $table->string('formalizado');
            $table->string('conforme');
            $table->string('vobo');
            $table->string('razon1');
            $table->string('razon2')->nullable();
            $table->string('sra1');
            $table->string('sra2')->nullable();
            $table->string('dia');
            $table->string('mes');
            $table->string('anio');
            $table->string('secretaria');
            $table->text('observaciones')->nullable();
            $table->string('si_fallecido');
            $table->string('no_fallecido');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reportes');
    }
}
