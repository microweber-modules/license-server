<?php

namespace MicroweberPackages\Modules\LicenseServer\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use MicroweberPackages\Notification\Channels\AppMailChannel;
use MicroweberPackages\Option\Facades\Option;


class UserLicenseActivatedNotification extends Notification
{
    use Queueable;
    use InteractsWithQueue, SerializesModels;

    public $notification;

    public $notificationData = [];

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->notificationData = $data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [AppMailChannel::class];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $mail = new MailMessage();
        $mail->subject('Your license is activated!');
        $mail->greeting('Hey, '. $notifiable->first_name);
        $mail->line('Your license is activated and ready to use.');
        $mail->line('License key: ' . $this->notificationData['licenseKey']);

        if ($this->notificationData['isLifetime']) {
            $mail->line('Your license is lifetime.');
        } else {
            $mail->line('Your license will expire in ' . $this->notificationData['expirationDays'] . ' days.');
        }

        $mail->line('You can view all your licenses in your account.');

        $mail->action('How to install license key?', 'https://microweber.com/white-label-license-instructions');
       // $mail->action('View Licenses', site_url().'projects/licenses');

        $mail->line('License is only for own use and cannot be resold or shared to any third party.');
        $mail->line('If you share your license key, with someone else, we cannot support your license key anymore.');
        
        return $mail;
    }

}
