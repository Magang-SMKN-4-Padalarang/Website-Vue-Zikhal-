<?php
// ==== IZINKAN REQUEST DARI VUE (CORS) ====
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

// ==== JAWAB LANGSUNG UNTUK PREFLIGHT REQUEST (OPTIONS) ====
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

// ==== AMBIL DATA DARI REQUEST ====
$data = json_decode(file_get_contents("php://input"), true);
$username = isset($data['username']) ? $data['username'] : '';
$password = isset($data['password']) ? $data['password'] : '';

if (empty($username) || empty($password)) {
    http_response_code(400);
    echo json_encode(["status" => "error", "message" => "Username dan password wajib diisi"]);
    exit;
}

// ==== CEK USERNAME & PASSWORD (HARDCODE DULU, BELUM PAKAI DATABASE) ====
$username_valid = "zikal";
$password_valid = "zikal11";

if ($username === $username_valid && $password === $password_valid) {
    echo json_encode([
        "status" => "success",
        "message" => "Login berhasil",
        "data" => [
            "username" => $username
        ]
    ]);
} else {
    http_response_code(401);
    echo json_encode([
        "status" => "error",
        "message" => "Username atau password salah"
    ]);
}