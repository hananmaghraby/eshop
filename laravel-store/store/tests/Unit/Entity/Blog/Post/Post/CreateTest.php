<?php

namespace Tests\Unit\Entity\Blog\Post;

use App\Entity\Blog\Category;
use App\Entity\Blog\Post\Post;
use App\Entity\User\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateTest extends TestCase
{
    use RefreshDatabase;

    public function testNew(): void
    {
        $user = factory(User::class)->make([
            'id' => 1,
            'status' => User::STATUS_ACTIVE,
            'verify_token' => null,
        ]);

        $category = factory(Category::class)->make([
            'id' => 1
        ]);

        $post = Post::new(
            $authorId = $user->id,
            $categoryId = $category->id,
            $title = 'Title',
            $slug = 'slug',
            $description = 'Description',
            $content = 'Content'
        );

        $this->assertEquals($user->id, $authorId);
        $this->assertEquals($category->id, $categoryId);
        $this->assertEquals($post->title, $title);
        $this->assertEquals($post->slug, $slug);
        $this->assertEquals($post->description, $description);
        $this->assertEquals($post->content, $content);
        $this->assertEquals($post->views, 0);
        $this->assertEquals($post->comments, 0);
        $this->assertEquals($post->likes, 0);
    }
}