<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
	/**
	 * FindAll
	 *
	 * @return void
	 */
	public function testFindAllWithError()
	{
		$response = $this->json('GET', '/api/users', []);

		$response->assertStatus(400);

	}

	/**
	 * FindAll
	 *
	 * @return void
	 */
	public function testFindAll()
	{
		$response = $this->json('GET', '/api/users', []);

		$response->assertStatus(200);

	}

	/**
	 * FindById
	 *
	 * @return void
	 */
	public function testFindByIdWithError()
	{
		$response = $this->json('GET', '/api/users/{id}', []);

		$response->assertStatus(400);

	}

	/**
	 * FindById
	 *
	 * @return void
	 */
	public function testFindById()
	{
		$response = $this->json('GET', '/api/users/{id}', []);

		$response->assertStatus(200);

	}

	/**
	 * Create
	 *
	 * @return void
	 */
	public function testCreateWithError()
	{
		$response = $this->json('POST', '/api/users', []);

		$response->assertStatus(400);

	}

	/**
	 * Create
	 *
	 * @return void
	 */
	public function testCreate()
	{
		$response = $this->json('POST', '/api/users', []);

		$response->assertStatus(200);

	}

	/**
	 * Delete
	 *
	 * @return void
	 */
	public function testDeleteWithError()
	{
		$response = $this->json('DELETE', '/api/users/{id}', []);

		$response->assertStatus(400);

	}

	/**
	 * Delete
	 *
	 * @return void
	 */
	public function testDelete()
	{
		$response = $this->json('DELETE', '/api/users/{id}', []);

		$response->assertStatus(200);

	}

	/**
	 * Create
	 *
	 * @return void
	 */
	public function testCreateWithError()
	{
		$response = $this->json('POST', '/api/auth/register', []);

		$response->assertStatus(400);

	}

	/**
	 * Create
	 *
	 * @return void
	 */
	public function testCreate()
	{
		$response = $this->json('POST', '/api/auth/register', []);

		$response->assertStatus(200);

	}

}
