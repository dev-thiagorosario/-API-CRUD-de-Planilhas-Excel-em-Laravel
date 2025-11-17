<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enum\StatusEnum;
use App\Enum\PriorityEnum;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('agendas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->date('data');
            $table->string('dia_da_semana');
            $table->time('hora_incio')->nullable();
            $table->time('hora_fim')->nullable();

            $table->string('titulo');
            $table->text('descricao')->nullable();
            $table->string('local')->nullable();

            $table->string('categoria')->nullable();

            $table->enum(
                'prioridade',
                array_column(PriorityEnum::cases(), 'value')
            );
            $table->enum(
                'status',
                array_column(StatusEnum::cases(), 'value')
            );

            $table->text('observacoes')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('agendas');
    }
};
