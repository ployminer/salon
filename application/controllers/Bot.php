<?php

// กรณีต้องการตรวจสอบการแจ้ง error ให้เปิด 3 บรรทัดล่างนี้ให้ทำงาน กรณีไม่ ให้ comment ปิดไป
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// include composer autoload
require_once 'vendor/autoload.php';

// การตั้งเกี่ยวกับ bot
require_once 'bot_settings.php';

// กรณีมีการเชื่อมต่อกับฐานข้อมูล
//require_once("dbconnect.php");
///////////// ส่วนของการเรียกใช้งาน class ผ่าน namespace
use LINE\LINEBot;
use LINE\LINEBot\HTTPClient;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;
use LINE\LINEBot\Event;
use LINE\LINEBot\Event\BaseEvent;
use LINE\LINEBot\Event\MessageEvent;
use LINE\LINEBot\Event\AccountLinkEvent;
use LINE\LINEBot\Event\MemberJoinEvent;
use LINE\LINEBot\MessageBuilder;
use LINE\LINEBot\MessageBuilder\TextMessageBuilder;
use LINE\LINEBot\MessageBuilder\StickerMessageBuilder;
use LINE\LINEBot\MessageBuilder\ImageMessageBuilder;
use LINE\LINEBot\MessageBuilder\LocationMessageBuilder;
use LINE\LINEBot\MessageBuilder\AudioMessageBuilder;
use LINE\LINEBot\MessageBuilder\VideoMessageBuilder;
use LINE\LINEBot\ImagemapActionBuilder;
use LINE\LINEBot\ImagemapActionBuilder\AreaBuilder;
use LINE\LINEBot\ImagemapActionBuilder\ImagemapMessageActionBuilder;
use LINE\LINEBot\ImagemapActionBuilder\ImagemapUriActionBuilder;
use LINE\LINEBot\MessageBuilder\Imagemap\BaseSizeBuilder;
use LINE\LINEBot\MessageBuilder\ImagemapMessageBuilder;
use LINE\LINEBot\MessageBuilder\MultiMessageBuilder;
use LINE\LINEBot\TemplateActionBuilder;
use LINE\LINEBot\TemplateActionBuilder\DatetimePickerTemplateActionBuilder;
use LINE\LINEBot\TemplateActionBuilder\MessageTemplateActionBuilder;
use LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder;
use LINE\LINEBot\TemplateActionBuilder\UriTemplateActionBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateMessageBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\ButtonTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselColumnTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\ConfirmTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\ImageCarouselTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\ImageCarouselColumnTemplateBuilder;
use LINE\LINEBot\Constant\Flex\ComponentIconSize;
use LINE\LINEBot\Constant\Flex\ComponentImageSize;
use LINE\LINEBot\Constant\Flex\ComponentImageAspectRatio;
use LINE\LINEBot\Constant\Flex\ComponentImageAspectMode;
use LINE\LINEBot\Constant\Flex\ComponentFontSize;
use LINE\LINEBot\Constant\Flex\ComponentFontWeight;
use LINE\LINEBot\Constant\Flex\ComponentMargin;
use LINE\LINEBot\Constant\Flex\ComponentSpacing;
use LINE\LINEBot\Constant\Flex\ComponentButtonStyle;
use LINE\LINEBot\Constant\Flex\ComponentButtonHeight;
use LINE\LINEBot\Constant\Flex\ComponentSpaceSize;
use LINE\LINEBot\Constant\Flex\ComponentGravity;
use LINE\LINEBot\MessageBuilder\FlexMessageBuilder;
use LINE\LINEBot\MessageBuilder\Flex\BubbleStylesBuilder;
use LINE\LINEBot\MessageBuilder\Flex\BlockStyleBuilder;
use LINE\LINEBot\MessageBuilder\Flex\ContainerBuilder\BubbleContainerBuilder;
use LINE\LINEBot\MessageBuilder\Flex\ContainerBuilder\CarouselContainerBuilder;
use LINE\LINEBot\MessageBuilder\Flex\ComponentBuilder\BoxComponentBuilder;
use LINE\LINEBot\MessageBuilder\Flex\ComponentBuilder\ButtonComponentBuilder;
use LINE\LINEBot\MessageBuilder\Flex\ComponentBuilder\IconComponentBuilder;
use LINE\LINEBot\MessageBuilder\Flex\ComponentBuilder\ImageComponentBuilder;
use LINE\LINEBot\MessageBuilder\Flex\ComponentBuilder\SpacerComponentBuilder;
use LINE\LINEBot\MessageBuilder\Flex\ComponentBuilder\FillerComponentBuilder;
use LINE\LINEBot\MessageBuilder\Flex\ComponentBuilder\SeparatorComponentBuilder;
use LINE\LINEBot\MessageBuilder\Flex\ComponentBuilder\TextComponentBuilder;
use LINE\LINEBot\Event\MessageEvent\LocationMessage;

