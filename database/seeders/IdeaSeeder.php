<?php

namespace Database\Seeders;

use App\Models\Idea;
use Illuminate\Database\Seeder;

class IdeaSeeder extends Seeder
{
    public function run(): void
    {
        Idea::firstOrCreate([
            'titulo' => 'Aplicación para organizar citas veterinarias',
            'descripcion' => 'Sistema para registrar y organizar citas de mascotas.',
            'estado' => 'registrada',
            'autor' => 'Jose',
            'categoria_id' => 1
        ]);

        Idea::firstOrCreate([
            'titulo' => 'Gestor de contraseñas empresariales',
            'descripcion' => 'Aplicación web para compartir credenciales de forma segura en equipos.',
            'estado' => 'en revisión',
            'autor' => 'Carlos',
            'categoria_id' => 1
        ]);

        Idea::firstOrCreate([
            'titulo' => 'Sistema de inventario con código QR',
            'descripcion' => 'Herramienta para rastrear entradas y salidas de almacén con la cámara del celular.',
            'estado' => 'aprobada',
            'autor' => 'Lucia',
            'categoria_id' => 1
        ]);

        Idea::firstOrCreate([
            'titulo' => 'Plataforma para cursos en línea',
            'descripcion' => 'Sistema para ofrecer cursos y materiales educativos.',
            'estado' => 'en revisión',
            'autor' => 'Pedro',
            'categoria_id' => 2
        ]);

        Idea::firstOrCreate([
            'titulo' => 'Plataforma para cursos presenciales',
            'descripcion' => 'Sistema para ofrecer cursos presenciales y materiales educativos.',
            'estado' => 'en revisión',
            'autor' => 'Maria',
            'categoria_id' => 2
        ]);

        Idea::firstOrCreate([
            'titulo' => 'Biblioteca digital colaborativa',
            'descripcion' => 'Red para que estudiantes compartan apuntes, resúmenes y guías de estudio.',
            'estado' => 'registrada',
            'autor' => 'Raul',
            'categoria_id' => 2
        ]);

        Idea::firstOrCreate([
            'titulo' => 'Recordatorio de toma de medicamentos',
            'descripcion' => 'Aplicación móvil que envía alertas a pacientes con tratamientos crónicos.',
            'estado' => 'registrada',
            'autor' => 'Elena',
            'categoria_id' => 3
        ]);

        Idea::firstOrCreate([
            'titulo' => 'Historial clínico digital unificado',
            'descripcion' => 'Plataforma para consultar expedientes médicos y alergias en emergencias.',
            'estado' => 'en revisión',
            'autor' => 'Fernando',
            'categoria_id' => 3
        ]);

        Idea::firstOrCreate([
            'titulo' => 'Monitor de calidad de sueño y descanso',
            'descripcion' => 'Sistema que registra hábitos nocturnos y sugiere mejoras en la rutina.',
            'estado' => 'aprobada',
            'autor' => 'Sofia',
            'categoria_id' => 3
        ]);

        Idea::firstOrCreate([
            'titulo' => 'Mapa de centros de reciclaje cercanos',
            'descripcion' => 'Directorio interactivo para ubicar puntos de recolección de residuos.',
            'estado' => 'registrada',
            'autor' => 'Miguel',
            'categoria_id' => 4
        ]);

        Idea::firstOrCreate([
            'titulo' => 'Calculadora de huella hídrica doméstica',
            'descripcion' => 'Sistema que estima el consumo de agua en el hogar y da consejos de ahorro.',
            'estado' => 'en revisión',
            'autor' => 'Valeria',
            'categoria_id' => 4
        ]);

        Idea::firstOrCreate([
            'titulo' => 'Red de adopción de árboles urbanos',
            'descripcion' => 'Plataforma ciudadana para coordinar jornadas de reforestación y riego.',
            'estado' => 'aprobada',
            'autor' => 'Jorge',
            'categoria_id' => 4
        ]);

        Idea::firstOrCreate([
            'titulo' => 'Control de gastos personales para estudiantes',
            'descripcion' => 'Aplicación para registrar ingresos, pasajes y gastos diarios con gráficas.',
            'estado' => 'registrada',
            'autor' => 'Andrea',
            'categoria_id' => 5
        ]);

        Idea::firstOrCreate([
            'titulo' => 'Simulador de ahorro e interés compuesto',
            'descripcion' => 'Herramienta para proyectar rendimientos financieros a mediano y largo plazo.',
            'estado' => 'en revisión',
            'autor' => 'Daniel',
            'categoria_id' => 5
        ]);

        Idea::firstOrCreate([
            'titulo' => 'Divisor de cuentas para salidas en grupo',
            'descripcion' => 'Sistema rápido para calcular cuánto debe pagar cada persona en una comida.',
            'estado' => 'aprobada',
            'autor' => 'Gabriela',
            'categoria_id' => 5
        ]);

        Idea::firstOrCreate([
            'titulo' => 'Planificador de rutinas de gimnasio',
            'descripcion' => 'Aplicación para llevar el registro de series, repeticiones y pesos levantados.',
            'estado' => 'registrada',
            'autor' => 'Roberto',
            'categoria_id' => 6
        ]);

        Idea::firstOrCreate([
            'titulo' => 'Organizador de torneos deportivos locales',
            'descripcion' => 'Plataforma para gestionar equipos, horarios de partidos y tablas de posiciones.',
            'estado' => 'en revisión',
            'autor' => 'Patricia',
            'categoria_id' => 6
        ]);

        Idea::firstOrCreate([
            'titulo' => 'Comunidad para corredores al aire libre',
            'descripcion' => 'Red para compartir rutas seguras, tiempos y eventos de atletismo.',
            'estado' => 'aprobada',
            'autor' => 'Alejandro',
            'categoria_id' => 6
        ]);

        Idea::firstOrCreate([
            'titulo' => 'Alertas de transporte público en tiempo real',
            'descripcion' => 'Sistema colaborativo para reportar retrasos y afluencia en rutas urbanas.',
            'estado' => 'registrada',
            'autor' => 'Carmen',
            'categoria_id' => 7
        ]);

        Idea::firstOrCreate([
            'titulo' => 'Viajes compartidos para universitarios',
            'descripcion' => 'Plataforma para conectar estudiantes que viajan hacia el mismo campus.',
            'estado' => 'en revisión',
            'autor' => 'Ricardo',
            'categoria_id' => 7
        ]);

        Idea::firstOrCreate([
            'titulo' => 'Registro de mantenimiento preventivo vehicular',
            'descripcion' => 'Aplicación que notifica cuándo realizar cambios de aceite y afinaciones.',
            'estado' => 'aprobada',
            'autor' => 'Natalia',
            'categoria_id' => 7
        ]);
    }
}