<?php

namespace Tests\Feature;

use App\Models\Company;
use App\Models\Job;
use App\Models\JobType;
use App\Models\Plan;
use Tests\TestCase;

class JobControllerTest extends TestCase
{
    private Company $company;

    protected function setUp(): void
    {
        parent::setUp();

        $this->company = Company::factory()->create();
    }

    public function testStoreShouldSuccessful(): void
    {
        $data = [
            "title" => "Estágio",
            "description" => "abcdefghijk",
            "job_type_id" => JobType::ESTAGIO,
            "salary" => 1000,
            "start_time" => "12:53:41",
            "end_time" => "18:53:41",
            "company_id" => $this->company->id
        ];

        $response = $this->postJson("/api/jobs", $data);
        $response->assertSuccessful();
    }

    public function testStoreWithNoParameterShouldReturnError(): void
    {
        $data = [];

        $response = $this->postJson("/api/jobs", $data);
        $response->assertUnprocessable();
    }

    public function testStoreMoreThanAllowedForFreeCompaniesShoudReturnError(): void
    {
        $data = [
            "title" => "Estágio",
            "description" => "abcdefghijk",
            "job_type_id" => JobType::ESTAGIO,
            "salary" => 1000,
            "start_time" => "12:53:41",
            "end_time" => "18:53:41",
            "company_id" => $this->company->id
        ];

        Job::factory()->count(Plan::MAX_JOBS_FOR_FREE)->create([
            'company_id' => $this->company->id
        ]);

        $response = $this->postJson("/api/jobs", $data);
        $response->assertUnprocessable();
    }

    public function testStoreMoreThanAllowedForPremiumCompaniesShoudReturnError(): void
    {
        $this->company->plan_id = Plan::PREMIUM;
        $this->company->save();
        $this->company->refresh();

        $data = [
            "title" => "Estágio",
            "description" => "abcdefghijk",
            "job_type_id" => JobType::ESTAGIO,
            "salary" => 1000,
            "start_time" => "12:53:41",
            "end_time" => "18:53:41",
            "company_id" => $this->company->id
        ];

        Job::factory()->count(Plan::MAX_JOBS_FOR_PREMIUM)->create([
            'company_id' => $this->company->id
        ]);

        $response = $this->postJson("/api/jobs", $data);
        $response->assertUnprocessable();
    }

    public function testStoreCltWithoutSalaryAndTimeShouldReturnError(): void
    {
        $data = [
            "title" => "clt",
            "description" => "abcdefghijk",
            "job_type_id" => JobType::CLT,
            "company_id" => $this->company->id
        ];

        $response = $this->postJson("/api/jobs", $data);
        $response->assertUnprocessable();
    }

    public function testStoreEstagioWithoutSalaryAndTimeShouldReturnError(): void
    {
        $data = [
            "title" => "estágio",
            "description" => "abcdefghijk",
            "job_type_id" => JobType::ESTAGIO,
            "company_id" => $this->company->id
        ];

        $response = $this->postJson("/api/jobs", $data);
        $response->assertUnprocessable();
    }

    public function testStoreInvalidMinimumCltSalaryShouldReturnError(): void
    {
        $data = [
            "title" => "Clt",
            "description" => "abcdefghijk",
            "job_type_id" => JobType::CLT,
            "salary" => 1000,
            "start_time" => "12:53:41",
            "end_time" => "18:53:41",
            "company_id" => $this->company->id
        ];

        $response = $this->postJson("/api/jobs", $data);
        $response->assertUnprocessable();
    }

    public function testStoreValidMinimumCltSalaryShouldSuccessful(): void
    {
        $data = [
            "title" => "Clt",
            "description" => "abcdefghijk",
            "job_type_id" => JobType::CLT,
            "salary" => 1212,
            "start_time" => "12:53:41",
            "end_time" => "18:53:41",
            "company_id" => $this->company->id
        ];

        $response = $this->postJson("/api/jobs", $data);
        $response->assertSuccessful();
   }

   public function testStoreInvalidEstagioTimeShouldReturnError(): void
    {
        $data = [
            "title" => "Estagio",
            "description" => "abcdefghijk",
            "job_type_id" => JobType::ESTAGIO,
            "salary" => 1000,
            "start_time" => "11:00:00",
            "end_time" => "18:00:00",
            "company_id" => $this->company->id
        ];

        $response = $this->postJson("/api/jobs", $data);
        $response->assertUnprocessable();
    }

    public function testStoreValidEstagioTimeShouldSuccessful(): void
    {
        $data = [
            "title" => "Estagio",
            "description" => "abcdefghijk",
            "job_type_id" => JobType::ESTAGIO,
            "salary" => 1000,
            "start_time" => "12:00:00",
            "end_time" => "18:00:00",
            "company_id" => $this->company->id
        ];

        $response = $this->postJson("/api/jobs", $data);
        $response->assertSuccessful();
    }


}

