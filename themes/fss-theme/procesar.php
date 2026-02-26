<?php
/**
 * procesar.php — Receptor del formulario de contacto FSS
 * Coloca este archivo en la raíz de tu servidor (junto a index.html o public/)
 *
 * Requisitos: PHP 7.4+, función mail() habilitada en el servidor
 */

// ── Configuración ────────────────────────────────────────────
define('DESTINATARIO', 'info@seguridadsocialfacil.com');   // ← correo que recibe
define('REMITENTE_DOMINIO', 'seguridadsocialfacil.com');    // ← tu dominio
define('ASUNTO_PREFIJO', '[FSS Web] ');                     // ← prefijo del asunto
define('ORIGEN_PERMITIDO', 'https://seguridadsocialfacil.com'); // ← tu URL exacta

// ── Solo POST ────────────────────────────────────────────────
header('Content-Type: application/json; charset=UTF-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['ok' => false, 'mensaje' => 'Método no permitido.']);
    exit;
}

// ── CORS: solo acepta peticiones desde tu dominio ────────────
$origin = $_SERVER['HTTP_ORIGIN'] ?? '';
if ($origin !== ORIGEN_PERMITIDO) {
    http_response_code(403);
    echo json_encode(['ok' => false, 'mensaje' => 'Origen no permitido.']);
    exit;
}
header('Access-Control-Allow-Origin: ' . ORIGEN_PERMITIDO);

// ── Anti-spam honeypot ───────────────────────────────────────
if (!empty($_POST['_honey'])) {
    // Es un bot — responder OK falso para no revelar el filtro
    echo json_encode(['ok' => true, 'mensaje' => '¡Mensaje enviado!']);
    exit;
}

// ── Función de limpieza ──────────────────────────────────────
function limpiar(string $valor): string {
    return htmlspecialchars(strip_tags(trim($valor)), ENT_QUOTES, 'UTF-8');
}

// ── Recoger y validar campos ─────────────────────────────────
$nombre   = limpiar($_POST['nombre']   ?? '');
$empresa  = limpiar($_POST['empresa']  ?? '');
$email    = filter_var(trim($_POST['email'] ?? ''), FILTER_VALIDATE_EMAIL);
$telefono = limpiar($_POST['telefono'] ?? '');
$asunto   = limpiar($_POST['asunto']   ?? '');
$mensaje  = limpiar($_POST['mensaje']  ?? '');

$errores = [];
if (empty($nombre))  $errores[] = 'El nombre es obligatorio.';
if (!$email)         $errores[] = 'El correo electrónico no es válido.';
if (empty($asunto))  $errores[] = 'El asunto es obligatorio.';
if (empty($mensaje)) $errores[] = 'El mensaje es obligatorio.';

if (!empty($errores)) {
    http_response_code(422);
    echo json_encode(['ok' => false, 'mensaje' => implode(' ', $errores)]);
    exit;
}

// ── Construir el correo ──────────────────────────────────────
$asunto_correo = ASUNTO_PREFIJO . $asunto;

$cuerpo  = "=== Nuevo mensaje desde el sitio web ===\n\n";
$cuerpo .= "Nombre:   {$nombre}\n";
$cuerpo .= "Empresa:  " . ($empresa ?: '(no indicada)') . "\n";
$cuerpo .= "Correo:   {$email}\n";
$cuerpo .= "Teléfono: " . ($telefono ?: '(no indicado)') . "\n";
$cuerpo .= "Asunto:   {$asunto}\n";
$cuerpo .= "\nMensaje:\n{$mensaje}\n";
$cuerpo .= "\n=======================================\n";
$cuerpo .= "Enviado desde: " . ORIGEN_PERMITIDO . "\n";
$cuerpo .= "Fecha: " . date('d/m/Y H:i:s') . "\n";

// Cabeceras del correo
$headers  = "From: noreply@" . REMITENTE_DOMINIO . "\r\n";
$headers .= "Reply-To: {$email}\r\n";            // responder directo al cliente
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
$headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";

// ── Enviar ───────────────────────────────────────────────────
$enviado = mail(DESTINATARIO, $asunto_correo, $cuerpo, $headers);

if ($enviado) {
    echo json_encode([
        'ok'      => true,
        'mensaje' => '¡Mensaje enviado correctamente! Le responderemos a la brevedad.'
    ]);
} else {
    http_response_code(500);
    echo json_encode([
        'ok'      => false,
        'mensaje' => 'No se pudo enviar el mensaje. Por favor escríbanos directamente a ' . DESTINATARIO
    ]);
}
