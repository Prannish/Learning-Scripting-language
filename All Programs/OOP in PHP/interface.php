<?php
interface Logger {
    public function log($message);
}

class FileLogger implements Logger {
    public function log($message) {
        echo "Logging to file: $message";
    }
}

$logger = new FileLogger();
$logger->log("Hello"); // Output: Logging to file: Hello
?>