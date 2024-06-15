<?php
namespace RzSDK\User\Registration;
?>
<?php
use RzSDK\Curl\Curl;
use function RzSDK\Import\logPrint;
?>
<?php
class CurlUserRegistration {
    private $url;
    private $path = "/user-registration/user-registration.php";

    public function __construct($url) {
        $this->url = $url;
        $this->execute();
    }

    private function execute() {
        $url = $this->url . $this->path;
        $curl = new Curl($url);
        $result = $curl->exec(true, $this->getData()) . "";
        $result = json_decode($result, true);
        //logPrint($result);
        unset($result["info"]);
        unset($result["error"]);
        logPrint($result);
        /* $responseData = json_decode($result["body"], true);
        logPrint($responseData); */
    }

    private function getData() {
        return array(
            //"device_type"   => "android",
            "auth_type"     => "email",
            "agent_type"    => "android_app",
            "user_email"    => "email@gmail.com",
            "password"      => "123456aB#",
        );
    }
}
?>