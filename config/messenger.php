<?php

return [

    'user_model' => Renegade\Models\Access\User\User::class,

    'message_model' =>  Renegade\Models\Access\User\Inbox\Message::class,

    'participant_model' => Cmgmyr\Messenger\Models\Participant::class,

    'thread_model' => Cmgmyr\Messenger\Models\Thread::class,

    /**
     * Define custom database table names - without prefixes.
     */
    'messages_table' => null,

    'participants_table' => null,

    'threads_table' => null,
];
