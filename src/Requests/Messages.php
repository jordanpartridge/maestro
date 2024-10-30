<?php

namespace JordanPartridge\Maestro\Requests;

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
     * @param string $message
     * @param string $role
     * @param string $model
     */
    public function __construct(
        public string $message,
        public string $role = 'user',
        public string $model = 'claude-3-5-sonnet-20241022',
        public int $maxTokens = 1024,
    )
    {}

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
            'model'       => $this->model,
            'max_tokens' => $this->maxTokens,
            'messages'    => [
                [
                    'role'    => $this->role,
                    'content' => $this->message,
                ],
            ],
        ];
    }
}
