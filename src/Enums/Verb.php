<?php

namespace PocketNinja\ApiTalk\Enums;

use PocketNinja\ApiTalk\Exceptions\IncompatibleVerb;

enum Verb
{
    case GET;
    case POST;
    case PUT;
    case DELETE;
    case PATCH;

    public function canVerbTo(): bool
    {
        return match ($this) {
            Verb::GET, Verb::DELETE => false,
            default => true,
        };
    }

    public function canVerbFrom(): bool
    {
        return match ($this) {
            Verb::GET, Verb::DELETE => true,
            default => false,
        };
    }

    public function assertCanVerbTo(): void {
        if (!$this->canVerbTo()) {
            throw new IncompatibleVerb('GET and DELETE verbs are not supported for to() method');
        }
    }

    public function assertCanVerbFrom(): void {
        if (!$this->canVerbFrom()) {
            throw new IncompatibleVerb('POST, PUT, and PATCH verbs are not supported for from() method');
        }
    }

}
