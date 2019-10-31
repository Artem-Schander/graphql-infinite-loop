<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\Type;
use GraphQL;

class SaveAuthor extends Mutation
{
    protected $attributes = [
        'name' => 'SaveAuthor'
    ];

    public function type(): Type
    {
        return Type::boolean();
    }

    public function args(): array
    {
        return [
            'author' => [
                'name' => 'author',
                'type' => GraphQL::type('AuthorInput')
            ],
        ];
    }

    protected function rules(array $args = []): array
    {
        return [
            'author' => ['required'],
        ];
    }

    public function resolve($root, $args)
    {
        return true;
    }
}
