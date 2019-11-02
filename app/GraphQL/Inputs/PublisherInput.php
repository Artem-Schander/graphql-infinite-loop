<?php

declare(strict_types=1);

namespace App\GraphQL\Inputs;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\InputType;
use GraphQL;

class PublisherInput extends InputType
{
    protected $attributes = [
        'name' => 'PublisherInput',
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
            'authors' => [
                'type' => Type::listOf(GraphQL::type('AuthorInput')),
            ],
            'bestSellingAuthor' => [
                'type' => GraphQL::type('AuthorInput'),
            ],
        ];
    }
}
