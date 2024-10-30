<?php

namespace JordanPartridge\Maestro\Requests;

use InvalidArgumentException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class Messages extends Request
{
    use HasJsonBody;

    /**
     * @var Method
     */
    protected Method $method = Method::POST;

    /**
     * @param string      $message
     * @param string      $role
     * @param string|null $model
     * @param int         $max_tokens
     */
    public function __construct(
        public string $message,
        public string $role = 'user',
        public ?string $model = null,
        public int    $max_tokens = 1024,
    )
    {
        if (trim($message) === '') {
            throw new InvalidArgumentException('Message content cannot be empty');
        }
        if ($this->max_tokens < 1 || $this->max_tokens > 4096) {
            throw new InvalidArgumentException('Max tokens must be between 1 and 4096');
        }

        if (!in_array($role, ['user', 'assistant', 'system'])) {
            throw new InvalidArgumentException('Invalid role specified');
        }

        $this->model = $model ?? config('maestro.anthropic.model', 'claude-3-5-sonnet-20241022');
    }

    /**
     * @return string
     */
    public function resolveEndpoint(): string
    {
        return '/messages';
    }

    public function defaultBody(): array
    {
        return [
            'model'      => $this->model,
            'max_tokens' => $this->max_tokens,
            'messages'   => [
                [
                    'role'    => $this->role,
                    'content' => $this->message,
                ],
            ],
        ];
    }
}
