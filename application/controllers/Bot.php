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
//use LINE\LINEBot\Event;
//use LINE\LINEBot\Event\BaseEvent;
//use LINE\LINEBot\Event\MessageEvent;
use LINE\LINEBot\MessageBuilder;
use LINE\LINEBot\MessageBuilder\TextMessageBuilder;
use LINE\LINEBot\MessageBuilder\StickerMessageBuilder;
use LINE\LINEBot\MessageBuilder\ImageMessageBuilder;
use LINE\LINEBot\MessageBuilder\LocationMessageBuilder;
use LINE\LINEBot\MessageBuilder\AudioMessageBuilder;
use LINE\LINEBot\MessageBuilder\VideoMessageBuilder;
use LINE\LINEBot\ImagemapActionBuilder;
use LINE\LINEBot\ImagemapActionBuilder\AreaBuilder;
use LINE\LINEBot\ImagemapActionBuilder\ImagemapMessageActionBuilder ;
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
 
class Bot extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('promotion_model');
      
    }
    public function ToObject($Array)
    {
        $object = new stdClass();
        foreach ($Array as $key => $value) {
            if (is_array($value)) {
                $value = $this->ToObject($value);
            }
            $object->$key = $value;
        }
        return $object;
    }
    public function index() {
$httpClient = new CurlHTTPClient(LINE_MESSAGE_ACCESS_TOKEN);
$bot = new LINEBot($httpClient, array('channelSecret' => LINE_MESSAGE_CHANNEL_SECRET));
 
// คำสั่งรอรับการส่งค่ามาของ LINE Messaging API
$content = file_get_contents('php://input');

 
// แปลงข้อความรูปแบบ JSON  ให้อยู่ในโครงสร้างตัวแปร array
$events = json_decode($content, true);

if(!is_null($events)){
    // ถ้ามีค่า สร้างตัวแปรเก็บ replyToken ไว้ใช้งาน
    $replyToken = $events['events'][0]['replyToken'];
    $userID = $events['events'][0]['source']['userId'];
    $sourceType = $events['events'][0]['source']['type'];        
    $is_postback = NULL;
    $is_message = NULL;
    if(isset($events['events'][0]) && array_key_exists('message',$events['events'][0])){
        $is_message = true;
        $typeMessage = $events['events'][0]['message']['type'];
        $userMessage = $events['events'][0]['message']['text'];     
        $idMessage = $events['events'][0]['message']['id'];             
    }
    if(isset($events['events'][0]) && array_key_exists('postback',$events['events'][0])){
        $is_postback = true;
        $dataPostback = NULL;
        parse_str($events['events'][0]['postback']['data'],$dataPostback);;
        $paramPostback = NULL;
        if(array_key_exists('params',$events['events'][0]['postback'])){
            if(array_key_exists('date',$events['events'][0]['postback']['params'])){
                $paramPostback = $events['events'][0]['postback']['params']['date'];
            }
            if(array_key_exists('time',$events['events'][0]['postback']['params'])){
                $paramPostback = $events['events'][0]['postback']['params']['time'];
            }
            if(array_key_exists('datetime',$events['events'][0]['postback']['params'])){
                $paramPostback = $events['events'][0]['postback']['params']['datetime'];
            }                       
        }
    }
       
    if(!is_null($is_postback)){
        $textReplyMessage = "ข้อความจาก Postback Event Data = ";
        if(is_array($dataPostback)){
            $textReplyMessage.= json_encode($dataPostback);
        }
        if(!is_null($paramPostback)){
            $textReplyMessage.= " \r\nParams = ".$paramPostback;
        }
        $replyData = new TextMessageBuilder($textReplyMessage);     
    }
    
    if(!is_null($is_message)){
        switch ($typeMessage){
            
            case 'text':
                $userMessage = strtolower($userMessage); // แปลงเป็นตัวเล็ก สำหรับทดสอบ
                switch ($userMessage) {
                    
                   
                    case "t_b":
                        // กำหนด action 4 ปุ่ม 4 ประเภท
                        $actionBuilder = array(
                            new MessageTemplateActionBuilder(
                                'Message Template',// ข้อความแสดงในปุ่ม
                                'This is Text' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
                            ),
                            new UriTemplateActionBuilder(
                                'Uri Template', // ข้อความแสดงในปุ่ม
                                'https://www.ninenik.com'
                            ),
                            new DatetimePickerTemplateActionBuilder(
                                'Datetime Picker', // ข้อความแสดงในปุ่ม
                                http_build_query(array(
                                    'action'=>'reservation',
                                    'person'=>5
                                )), // ข้อมูลที่จะส่งไปใน webhook ผ่าน postback event
                                'datetime', // date | time | datetime รูปแบบข้อมูลที่จะส่ง ในที่นี้ใช้ datatime
                                substr_replace(date("Y-m-d H:i"),'T',10,1), // วันที่ เวลา ค่าเริ่มต้นที่ถูกเลือก
                                substr_replace(date("Y-m-d H:i",strtotime("+5 day")),'T',10,1), //วันที่ เวลา มากสุดที่เลือกได้
                                substr_replace(date("Y-m-d H:i"),'T',10,1) //วันที่ เวลา น้อยสุดที่เลือกได้
                            ),      
                            new PostbackTemplateActionBuilder(
                                'Postback', // ข้อความแสดงในปุ่ม
                                http_build_query(array(
                                    'action'=>'buy',
                                    'item'=>100
                                )) // ข้อมูลที่จะส่งไปใน webhook ผ่าน postback event
    //                          'Postback Text'  // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
                            ),      
                        );
                        $imageUrl = 'https://www.mywebsite.com/imgsrc/photos/w/simpleflower';
                        $replyData = new TemplateMessageBuilder('Button Template',
                            new ButtonTemplateBuilder( 
                                    'button template builder', // กำหนดหัวเรื่อง
                                    'Please select', // กำหนดรายละเอียด
                                    $imageUrl, // กำหนด url รุปภาพ
                                    $actionBuilder  // กำหนด action object
                            )
                        );              
                        break;      
                    
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
                            )
                            );
                            
                            $replyData = new TemplateMessageBuilder('Carousel', new CarouselTemplateBuilder(
                                    array(
                                new CarouselColumnTemplateBuilder(
                                    'ลงทะเบียน', 'กรุณาลงทะเบียน', 'https://image.freepik.com/free-photo/top-view-uncompleted-questionnaire_23-2148265544.jpg', $actionBuilder
                                    
                                ),
                            
                                    )
                                    )
                            );
                            break;

                            case "บริการ":
                                $actionBuilder = array(
                                    new UriTemplateActionBuilder(
                                        'จอง', // ข้อความแสดงในปุ่ม
                                        'https://liff.line.me/1653826307-lDgjgq3E' // ข้อความแสดงในปุ่ม
                                    ),
                                    new UriTemplateActionBuilder(
                                        'ตรวจสอบ', // ข้อความแสดงในปุ่ม
                                        'https://liff.line.me/1653826307-lDgjgq3E' // ข้อความแสดงในปุ่ม
                                )
                                );
                                
                                $replyData = new TemplateMessageBuilder('Carousel', new CarouselTemplateBuilder(
                                        array(
                                    new CarouselColumnTemplateBuilder(
                                        'จองบริการ', 'ตรวจสอบการจอง', 'https://image.freepik.com/free-photo/top-view-uncompleted-questionnaire_23-2148265544.jpg', $actionBuilder
                                        
                                    ),
                                
                                        )
                                        )
                                );
                                break;


                                case "โปรโมชัน":
                                    $result =  $this->promotion_model->promotion();
                                    $resultObj = $this->ToObject($result);
                                    $columns = array();
                                    $img_url = "https://scontent.fbkk5-5.fna.fbcdn.net/v/t1.0-9/90273871_2852650564830014_225063025114087424_n.jpg?_nc_cat=100&_nc_sid=85a577&_nc_eui2=AeEVm8xmbUF7fANn-F3VU2bx4n4rNBIaWt3ifis0Ehpa3Q004nbkS52hmBl3Vx1wl1q0KLyJjOyB4bVePZu4oq76&_nc_oc=AQlOY5-NNtdH3Q6mZ5FISykHKh2W9pPM89Ms616a9UziS4xgBDXSXmU4rRU9YMrUeOU&_nc_ht=scontent.fbkk5-5.fna&oh=bf077b4217d60b88fab9376411318a68&oe=5ED8D238";
                                    foreach ($resultObj as $pro) {
                                        
                                        $actions = array(
                                            // new UriTemplateActionBuilder(
                                            //     'จองโปรโมชัน', // ข้อความแสดงในปุ่ม
                                            //     'https://liff.line.me/1653826205-Q3mkmJPp' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
                                            // ),
                                            new UriTemplateActionBuilder(
                                                'โทร',
                                                'tel:' . $pro->phone_shopowner
                                            )
                                        );
                                        $column = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselColumnTemplateBuilder($pro->name_shop,$pro->promotion, $img_url, $actions);
                                        $columns[] = $column;
                                    }
                                    $carousel = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselTemplateBuilder($columns);
                                    $replyData = new \LINE\LINEBot\MessageBuilder\TemplateMessageBuilder('Carousel', $carousel);
                                    break;

                    default:
                        $textReplyMessage = " คุณไม่ได้พิมพ์ ค่า ตามที่กำหนด";
                        $replyData = new TextMessageBuilder($textReplyMessage);         
                        break;                                      
                }
                break;

                
            default:
                $textReplyMessage = json_encode($events);
                $replyData = new TextMessageBuilder($textReplyMessage);         
                break;  
        }
    }
}
$response = $bot->replyMessage($replyToken,$replyData);
if ($response->isSucceeded()) {
    echo 'Succeeded!';
    return;
}


// Failed
echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
}
}
?>