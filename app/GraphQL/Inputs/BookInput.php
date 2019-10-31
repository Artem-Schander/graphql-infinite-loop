<?php

declare(strict_types=1);

namespace App\GraphQL\Inputs;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\InputType;
use GraphQL;

class BookInput extends InputType
{
    protected $attributes = [
        'name' => 'BookInput',
        'description' => 'An example input',
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::int(),
            ],
            'name' => [
                'type' => Type::string(),
            ],
            'author' => [
                'type' => GraphQL::type('AuthorInput'),
            ],
        ];
    }
}
