<?php

namespace App\Notifications;

use Carbon\Carbon;
use Ghasedak\DataTransferObjects\Request\InputDTO;
use Ghasedak\DataTransferObjects\Request\ReceptorDTO;
use Ghasedaksms\GhasedaksmsLaravel\Message\GhasedaksmsVerifyLookUp;
use Ghasedaksms\GhasedaksmsLaravel\Notification\GhasedaksmsBaseNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendSmsOtpToUser extends GhasedaksmsBaseNotification

{
    use Queueable;
    /**
     * Create a new notification instance.
     */
    public function __construct(public string $otp)
    {
        //
    }

    public function toGhasedaksms($notifiable): GhasedaksmsVerifyLookUp
    {
        $message = new GhasedaksmsVerifyLookUp();
        $message->setSendDate(Carbon::now());
        $message->setReceptors([new ReceptorDTO($notifiable->main_cellphone, '')]);
        $message->setTemplateName('Ghasedak');
        $message->setInputs([new InputDTO('code', $this->otp)]);
        return $message;
    }
}
