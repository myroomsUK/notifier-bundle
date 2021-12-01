<?php

namespace Myrooms\NotifierBundle\Service;

use Symfony\Component\Messenger\MessageBusInterface;
use Myrooms\Messages\Notifier\Message;

class SlackLogger
{
    private MessageBusInterface $messageBus;

    public function __construct(MessageBusInterface $messageBus)
    {
        $this->messageBus = $messageBus;
    }

    public function error(string $message)
    {
        $this->messageBus->dispatch(
            Message::error($message)
        );
    }

    public function info(string $message)
    {
        $this->messageBus->dispatch(
            Message::info($message)
        );
    }

}