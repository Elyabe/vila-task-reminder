<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VerificationTest extends TestCase
{
	/**
	 * Show
	 *
	 * @return void
	 */
	public function testShowWithError()
	{
		$response = $this->json('GET', '/api/email/verify', []);

		$response->assertStatus(400);

	}

	/**
	 * Show
	 *
	 * @return void
	 */
	public function testShow()
	{
		$response = $this->json('GET', '/api/email/verify', []);

		$response->assertStatus(200);

	}

	/**
	 * Verify
	 *
	 * @return void
	 */
	public function testVerifyWithError()
	{
		$response = $this->json('GET', '/api/email/verify/{id}', []);

		$response->assertStatus(400);

	}

	/**
	 * Verify
	 *
	 * @return void
	 */
	public function testVerify()
	{
		$response = $this->json('GET', '/api/email/verify/{id}', []);

		$response->assertStatus(200);

	}

	/**
	 * Resend
	 *
	 * @return void
	 */
	public function testResendWithError()
	{
		$response = $this->json('GET', '/api/email/resend', []);

		$response->assertStatus(400);

	}

	/**
	 * Resend
	 *
	 * @return void
	 */
	public function testResend()
	{
		$response = $this->json('GET', '/api/email/resend', []);

		$response->assertStatus(200);

	}

}
