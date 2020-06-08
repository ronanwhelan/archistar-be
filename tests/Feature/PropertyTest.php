<?php

namespace Tests\Feature;

use App\Property;
use App\User;
use Laravel\Passport\Passport;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PropertyTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetProperties()
    {
        Passport::actingAs(factory(User::class)->create(), []);

        $response = $this->get('/api/property');

        $response
            ->assertStatus(200)
            ->assertJsonStructure(
                [
                    'data' =>
                        [
                            '*' => [
                                'id',
                                'state',
                                'suburb',
                                'country',
                            ]
                        ],
                ]
            );
        $response->assertOk();
    }

    public function testPropertyCreation()
    {
        Passport::actingAs(
            factory(User::class)->create(),
            ['create-servers']
        );

        $property = factory(Property::class)->make();

        Property::create([
            'country' => $property->country,
            'state' => $property->state,
            'suburb' => $property->suburb
        ]);

        $table = with(new Property)->getTable();

        $this->assertDatabaseHas($table, [
            'country' => $property->country
        ]);
    }
}
