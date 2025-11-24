<?php

namespace IncadevUns\CoreDomain\Database\Seeders;

use Illuminate\Database\Seeder;
use IncadevUns\CoreDomain\Enums\ApplicationStatus;
use IncadevUns\CoreDomain\Enums\CourseVersionStatus;
use IncadevUns\CoreDomain\Enums\StaffPaymentType;
use IncadevUns\CoreDomain\Enums\StaffType;
use IncadevUns\CoreDomain\Models\AcademicSetting;
use IncadevUns\CoreDomain\Models\Applicant;
use IncadevUns\CoreDomain\Models\Application;
use IncadevUns\CoreDomain\Models\Contract;
use IncadevUns\CoreDomain\Models\Course;
use IncadevUns\CoreDomain\Models\CourseVersion;
use IncadevUns\CoreDomain\Models\Module;
use IncadevUns\CoreDomain\Models\Offer;


class AdministrativeSeeder extends Seeder
{
    public function run(): void
    {
        $userModelClass = config('auth.providers.users.model', 'App\Models\User');

        AcademicSetting::create([
            'base_grade' => 20,
            'min_passing_grade' => 11,
            'absence_percentage' => 30.00,
        ]);

        // --- CURSO 1: Inteligencia Artificial y Data Science ---

        // 1. Crear el Curso
        $course1 = Course::create([
            'name' => 'Inteligencia Artificial y Data Science',
            'description' => 'Curso enfocado en especializaciones emergentes y transformación digital.',
            'image_path' => null,
        ]);

        // 2. Crear su Versión (publicada)
        $version1 = CourseVersion::create([
            'course_id' => $course1->id,
            'version' => '2025-01',
            'name' => 'IA-DS-2025-01',
            'price' => 350.00,
            'status' => CourseVersionStatus::Published,
        ]);

        // 3. Crear sus 3 Módulos
        Module::create([
            'course_version_id' => $version1->id,
            'title' => 'Fundamentos de IA',
            'description' => 'Conceptos clave y aplicaciones de la IA.',
            'sort' => 1,
        ]);

        Module::create([
            'course_version_id' => $version1->id,
            'title' => 'IA Generativa y Contenidos',
            'description' => 'Uso de IA para creación de contenidos y marketing.',
            'sort' => 2,
        ]);

        Module::create([
            'course_version_id' => $version1->id,
            'title' => 'Analítica de Datos con IA',
            'description' => 'Análisis de datos para la toma de decisiones.',
            'sort' => 3,
        ]);

        // --- CURSO 2: Gestión de Proyectos de Transformación Digital ---

        // 1. Crear el Curso
        $course2 = Course::create([
            'name' => 'Gestión de Proyectos de Transformación Digital',
            'description' => 'Aprende a liderar la innovación y gestión institucional en la era digital.',
            'image_path' => null,
        ]);

        // 2. Crear su Versión (publicada)
        $version2 = CourseVersion::create([
            'course_id' => $course2->id,
            'version' => '2025-01',
            'name' => 'GP-TD-2025-01',
            'price' => 300.00,
            'status' => CourseVersionStatus::Published,
        ]);

        // 3. Crear sus 3 Módulos
        Module::create([
            'course_version_id' => $version2->id,
            'title' => 'Planificación y Estrategia',
            'description' => 'Definición de objetivos y planificación institucional.',
            'sort' => 1,
        ]);

        Module::create([
            'course_version_id' => $version2->id,
            'title' => 'Metodologías Ágiles',
            'description' => 'Gestión de innovación y mejora continua.',
            'sort' => 2,
        ]);

        Module::create([
            'course_version_id' => $version2->id,
            'title' => 'Liderazgo y Comunicación Digital',
            'description' => 'Gestión de equipos y colaboración digital.',
            'sort' => 3,
        ]);

        // --- CURSO 3: Desarrollo Web y Cloud Computing ---

        // 1. Crear el Curso
        $course3 = Course::create([
            'name' => 'Desarrollo Web y Cloud Computing',
            'description' => 'Aprende a construir y desplegar aplicaciones modernas en la nube.',
            'image_path' => null,
        ]);

        // 2. Crear su Versión (publicada)
        $version3 = CourseVersion::create([
            'course_id' => $course3->id,
            'version' => '2025-01',
            'name' => 'DW-CC-2025-01',
            'price' => 320.00,
            'status' => CourseVersionStatus::Published,
        ]);

        // 3. Crear sus 3 Módulos
        Module::create([
            'course_version_id' => $version3->id,
            'title' => 'Fundamentos del Desarrollo Web',
            'description' => 'HTML, CSS, JavaScript y frameworks modernos.',
            'sort' => 1,
        ]);

        Module::create([
            'course_version_id' => $version3->id,
            'title' => 'Introducción a Cloud Computing (AWS)',
            'description' => 'Servicios clave de AWS: EC2, S3, RDS.',
            'sort' => 2,
        ]);

        Module::create([
            'course_version_id' => $version3->id,
            'title' => 'Despliegue y DevOps Básico',
            'description' => 'Contenedores (Docker) y despliegue continuo.',
            'sort' => 3,
        ]);







        // --- OFERTAS DE TRABAJO ---

        // 1. Crear Ofertas
        $offer1 = Offer::create([
            'title' => 'Desarrollador Backend PHP/Laravel',
            'description' => 'Buscamos desarrollador backend con experiencia en Laravel para unirse a nuestro equipo de desarrollo.',
            'requirements' => ['PHP', 'Laravel', 'MySQL', 'API REST'],
            'closing_date' => now()->addDays(30),
            'available_positions' => 2,
        ]);

        $offer2 = Offer::create([
            'title' => 'Diseñador UX/UI',
            'description' => 'Se busca diseñador UX/UI con experiencia en herramientas de diseño modernas.',
            'requirements' => ['Figma', 'Adobe XD', 'Investigación de usuarios', 'Prototipado'],
            'closing_date' => now()->addDays(45),
            'available_positions' => 1,
        ]);

        $offer3 = Offer::create([
            'title' => 'Analista de Datos',
            'description' => 'Analista para procesamiento y visualización de datos empresariales.',
            'requirements' => ['Python', 'SQL', 'Power BI', 'Estadística'],
            'closing_date' => now()->addDays(60),
            'available_positions' => 3,
        ]);

        $offer4 = Offer::create([
            'title' => 'Desarrollador Frontend React',
            'description' => 'Desarrollador frontend especializado en React para aplicaciones web modernas.',
            'requirements' => ['React', 'JavaScript', 'TypeScript', 'CSS'],
            'closing_date' => now()->addDays(25),
            'available_positions' => 2,
        ]);

        $offer5 = Offer::create([
            'title' => 'Administrador de Sistemas',
            'description' => 'Administrador de sistemas con experiencia en infraestructura cloud.',
            'requirements' => ['AWS', 'Linux', 'Docker', 'Networking'],
            'closing_date' => now()->addDays(40),
            'available_positions' => 1,
        ]);

        // --- SOLICITANTES ---

        // 1. Crear Solicitantes
        $applicant1 = Applicant::create([
            'name' => 'María González',
            'email' => 'maria.gonzalez@email.com',
            'phone' => '123456789',
            'dni' => '12345678',
        ]);

        $applicant2 = Applicant::create([
            'name' => 'Carlos Rodríguez',
            'email' => 'carlos.rodriguez@email.com',
            'phone' => '987654321',
            'dni' => '12345679',
        ]);

        $applicant3 = Applicant::create([
            'name' => 'Ana Martínez',
            'email' => 'ana.martinez@email.com',
            'phone' => '956789123',
            'dni' => '56321478',
        ]);

        $applicant4 = Applicant::create([
            'name' => 'Pedro Sánchez',
            'email' => 'pedro.sanchez@email.com',
            'phone' => '901548968',
            'dni' => '56247893',
        ]);

        $applicant5 = Applicant::create([
            'name' => 'Laura Fernández',
            'email' => 'laura.fernandez@email.com',
            'phone' => '965874123',
            'dni' => '68742395',
        ]);

        $applicant6 = Applicant::create([
            'name' => 'Javier López',
            'email' => 'javier.lopez@email.com',
            'phone' => '932846975',
            'dni' => '42587156',
        ]);

        $applicant7 = Applicant::create([
            'name' => 'Sofía Pérez',
            'email' => 'sofia.perez@email.com',
            'phone' => '906540238',
            'dni' => '50632147',
        ]);

        $applicant8 = Applicant::create([
            'name' => 'David García',
            'email' => 'david.garcia@email.com',
            'phone' => '930247785',
            'dni' => '85201456',
        ]);

        // --- SOLICITUDES DE EMPLEO ---

        // 1. Crear Solicitudes
        Application::create([
            'offer_id' => $offer1->id,
            'applicant_id' => $applicant1->id,
            'cv_path' => 'cvs/maria_gonzalez_cv.pdf',
            'status' => ApplicationStatus::Pending,
        ]);

        Application::create([
            'offer_id' => $offer1->id,
            'applicant_id' => $applicant2->id,
            'cv_path' => 'cvs/carlos_rodriguez_cv.pdf',
            'status' => ApplicationStatus::Pending,
        ]);

        Application::create([
            'offer_id' => $offer2->id,
            'applicant_id' => $applicant3->id,
            'cv_path' => 'cvs/ana_martinez_cv.pdf',
            'status' => ApplicationStatus::Hired,
        ]);

        Application::create([
            'offer_id' => $offer2->id,
            'applicant_id' => $applicant4->id,
            'cv_path' => 'cvs/pedro_sanchez_cv.pdf',
            'status' => ApplicationStatus::Rejected,
        ]);

        Application::create([
            'offer_id' => $offer3->id,
            'applicant_id' => $applicant5->id,
            'cv_path' => 'cvs/laura_fernandez_cv.pdf',
            'status' => ApplicationStatus::Pending,
        ]);

        Application::create([
            'offer_id' => $offer3->id,
            'applicant_id' => $applicant6->id,
            'cv_path' => 'cvs/javier_lopez_cv.pdf',
            'status' => ApplicationStatus::Pending,
        ]);

        Application::create([
            'offer_id' => $offer4->id,
            'applicant_id' => $applicant7->id,
            'cv_path' => 'cvs/sofia_perez_cv.pdf',
            'status' => ApplicationStatus::Hired,
        ]);

        Application::create([
            'offer_id' => $offer5->id,
            'applicant_id' => $applicant8->id,
            'cv_path' => 'cvs/david_garcia_cv.pdf',
            'status' => ApplicationStatus::Pending,
        ]);

        // --- CONTRATOS ---

        // 1. Crear Contratos
        Contract::create([
            'user_id' => $userModelClass::where('email', 'ana@incadev.com')->first()->id,
            'staff_type' => StaffType::Teacher,
            'payment_type' => StaffPaymentType::Monthly,
            'amount' => 3500.00,
            'start_date' => now()->subMonths(12),
            'end_date' => now()->addMonths(24),
        ]);

        Contract::create([
            'user_id' => $userModelClass::where('email', 'dante@incadev.com')->first()->id,
            'staff_type' => StaffType::Teacher,
            'payment_type' => StaffPaymentType::Monthly,
            'amount' => 1800.00,
            'start_date' => now()->subMonths(6),
            'end_date' => now()->addMonths(18),
        ]);

        Contract::create([
            'user_id' => $userModelClass::where('email', 'antonio@incadev.com')->first()->id,
            'staff_type' => StaffType::Teacher,
            'payment_type' => StaffPaymentType::Monthly,
            'amount' => 4200.00,
            'start_date' => now()->subMonths(24),
            'end_date' => null,
        ]);

        Contract::create([
            'user_id' => $userModelClass::where('email', 'martin@incadev.com')->first()->id,
            'staff_type' => StaffType::Support,
            'payment_type' => StaffPaymentType::Weekly,
            'amount' => 25.50,
            'start_date' => now()->subMonths(3),
            'end_date' => now()->addMonths(9),
        ]);

        Contract::create([
            'user_id' => $userModelClass::where('email', 'lucia@incadev.com')->first()->id,
            'staff_type' => StaffType::Support,
            'payment_type' => StaffPaymentType::Weekly,
            'amount' => 18.75,
            'start_date' => now()->subMonths(1),
            'end_date' => now()->addMonths(11),
        ]);

        // Contratos adicionales para otros tipos de staff
        Contract::create([
            'user_id' => $userModelClass::where('email', 'patricia.hr@incadev.com')->first()->id,
            'staff_type' => StaffType::Administrator,
            'payment_type' => StaffPaymentType::Monthly,
            'amount' => 3200.00,
            'start_date' => now()->subMonths(9),
            'end_date' => now()->addMonths(15),
        ]);

        Contract::create([
            'user_id' => $userModelClass::where('email', 'ricardo.finance@incadev.com')->first()->id,
            'staff_type' => StaffType::Administrator,
            'payment_type' => StaffPaymentType::Monthly,
            'amount' => 4500.00,
            'start_date' => now()->subMonths(36),
            'end_date' => null,
        ]);

        Contract::create([
            'user_id' => $userModelClass::where('email', 'gabriela.enrollment@incadev.com')->first()->id,
            'staff_type' => StaffType::Coordinator,
            'payment_type' => StaffPaymentType::Monthly,
            'amount' => 2800.00,
            'start_date' => now()->subMonths(4),
            'end_date' => now()->addMonths(12),
        ]);


    }
}
