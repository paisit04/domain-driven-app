<?php

namespace App\Common\Domain\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Bus\Queueable;
use App\Common\Infrastructure\Repositories\DomainEventRepository;
use App\Common\Domain\Traits\Saveable;
use App\Common\Domain\Events\DomainEvent;

class SaveDomainEvent implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, Saveable;

    private $event;

    private $entity;

    public function __construct(DomainEvent $event)
    {
        $this->event = $event;

        if (property_exists($event, ‘entity’)) {
            $this->entity = $this->event->entity;
        }
    }

    public function handle(DomainEventRepository $eventRepository)
    {
        return $eventRepository->createFromData([
            'event_id' => Uuid::uuid4()->toString(),
            'event_body' => json_encode(array_filter(
                array_except(
                    get_object_vars($this->event),
                    ['entity']
                )
            )),
            'eventable_type' => $this->entity ?
                get_class($this->entity) : null,
            'eventable_id' => $this->entity ?
                $this->entity->getKey() : null,
            'event_type' => $this->event->getName(),
            'user_id' => $this->event->user ?
                $this->event->user->getKey() : null
        ]);
    }
}
