<?php

use Illuminate\Database\Seeder;
use App\Modal;

class ModalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //
        factory(Modal::class)->create([
            'id' => 1,
            'modal_text' => 'Por lo tanto, la decisión de convertirse en un ciudadano estadounidense por medio de la naturalización es importante. En la mayoría de casos, una persona que desea naturalizarse debe ser primero un residente permanente. Al convertirse en un ciudadano estadounidense, usted obtiene muchos derechos. Para ser elegible a la naturalización, debe primero cumplir con ciertos requisitos requeridos por la ley estadounidense de inmigración.

Los requisitos más comunes para ser elegible para la naturalización son:
 - Tener 18 años o más; 
 - Ser un residente permanente por un cierto periodo de tiempo (normalmente 5 años o 3 años, dependiendo de cómo obtuvo su estatus);
 - Ser una persona con buen carácter moral; 
 - Tener conocimiento básico del gobierno estadounidense (esto, también puede exceptuarse debido a limitaciones físicas o mentales permanentes); 
 - Tener un período de residencia continua y presencia física en los Estados Unidos.
 - Ser capaz de leer, escribir y hablar un nivel básico de inglés. Existen excepciones a esta regla para aquel que al momento de presentar la solicitud como son; tener 55 años de edad y haber sido residente permanente al menos 15 años; Tener 50 años de edad y haber sido residente permanente al menos 20 años; o Tener una discapacidad física o mental que le impida cumplir con estos requisitos.

 Como especialista en inmigración, te brindo mi experiencia para estar a tu lado en todo el proceso;  presento tu caso de la mejor manera posible para que tu solicitud tenga la mayor posibilidad de ser aprobada y te preparo para tener una exitosa entrevista.',
            'modal_title' => 'Ciudadania'
        ]);

        factory(Modal::class)->create([
            'id' => 2,
            'modal_text' => 'Existen diferentes crímenes o violaciones que un individuo puede cometer que lo clasificarán como "extraíble". Sin embargo, esto no es automático. En general, estos no ciudadanos recibirán una audiencia de deportación con un juez de inmigración para determinar si realmente se ordenará la deportación.

Cuando un no ciudadano está pasando por un proceso de deportación, se le proporcionarán ciertos derechos durante este proceso. Para empezar, el no ciudadano tiene la capacidad de contratar un abogado, pero no se lo proporcionará de forma gratuita. Por ejemplo, no existe un defensor público en un tribunal de inmigración. 

El proceso se llevará a cabo en el lugar de residencia del no ciudadano o en el lugar del arresto del no ciudadano. Durante la audiencia de deportación, el juez tiene la discreción de determinar la deportación del no ciudadano y determinará el país de origen del no ciudadano.
             
Razones comunes para la eliminación:
Si bien hay muchas razones por las cuales alguien puede encontrarse sujeto a procedimientos de deportación en el tribunal de inmigración, los motivos más comunes para su deportación incluyen:

- Inadmisible en el momento de la entrada: En pocas palabras, esto significa que si no era admisible en el momento de su entrada, es probable que sea deportado.
- Delitos penales: Primero, un no ciudadano puede iniciar un proceso de deportación si ha cometido un delito que se considera de depravación moral. Los procedimientos de deportación también pueden comenzar si un individuo ha sido condenado por delitos múltiples o un delito grave. Además, ciertas violaciones relacionadas con armas de fuego y sustancias controladas también pueden conducir a procedimientos de deportación.
- Falta de registro / falsificación de documentos: Si bien parece grave, puede ser deportado legalmente si no actualiza su dirección dentro de los diez días posteriores a mudarse con los EE. UU. (Servicio de Ciudadanía e Inmigración de los Estados Unidos). Cualquier alteración o uso indebido de visas u otros documentos de inmigración puede conducir a la deportación también.
- Cuestiones de seguridad: cualquier participación en espionaje o sabotaje contra los Estados Unidos puede conducir a la deportación.
- Cuestiones económicas: si se convierte en un cargo público del gobierno debido a problemas constantes anteriores a su admisión, puede ser deportado.

Como especialista en inmigración, te brindo mi experiencia para responder a tus preguntas y ayudarte a través de este difícil proceso.
            ',
            'modal_title' => 'Remoción / Deportación'
        ]);

        factory(Modal::class)->create([
            'id' => 3,
            'modal_text' => 'La ley de inmigración provee dos tipos de categoría de visas para estudiar en los Estados Unidos. La visa para estudios académicos, y la visa no académica o estudios vocacionales. Para obtener una visa de estudiante, primero debe solicitar y ser aceptado en una escuela en los E.U.',
            'modal_title' => 'Visas de estudiante'
        ]);

        factory(Modal::class)->create([
            'id' => 4,
            'modal_text' => 'Esta visa está diseñada para promover el intercambio de personas, conocimiento, y habilidades en los campos de la educación, artes y ciencias. Entre los participantes figuran estudiantes de todos los niveles académicos, alumnos que reciben capacitación laboral con empresas; profesores que vienen a enseñar o a hacer investigaciones en instituciones de educación superior; investigadores, formadores profesionales de la medicina y sectores afines y los visitantes internacionales que vienen con el propósito de viajes, observación, consulta, investigación, capacitación, compartir, o a demostrar conocimientos especializados y habilidades incluso a participar en programas organizadas de gente con gente.',
            'modal_title' => 'Visas de intercambio académico'
        ]);

        factory(Modal::class)->create([
            'id' => 5,
            'modal_text' => 'Las visas de empleo permiten al portador de las mismas trabajar en los Estados Unidos. Todos estos tipos de visas requieren que la compañía u organización contratante trámite primero una petición ante el Departamento de Servicios de Inmigración y Ciudadanía de los Estados Unidos.

- Visa H1B:  Está creada para permitir trabajar temporalmente en los Estados Unidos en una ocupación especializada. Requiere un título de enseñanza superior o su equivalente. Este tipo de visa permite entradas múltiples en un período de un año. Las personas cuya nacionalidad sea diferente a la mexicana, pueden requerir pagar una cuota adicional, dependiendo de su país de origen.

- Visa H2:  Esta visa permite a las personas realizar trabajos agrícolas de temporal o estacional. Limitado a los ciudadanos o nacionales de los países designados, con excepciones limitadas. Así como para personas que realicen trabajos temporal o estacional no agrícola.

- Visa L:  Este tipo de visa es utilizado por personas que serán transferidas a los Estados Unidos por su compañía, para trabajar en alguna sucursal o subcompañía de la misma. Los solicitantes deben cubrir un puesto gerencial o ejecutivo, o tener un tipo de conocimiento especializado y haber estado contratado por la misma compañía o empresa, durante un determinado período consecutivo (por lo menos un año de los 3 previos a la solicitud de visa).

- Visas O/P:  Este tipo de visas son para artistas, intérpretes o trabajadores de intercambio que poseen habilidades inusuales o extraordinarias y que planean presentarse, enseñar, entrenar o participar en algún programa cultural en los Estados Unidos.

- Empleadas (os) Domésticas (os): Empleadas (os) domésticas (os) ó personales quienes estén acompañando o siguiendo a su (s) patrón (es) en los Estados Unidos. Esta categoría de personas incluye, pero no limita a, cocineros (as), choferes, empleadas (os) domésticas (os), mozos, niñeras, jardineros y asistentes en cuidado personal.

- Comerciantes e Inversionistas: Las visas de Comerciante y las visas de Inversionistas son visas para ciudadanos de un país con el que los Estados Unidos mantiene algún tratado o acuerdo de comercio o navegación y que desean ir a los Estados Unidos para alguno de los siguientes propósitos: Para llevar a cabo actividades sustanciales de comercio, principalmente entre Estados Unidos y su país: o para desarrollar y dirigir operaciones de una empresa en Estados Unidos en donde  el ciudadano ha invertido o está en el proceso de invertir una cantidad considerable de capital.

- NAFTA: La Visa TN fue creada luego que fuera firmado el Tratado de Libre Comercio de América del Norte (North Free TradeAgreement  – NAFTA) en 1994 para facilitar el traslado temporal de profesionistas entre Canadá, México y Estados Unidos.
',
            'modal_title' => 'Visa de Empleo Basado en Petición'
        ]);
    }
}
