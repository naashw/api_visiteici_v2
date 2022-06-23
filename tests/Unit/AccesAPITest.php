<?php

namespace Tests\Unit;

use Tests\TestCase;

class AccesAPITest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_can_access_api_annonces()
    {
        $response = $this->get('/api/annonces');
        
        $response->assertOk();
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_can_access_api_annonce_by_id()
    {
        $response = $this->get('/api/annonces/1');
        
        $response->assertOk();
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_can_access_api_userpublic()
    {
        $response = $this->get('/api/userPublic');
        
        $response->assertOk();
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_can_access_api_userpublicById()
    {
        $response = $this->get('/api/userPublic/1');
        
        $response->assertOk();
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_can_access_api_virtualTourById()
    {
        $response = $this->get('/api/virtualTour/1');
        
        $response->assertOk();
    }

}
