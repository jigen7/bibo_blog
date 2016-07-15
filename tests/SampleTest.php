<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SampleTest extends TestCase
{	
	//Admin Page
    /**
     * Test Login Page if loading
     *
     * @return void
     */
    public function testLoginPage()
    {
       $this->visit('/login')
             ->see('E-Mail Address');

    }


    /**
     * Test Login Page if Authenticating
     *
     * @return void
     */
	public function testLoginProcess()
	{
    $credentials = [
        'email'    => 'paolomanarang@gmail.com',
        'password' => '123456'
    ];

    $this->visit('/login')
        ->submitForm('login',  $credentials);

	}

    /**
     * Test Register Page if loading
     *
     * @return void
     */
    public function testRegisterPage()
    {
       $this->visit('/register')
             ->see('Username');
    }


    /**
     * Test Blog if loading
     *
     * @return void
     */


    //Test BLog
    public function testBlogHomePage()
    {
       $this->visit('/')
             ->see('Bibo Blog');
    }

    /**
     * Test Post Blog if loading
     *
     * @return void
     */
    public function testBlogPost()
    {
       $this->visit('/view?id=1')
             ->see('Comments');
    }

	//API Test 


    /**
     * Test Get API if working 
     *
     * @return void
     */
	public function testGetAPI()
	{
		    $this->get('/api/get_all_blog')->seeJson([
                 'id' => 1,
             ]);

	}

    /**
     * Test If Status Code is 200
     *
     * @return void
     */
	public function checkStatusCode(){

		    $response = $this->call('GET', '/api/get_all_blog');
		    $this->assertEquals(200, $response->status());

	}

    /**
     * Test API for create
     *
     * @return void
     */
	public function addPost(){

			$this->post('/api/create', ['title' => 'TestTitlePHPUnit', 'slug' => 'TestSlugPHPUnit', 'content' => ' TestContentPHPUnit']);
	}

	/**
     * Test API for update
     *
     * @return void
     */
	public function editPost(){

			$this->post('/api/create', ['id' => 1, 'title' => 'TestTitlePHPUnit', 'slug' => 'TestSlugPHPUnit', 'content' => ' TestContentPHPUnit']);
	}


		/**
     * Test API for update
     *
     * @return void
     */
	public function deletePost(){

			$this->post('/api/delete', ['id' => 1]);
	}



}
