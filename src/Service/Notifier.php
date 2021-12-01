<?php

namespace Myrooms\NotifierBundle\Service;

use Symfony\Component\Messenger\MessageBusInterface;
use Myrooms\Messages\Notifier\Message;

class Notifier
{
    private MessageBusInterface $messageBus;

    public function __construct(MessageBusInterface $messageBus)
    {
        $this->messageBus = $messageBus;
    }

    public function error(string $message): void
    {
        $this->messageBus->dispatch(
            Message::error($message)
        );
    }

    public function info(string $message): void
    {
        $this->messageBus->dispatch(
            Message::info($message)
        );
    }

    public function critical(string $message): void
    {
        $this->messageBus->dispatch(
            Message::critical($message)
        );
    }

}