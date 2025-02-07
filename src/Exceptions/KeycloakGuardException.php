<?php

namespace KeycloakGuard\Exceptions;

use GraphQL\Error\ClientAware;
use GraphQL\Error\ProvidesExtensions;

class KeycloakGuardException extends \Exception implements ClientAware, ProvidesExtensions
{
    public function __construct(string $message)
    {
        $this->message = "[Keycloak Guard] {$message}";
    }

    /**
     * Returns true when exception message is safe to be displayed to a client.
     *
     * @api
     */
    public function isClientSafe(): bool
    {
        return true;
    }

    /**
     * Return the content that is put in the "extensions" part
     * of the returned error.
     */
    public function getExtensions(): array
    {
        return [
            'message' => $this->message,
        ];
    }
}
