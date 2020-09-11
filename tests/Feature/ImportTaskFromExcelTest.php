<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ImportTaskFromExcelTest extends TestCase
{
	/**
	 * Import
	 *
	 * @return void
	 */
	public function testImportWithError()
	{
		$response = $this->json('POST', '/api/tasks/import', []);

		$response->assertStatus(400);

	}

	/**
	 * Import
	 *
	 * @return void
	 */
	public function testImport()
	{
		$response = $this->json('POST', '/api/tasks/import', []);

		$response->assertStatus(200);

	}

}
