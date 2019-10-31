<?php

declare(strict_types=1);

namespace App\GraphQL\Inputs;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\InputType;
use GraphQL;

class AuthorInput extends InputType
{
    protected $attributes = [
        'name' => 'AuthorInput',
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
            'books' => [
                'type' => Type::listOf(GraphQL::type('BookInput')),
            ],
            'bestSellingBook' => [
                'type' => GraphQL::type('BookInput'),
            ],
        ];
    }
}
