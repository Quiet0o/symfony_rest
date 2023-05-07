<?php

namespace App\Tests\Contoroller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ProjectControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();
        $client->request('GET', '/api/project');

        $this->assertSame(200, $client->getResponse()->getStatusCode());
        $this->assertJson($client->getResponse()->getContent());
    }

    public function testNew()
    {
        $client = static::createClient();

        $postData = [
            'name' => 'test name',
            'description' => 'test description',
        ];

        $client->request('POST', '/api/project', $postData);

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testShow()
    {
        $client = static::createClient();
        $client->request('GET', '/api/project/1');

        $this->assertSame(200, $client->getResponse()->getStatusCode());
        $this->assertJson($client->getResponse()->getContent());
    }

    public function testEdit()
    {
        $postData = [
            'name' => 'updated name',
            'description' => 'updated description',
        ];

        $client = static::createClient();
        $client->request('PUT', 'api/project/1', $postData);

        $this->assertSame(200, $client->getResponse()->getStatusCode());
        $this->assertJson($client->getResponse()->getContent());
    }

    public function testDelete()
    {
        $client = static::createClient();
        $client->request('DELETE', 'api/project/1');

        $this->assertSame(200, $client->getResponse()->getStatusCode());
        $this->assertJson($client->getResponse()->getContent());
    }
}