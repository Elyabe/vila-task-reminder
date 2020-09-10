<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthTest extends TestCase
{
	/**
	 * Authenticate
	 *
	 * @return void
	 */
	public function testAuthenticateWithError()
	{
		$response = $this->json('POST', '/api/auth/login', []);

		$response->assertStatus(400);

	}

	/**
	 * Authenticate
	 *
	 * @return void
	 */
	public function testAuthenticate()
	{
		$response = $this->json('POST', '/api/auth/login', []);

		$response->assertStatus(200);

	}

}
