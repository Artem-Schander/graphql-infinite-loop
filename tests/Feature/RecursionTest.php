<?php

namespace Tests\Feature;

use Tests\TestCase;

class RecursionTest extends TestCase
{
    /** @test */
    public function infinite_loop_direct_to_one()
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
        $response->assertJson(['data' => [ 'SaveAuthor' => true ]]);
    }

    /** @test */
    public function infinite_loop_direct_to_many()
    {
        $post = [
            'query' => 'mutation SaveAuthor($author: AuthorInput!) {
                SaveAuthor(author: $author)
            }',
            'variables' => [
                'author' => [
                    'name' => 'Some Author Name',
                    'books' => [
                        [ 'name' => 'Book Name' ],
                    ]
                ],
            ],
            'operationName' => 'SaveAuthor',
        ];
        $response = $this->json('POST', '/graphql', $post);
        $response->assertJson(['data' => [ 'SaveAuthor' => true ]]);
    }

    /** @test */
    public function infinite_loop_indirect_to_one()
    {
        $post = [
            'query' => 'mutation SavePublisher($publisher: PublisherInput!) {
                SavePublisher(publisher: $publisher)
            }',
            'variables' => [
                'publisher' => [
                    'name' => 'Some Publisher Name',
                    'bestSellingAuthor' => [
                        'name' => 'Author Name',
                        'bestSellingBook' => [
                            'name' => 'Book Name',
                        ]
                    ]
                ],
            ],
            'operationName' => 'SavePublisher',
        ];
        $response = $this->json('POST', '/graphql', $post);
        $response->assertJson(['data' => [ 'SavePublisher' => true ]]);
    }

    /** @test */
    public function infinite_loop_indirect_to_many()
    {
        $post = [
            'query' => 'mutation SavePublisher($publisher: PublisherInput!) {
                SavePublisher(publisher: $publisher)
            }',
            'variables' => [
                'publisher' => [
                    'name' => 'Some Publisher Name',
                    'authors' => [
                        [
                            'name' => 'Author Name',
                            'books' => [
                                [ 'name' => 'Book Name' ],
                            ]
                        ]
                    ]
                ],
            ],
            'operationName' => 'SavePublisher',
        ];
        $response = $this->json('POST', '/graphql', $post);
        $response->assertJson(['data' => [ 'SavePublisher' => true ]]);
    }
}
