<?php

namespace Tests\Feature;

use Tests\TestCase;

class RecursionTest extends TestCase
{
    /** @test */
    public function infinite_loop()
    {
        $post = [
            'query' => 'mutation SaveAuthor($author: AuthorInput!) {
                SaveAuthor(author: $author)
            }',
            'variables' => [
                'author' => [
                    'name' => 'Some Author Name',
                    'bestSellingBook' => [
                        'name' => 'Book Name',
                    ]
                ],
            ],
            'operationName' => 'SaveAuthor',
        ];
        $response = $this->json('POST', '/graphql', $post);
        dd($response);
    }
}
