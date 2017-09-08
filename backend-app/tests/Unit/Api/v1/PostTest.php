<?php
namespace Tests\Unit\Api\v1;

use TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\Post;
use Carbon\Carbon;

class PostTest extends TestCase
{
    use DatabaseMigrations;

    public function testIndex()
    {
        factory(Post::class)->create();

        $response = $this->json('GET', route('api.posts'));

        $response->assertStatus(200);
    }

    public function testStore()
    {
        $data = [
            'admin_id' => 1,
            'category_id' => 1,
            'title' => 'HereIsTitle',
            'md_content' => 'HereIsMdContent',
            'html_content' => 'HereIsHtmlContent',
            'publication_status' => 'public',
            'publication_date' => Carbon::now(),
            'created_at' => Carbon::now()
        ];

        $response = $this->json('POST', route('api.posts'), $data, $this->getHeaders());

        $response->assertStatus(200);
    }

    public function testShow()
    {
        $response = $this->json('GET', route('api.post', 1));

        $response->assertStatus(200);
    }

    public function testUpdate()
    {
        $data = [
            // 'admin_id' => 1,  FIXME set authenticated admin id  )cf. App\Repositories\Eloquent\Api\PostRepository.php
            'category_id' => 1,
            'title' => 'HereIsTitle',
            'md_content' => 'HereIsMdContent',
            'html_content' => 'HereIsHtmlContent',
            'publication_status' => 'public',
            'publication_date' => Carbon::now(),
            'created_at' => Carbon::now(),
            'tags' => [] // TODO
        ];

        $response = $this->json('PATCH', route('api.post.update', Post::first()->id), $data, $this->getHeaders());

        $response->assertStatus(200);
    }

    public function testDestroy()
    {
        $response = $this->json('DELETE', route('api.post.destroy', Post::first()->id), [], $this->getHeaders());

        $response->assertStatus(200);
    }
}
