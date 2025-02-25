<?php

declare(strict_types=1);

namespace Sandorian\Moneybird\Tests\Api\Projects;

use Saloon\Http\Faking\MockResponse;
use Sandorian\Moneybird\Api\MoneybirdApiClient;
use Sandorian\Moneybird\Api\Projects\CreateProjectRequest;
use Sandorian\Moneybird\Api\Projects\DeleteProjectRequest;
use Sandorian\Moneybird\Api\Projects\GetProjectRequest;
use Sandorian\Moneybird\Api\Projects\GetProjectsRequest;
use Sandorian\Moneybird\Api\Projects\Project;
use Sandorian\Moneybird\Api\Projects\UpdateProjectRequest;
use Sandorian\Moneybird\Tests\Api\BaseTestCase;

class ProjectsEndpointTest extends BaseTestCase
{
    private MoneybirdApiClient $client;

    protected function setUp(): void
    {
        parent::setUp();

        $this->client = $this->getMoneybirdClientWithMocks([
            GetProjectsRequest::class => MockResponse::make(ProjectsResponseStub::getProjects(), 200),
            GetProjectRequest::class => MockResponse::make(ProjectsResponseStub::getProject(), 200),
            CreateProjectRequest::class => MockResponse::make(ProjectsResponseStub::getProject(), 200),
            UpdateProjectRequest::class => MockResponse::make(ProjectsResponseStub::getProject(), 200),
            DeleteProjectRequest::class => MockResponse::make('', 204),
        ]);
    }

    public function test_it_can_get_all_projects(): void
    {
        $projects = $this->client->projects()->all();

        $this->assertCount(1, $projects);
        $this->assertContainsOnlyInstancesOf(Project::class, $projects);
        $this->assertSame('123456789012345678', $projects[0]->id);
        $this->assertSame('Test Project', $projects[0]->name);
    }

    public function test_it_can_get_a_project(): void
    {
        $project = $this->client->projects()->get('123456789012345678');

        $this->assertInstanceOf(Project::class, $project);
        $this->assertSame('123456789012345678', $project->id);
        $this->assertSame('Test Project', $project->name);
    }

    public function test_it_can_create_a_project(): void
    {
        $project = $this->client->projects()->create([
            'name' => 'Test Project',
            'note' => 'Test Note',
        ]);

        $this->assertInstanceOf(Project::class, $project);
        $this->assertSame('123456789012345678', $project->id);
        $this->assertSame('Test Project', $project->name);
    }

    public function test_it_can_update_a_project(): void
    {
        $project = $this->client->projects()->update('123456789012345678', [
            'name' => 'Updated Project',
        ]);

        $this->assertInstanceOf(Project::class, $project);
        $this->assertSame('123456789012345678', $project->id);
        $this->assertSame('Test Project', $project->name);
    }

    public function test_it_can_delete_a_project(): void
    {
        $result = $this->client->projects()->delete('123456789012345678');

        $this->assertTrue($result);
    }
}
