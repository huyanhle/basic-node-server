<?php
// Đặt header để cho phép client gửi request từ mọi nguồn (CORS)
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Kiểm tra phương thức HTTP
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        handleGetRequest();
        break;
    case 'POST':
        handlePostRequest();
        break;
    default:
        sendResponse(405, ["message" => "Method not allowed"]);
}

// Hàm xử lý yêu cầu GET
function handleGetRequest() {
    $data = [
        "message" => "Hello from GET request!",
        "timestamp" => date("Y-m-d H:i:s")
    ];
    sendResponse(200, $data);
}

// Hàm xử lý yêu cầu POST
function handlePostRequest() {
    // Lấy dữ liệu từ body request
    $input = json_decode(file_get_contents("php://input"), true);

    if ($input && isset($input['name'])) {
        $response = [
            "message" => "Hello, " . htmlspecialchars($input['name']) . "!",
            "timestamp" => date("Y-m-d H:i:s")
        ];
        sendResponse(200, $response);
    } else {
        sendResponse(400, ["message" => "Invalid input data"]);
    }
}

// Hàm gửi phản hồi
function sendResponse($statusCode, $data) {
    http_response_code($statusCode);
    echo json_encode($data);
}
?>
