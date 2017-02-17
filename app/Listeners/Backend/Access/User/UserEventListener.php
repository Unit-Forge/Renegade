<?php

namespace Renegade\Listeners\Backend\Access\User;

/**
 * Class UserEventListener.
 */
class UserEventListener
{
    /**
     * @var string
     */
    private $history_slug = 'User';

    /**
     * @param $event
     */
    public function onCreated($event)
    {
        history()->log(
            $this->history_slug,
            'trans("history.backend.users.created") '.$event->user->name,
            $event->user->id,
            'plus',
            'bg-green'
        );
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        history()->log(
            $this->history_slug,
            'trans("history.backend.users.updated") '.$event->user->name,
            $event->user->id,
            'save',
            'bg-aqua'
        );
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        history()->log(
            $this->history_slug,
            'trans("history.backend.users.deleted") '.$event->user->name,
            $event->user->id,
            'trash',
            'bg-maroon'
        );
    }

    /**
     * @param $event
     */
    public function onRestored($event)
    {
        history()->log(
            $this->history_slug,
            'trans("history.backend.users.restored") '.$event->user->name,
            $event->user->id,
            'refresh',
            'bg-aqua'
        );
    }

    /**
     * @param $event
     */
    public function onPermanentlyDeleted($event)
    {
        history()->log(
            $this->history_slug,
            'trans("history.backend.users.permanently_deleted") '.$event->user->name,
            $event->user->id,
            'trash',
            'bg-maroon'
        );
    }

    /**
     * @param $event
     */
    public function onPasswordChanged($event)
    {
        history()->log(
            $this->history_slug,
            'trans("history.backend.users.changed_password") '.$event->user->name,
            $event->user->id,
            'lock',
            'bg-blue'
        );
    }

    /**
     * @param $event
     */
    public function onDeactivated($event)
    {
        history()->log(
            $this->history_slug,
            'trans("history.backend.users.deactivated") '.$event->user->name,
            $event->user->id,
            'times',
            'bg-yellow'
        );
    }

    /**
     * @param $event
     */
    public function onReactivated($event)
    {
        history()->log(
            $this->history_slug,
            'trans("history.backend.users.reactivated") '.$event->user->name,
            $event->user->id,
            'check',
            'bg-green'
        );
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            \Renegade\Events\Backend\Access\User\UserCreated::class,
            'Renegade\Listeners\Backend\Access\User\UserEventListener@onCreated'
        );

        $events->listen(
            \Renegade\Events\Backend\Access\User\UserUpdated::class,
            'Renegade\Listeners\Backend\Access\User\UserEventListener@onUpdated'
        );

        $events->listen(
            \Renegade\Events\Backend\Access\User\UserDeleted::class,
            'Renegade\Listeners\Backend\Access\User\UserEventListener@onDeleted'
        );

        $events->listen(
            \Renegade\Events\Backend\Access\User\UserRestored::class,
            'Renegade\Listeners\Backend\Access\User\UserEventListener@onRestored'
        );

        $events->listen(
            \Renegade\Events\Backend\Access\User\UserPermanentlyDeleted::class,
            'Renegade\Listeners\Backend\Access\User\UserEventListener@onPermanentlyDeleted'
        );

        $events->listen(
            \Renegade\Events\Backend\Access\User\UserPasswordChanged::class,
            'Renegade\Listeners\Backend\Access\User\UserEventListener@onPasswordChanged'
        );

        $events->listen(
            \Renegade\Events\Backend\Access\User\UserDeactivated::class,
            'Renegade\Listeners\Backend\Access\User\UserEventListener@onDeactivated'
        );

        $events->listen(
            \Renegade\Events\Backend\Access\User\UserReactivated::class,
            'Renegade\Listeners\Backend\Access\User\UserEventListener@onReactivated'
        );
    }
}
