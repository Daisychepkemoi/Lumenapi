<?php
namespace App\Notifications;
use Illuminate\Bus\Queueable;
use User;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
class UserNotification extends Notification
{
 use Queueable;
/** @var Loan */
 public $user;
/**
 * @param Loan $loan
 */
 public function __construct($email)
 {
 $this->user = $email;
 }
/**
 * Get the notification’s delivery channels.
 *
 * @param mixed $notifiable
 * @return array
 */
 public function via($notifiable)
 {
 return ['mail'];
 }
/**
 * Get the mail representation of the notification.
 *
 * @param mixed $notifiable
 * @return \Illuminate\Notifications\Messages\MailMessage
 */
 public function toMail($notifiable)
 {
 return (new MailMessage)
 ->subject('There will be  a meeting!')
 ->markdown('at an nairobi', [
 'user' => $this->user
 ]);
 }
}