class Bot extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('register_shop');
    }

    public function ToObject($Array)
    {
        // Clreate new stdClass object 
        $object = new stdClass();

        // Use loop to convert array into object 
        foreach ($Array as $key => $value) {
            if (is_array($value)) {
                $value = $this->ToObject($value);
            }
            $object->$key = $value;
        }
        return $object;
    }
    public function index()
    {
        // เชื่อมต่อกับ LINE Messaging API
        $httpClient = new CurlHTTPClient(LINE_MESSAGE_ACCESS_TOKEN);
        $bot = new LINEBot($httpClient, array('channelSecret' => LINE_MESSAGE_CHANNEL_SECRET));

        // คำสั่งรอรับการส่งค่ามาของ LINE Messaging API
        $content = file_get_contents('php://input');
        $hash = hash_hmac('sha256', $content, LINE_MESSAGE_CHANNEL_SECRET, true);
        $signature = base64_encode($hash);

        // แปลงค่าข้อมูลที่ได้รับจาก LINE เป็น array ของ Event Object
        $events = $bot->parseEventRequest($content, $signature);
        $eventObj = $events[0]; // Event Object ของ array แรก
        // ดึงค่าประเภทของ Event มาไว้ในตัวแปร มีทั้งหมด 7 event
        $eventType = $eventObj->getType();

        // แปลงข้อความรูปแบบ JSON  ให้อยู่ในโครงสร้างตัวแปร array
        // สร้างตัวแปร ไว้เก็บ sourceId ของแต่ละประเภท
        $userId = NULL;
        $sourceId = NULL;
        $sourceType = NULL;
        // สร้างตัวแปร replyToken และ replyData สำหรับกรณีใช้ตอบกลับข้อความ
        $result = NULL;
        $replyToken = NULL;
        $replyData = NULL;
        // สร้างตัวแปร ไว้เก็บค่าว่าเป้น Event ประเภทไหน
        $eventMessage = NULL;
        $eventPostback = NULL;
        $eventJoin = NULL;
        $eventLeave = NULL;
        $eventFollow = NULL;
        $eventUnfollow = NULL;
        $eventBeacon = NULL;
        $eventAccountLink = NULL;
        $eventMemberJoined = NULL;
        $eventMemberLeft = NULL;

        switch ($eventType) {
            case 'message':
                $eventMessage = true;
                break;
            case 'postback':
                $eventPostback = true;
                break;
            case 'join':
                $eventJoin = true;
                break;
            case 'leave':
                $eventLeave = true;
                break;
            case 'follow':
                $eventFollow = true;
                break;
            case 'unfollow':
                $eventUnfollow = true;
                break;
            case 'beacon':
                $eventBeacon = true;
                break;
            case 'accountLink':
                $eventAccountLink = true;
                break;
            case 'memberJoined':
                $eventMemberJoined = true;
                break;
            case 'memberLeft':
                $eventMemberLeft = true;
                break;
        }
        // สร้างตัวแปรเก็บค่า userId กรณีเป็น Event ที่เกิดขึ้นใน USER
        if ($eventObj->isUserEvent()) {
            $userId = $eventObj->getUserId();
            $sourceType = "USER";
        }

        $sourceId = $eventObj->getEventSourceId();
        if (is_null($eventLeave) && is_null($eventUnfollow) && is_null($eventMemberLeft)) {
            $replyToken = $eventObj->getReplyToken();
        }

        if (!is_null($eventPostback)) {
        }
        $events = json_decode($content, true);

        if (!is_null($events)) {
            if (!is_null($eventMessage)) {

                // สร้างตัวแปรเก็ยค่าประเภทของ Message จากทั้งหมด 7 ประเภท
                $typeMessage = $eventObj->getMessageType();
                //  text | image | sticker | location | audio | video | file  
                // เก็บค่า id ของข้อความ
                $idMessage = $eventObj->getMessageId();
                // ถ้าเป็นข้อความ
                if ($typeMessage == 'text') {
                    $userMessage = $eventObj->getText(); // เก็บค่าข้อความที่ผู้ใช้พิมพ์
                }
                // ถ้าเป็น image
                if ($typeMessage == 'image') {
                }
                // ถ้าเป็น audio
                if ($typeMessage == 'audio') {
                }
                // ถ้าเป็น video
                if ($typeMessage == 'video') {
                }
                if ($typeMessage == 'location') {
                }

                switch ($typeMessage) {

                    case 'text':
                        $userMessage = strtolower($userMessage);
                        switch ($userMessage) {
                            case "สมัครสมาชิก":
                                // กำหนด action 4 ปุ่ม 4 ประเภท
                                $actionBuilder = array(
                                    //                                new UriTemplateActionBuilder(
                                    //                                        'Facebook', // ข้อความแสดงในปุ่ม
                                    //                                        'https://www.facebook.com/parin.zaa.39'
                                    //                                ),
                                    new UriTemplateActionBuilder(
                                        'สมัครสมาชิกลูกค้า', // ข้อความแสดงในปุ่ม
                                        'line://app/1653826307-Kakok2GR' // ข้อความแสดงในปุ่ม
                                    ),
                                    new UriTemplateActionBuilder(
                                        'สมัครสมาชิกร้านค้า', // ข้อความแสดงในปุ่ม
                                        'line://app/1653826307-OBy8ydJM' // ข้อความแสดงในปุ่ม
                                    ),
                                );

                                $replyData = new TemplateMessageBuilder('Carousel', new CarouselTemplateBuilder(
                                    array(
                                        new CarouselColumnTemplateBuilder(
                                            'ลงทะเบียน',
                                            'กรุณาลงทะเบียน',
                                            'https://image.freepik.com/free-photo/top-view-uncompleted-questionnaire_23-2148265544.jpg',
                                            $actionBuilder

                                        ),

                                    )
                                ));
                                break;

                                case "บริการ":
                                    // กำหนด action 4 ปุ่ม 4 ประเภท
                                    $actionBuilder = array(
        //                                new UriTemplateActionBuilder(
        //                                        'Facebook', // ข้อความแสดงในปุ่ม
        //                                        'https://www.facebook.com/parin.zaa.39'
        //                                ),
                                        new UriTemplateActionBuilder(
                                                'จอง', // ข้อความแสดงในปุ่ม
                                                'https://liff.line.me/1653826307-Kakok2GR' // ข้อความแสดงในปุ่ม
                                        ),
                                        new UriTemplateActionBuilder(
                                                'รายละอียดการจอง', // ข้อความแสดงในปุ่ม
                                                'line://app/1653826307-OBy8ydJM' // ข้อความแสดงในปุ่ม
                                    )
                                    );
                                    $replyData = new TemplateMessageBuilder('Carousel', new CarouselTemplateBuilder(
                                            array(
                                        new CarouselColumnTemplateBuilder(
                                            'จองบริการ', 'ตรวจสอบการจอง', 'https://image.freepik.com/free-photo/hairdresser-elements_1303-1316.jpg', $actionBuilder
                                        )
                                            )
                                            )
                                    );
                                    break;

                                    case "โปรโมชัน":
                                        $response = $bot->getProfile($userId);
                                        file_put_contents('log.txt',"email_shopowner : ".$userId . PHP_EOL, FILE_APPEND);
                                        if ($response->isSucceeded()) {
                                            $userData = $response->getJSONDecodedBody(); // return array     
                                            $userId = $userData['email_shopowner'];
                                        }
                                        $result = $this->register_shop->read_allshop();
                                        
                                        $resultObj = $this->ToObject($result);
                                        $columns = array();
                                        $img_url = "https://scontent.fbkk5-5.fna.fbcdn.net/v/t1.0-9/90273871_2852650564830014_225063025114087424_n.jpg?_nc_cat=100&_nc_sid=85a577&_nc_eui2=AeEVm8xmbUF7fANn-F3VU2bx4n4rNBIaWt3ifis0Ehpa3Q004nbkS52hmBl3Vx1wl1q0KLyJjOyB4bVePZu4oq76&_nc_oc=AQlOY5-NNtdH3Q6mZ5FISykHKh2W9pPM89Ms616a9UziS4xgBDXSXmU4rRU9YMrUeOU&_nc_ht=scontent.fbkk5-5.fna&oh=bf077b4217d60b88fab9376411318a68&oe=5ED8D238";
                                        foreach ($resultObj as $pro) {
                                            file_put_contents('for.txt', "resultObj : " . print_r($resultObj, true) . PHP_EOL, FILE_APPEND);
                                            $actions = array(
                                                new UriTemplateActionBuilder(
                                                    'โปรโมชัน', // ข้อความแสดงในปุ่ม
                                                    '' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
                                                ),
                                                new UriTemplateActionBuilder(
                                                    'โทร',
                                                    'tel:' . $pro->phone_shopowner
                                                ),
                                                
                                            );
                                            $column = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselColumnTemplateBuilder($pro->name_shop, "ที่อยู่ : " . $pro->add_shop, $img_url, $actions);
                                            $columns[] = $column;
                                        }
                                        $carousel = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselTemplateBuilder($columns);
                                        $replyData = new \LINE\LINEBot\MessageBuilder\TemplateMessageBuilder('Carousel', $carousel);
                                        file_put_contents('log.txt', "result : " . print_r($replyData, true) . PHP_EOL, FILE_APPEND);

                                    break;
                                        

                            default:
                                $textReplyMessage = "คุณไม่ได้พิมพ์ ค่า ตามที่กำหนด";
                                $replyData = new TextMessageBuilder($textReplyMessage);
                                break;
                        }
                        break;

                        // default:
                        //     $textReplyMessage = json_encode($events);
                        //     $replyData = new TextMessageBuilder($textReplyMessage);
                        //     break;
                }
            }
            //l ส่วนของคำสั่งตอบกลับข้อความ
            $response = $bot->replyMessage($replyToken, $replyData);
            //        $err_msg = $response->getHTTPStatus() . " " . $response->getRawBody();
            //        file_put_contents('error_log.txt', print_r($err_msg, TRUE) . PHP_EOL, FILE_APPEND);
        }
    }
}
