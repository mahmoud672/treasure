<?php

/**

MAIL_DRIVER=smtp
MAIL_HOST=drahmedabuzeid.com
MAIL_PORT="587"
MAIL_USERNAME="info@drahmedabuzeid.com"
MAIL_PASSWORD="j#{GX$jej&0R"
MAIL_ENCRYPTION=null


 */
namespace App\Classes;
use App\Models\Message;
use App\Models\Contact;
use App\Models\Service;
use Illuminate\Support\Facades\Mail;

class ContactMailHelper
{
    protected $contact  ;
    protected $name      = null;
    protected $phone     = null;
    protected $email     = null;
    protected $title     = null;
    protected $message   = null;
    protected $service_id   = null;
    protected $type     = "laravel";
    protected $service;
    //protected $file      = null;


    public function __construct($name,$phone,$email,$title,$message,$service_id="")
    {
        $this->name=$name;
        $this->phone=$phone;
        $this->email=$email;
        $this->title=$title;
        $this->message=$message;
        $this->service_id = $service_id;
        $this->contact =  Contact::first();

    }

    public function sendMail($type="")
    {

       if ($type !="")
       {
            $this->type = $type;
       }

        //$data = $this->storeMessageInfoInMessageTable();
        $service = $this->getService();
        if ($this->type == 'laravel')
        {
            $messageView = 'website.layouts.email-message';
            $this->laravelWay(
                $messageView,
                array(
                    'receiver'=> $this->contact->email,
                    'name'=>$this->name,
                    'email'=>$this->email,
                    'phone'=>$this->phone,
                    'title'=>$this->title,
                    'body_message'=>$this->message,
                    "service"=>$service
                )
            );
        }
        elseif ($this->type == 'native')
        {
             $this->nativeWay();
        }

        return $this;
    }

    /** Laravel Way */
    protected function laravelWay($messageView,$data)
    {
        Mail::send($messageView,$data,function($message) use ($data)
        {
            $message->to($data['receiver']);
            $message->subject(website_title());
            $message->from($data['email']);
            /*$message->attach($data['file']->getRealPath(),array(
                'as'=>'file.'.$data['file']->getClientOriginalExtension(),
                'mime'=>$data['file']->getMimeType())
            );*/

        });
    }

    /** Native Way **/
    protected function nativeWay(){
        $name   = $this->name;
        $email  = $this->email;
        $to     =  $this->contact->email;
        $phone  = $this->phone;
        $title  = $this->title;
        $subject  = website_title();
        $message_body  = $this->message;
        $service = $this->getService();

        $sender_name = "=?UTF-8?B?".base64_encode($subject)."?=";
        $subject = "=?UTF-8?B?".base64_encode($subject)."?=";
        $headers = "From: $name <$email>\r\n".
            "MIME-Version: 1.0" . "\r\n" .
            "Content-type: text/html; charset=UTF-8" . "\r\n";
        $message  = "Welcome <br > <br > ";
        $message .= $title." <br > <br > ";
        $message .= "<br/> <h1 align='center' style='font-size:16px;'> Name: ".$name." </h1>";
        $message .= "<br/> <h1 align='center' style='color:#0f0238;font-size:16px;'> Email: ".$email." </h1>";
        $message .= "<br/> <h1 align='center' style='color:#0f0238;font-size:16px;'> Phone: ".$phone." </h1>";
        //$message .= "<br/> <h1 align='center' style='font-size:16px;'> Service: ".$service." </h1>";
        $service ? $message.= "<br/> <h1 align='center' style='font-size:16px;'> Service In English: ".$service->service_en->title." </h1>" : "";
        $service ? $message.= "<br/> <h1 align='center' style='font-size:16px;'> Service In Arabic: ".$service->service_ar->title." </h1>" : "";
        $message .= $message_body;

        //mail("mahmoudgad672@gmail.com,a.essam@be-group.com,gogle.lead@gmail.com", $subject, $message, $headers);
        if(@mail($to, $subject, $message, $headers))
        {
            return true;
        }
        else
        {
            return false;
        }

    }


    /** Store Message Info In Message Table **/
    public function storeMessageInfoInMessageTable()
    {
        $data=Message::create([
            'name'=>$this->name,
            'email'=>$this->email,
            'phone'=>$this->phone,
            'title'=>$this->title,
            'message'=>$this->message,
        ]);
        return $data;
    }

    /** Service **/
    protected function getService()
    {
       if ($this->service_id)
       {
           $this->service = Service::where('id',$this->service_id)->first();
       }
       return $this->service;
    }




}
