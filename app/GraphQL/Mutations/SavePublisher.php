<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\Type;
use GraphQL;

class SavePublisher extends Mutation
{
    protected $attributes = [
        'name' => 'SavePublisher'
    ];

    public function type(): Type
    {
        return Type::boolean();
    }

    public function args(): array
    {
        return [
            'publisher' => [
                'name' => 'publisher',
                'type' => GraphQL::type('PublisherInput')
            ],
        ];
    }

    protected function rules(array $args = []): array
    {
        return [
            'publisher' => ['required'],
        ];
    }

    public function resolve($root, $args)
    {
        return true;
    }
}
