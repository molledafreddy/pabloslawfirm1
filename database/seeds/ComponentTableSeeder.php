<?php

use Illuminate\Database\Seeder;
use App\Component;

class ComponentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Component::class)->create([
            'id' => 1,
            'image' => 'img/imagen-1.png',
            'title'=>'Ciudadania',
            'description'=>'Poseer la ciudadanía estadounidense proporciona muchos derechos que los residentes permanentes u otras personas no poseen, incluido el derecho a votar.',
            'section_id' => 2,
            'button_id'=>1
        ]);

        factory(Component::class)->create([
            'id' => 2,
            'image' => 'img/imagen-2.png',
            'title'=>'Remoción / Deportación',
            'description'=>'La deportación y la Remoción son términos utilizados para describir el proceso de obligar a un no ciudadano a abandonar los Estados Unidos.',
            'section_id' => 2,
            'button_id'=>2
        ]);

        factory(Component::class)->create([
            'id' => 3,
            'image' => 'img/Visa_estudiante.png',
            'title'=>'Visas de estudiante',
            'description'=>'La ley de inmigración provee dos tipos de categoría de visas para estudiar en los Estados Unidos. La visa para estudios académicos, y la visa no académica o estudios vocacionales. Para obtener una visa de estudiante, primero debe solicitar y ser aceptado en una escuela en los E.U.',
            'section_id' => 7,
            'button_id'=>3
        ]);

        factory(Component::class)->create([
            'id' => 4,
            'image' => 'img/intercambio academico.png',
            'title'=>'Visas de intercambio académico',
            'description'=>'Esta visa está diseñada para promover el intercambio de personas, conocimiento, y habilidades en los campos de la educación, artes y ciencias. Entre los participantes figuran estudiantes de todos los niveles académicos, alumnos que reciben capacitación laboral con empresas.',
            'section_id' => 7,
            'button_id'=>4
        ]);

        factory(Component::class)->create([
            'id' => 5,
            'image' => 'img/empleo.png',
            'title'=>'Visa de Empleo Basado en Petición',
            'description'=>'Las visas de empleo permiten al portador de las mismas trabajar en los Estados Unidos. Todos estos tipos de visas requieren que la compañía u organización contratante trámite primero una petición ante el Departamento de Servicios de Inmigración y Ciudadanía de los Estados Unidos.',
            'section_id' => 7,
            'button_id'=>5
        ]);

        factory(Component::class)->create([
            'id' => 6,
            'image' => 'img/icono-1.png',
            'title'=>'Consulta inicial y revisión de caso',
            'section_id' => 3,
        ]);

        factory(Component::class)->create([
            'id' => 7,
            'image' => 'img/icono-3.png',
            'title'=>'Te llevaremos de la mano paso a paso en tu proceso',
            'section_id' => 3,
        ]);

        factory(Component::class)->create([
            'id' => 8,
            'image' => 'img/icono-2.png',
            'title'=>'Se inicia el caso',
            'section_id' => 3,
        ]);

        factory(Component::class)->create([
            'id' => 9,
            'image' => 'img/icono-4.png',
            'title'=>'Lo haremos por ti unidos hasta el final',
            'section_id' => 3,
        ]);

        factory(Component::class)->create([
            'id' => 10,
            'image' => 'img/blanco-y-negro-1.png',
            'title'=>'Analuisa Pablos',
            'subtitle'=>'Socio fundador y Gerente',
            'description'=>'Analuisa Pablos es la Fundadora y Gerente de The Pablos Law Firm, P.C. donde trabaja exclusivamente en el área de inmigración y naturalización de EE. UU. Asesora a los empleadores en todos los aspectos de inmigración incluidas las visas de no inmigrante e inmigrante, la residencia permanente y la obtención de la ciudadanía.',
            'section_id' => 4,
        ]);

        factory(Component::class)->create([
            'id' => 11,
            'image' => 'img/blanco-y-negro-2.png',
            'title'=>'Jeffery D. Warren',
            'subtitle'=>'Socio principal',
            'description'=>'Jeffery D. Warren es un Socio Gerente de la firma de abogados de negocios, finanzas e inmigración global, The Pablos Law Firm, P.C. y mantiene intereses en varias empresas energéticas internacionales en curso.',
            'section_id' => 4,
        ]);

        factory(Component::class)->create([
            'id' => 12,
            'title'=>'LLAMANOS AL 915-543-9100',
            'description'=>'Somos un gran equipo trabajando para ti, brindamos servicios de clase mundial con calidad y seguridad a nuestros clientes. Proporcionamos la mejor estrategia jurídica para solucionar tus problemas en materia migratoria.',
            'section_id' => 1,
            'button_id'=>6,
        ]);

        factory(Component::class)->create([
            'id' => 13,
            'image' => 'img/blanco-y-negro-3.png',
            'section_id' => 5,
        ]);

        factory(Component::class)->create([
            'id' => 14,
            'image' => 'img/blanco-y-negro-4.png',
            'section_id' => 5,
        ]);

        factory(Component::class)->create([
            'id' => 15,
            'image' => 'img/blanco-y-negro-5.png',
            'section_id' => 5,
        ]);

        factory(Component::class)->create([
            'id' => 16,
            'image' => 'img/icono-footer-1.png',
            'title'=>'Dirección',
            'description'=>'1112 Montana El Paso  
            Texas 79902',
            'section_id' => 6,
        ]);

        factory(Component::class)->create([
            'id' => 17,
            'image' => 'img/icono-footer-2.png',
            'title'=>'Horario',
            'description'=>'Lunes - Viernes  
            8:00 am - 5:00 pm',
            'section_id' => 6,
        ]);

        factory(Component::class)->create([
            'id' => 18,
            'image' => 'img/icono-footer-3.png',
            'title'=>'Teléfono',
            'description'=>'Office: +1 915-543-9100',
            'section_id' => 6,
        ]);

        factory(Component::class)->create([
            'id' => 19,
            'description'=>'Gran Abogado, gran servicio al cliente. Te lo recomiendo!.
                            Mariana Sierra',
            'section_id' => 8,
        ]);

        factory(Component::class)->create([
            'id' => 20,
            'description'=>'Excelente atención. Pude entender todo el proceso legal sin ningún estrés. Me ayudó con los papeles para mis estudios.
                Gustavo Bracho.',
            'section_id' => 8,
        ]);

        factory(Component::class)->create([
            'id' => 21,
            'description'=>'El servicio es simple y eficiente. El personal es excelente y las tarifas son asequibles.
                            Roberto Chavez.',
            'section_id' => 8,
        ]);

        factory(Component::class)->create([
            'id' => 22,
            'description'=>'Analuisa Pablos es un gran abogado, los empleados son muy buenos y útiles.
                            Mariana Sierra.',
            'section_id' => 8,
        ]);
    }
}
