<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class Test extends TestCase
{
	/**
	 * Html
	 *
	 * @return void
	 */
	public function testHtmlWithError()
	{
		$response = $this->json('GET', '/doc', []);

		$response->assertStatus(400);

	}

	/**
	 * Html
	 *
	 * @return void
	 */
	public function testHtml()
	{
		$response = $this->json('GET', '/doc', []);

		$response->assertStatus(200);

	}

	/**
	 * Json
	 *
	 * @return void
	 */
	public function testJsonWithError()
	{
		$response = $this->json('GET', '/doc.json', []);

		$response->assertStatus(400);

	}

	/**
	 * Json
	 *
	 * @return void
	 */
	public function testJson()
	{
		$response = $this->json('GET', '/doc.json', []);

		$response->assertStatus(200);

	}

	/**
	 * Losure
	 *
	 * @return void
	 */
	public function testLosureWithError()
	{
		$response = $this->json('GET', '/api/doc', []);

		$response->assertStatus(400);

	}

	/**
	 * Losure
	 *
	 * @return void
	 */
	public function testLosure()
	{
		$response = $this->json('GET', '/api/doc', []);

		$response->assertStatus(200);

	}

	/**
	 * Losure
	 *
	 * @return void
	 */
	public function testLosureWithError()
	{
		$response = $this->json('GET', '/', []);

		$response->assertStatus(400);

	}

	/**
	 * Losure
	 *
	 * @return void
	 */
	public function testLosure()
	{
		$response = $this->json('GET', '/', []);

		$response->assertStatus(200);

	}

}
